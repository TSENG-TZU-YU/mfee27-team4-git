<?php
if (!isset($_POST["order_id"])) {
    echo "沒有資料";
    exit;
}
require("../db-connect.php");
$order_id = $_POST["order_id"];
$sqlAll = "SELECT payment_state,payment_time,order_state FROM order_product WHERE order_id=$order_id AND valid=1";
$resultAll = $conn->query($sqlAll);
$row = $resultAll->fetch_assoc();

date_default_timezone_set("Asia/Taipei");
$now = date('Y-m-d H:i:s');
$paymentState = $_POST["paymentState"];
$orderState = $_POST["orderState"];
$paymentTime = $_POST["paymentTime"];

//判斷付款狀態＆訂單狀態
if ($paymentState == $row["payment_state"] && $orderState == $row["order_state"]) {
    echo "付款狀態跟訂單狀態沒有變";
} else {
    if ($paymentState != $row["payment_state"] && $orderState != $row["order_state"]) {
        $sql = "UPDATE order_product 
            SET payment_state='$paymentState', payment_time='$now', order_state='$orderState'
            WHERE order_id='$order_id'
            ";
    } else {
        if ($paymentState != $row["payment_state"]) {
            echo "買家已付款請修改訂單狀態";
        } else {
            if ($orderState == "2" || $orderState == "3" || $orderState == "4") {
                if ($paymentState == "2") {
                    $sql = "UPDATE order_product 
                    SET order_state='$orderState'
                    WHERE order_id='$order_id'
                    ";
                }else{
                    echo "買家未付款時請勿修改訂單狀態";
                }
                
            }
        }
    }
}
if ($conn->query($sql) === TRUE) {
        echo "資料表order_product修改完成";
    } else {
        echo "修改資料表錯誤: " . $conn->error;
    }

    $conn->close();
    header("location:order-list.php");

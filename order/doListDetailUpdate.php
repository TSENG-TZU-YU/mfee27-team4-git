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
// var_dump($row);
// echo "<br>";
// exit;
date_default_timezone_set("Asia/Taipei");
$now = date('Y-m-d H:i:s');
$paymentState = $_POST["paymentState"];
$orderState = $_POST["orderState"];
$paymentTime = $_POST["paymentTime"];

// echo $paymentState . "+" . $orderState . "+" . $paymentTime . "<br>";

if ($paymentState == $row["payment_state"] && $orderState == $row["order_state"] && $paymentTime == $row["payment_time"] || $paymentTime == "") {
    if ($paymentState == "1") {
        if (!$orderState == $row["order_state"]) {

            // $sqlContent="payment_state='$paymentState', $sqlNowTime";
            $sqlone = "UPDATE order_product 
            SET payment_state='$paymentState', order_time='$now', order_state='$orderState'
            WHERE order_id='$order_id' AND valid=1";
            // echo "1" . $sqlone; //檢查資料有沒有帶過來
            if ($conn->query($sqloen) === TRUE) {
                echo "資料表 users 修改完成";
            } else {
                echo "修改資料表錯誤: " . $conn->error;
            }

            $conn->close();
            // exit;
        } else {
            if ($paymentState == $row["payment_state"] && $orderState == $row["order_state"]) {
                echo "訂單狀態資料沒有修改";
                // exit;
            } else {
                echo "買家已付款記得修改訂單狀態";
                // exit;
            }
        }
    } else {
        // 
        if ($orderState == "1" || $orderState == "2" && $paymentState == "0") {
            echo "未付款不能修改訂單狀態";
            // exit;
        } else {
            echo "訂單狀態資料沒有修改";
        }
    }
} else {
    //儲存即付款時間
    if ($paymentTime == "" && $paymentState == "1") {
        // $sqlContent="payment_state='$paymentState', $sqlNowTime";
        $sqltwo = "UPDATE order_product 
        SET payment_state='$paymentState', order_time='$now', order_state='$orderState'
        WHERE order_id='$order_id' AND valid=1";
        if ($conn->query($sqltwo) === TRUE) {
            echo "資料表 users 修改完成";
        } else {
            echo "修改資料表錯誤: " . $conn->error;
        }

        $conn->close();
    }
    //只修改訂單狀態
    $sqlth = "UPDATE order_product 
    SET order_state='$orderState'
    WHERE order_id='$order_id' AND valid=1";
    // exit;
    echo "4" . $sqlth; //檢查資料有沒有帶過來

    if ($conn->query($sqlth) === TRUE) {
        echo "資料表 users 修改完成";
    } else {
        echo "修改資料表錯誤: " . $conn->error;
    }

    $conn->close();
    // header("location:user.php?id=".$id);
}

// header("location:user.php?id=".$id);

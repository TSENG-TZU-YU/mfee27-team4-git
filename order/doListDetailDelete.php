<?php
session_start();
require("../db-connect.php");

$product_id = $_GET["product_id"];
$order_id = $_GET["order_id"];
$listPage = $_SESSION["page"];
$orderType = $_SESSION["orderType"];
//delete
// $sql="DELETE FROM users WHERE id=$id";

//軟刪除update to valid 0
$sql = "UPDATE order_product_detail SET valid=0 WHERE product_id='$product_id'";
// echo $sql;

if ($conn->query($sql) === TRUE) {
    $sqlValid = "SELECT valid FROM order_product_detail  WHERE order_id='$order_id' AND valid=0";

    $resultValid = $conn->query($sqlValid);
    $countValid = $resultValid->num_rows;
    // $rowsValid = $resultValid->fetch_all(MYSQLI_ASSOC);

    $sqlV = "SELECT valid FROM order_product_detail  WHERE order_id='$order_id'";
    $resultV = $conn->query($sqlV);
    $countV = $resultV->num_rows;
    if ($countValid == $countV) {
        $sqlOrder = "UPDATE order_product SET valid=0 WHERE order_id='$order_id'";
        // header("location:order-list.php?page=$listPage&order=$orderType");
    }
    if (!$conn->query($sqlOrder)) {
        echo "Error: " . $sqlOrder . "<br>" . $conn->error;
    }
    
    // $rowsV = $resultV->fetch_all(MYSQLI_ASSOC);
    // echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}

$conn->close();
header("location:order-list-detail.php?order_id=" . $order_id);

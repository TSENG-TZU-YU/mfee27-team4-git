<?php
require("../db-connect.php");
session_start();

$order_id=$_GET["order_id"];
$listPage = $_SESSION["page"];

$sql="UPDATE order_product SET valid=0 WHERE order_id='$order_id'";

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}

$conn->close();
header("location:order-list.php?page=".$listPage);

?>
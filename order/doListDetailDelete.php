<?php
require("../db-connect.php");

$product_id=$_GET["product_id"];
//delete
// $sql="DELETE FROM users WHERE id=$id";

//軟刪除update to valid 0
$sql="UPDATE order_product_detail SET valid=0 WHERE product_id='$product_id'";
echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}

$conn->close();
header("location:order_list_detail.php");

?>
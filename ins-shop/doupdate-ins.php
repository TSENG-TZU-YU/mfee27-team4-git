<?php
session_start();
if(!isset($_POST["name"])){
    echo "沒有參數";
}
require("../db-connect.php");

$id=$_POST["id"];
$cate=$_POST["cate"];
$name=$_POST["name"];
$price=$_POST["price"];
$stock=$_POST["stock"];
$intro=$_POST["intro"];
$create_time=date('Y-m-d H-i-s');

$sql="UPDATE instrument_product SET cate='$cate',name='$name',price='$price',stock='$stock',intro='$intro'
WHERE id=$id AND valid=1";


if ($conn->query($sql) === TRUE) {
    echo "修改完成";
} else {
    echo "修改錯誤: " . $conn->error;
}

$conn->close(); 

header("location: ins-detail.php?id=".$id);



?>


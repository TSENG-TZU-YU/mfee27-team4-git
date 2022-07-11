<?php
if(!isset($_POST["brnd_model"])){
    echo "沒有參數";
}
require("../db-connect.php");

$id=$_POST["id"];
$ins_cate=$_POST["ins_cate"];
$brnd_model=$_POST["brnd_model"];
$price=$_POST["price"];
$stock=$_POST["stock"];
$intro=$_POST["intro"];
$create_time=date('Y-m-d H-i-s');

$sql="UPDATE instrument_product SET 
ins_cate='$ins_cate',brnd_model='$brnd_model',price='$price',stock='$stock',intro='$intro'
WHERE id=$id AND valid=1";


if ($conn->query($sql) === TRUE) {
    echo "修改完成";
} else {
    echo "修改錯誤: " . $conn->error;
}

$conn->close(); 

header("location: ins-detail.php?id=".$id);



?>


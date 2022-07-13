<?php
if(!isset($_POST["location"])){
    echo "沒有參數";
}
require("../db-connect.php");

$id=$_POST["id"];
$cate=$_POST["cate"];
$name=$_POST["name"];
$stock=$_POST["stock"];
$price=$_POST["price"];
$use_time=date('Y-m-d H-i-s');
$over_time=date('Y-m-d H-i-s');
$intro=$_POST["intro"];
$create_time=date('Y-m-d H-i-s');

$sql="UPDATE place_produce SET 
cate='$cate',name='$name',price='$price',stock='$stock',use_time='$use_time', over_time='$over_time',intro='$intro'
WHERE id=$id AND valid=1";


if ($conn->query($sql) === TRUE) {
    echo "修改完成";
} else {
    echo "修改錯誤: " . $conn->error;
}

$conn->close(); 

header("location: place-detail.php?id=".$id);



?>

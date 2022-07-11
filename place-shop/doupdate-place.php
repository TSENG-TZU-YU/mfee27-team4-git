<?php
if(!isset($_POST["location"])){
    echo "沒有參數";
}
require("../db-connect.php");

$id=$_POST["id"];
$location=$_POST["location"];
$placetype=$_POST["placetype"];
$stock=$_POST["stock"];
$price=$_POST["price"];
$use_time=date('Y-m-d H-i-s');
$over_time=date('Y-m-d H-i-s');
$place_intro=$_POST["place_intro"];
$create_time=date('Y-m-d H-i-s');

$sql="UPDATE place_produce SET 
location='$location',placetype='$placetype',price='$price',stock='$stock',date('Y-m-d H-i-s')='$use_time', date('Y-m-d H-i-s')='$over_time',place_intro='$place_intro'
WHERE id=$id AND valid=1";


if ($conn->query($sql) === TRUE) {
    echo "修改完成";
} else {
    echo "修改錯誤: " . $conn->error;
}

$conn->close(); 

header("location: place-detail.php?id=".$id);



?>

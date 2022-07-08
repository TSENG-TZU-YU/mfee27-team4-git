<?php
if(!isset($_POST["name"])){
    echo "沒有帶資料";
    exit;

}

require("../db-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$members=$_POST["members"];
$number=$_POST["number"];
$discount=$_POST["discount"];
$dateline=$_POST["dateline"];
$times=$_POST["times"];
$price=$_POST["price"];

$sql="UPDATE coupon SET name='$name', members='$members', number='$number', discount='$discount',
dateline='$dateline', several_times='$times', min_price='$price' WHERE id=$id";

// echo $sql;


if ($conn->query($sql)===TRUE){
    echo "資料表 coupon修改完成";
}else{
    echo "資料表修改錯誤: ".  $conn->error;
}

$conn->close();



header("location: coupons.php"); 


?>
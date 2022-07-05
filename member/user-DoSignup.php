<?php
require("../db-connect.php");

$account=$_POST["account"];
$name="HAMAY";
$password=md5("123456");

$sql="SELECT account FROM backstage WHERE account='$account' ";

$result = $conn->query($sql); //存取物件
$userCount = $result->num_rows;  //幾筆資料
if($userCount>0){
    echo"該帳號已存在";
    exit;
}
// 寫入資料庫
$sqlCreate="INSERT INTO backstage (name,account, password) VALUES ('$name','$account', '$password')";

if ($conn->query($sqlCreate) === TRUE) {
    echo "新資料輸入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
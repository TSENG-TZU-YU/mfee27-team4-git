<?php
require("../db-connect.php");

$name=$_POST["name"];
$account=$_POST["account"];
$password=$_POST["password"];
$gender=$_POST["gender"];


$password=md5($password);

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
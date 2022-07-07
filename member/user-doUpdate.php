<?php
if(!isset($_POST["account"])){
    echo "沒有參數";
}
require("../db-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$account=$_POST["account"];
$password=$_POST["password"];
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$address=$_POST["address"];

$sql="UPDATE users SET name='$name',account='$account',password='$password',gender='$gender',birthday='$birthday', phone='$phone',email='$email',address='$address' WHERE id=$id AND valid=1";


if ($conn->query($sql) === TRUE) {
    echo "資料表 users 修改完成";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close(); 

header("location: user-detail.php?id=".$id);



?>

<?php

<?php
require("../db-connect.php");
$id=$_GET["id"];

//delete 真的刪除
// $sql="DELETE FROM users WHERE id='$id'";
// echo $sql;

//update to valid 0  軟刪除
$sql="UPDATE users SET valid=0 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";

 
} else {
    echo "刪除資料錯誤: " . $conn->error;
}

header("location:users.php");




?>


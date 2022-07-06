<?php
require("../db-connect.php");
$id=$_GET["id"];

//update to valid 0  軟刪除
$sql="UPDATE users SET enable=0 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "加入黑名單成功";
} else {
    echo "無法加入黑名單: " . $conn->error;
}

header("location:users.php");


?>
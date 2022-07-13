<?php
require("../db-connect.php");
$id=$_GET["id"];

//update to valid 0  軟刪除
$sql="UPDATE users SET enable=0 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('成功加入黑名單');location.href='users.php';</script>;";
    
} else {
    echo "無法加入黑名單: " . $conn->error;
}

// header("location:users.php");


?>
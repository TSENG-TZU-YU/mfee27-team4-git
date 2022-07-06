<?php
require("../db-connect.php");
$id=$_GET["id"];

//update to valid 0  軟刪除
$sql="UPDATE users SET enable=1 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "解除黑名單成功";
} else {
    echo "解除黑名單失敗: " . $conn->error;
}

header("location:users.php");


?>
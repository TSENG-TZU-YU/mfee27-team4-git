<?php
require("../db-connect.php");
$id=$_GET["id"];

//update to valid 0  軟刪除
$sql="UPDATE users SET enable=1 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script >alert('成功解除黑名單');location.href='black-list.php';</script>;";
} else {
    echo "解除黑名單失敗: " . $conn->error;
}



?>
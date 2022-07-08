<?php

require("../db-connect.php");

$id=$_GET["id"];

// delete真正刪除
// $sql="DELETE FROM users WHERE id='$id'";

//update to valid 0
//soft delete 使用軟刪除 但資料都還是在
$sql="UPDATE coupon SET valid=0 WHERE id='$id'";

// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}



?>
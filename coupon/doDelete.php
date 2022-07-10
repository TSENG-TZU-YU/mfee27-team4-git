<?php

require("../db-connect.php");

$id=$_GET["id"];


$sql="UPDATE coupon SET valid=0, shelf=0  WHERE id='$id'";


// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('確定要將優惠卷刪除'); location.href = 'coupons.php';</script>";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}



?>
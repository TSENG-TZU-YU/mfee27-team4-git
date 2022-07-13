<?php

require("../db-connect.php");

$id=$_GET["id"];


$sql="UPDATE coupon SET valid=0, coupon_c=10, shelf=2 WHERE id='$id'";


// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('確定要將優惠卷刪除'); location.href = 'coupons.php';</script>";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}



?>
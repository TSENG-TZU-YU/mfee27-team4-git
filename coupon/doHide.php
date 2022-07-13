<?php

require("../db-connect.php");

$id=$_GET["id"];


$sql="UPDATE coupon SET shelf=1 , valid=0 ,coupon_c=1 WHERE id='$id'";


// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('確定要將優惠卷上架'); location.href = 'coupons.php';</script>";
} else {
    echo "資料錯誤: " . $conn->error;
}

//header("location: coupons.php"); 

?>
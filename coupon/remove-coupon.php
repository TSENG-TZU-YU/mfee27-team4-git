<?php

require("../db-connect.php");

$id=$_GET["id"];


$sql="UPDATE coupon SET shelf=0 , valid=1  WHERE id='$id'";


// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "上傳成功";
} else {
    echo "資料錯誤: " . $conn->error;
}




header("location: coupons.php"); 

?>
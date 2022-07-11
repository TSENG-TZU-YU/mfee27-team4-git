<?php
require("../db-connect.php");
$id=$_GET["id"];

//update to valid 0  軟刪除
$sql="UPDATE instrument_product SET valid=0 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script language='JavaScript'>;alert('成功下架');location.href='users.php';</script>;";
    
} else {
    echo "無法下架: " . $conn->error;
}

header("location:ins-shop.php");


?>
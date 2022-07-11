<?php
require("../db-connect.php");
$id=$_GET["id"];

//update to valid 0  軟刪除
$sql="UPDATE place_produce SET valid=0 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script language='JavaScript'>;alert('成功下架');location.href='place-shop.php';</script>;";
    
} else {
    echo "無法下架: " . $conn->error;
}

header("location:place-shop.php");


?>
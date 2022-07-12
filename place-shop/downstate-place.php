<?php
require("../db-connect.php");
$id=$_GET["id"];

//update to state=0 下架
$sql="UPDATE place_produce SET state=0 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script language='JavaScript'>;alert('成功下架');location.href='users.php';</script>;";
    
} else {
    echo "無法下架: " . $conn->error;
}

header("location:place-shop.php");


?>
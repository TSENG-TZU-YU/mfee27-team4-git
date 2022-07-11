<?php
require("../db-connect.php");
<<<<<<< HEAD

=======
>>>>>>> 3b7b986020e92122427af0d4af9ee099e4430e64
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
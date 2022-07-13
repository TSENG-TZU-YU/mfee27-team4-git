<?php
require("../db-connect.php");
$arryid=$_GET["arryid"];


//update to state =1 上架
foreach($arryid as $id){
    $sql="UPDATE place_produce SET state=1 WHERE id=$id";
    $conn->query($sql);
}



// if ($conn->query($sql) === TRUE) {
//     echo "<script language='JavaScript'>;alert('成功上架');location.href='users.php';</script>;";
    
// } else {
//     echo "無法上架: " . $conn->error;
// }

header("location:place-shop.php");


?>
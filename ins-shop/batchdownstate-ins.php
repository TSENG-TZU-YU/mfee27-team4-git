<?php
require("../db-connect.php");
$arryid=$_GET["arryid"];


//update to state =0 上架
foreach($arryid as $id){
    $sql="UPDATE instrument_product SET state=0 WHERE id=$id";
    $conn->query($sql);
}



// if ($conn->query($sql) === TRUE) {
//     echo "<script language='JavaScript'>;alert('成功上架');location.href='users.php';</script>;";
    
// } else {
//     echo "無法上架: " . $conn->error;
// }

header("location:ins-shop.php");


?>
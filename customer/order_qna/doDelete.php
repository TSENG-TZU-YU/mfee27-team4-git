<?php
require("../../db-connect.php");

$order_id=$_POST["order_id"];
$arrayId=$_POST["arrayId"];
print_r($arrayId);
echo "<br>";

foreach($arrayId as $id ){
    $sql="UPDATE order_qna_detail SET valid=0 WHERE order_id=$order_id AND id=$id";
    echo $sql;
    $conn->query($sql);
}
$order_qna_id=$_POST["order_qna_id"];
header("location: order_qna_detail.php?order_qna_id=".$order_qna_id);
?>
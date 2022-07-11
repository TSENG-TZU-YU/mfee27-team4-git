<?php
require("../../db-connect.php");

$user_qna_id=$_POST["user_qna_id"];
$arrayId=$_POST["arrayId"];

foreach($arrayId as $id ){
    $sql="UPDATE user_qna_detail SET valid=0 WHERE user_qna_id=$user_qna_id AND id=$id";
    $conn->query($sql);
}

header("location: user_qna_detail.php?user_qna_id=".$user_qna_id);
?>
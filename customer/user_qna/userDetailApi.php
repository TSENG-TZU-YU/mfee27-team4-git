<?php
require("../../db-connect.php");

$user_qna_id=$_GET["user_qna_id"];

// $sql="SELECT user_qna.*,users.account FROM user_qna LEFT JOIN users ON user_qna.user_id = users.id WHERE user_qna.id= $user_qna_id";
// $result=$conn->query($sql);
// $row = $result->fetch_assoc();

$sqlDetail="SELECT * FROM user_qna_detail WHERE user_qna_id = $user_qna_id AND valid=1" ;
$resultDetail = $conn->query($sqlDetail);
$rowsDetail = $resultDetail->fetch_all(MYSQLI_ASSOC);


echo json_encode($rowsDetail);
?>
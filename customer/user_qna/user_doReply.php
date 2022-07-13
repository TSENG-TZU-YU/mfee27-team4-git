<?php
require("../../db-connect.php");
if(isset($_POST["reply"])){
    $reply=$_POST["reply"];    
}else{
    $reply='<span class="text-danger fw-bolder">已確定聯絡訪客</span>';
}
$user_qna_id=$_POST["user_qna_id"];
$now=date('Y-m-d H:i:s');
$sqlins="INSERT INTO user_qna_detail (user_qna_id, name, q_content, create_time) VALUES ('$user_qna_id','客服小編', '$reply','$now')";
$conn->query($sqlins); 

$sql="UPDATE user_qna SET reply_state='已回覆', user_reply_state='已回覆', update_time='$now' WHERE id=$user_qna_id";
$conn->query($sql);

$conn->close();   

header("location: user_qna_detail.php?user_qna_id=".$user_qna_id);

?>
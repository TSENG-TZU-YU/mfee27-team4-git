<?php
require("../../db-connect.php");
if(isset($_POST["reply"])){
    $user_qna_id=$_POST["user_qna_id"];
    // $name=$_POST["name"];
    $reply=$_POST["reply"];
    $now=date('Y-m-d H:i:s');
    $sqlins="INSERT INTO user_qna_detail (user_qna_id, name, q_content, create_time) VALUES ('$user_qna_id', '客服小編', '$reply','$now')";
    $conn->query($sqlins);

    $order_qna_id=$_POST["order_qna_id"];
    $sql="UPDATE user_qna SET reply_state='已回覆', user_reply_state='已回覆', update_time='$now' WHERE id=$user_qna_id";
    $conn->query($sql);

    $conn->close();
    
}

header("location: user_qna_detail.php?user_qna_id=".$user_qna_id);
?>
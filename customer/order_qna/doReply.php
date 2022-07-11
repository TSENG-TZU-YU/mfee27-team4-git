<?php
require("../../db-connect.php");
if(isset($_POST["reply"])){
    $order_id=$_POST["order_id"];
    $reply=$_POST["reply"];
    $now=date('Y-m-d H:i:s');
    $sqlins="INSERT INTO order_qna_detail (order_id, name, q_content, create_time) VALUES ('$order_id', '管理員', '$reply','$now')";
    $conn->query($sqlins);

    $order_qna_id=$_POST["order_qna_id"];
    $sql="UPDATE order_qna SET user_reply_state='已回覆',reply_state='已回覆', update_time='$now' WHERE id=$order_qna_id";
    $conn->query($sql);

    $conn->close();
    
}

header("location: order_qna_detail.php?order_qna_id=".$order_qna_id);
?>
<?php
require("../../db-connect.php");
if(isset($_POST["reply"])){
    $order_id=$_POST["order_id"];
    $reply=$_POST["reply"];
    $now=date('Y-m-d H:i:s');
    $sqlins="INSERT INTO order_qna_detail (order_id, name, q_content, create_time) VALUES ('$order_id', '客服小編', '$reply','$now')";
    $conn->query($sqlins);

    $order_qna_id=$_POST["order_qna_id"];
    $sql="UPDATE order_qna SET user_reply_state='已回覆',reply_state='已回覆', update_time='$now' WHERE id=$order_qna_id";
    $conn->query($sql);

    $page=$_POST["page"];
    echo $page."<br>" ;
    $perPage=$_POST["perPage"];
    echo $perPage."<br>" ;
    $category=$_POST["category"];
    echo $category."<br>" ;
    $order=$_POST["order"];
    echo $order."<br>" ;
    $search=$_POST["search"];
    echo $search."<br>" ;

    $conn->close();
    
}



header("location: order_qna_detail.php?page=$page&perPage=$perPage&category=$category&order=$order&search=$search&order_qna_id=$order_qna_id");
?>
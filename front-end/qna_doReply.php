<?php
require("../db-connect.php");
session_start();

if(isset($_POST["reply"])){
    $order_id=$_POST["order_id"];
    $name=$_POST["name"];
    $reply=$_POST["reply"];
    $now=date('Y-m-d H:i:s');
    $sqlins="INSERT INTO order_qna_detail (order_id, name, q_content, create_time) VALUES ('$order_id', '$name', '$reply','$now')";
    $conn->query($sqlins);

    $order_qna_id=$_POST["order_qna_id"];
    $sql="UPDATE order_qna SET reply_state='新訊息', user_reply_state='未回覆', update_time='$now' WHERE order_id=$order_id";

    echo $sql;
    $conn->query($sql);

    $conn->close();
    
}

header("location: qna_reply_table.php?order_id=".$order_id);
?>
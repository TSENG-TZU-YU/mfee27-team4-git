<?php
require("../db-connect.php");
session_start();
if(isset($_POST["reply"])){
    $order_id=$_POST["order_id"];
    $user_id=$_POST["user_id"];
    $q_category=$_POST["q_category"];
    $title=$_POST["title"];    
    $now=date('Y-m-d H:i:s');
    $reply=$_POST["reply"];

    $sqlins="INSERT INTO order_qna (order_id, user_id, q_category, title, reply_state,user_reply_state,create_time,update_time) VALUES ('$order_id', '$user_id', '$q_category','$title','未回覆','未回覆','$now','$now')";
    $conn->query($sqlins);

    $name=$_POST["name"];
    $sqlInsDetail="INSERT INTO order_qna_detail (order_id, name, q_content, create_time) VALUES ('$order_id', '$name','$reply','$now')";
    $conn->query($sqlInsDetail);
    
    $conn->close();
    // echo "新增成功";
    if(!isset($_SESSION["front_user"])){
        header("location: my_order.php");
      }else{
        header("location: user_qna_table.php");
    }
}

 
?>
<?php
require("../db-connect.php");
session_start();

if(isset($_POST["reply"])){
    if(isset($_SESSION["front_user"])){
        $user_id=$_SESSION["front_user"]["id"];
        $name=$_SESSION["front_user"]["name"];
        $email=$_SESSION["front_user"]["email"];
        $phone=$_SESSION["front_user"]["phone"];
    }else{
        $user_id=99999;
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
    }
    $q_category=$_POST["q_category"];
    $title=$_POST["title"]; 
    $now=date('Y-m-d H:i:s');

    $sqlins="INSERT INTO user_qna (user_id, name, email,phone, q_category,title,reply_state,user_reply_state,create_time,update_time) VALUES ('$user_id', '$name', '$email','$phone','$q_category','$title','未回覆','未回覆','$now','$now')";
    $conn->query($sqlins);

    $sql="SELECT * FROM user_qna WHERE name='$name' AND user_id=$user_id ORDER BY id DESC LIMIT 1";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    
    $user_qna_id=$row["id"];
    $reply=$_POST["reply"];
    $sqlInsDetail="INSERT INTO user_qna_detail (user_qna_id, name, q_content, create_time) VALUES ('$user_qna_id', '$name','$reply','$now')";
    $conn->query($sqlInsDetail);
    
    $conn->close();
    // echo "新增成功";
    if(isset($_SESSION["front_user"])){
        echo "<script>alert('表單送出成功'); location.href = 'my_qna.php'; </script>";
        // header("location: my_qna.php");
    }else{
        echo "<script>alert('表單送出成功'); location.href = 'user_qna_table.php'; </script>";
        // header("location: user_qna_table.php");
    }
}

 
?>
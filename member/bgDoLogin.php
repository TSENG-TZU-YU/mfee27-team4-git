<?php

require("../db-connect.php");

session_start();


$account=$_POST["account"];
$password=$_POST["password"];
$password=md5($password);

$sql="SELECT * FROM backstage WHERE account='$account' AND password='$password'";

$result=$conn->query($sql);
$userExist=$result->num_rows;  //帳號存在

if($userExist>0){
    $row=$result->fetch_assoc();
    $user=[
      
        "name"=>$row["name"],
        "account"=>$row["account"]
      
    ];

    $_SESSION["user"]=$user;  //設定user
    header("location: users.php");
    exit;

}else{
    header("location:backstage.php");
}

?>
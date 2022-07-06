<?php

require("../db-connect.php");

session_start();


$account=$_POST["account"];
$password=$_POST["password"];
$password=md5($password); //密碼加密

$sql="SELECT * FROM backstage WHERE account='$account' AND password = '$password'";  //抓取資料要取加密密碼

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

}else{
    header("location:backstage.php");
}

?>
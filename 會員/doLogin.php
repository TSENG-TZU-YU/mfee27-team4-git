<?php

require("../db-connect.php");

session_start();


$account=$_POST["account"];
$password=$_POST["password"];
$password=md5("password");

$sql="SELECT * FROM users WHERE  account='$account' AND password='$password'";

$result=$conn->query($sql);
$userExist=$result->num_rows;  //帳號存在

if($userExist>0){
    $row=$result->fetch_assoc();
    $user=[
        "id"=>$row["id"],
        "account"=>$row["account"],
        "password"=>$row["password"],
    ];
    
    header("location: sign-up.php");

}else{
    echo "帳號或密碼錯誤";
    header("location: doLogin.php");
}

?>
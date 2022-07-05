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
        // "id"=>$row["id"],
        "name"=>$row["name"],
        "account"=>$row["account"]
      
    ];
    unset($_SESSION["error"]);
    // $_SESSION["user"]=$user;
    header("location: users.php");

}else{
    // echo"帳號密碼錯誤";
    // $_SESSION["error"]["message"]="帳號密碼錯誤";
 

    header("location:backstage.php");
}

?>
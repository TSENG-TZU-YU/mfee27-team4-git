<?php
session_start();
if(isset($_SESSION["user"])){   //session 要式登入狀態 才能做destroy
    header("location: users.php");
}


header("location: backstage.php");

?>
<?php
session_start();
if(isset($_SESSION["user"])){   //session 要式登入狀態 才能做destroy
    session_destroy();
}


header("location: backstage.php");

?>
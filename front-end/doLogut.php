<?php
session_start();

//確認是登入狀態才清除防有人知道網址清資料
if(isset($_SESSION["front_user"])){
    session_destroy();
}

header("location: front_index.php");

?>

<?php
require("../db-connect.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  	die("連線失敗: " . $conn->connect_error); 
}else{
     echo"連線成功";
}




?>
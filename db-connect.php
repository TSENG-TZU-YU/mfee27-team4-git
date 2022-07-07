<?php   
$serverName = "localhost";
$username = "admin";
$password = "12345";
$dbname = "music_team4";

$conn = new mysqli($serverName, $username, $password, $dbname);
if ($conn->connect_error) {
  	die("連線失敗: " . $conn->connect_error); 
}else{
    // echo"連線成功";
}

?>
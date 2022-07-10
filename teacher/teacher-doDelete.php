<?php
require("../db-connect.php");
$id = $_GET["id"];

//update to valid 0  軟刪除
$sql = "UPDATE teacher SET valid=0 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('師資刪除成功'); location.href = 'teachers.php'; </script>";
} else {
  echo "師資刪除錯誤: " . $conn->error;
}

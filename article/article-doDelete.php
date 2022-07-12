<?php
if (!isset($_GET["id"])) {
  echo "<script>alert('沒有文章資料'); location.href = 'articles.php'; </script>";
  exit;
}
require("../db-connect.php");

$id = $_GET["id"];

//update to valid 0  軟刪除
$sql = "UPDATE article SET valid=0 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('文章刪除成功'); location.href = 'articles.php'; </script>";
} else {
  echo "文章刪除錯誤: " . $conn->error;
}

$conn->close();

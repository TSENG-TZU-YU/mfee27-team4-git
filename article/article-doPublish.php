<?php

if (!isset($_GET["id"])) {
  echo "<script>alert('沒有文章資料'); location.href = 'articles.php'; </script>";
  exit;
} else {

  // 連結資料庫
  require("../db-connect.php");

  $id = $_GET["id"];
  $valid = 2;

  // 設定成系統時間
  date_default_timezone_set('Asia/Taipei');
  $now = date('Y-m-d H:i');

  // 將資料寫入 article 資料表
  $sqlAll = "UPDATE article SET creation_date='$now', valid='$valid' WHERE id=$id";
  $conn->query($sqlAll);

  echo "<script>alert('文章發佈成功'); location.href = 'articles.php?page=1&search=&order=&categoryOrder=&publish=2&order=1'; </script>";
  $conn->close();
}

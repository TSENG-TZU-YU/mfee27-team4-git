<?php

if (!isset($_GET["id"])) {
  echo "<script>alert('沒有文章資料'); location.href = 'articles.php'; </script>";
  exit;
} else {

  // 連結資料庫
  require("../db-connect.php");

  $id = $_GET["id"];
  $valid = 1;

  // 將資料寫入 article 資料表
  $sqlAll = "UPDATE article SET valid='$valid' WHERE id=$id";
  $conn->query($sqlAll);

  echo "<script>alert('取消發佈成功'); location.href = 'articles.php'; </script>";
  $conn->close();
}

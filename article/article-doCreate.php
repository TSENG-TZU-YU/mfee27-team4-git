<?php

if (empty($_POST["title"])) {
  echo "<script>alert('未輸入文章標題'); location.href = 'article-create.php'; </script>";
  exit;
}
if (($_POST["category"] == 0)) {
  echo "<script>alert('未選擇文章類別'); location.href = 'article-create.php'; </script>";
  exit;
}
if (empty($_POST["content"])) {
  echo "<script>alert('未填寫文章內容'); location.href = 'article-create.php'; </script>";
  exit;
}

// 連結資料庫
require("../db-connect.php");

$title = $_POST["title"];
$category = $_POST["category"];
$content = $_POST["content"];
$fileName = $_FILES["image"]["name"];
$image = $_FILES["image"];

// 設定成系統時間
date_default_timezone_set('Asia/Taipei');
$now = date('Y-m-d H:i:s');


// 將資料寫入 article 資料表
$sqlAll = "INSERT INTO article (title, category, content, image, creation_date, valid) VALUES ('$title', '$category', '$content', '$fileName', '$now', 1) ";
$conn->query($sqlAll);


if (move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $_FILES["image"]["name"])) {

  // 將關於圖片的文字資料傳入 images 資料表
  $sqlImage = "INSERT INTO images (name, image, upload_time) VALUES ('$title' ,'$fileName', '$now')";
  $conn->query($sqlImage);
} else {
  echo "師資照片上傳失敗";
}

echo "<script>alert('文章建立成功'); location.href = 'articles.php'; </script>";
$conn->close();

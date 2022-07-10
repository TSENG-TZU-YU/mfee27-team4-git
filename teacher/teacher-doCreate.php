<?php

if (empty($_POST["name"])) {
  echo "<script>alert('未輸入師資姓名'); location.href = 'teacher-create.php'; </script>";
  exit;
}
if (($_POST["field"] == 0)) {
  echo "<script>alert('未選擇師資教學領域'); location.href = 'teacher-create.php'; </script>";
  exit;
}

// 連結資料庫
require("../db-connect.php");

$name = $_POST["name"];
$fileName = $_FILES["image"]["name"];
$image = $_FILES["image"];
$field = $_POST["field"];
$profile = $_POST["profile"];
$video = $_POST["video"];


// 教授課程複選資料 組成陣列寫入 teacher資料表
$courseId = array();
// 取得 post courseId
$courseId = $_POST["courseId"];
// 將陣列轉字串存入
$courseIdArray = implode(',', $courseId);

// 將資料寫入 teacher 資料表
$sqlAll = "INSERT INTO teacher (name, image, courses, field, profile, video, valid) VALUES ('$name', '$fileName', '$courseIdArray', '$field', '$profile', '$video', 1) ";
$conn->query($sqlAll);


if (move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $_FILES["image"]["name"])) {

  // 設定成系統時間
  date_default_timezone_set('Asia/Taipei');
  $now = date('Y-m-d H:i:s');
  // 將關於圖片的文字資料傳入 images 資料表
  $sqlImage = "INSERT INTO images (name, image, upload_time) VALUES ('$name' ,'$fileName', '$now')";
  $conn->query($sqlImage);
} else {
  echo "師資照片上傳失敗";
}


echo "<script>alert('師資建立成功'); location.href = 'teachers.php'; </script>";
$conn->close();

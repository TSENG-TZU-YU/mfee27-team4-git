<?php

if (!isset($_POST["id"])) {
  echo "<script>alert('沒有師資資料'); location.href = 'teachers.php'; </script>";
  exit;
}



// 連結資料庫
require("../db-connect.php");


$id = $_POST["id"];
$name = $_POST["name"];
$field = $_POST["field"];
$profile = $_POST["profile"];
$video = $_POST["video"];
$oldImage = $_POST["oldImage"];



// 教授課程複選資料 組成陣列寫入 teacher資料表
$courseName = array();
// 取得 post courseId
$courseName = $_POST["courseName"];
// // 將陣列轉字串存入
$courseNameArray = implode('、', $courseName);

// 將資料寫入 teacher 資料表
$sqlAll = "UPDATE teacher SET courses='$courseNameArray', field='$field', profile='$profile', video='$video' WHERE id=$id";
$conn->query($sqlAll);



if ($_FILES['newImage']['error'] == 0) {
  if (move_uploaded_file($_FILES["newImage"]["tmp_name"], "../images/" . $_FILES["newImage"]["name"])) {
    // 設定成系統時間 
    $newImage = $_FILES["newImage"];
    $newImageName = $_FILES["newImage"]["name"];
    date_default_timezone_set('Asia/Taipei');
    $now = date('Y-m-d H:i:s');
    // 將關於圖片的文字資料傳入 images 資料表
    $sqlImage = "UPDATE images SET image='$newImageName', upload_time='$now' WHERE name='$name'";
    $conn->query($sqlImage);

    $sqlTeacherImg = "UPDATE teacher SET image='$newImageName' WHERE id=$id";
    $conn->query($sqlTeacherImg);
  }
} else {
  $sqlOldImage = "UPDATE images SET image='$oldImage' WHERE name='$name'";
  $conn->query($sqlOldImage);

  $sqlOldImageTeacher = "UPDATE teacher SET image='$oldImage' WHERE id='$id'";
  $conn->query($sqlOldImageTeacher);
}


echo "<script>alert('師資修改成功'); location.href = 'teachers.php?page=1&search=&order=1&fieldOrder='; </script>";


$conn->close();

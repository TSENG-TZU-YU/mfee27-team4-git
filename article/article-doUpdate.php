<?php

if (!isset($_POST["id"])) {
  echo "<script>alert('沒有文章資料'); location.href = 'articles.php'; </script>";
  exit;
} else {


  // 連結資料庫
  require("../db-connect.php");


  $id = $_POST["id"];
  $title = $_POST["title"];
  $category = $_POST["category"];
  $content = $_POST["content"];
  $oldImage = $_POST["oldImage"];

  // 設定成系統時間
  date_default_timezone_set('Asia/Taipei');
  $now = date('Y-m-d H:i');


  // 將資料寫入 article 資料表
  $sqlAll = "UPDATE article SET title='$title', category='$category', content='$content', creation_date='$now' WHERE id=$id";
  $conn->query($sqlAll);




  if ($_FILES['newImage']['error'] == 0) {
    if (move_uploaded_file($_FILES["newImage"]["tmp_name"], "../images/" . $_FILES["newImage"]["name"])) {
      // 設定成系統時間 
      $newImage = $_FILES["newImage"];
      $newImageName = $_FILES["newImage"]["name"];
      date_default_timezone_set('Asia/Taipei');
      $now = date('Y-m-d H:i:s');
      // 將關於圖片的文字資料傳入 images 資料表
      $sqlImage = "UPDATE images SET image='$newImageName', upload_time='$now' WHERE image='$oldImage'";
      $conn->query($sqlImage);

      $sqlTeacherImg = "UPDATE article SET image='$newImageName' WHERE id=$id";
      $conn->query($sqlTeacherImg);
    }
  } else {
    $sqlOldImage = "UPDATE images SET image='$oldImage' WHERE image='$title'";
    $conn->query($sqlOldImage);

    $sqlOldImageArticle = "UPDATE article SET image='$oldImage' WHERE id='$id'";
    $conn->query($sqlOldImageArticle);
  }


  echo "<script>alert('文章修改成功'); location.href='articles.php?page=1&search=&categoryOrder=1&publish=&order=1';</script>";
  $conn->close();
}

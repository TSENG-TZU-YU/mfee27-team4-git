<?php
require_once("../db-connect.php");

// 如果抓到資料
if (empty($_POST["name"])) {
  echo "<script>alert('沒有填入資料'); location.href = 'create-teacher.php'; </script>";
  exit;
} else {

  $name = $_POST["name"];
  $image = $_POST["image"];
  $field = $_POST["field"];
  $profile = $_POST["profile"];
  $video = $_POST["video"];

  // 教授課程陣列
  $courseIdArray = array();
  $courseIdArray = $_POST["courseId"];


  // echo "$name, $image, $video, $field, $profile";
  // var_dump($courseIdArray);
  // exit;
}

// exit;

$sql = "INSERT INTO teacher (name, image, field, profile, video, valid) VALUES ('$name', '$image', '$field', '$profile', '$video', 1) ";


if ($conn->query($sql) === TRUE) {
  echo "<script>alert('師資建立輸入成功'); location.href = 'create-teacher.php'; </script>";
} else {
  echo "<script>alert('師資建立失敗失敗'); location.href = 'create-teacher.php'; </script>" . $sql . "<br>" . $conn->error;
}

header("location: create-teacher.php");
$conn->close();

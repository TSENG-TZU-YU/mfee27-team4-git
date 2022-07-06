<?php
require("../db-connect.php");

// 如果抓到資料
if (!isset($_POST["name"])) {
  echo "<script>alert('沒有填入資料'); location.href = 'create-teacher.php'; </script>";
  exit;
} else {
  $name = $_POST["name"];
  $image = $_POST["image"];
  $video = $_POST["video"];
  $field = $_POST["field"];
  $profile = $_POST["profile"];
  // echo "$name, $image, $video, $field, $profile";
  exit;
}

// exit;

$sql = "INSERT INTO teacher (name, image, field, profile, video, valid) VALUES ('$name', '$image', '$video', '$field', '$profile' 1)";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('師資建立輸入成功'); location.href = 'create-teacher.php'; </script>";
} else {
  echo "<script>alert('師資建立失敗失敗'); location.href = 'create-teacher.php'; </script>" . $sql . "<br>" . $conn->error;
}

header("location: create-teacher.php");
$conn->close();

<?php

if (!isset($_POST["name"])) {
  echo "<script>alert('沒有輸入師資姓名'); location.href = 'create-teacher.php'; </script>";
  exit;
}



require_once("../db-connect.php");
$id = $_POST["id"];
$name = $_POST["name"];
$imageName = $_FILES["image"]["name"];
$image = $_FILES["image"];
$field = $_POST["field"];
$profile = $_POST["profile"];
$video = $_POST["video"];


// // 將資料寫入 teacher 資料表
$sqlTeacher = "UPDATE teacher SET name='$name', field='$field', profile='$profile', video='$video' WHERE id=$id";
$conn->query($sqlTeacher);


if (isset($_POST["courseId"])) {
  // 刪除舊資料
  $sqlDeleteCourse = "DELETE FROM teacher_course WHERE name_id=$id";
  $conn->query($sqlDeleteCourse);
  // 重灌新資料
  // 教授課程複選資料 組成陣列 用迴圈 query 逐列寫入 teacher_course 資料表
  $courseIdArray = array();
  // 取得 post courseId
  $courseIdArray = $_POST["courseId"];
  foreach ($courseIdArray as $key => $courseId_value) {
    // 寫入 teacher_course 資料表
    $sqlCourse = "INSERT INTO teacher_course (name_id, course_id) VALUES ('$id', '$courseId_value')";
    $conn->query($sqlCourse);
  }
}

if (isset($_FILES["image"])) {
  // 將 image 資料寫入 teacher 資料表
  $sqlTeacherImgName = "UPDATE teacher SET image='$imageName' WHERE id=$id";
  $conn->query($sqlTeacherImgName);

  if (move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $_FILES["image"]["name"])) {

    $fileName = $_FILES["image"]["name"];
    $now = date('Y-m-d H:i:s');

    // 將關於圖片的文字資料傳入 images 資料表
    if (isset($image)) {
      $sqlImages = "INSERT INTO images (name, image, upload_time) VALUES ('$name' ,'$fileName', '$now')";
      $conn->query($sqlImages);
    }
  }
} else {
  exit;
}

echo "<script>alert('師資修改成功'); location.href = 'teachers-index.php'; </script>";



$conn->close();

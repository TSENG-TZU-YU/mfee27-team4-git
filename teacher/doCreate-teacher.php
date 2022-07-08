<?php

if (empty($_POST["name"])) {

  // 如果沒抓到name(師資姓名)資料
  echo "<script>alert('沒有輸入師資姓名'); location.href = 'create-teacher.php'; </script>";
  exit;
} else {

  require_once("../db-connect.php");
  $name = $_POST["name"];
  $imageName = $_FILES["image"]["name"];
  $image = $_FILES["image"];
  $field = $_POST["field"];
  $profile = $_POST["profile"];
  $video = $_POST["video"];

  if (empty($_POST["courseId"])) {
    echo "<script>alert('沒有勾選教授課程'); location.href = 'create-teacher.php'; </script>";
  } else {
    // 將資料寫入 teacher 資料表
    $sqlTeacher = "INSERT INTO teacher (name, image, field, profile, video, valid) VALUES ('$name', '$imageName', '$field', '$profile', '$video', 1) ";

    if ($conn->query($sqlTeacher) === TRUE) {
      // 取得醉心此次新增 teacher 資料表 id
      $last_id = $conn->insert_id;
      // 寫入迴圈  $courseIdArray陣列 key(幾筆) =>
      if (isset($_POST["courseId"])) {
        // 教授課程複選資料 組成陣列 用迴圈 query 逐列寫入 teacher_course 資料表
        $courseIdArray = array();
        // 取得 post courseId
        $courseIdArray = $_POST["courseId"];
        foreach ($courseIdArray as $key => $courseId_value) {
          // 寫入 teacher_course 資料表
          $sqlCourse = "INSERT INTO teacher_course (name_id, course_id) VALUES ('$last_id', '$courseId_value')";
          $conn->query($sqlCourse);
        }
      }
    } else {
      echo "教授課程建立失敗";
    }
  }
  if (move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $_FILES["image"]["name"])) {

    $fileName = $_FILES["image"]["name"];
    $now = date('Y-m-d H:i:s');

    // 將關於圖片的文字資料傳入 images 資料表
    $sqlImages = "INSERT INTO images (name, image, upload_time) VALUES ('$name' ,'$fileName', '$now')";
    $conn->query($sqlImages);
  } else {
    echo "師資照片上傳失敗";
  }
  echo "<script>alert('師資建立成功'); location.href = 'teachers-index.php'; </script>";
}

$conn->close();

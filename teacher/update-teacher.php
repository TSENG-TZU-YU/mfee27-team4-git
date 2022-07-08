<?php

if (!isset($_GET["id"])) {
  echo "沒有參數";
  exit;
}

require_once("../db-connect.php");
$id = $_GET["id"];

// 抓師資資料
$sql = "SELECT * FROM teacher WHERE id=$id AND valid=1";
$result = $conn->query($sql);
$teacherCount = $result->num_rows;

// 抓課程資料
$sqlCourse = "SELECT * FROM course_product WHERE id";
$resultCourse = $conn->query($sqlCourse);
$courseCount = $resultCourse->num_rows;
$rowsCourse = $resultCourse->fetch_all(MYSQLI_ASSOC);

// 抓師資與課程關聯資料
$sqlTeacherCourse = "SELECT * FROM teacher_course WHERE name_id=$id";
$resultTeacherCourse = $conn->query($sqlTeacherCourse);
$teacherCourseCounts = $resultTeacherCourse->fetch_all(MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <title>修改師資資料</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- 版面元件樣式 css -->
  <link rel="stylesheet" href="../style.css">
  </link>
  <style>
    .object-cover {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row d-flex">

      <!-- 導覽列 nav -->
      <!-- 導覽列 nav end -->


      <!-- 主要區塊 main -->
      <main class="col-10 px-5 py-4">

        <!-- 麵包屑 breadcrumb -->
        <biv aria-label="breadcrumb">
          <ol class="breadcrumb fw-bold">
            <li class="breadcrumb-item"><a href="#">首頁</a></li>
            <li class="breadcrumb-item"><a href="teachers-index.php">師資管理</a></li>
            <li class="breadcrumb-item" aria-current="page">修改師資資料</li>
          </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end -->

        <hr>

        <!-- 內容 -->

        <div class="container">
          <h3>修改師資資料</h3>
          <hr>
          <?php if ($teacherCount > 0) :
            $rowTeacher = $result->fetch_assoc();
          ?>
            <form class="mt-1" action="doUpdate.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-3">
                  <img class="img-fluid rounded object-cover" id="preview" src="
                  <?php if (empty($rowTeacher["image"])) {
                    // 如果沒有照片就顯示頭像icon
                    echo "../images/img-icon.png";
                  } else {
                    // 如果有照片就顯示上傳的照片
                    $teacherImage = $rowTeacher["image"];
                    echo "../images/$teacherImage";
                  }
                  ?>
                  " style="height: 300px;">
                </div>
                <div class="col d-flex flex-column mb-3">
                  <div class="col mb-2">
                    <label class="form-label fw-bold" for="">師資姓名</label>
                    <input type="text" class="form-control" name="name" value="<?= $rowTeacher["name"] ?>">
                  </div>
                  <div class="col mb-2">
                    <label class="form-label fw-bold" for="">師資照片</label>
                    <input type="file" class="form-control" id="upload" name="image">
                  </div>
                  <div class="col mb-2">
                    <label class="form-label fw-bold" for="">表演影片網址</label>
                    <input type="url" class="form-control" name="video" value="<?= $rowTeacher["video"] ?>">
                  </div>
                  <div class="col">
                    <label class="form-label fw-bold" for="">教學領域</label>
                    <input type="text" class="form-control" name="field" value="<?= $rowTeacher["field"]  ?>">
                  </div>
                </div>
                <div class="col">
                  <label class="form-label fw-bold" for="">教授課程</label>

                  <!-- 帶入課程商品資料 作為選項check-box -->
                  <?php // 抓課程商品資料
                  foreach ($rowsCourse as $row) :
                  ?>
                    <div class="form-check mb-2">
                      <label class="form-check-label" for="flexCheckDefault">
                        <?php if (isset($teacherCourseCounts)) : ?>
                          <!-- 將資料舊資料勾選出來 -->
                          <input class="form-check-input" type="checkbox" id="flexCheckDefault" <?php foreach ($teacherCourseCounts as $rowCourse => $value) {
                                                                                                  if ($row["id"] == $value["course_id"]) {
                                                                                                    echo 'checked=""';
                                                                                                  } else {
                                                                                                    echo "";
                                                                                                  }
                                                                                                }
                                                                                                ?> name="courseId[]" value="<?= $row["id"] ?>">
                          <!-- checkbox input end -->
                        <?php endif; ?>
                        <?= $row["course_name"] ?>
                      </label>
                    </div>
                  <?php endforeach; ?>
                </div>

              </div>
              <div class="mb-2">
                <label class="form-label fw-bold" for="">師資簡介</label>
                <textarea class="form-control" id="floatingTextarea2" type="text" name="profile" style="height: 250px; resize:none;"><?= $rowTeacher["profile"]  ?></textarea>
              </div>
              <div class="d-flex justify-content-center align-items-center mt-3">
                <a class="btn btn-green  me-5" href="teachers-index.php">
                  <img class="mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                  取消修改
                </a>
                <button class="btn btn-khak" type="submit" name="id" value="<?= $rowTeacher["id"] ?>">
                  <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                  修改完成
                </button>
              </div>
            </form>
          <?php else : ?>
            沒有師資資料
          <?php endif; ?>
        </div>
        <!-- 內容 end -->


      </main>
      <!-- 主要區塊 main end-->
    </div>
  </div>


  <!-- jQuery CDN – Latest Stable Versions -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <!-- Bootstrap JavaScript Libraries end -->

  <script>
    $(function() {

      //預覽上傳圖片
      $('#upload').change(function() {
        var f = document.getElementById('upload').files[0];
        var src = window.URL.createObjectURL(f);
        document.getElementById('preview').src = src;
      });

    });
  </script>

</body>

</html>
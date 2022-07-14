<?php

require_once("../db-connect.php");
$sqlTeacher="WHERE teachers.php";
session_start();
// 抓課程商品資料
$sqlCourseProduct = "SELECT * FROM course_product WHERE id AND valid=1";
$resultCourseProduct = $conn->query($sqlCourseProduct);
$CourseProductRows = $resultCourseProduct->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <title>HAMAYA MUSIC - 新增師資</title>

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
      object-fit: cover;

    }

    .iframe-cover {
      height: 300px;
      width: 100%;
      object-fit: cover;
    }

    .text-align-justify {
      text-align: justify;
    }
  </style>

</head>

<body>
  <div class="container-fluid">
    <div class="row d-flex">

      <!-- 導覽列 nav -->
      <?php require("../nav.php"); ?>
      <!-- 導覽列 nav end -->

      <!-- 主要區塊 main -->
      <main class="col-10 px-5 py-4">

        <!-- 麵包屑 breadcrumb -->
        <biv aria-label="breadcrumb">
          <ol class="breadcrumb fw-bold">
            <li class="breadcrumb-item"><a href="../home.php">首頁</a></li>
            <li class="breadcrumb-item"><a href="teachers.php">師資管理</a></li>
            <li class="breadcrumb-item" aria-current="page">新增師資</li>
          </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end -->

        <hr>

        <!-- 內容 -->
        <div class="container">
          <h3>新增師資</h3>
          <hr>
          <form class="mt-1" action="teacher-doCreate.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-3">
                <img class="img-fluid rounded object-cover mb-3 iframe-cover" id="preview" src="../images/img-icon.svg
              " style="height: 300px;">

              </div>
              <div class="col-9 m-auto">
                <table class="table">
                  <tbody>
                    <tr>
                      <th>師資姓名</th>
                      <td>
                        <input type="text" class="form-control autoName" name="name">
                      </td>
                    </tr>
                    <tr>
                      <th>師資照片</th>
                      <td>
                        <input type="file" class="form-control autoImage" id="upload" name="image">
                      </td>
                    </tr>
                    <tr>
                      <th>教學領域</th>
                      <td>
                        <select class="form-select autoField" aria-label="Default select example" name="field">
                          <option selected value="請選擇教學領域">請選擇教學領域</option>
                          <option value="琴鍵類音樂">琴鍵類音樂</option>
                          <option value="弦樂類音樂">弦樂類音樂</option>
                          <option value="管樂類音樂">管樂類音樂</option>
                          <option value="熱音類音樂">熱音類音樂</option>
                          <option value="其他類音樂">其他類音樂</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>教授課程</th>
                      <td align="left">
                        <!-- 帶入課程商品資料 作為選項check-box -->
                        <?php foreach ($CourseProductRows as $row) : ?>
                          <label class="form-check-label" for="flexCheckDefault<?= $row["id"] ?>">
                            <input class="form-check-input autoCourse" type="checkbox" id="flexCheckDefault<?= $row["id"] ?>" name="courseName[]" value="<?= $row["name"] ?>">
                            <?= $row["name"] ?>
                          </label>
                        <?php endforeach; ?>
                      </td>
                    </tr>
                    <tr>
                      <th>師資簡介</th>
                      <td colspan="2" align="left" class="text-align-justify">
                        <textarea class="form-control autoProfile" id="floatingTextarea2" type="text" name="profile" style="height: 250px; resize:none;"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <th>表演作品</th>
                      <td colspan="2">
                        <div class="img-fluid rounded">
                          <input type="url" class="form-control autoVideo" name="video">
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="d-flex justify-content-center align-items-center">
                  <a class="btn btn-khak me-5" href="teachers.php">
                    <img class="mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                    取消新增
                  </a>
                  <button class="btn btn-green" type="submit" name="submit-date">
                    <img class="mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                    送出新增
                  </button>
                </div>
              </div>
            </div>
          </form>
          <button id="autoBtn" class="p-3" style="border:none; background: #fff;" onclick="autoShow();"></button>
        </div>
    </div>


    <!-- 內容 end -->

    </main>
    <!-- 主要區塊 main end-->
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


    function autoShow() {

      document.querySelector(".autoName").value = "江宇婷";
      document.querySelector(".autoField").value = "琴鍵類音樂";
      document.querySelector(".autoProfile").value = "是由合作超過十年的斜槓音樂拍檔鋼琴家江老師和長笛家Eric組成的古典音樂Youtube頻道。笑哈哈LOL頻道於2019年11月3日訂閱人數突破10萬。著名代表的作品有《視譜系列》、《限時企劃》、《樂器開箱》、《喜劇系列》、《突襲校園》及《快問快答》等。笑哈哈LOL每年均於台灣各大音樂場所舉辦音樂會。稱江老師的粉絲為「薑絲」；稱Eric的粉絲為「si la」。笑哈哈頻道逢星期三、五/六、日上片；江老師頻道逢星期一、四上片；Eric頻道上片時間不固定。";
      document.querySelector(".autoVideo").value = "https://www.youtube.com/embed/tgKboyUt3Eg";

    }
  </script>

</body>

</html>
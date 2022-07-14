<?php
$sqlArticle="WHERE articles.php ";
session_start();
if (!isset($_GET["id"])) {
  echo "<script>alert('沒有文章資料'); location.href = 'articles.php'; </script>";
  exit;
}

// 連結資料庫
require("../db-connect.php");

$id = $_GET["id"];
$page = $_GET["page"];
$search = $_GET["search"];
$order = $_GET["order"];
$categoryOrder = $_GET["categoryOrder"];
$publish = $_GET["publish"];


// 抓師資資料
$sqlAll = "SELECT * FROM article WHERE id=$id AND valid > 0";
$resultAll = $conn->query($sqlAll);
$ArticleCount = $resultAll->num_rows;

?>


<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <title>HAMAYA MUSIC - 修改文章</title>

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

    /* 淺紅色色按鈕 */
    .btn-light-red,
    .btn-light-red:focus {
      background: #e2c4d2;
      border-color: #e2c4d2;
      color: #fff;
    }

    .btn-light-red:hover,
    .btn-light-red:active:hover {
      color: #fff;
      background: #e2c4d2;
      border-color: #e2c4d2;
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
            <li class="breadcrumb-item"><a href="articles.php">文章管理</a></li>
            <li class="breadcrumb-item" aria-current="page">修改文章</li>
          </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end -->

        <hr>

        <!-- 內容 -->
        <div class="container">
          <h3>修改文章</h3>
          <hr>
          <div class="row">
            <div class="container">
              <?php if ($ArticleCount > 0) :
                $rowArticle = $resultAll->fetch_assoc();
              ?>
                <form action="article-doUpdate.php" method="post" enctype="multipart/form-data">
                  <div class="form-row row">
                    <div class="form-group col-6 mt-1">
                      <input type="hidden" name="id" value="<?= $rowArticle["id"] ?>">
                      <label for="title" class="fw-bold">文章標題</label>
                      <input type="text" class="form-control mt-1" name="title" value="<?= $rowArticle["title"] ?>">
                    </div>
                    <div class="form-group col-6 mt-1">
                      <label for="category" class="fw-bold">文章類別</label>
                      <select class="form-select mt-1" aria-label="Default select example" name="category">
                        <option selected value="<?= $rowArticle["category"]  ?>"><?= $rowArticle["category"]  ?></option>
                        <option value="產品資訊">產品資訊</option>
                        <option value="活動快訊">活動快訊</option>
                        <option value="音樂教育">音樂教育</option>
                        <option value="重要通知">重要通知</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="content" class="fw-bold mt-3">文章內容</label>
                      <div class="mt-2">
                        <textarea class="form-control" id="floatingTextarea" type="text" style="resize:none; height: 400px" name="content"><?= $rowArticle["content"] ?></textarea>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="image" class="fw-bold mt-3">文章圖片</label>
                      <input type="file" class="form-control mt-2" id="upload" name="newImage">
                      <input type="hidden" name="oldImage" value="<?= $rowArticle["image"]  ?>">
                      <img class="img-fluid rounded object-cover mb-3 iframe-cover mt-3" id="preview" src="<?php if (empty($rowArticle["image"])) {
                                                                                                              // 如果沒有照片就顯示頭像icon
                                                                                                              echo "../images/article-img-icon.svg";
                                                                                                            } else {
                                                                                                              // 如果有照片就顯示上傳的照片
                                                                                                              $articleImage = $rowArticle["image"];
                                                                                                              echo "../images/$articleImage";
                                                                                                            }
                                                                                                            ?>
                  " style="height: 340px;">
                    </div>
                  </div>
                  <div class="d-flex justify-content-center align-items-center mt-2">
                    <a class="btn btn-green me-3" href="articles.php?page=<?= $page ?>&search=<?= $search ?>&order=<?= $order ?>&categoryOrder=<?= $categoryOrder ?>&publish=<?= $publish ?>">
                      <img class="mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                      取消修改
                    </a>
                    <button class="btn btn-khak me-3" type="submit" name="submit">
                      <img class="mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                      修改完成
                    </button>
                    <div class="ms-auto p-2">
                      <a class="btn btn-red" href="article-doDelete.php?id=<?= $id ?>">
                        <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                        刪除
                      </a>
                    </div>
                  </div>
                </form>
            </div>
          <?php else : ?>
            沒有文章資料
          <?php endif; ?>
          </div>
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
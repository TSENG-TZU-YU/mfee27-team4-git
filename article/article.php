<?php

if (isset($_POST["id"])) {
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

// 抓文章資料
$sqlAll = "SELECT * FROM article WHERE id=$id AND valid > 0";
$resultAll = $conn->query($sqlAll);
$ArticleCount = $resultAll->num_rows;


?>


<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <title>HAMAYA MUSIC - 文章內容</title>

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

    /* 淺藍色按鈕 */
    .btn-blue,
    .btn-blue:focus {
      background: #4a81b0;
      border-color: #4a81b0;
      color: #fff;
    }

    .btn-blue:hover,
    .btn-blue:active:hover {
      background: #4075a2;
      border-color: #4075a2;
      color: #fff;
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
            <li class="breadcrumb-item" aria-current="page">文章內容</li>
          </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end -->

        <hr>

        <!-- 內容 -->
        <div class="container">
          <div class="row">
            <div class="container">
              <?php if ($ArticleCount > 0) :
                $rowArticle = $resultAll->fetch_assoc();
              ?>
                <div class="mx-auto mt-3 w-75">
                  <div class="d-flex align-content-center">
                    <button type="button" class="btn btn-sm me-3
                                              <?php switch ($rowArticle["category"]) {
                                                case '產品資訊':
                                                  echo "btn-green";
                                                  break;
                                                case '活動快訊':
                                                  echo "btn-blue";
                                                  break;
                                                case '音樂教育':
                                                  echo "btn-grey";
                                                  break;
                                                case '重要通知':
                                                  echo "btn-red";
                                                  break;
                                              }
                                              ?>" style="cursor: inherit; ">
                      <?= $rowArticle["category"] ?>
                    </button>
                    <div class="py-1">建立時間：<?= date("Y年m月d日 H:i", strtotime($rowArticle["creation_date"])) ?></div>
                  </div>
                  <hr>
                  <h2 class=" fw-bold text-center" style=" color:#265f74;"><?= $rowArticle["title"] ?></h2>
                  <hr>
                  <img class="img-fluid rounded mx-auto d-block" id="preview" src="../images/<?= $rowArticle["image"] ?>">
                  <div class="p-4">
                    <p class="mx-3" style="text-overflow: ellipsis; line-height:2; text-align: justify; "><?= $rowArticle["content"] ?></p>
                    <hr>
                    <div class="d-flex justify-content-center align-items-center mt-2">
                      <a class="btn btn-green me-3" href="articles.php?page=<?= $page ?>&search=<?= $search ?>&order=<?= $order ?>&categoryOrder=<?= $categoryOrder ?>&publish=<?= $publish ?>">
                        <img class="mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                        返回列表
                      </a>
                      <form action="article-edit.php" method="get">
                        <input type="hidden" value="<?= $page ?>" name="page">
                        <input type="hidden" value="<?= $search ?>" name="search">
                        <input type="hidden" value="<?= $order ?>" name="order">
                        <input type="hidden" value="<?= $categoryOrder ?>" name="categoryOrder">
                        <input type="hidden" value="<?= $publish ?>" name="publish">
                        <input type="hidden" value="<?= $id ?>" name="id">
                        <?php if ($rowArticle["valid"] == 1) : ?>
                          <?= '<button class="btn btn-khak me-3" type="submit">
                          <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                          修改文章' ?>
                          </button>
                        <?php endif; ?>
                      </form>
                      <?php if ($rowArticle["valid"] == 1) : ?>
                        <?= '<a class="btn btn-grey" href="article-doPublish.php?id=' . $id ?>
                        <?= '"><img class="mb-1" src="../icon/article-icon.svg" width="16" height="16"></img>
                        發佈文章
                      </a>' ?>
                      <?php else : ?>
                        <?= '<a class="btn btn-red" href="article-noPublish.php?id=' . $id ?>
                        <?= '"><img class="mb-1" src="../icon/article-icon.svg" width="16" height="16"></img>
                        取消發佈
                      </a>' ?>
                      <?php endif; ?>
                      <div class="ms-auto p-2">
                        <a class="btn btn-red" href="
                        <?php if ($rowArticle["valid"] == 1) : ?>
                          <?= 'article-doDelete.php?id=' . $id ?>
                          <?php else : ?>
                            <?= 'article-publish-doDelete.php?id=' . $id ?>
                        <?php endif; ?>
                        ">
                          <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                          刪除
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
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

</body>

</html>
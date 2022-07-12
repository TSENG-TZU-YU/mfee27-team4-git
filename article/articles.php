<?php
// 連結資料庫
require("../db-connect.php");
session_start();

//search
if (!isset($_GET["search"])) {
  $search = "";
  $sqlSearch = "";
  // $teacherCount = 0;
} else {
  $search = $_GET["search"];
  // 搜尋條件要群組!!
  $sqlSearch = "(title LIKE '%$search%' OR content LIKE '%$search%') AND";
}

// 排序
$order = isset($_GET["order"]) ? $_GET["order"] : "";
switch ($order) {
  case 1:
    $orderType = "creation_date DESC";
    break;

  default:
    $orderType = "creation_date ASC";
}

//文章類別篩選
$categoryOrderArray = ["產品資訊", "活動快訊", "音樂教育", "重要通知"];
if (!isset($_GET["categoryOrder"])) {
  $categoryOrder = "";
  $categoryOrderType = "";
} else if ($_GET["categoryOrder"] == "文章類別") {
  $categoryOrder = "文章類別";
  $categoryOrderType = "";
} else {
  $categoryOrder = $_GET["categoryOrder"];
  switch ($categoryOrder) {
    case '產品資訊':
      $categoryOrderType = "category='產品資訊' AND";
      break;
    case '活動快訊':
      $categoryOrderType = "category='活動快訊' AND";
      break;
    case '音樂教育':
      $categoryOrderType = "category='音樂教育' AND";
      break;
    case '重要通知':
      $categoryOrderType = "category='重要通知' AND";
      break;
    default:
      $categoryOrderType = "";
  }
}

if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = 1;
}

// 抓文章資料
$sqlAll = "SELECT * FROM article WHERE $categoryOrderType $sqlSearch  valid=1";
$resultAll = $conn->query($sqlAll);
$articleCount = $resultAll->num_rows;

// 頁碼
$perPage = 6;
$startPage = ($page - 1) * $perPage;
$sqlArticle = "SELECT * FROM article WHERE $categoryOrderType $sqlSearch valid=1 ORDER BY $orderType  LIMIT $startPage, $perPage";

$resultArticle = $conn->query($sqlArticle);
$pageArticleCount = $resultArticle->num_rows;
$articleRows = $resultArticle->fetch_all(MYSQLI_ASSOC);

$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;

if ($endItem > $articleCount) $endItem = $articleCount;
$totalPage = ceil($articleCount / $perPage);


?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <title>文章管理</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- 版面元件樣式 css -->
  <link rel="stylesheet" href="../style.css">
  </link>
  <style>
    .ellipsis {
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      white-space: normal;
      text-align: justify;
    }

    /* .title-overflow {
      width: 100%;
      overflow: hidden;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      text-align: justify;
    } */

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

    /* 白色按鈕 */
    .btn-white,
    .btn-white:focus {
      padding: 0;
      background: white;
      border-color: white;
      color: #265f74;
    }

    .btn-white:hover,
    .btn-white:active:hover {
      padding: 0;
      background: white;
      border-color: white;
      color: #265f74;
      text-decoration: underline;
      text-underline-offset: 3px;
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
            <li class="breadcrumb-item" aria-current="page"><a href="articles.php">文章管理</a></li>
          </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end -->

        <hr>

        <!-- 頁碼、搜尋 -->
        <div class="container">
          <div class="row">
            <form action="articles.php" method="get">
              <input type="hidden" value="<?= $page ?>" name="page">
              <input type="hidden" value="<?= $search ?>" name="search">
              <input type="hidden" value="<?= $order ?>" name="order">
              <input type="hidden" value="<?= $categoryOrder ?>" name="categoryOrder">
              <div class="row">
                <p class="col-8 m-auto"><?php
                                        if ($startItem == $endItem) {
                                          echo "最後1筆";
                                        } else {
                                          echo "目前 " . $startItem . " - " . $endItem . " 筆";
                                        }
                                        ?>，總共 <?= $articleCount ?> 筆資料</p>
                <input class="col form-control me-3" type="text" name="search">
                <button class="col-1 btn btn-green" type="submit">
                  <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                  搜尋
                </button>
              </div>
            </form>
          </div>
        </div>
        <hr>

        <div class="container">
          <!-- 新增按鈕 -->
          <div class="d-flex justify-content-between">
            <div class="col">
              <a class="col btn btn-green me-2" href="article-create.php">
                <img class="mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                新增文章
              </a>
            </div>
            <!-- 排序、篩選按鈕 -->
            <div class="col d-flex justify-content-end">
              <div class="me-2">
                <form action="articles.php" method="get">
                  <input type="hidden" value="<?= $page ?>" name="page">
                  <input type="hidden" value="<?= $search ?>" name="search">
                  <input type="hidden" value="<?= $order ?>" name="order">
                  <input type="hidden" value="<?= $categoryOrder ?>" name="categoryOrder">
                  <input type="hidden" value="<?php if ($order == "") {
                                                echo "1";
                                              } ?>" name="order">
                  <button class="btn  btn-khak me-3" type="submit">
                    發佈時間排序
                  </button>
                </form>
              </div>
              <!-- 文章類別篩選 -->
              <form class="d-flex" action="articles.php" method="get">
                <input type="hidden" value="<?= $page ?>" name="page">
                <input type="hidden" value="<?= $search ?>" name="search">
                <input type="hidden" value="<?= $order ?>" name="order">
                <select class="col form-select me-2" aria-label="Default select example" name=" categoryOrder">
                  <option selected value="文章類別">文章類別</option>
                  <?php foreach ($categoryOrderArray as $rowOrderArray) : ?>
                    <option value="<?= $rowOrderArray ?>"><?= $rowOrderArray ?></option>
                  <?php endforeach; ?>
                </select>
                <button class="btn btn-grey" type="submit">
                  篩選
                </button>
              </form>
            </div>
          </div>

          <div class="row row-cols-1 row-cols-md-3 g-3 mt-1">
            <?php foreach ($articleRows as $row) : ?>
              <div class="col">
                <div class="card">
                  <img src="../images/<?= $row["image"] ?>" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <!-- 文章詳細 -->
                    <form action="article.php" method="git">
                      <button class="btn btn-white" type="submit">
                        <input type="hidden" value="<?= $page ?>" name="page">
                        <input type="hidden" value="<?= $search ?>" name="search">
                        <input type="hidden" value="<?= $order ?>" name="order">
                        <input type="hidden" value="<?= $categoryOrder ?>" name="categoryOrder">
                        <input type="hidden" value="<?= $row["id"] ?>" name="id">
                        <h5 class="card-title fw-bold"><?= $row["title"] ?></h5>
                      </button>
                    </form>
                    <p class="ellipsis card-text mt-1"><?= $row["content"] ?></p>
                    <p class="card-text mt-1" style="color:#a79a7e;">發佈時間：<?= date("Y年m月d日 H:i", strtotime($row["creation_date"])) ?></p>
                    <div class="d-flex justify-content-between">
                      <button type="button" class="btn btn-sm mt-2
                                            <?php switch ($row["category"]) {
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
                        <?= $row["category"] ?>
                      </button>
                      <form action="article-edit.php" method="git">
                        <input type="hidden" value="<?= $page ?>" name="page">
                        <input type="hidden" value="<?= $search ?>" name="search">
                        <input type="hidden" value="<?= $order ?>" name="order">
                        <input type="hidden" value="<?= $categoryOrder ?>" name="categoryOrder">
                        <input type="hidden" value="<?= $row["id"] ?>" name="id">
                        <button class="btn btn-khak btn-sm mt-2" type="submit">
                          <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                          修改
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- 頁碼 -->
          <div aria-label="Page navigation example text-end" class="d-flex mt-3  justify-content-center">
            <ul class="pagination">
              <!-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li> -->
              <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                <li class="page-item"><a class="page-link <?php if ($page == $i) echo "active"; ?>" href="articles.php?page=<?= $i ?>&search=<?= $search ?>&categoryOrder=<?= $categoryOrder ?>"><?= $i ?></a></li>
              <?php endfor; ?>
              <!-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li> -->
            </ul>
          </div>
          <!-- 頁碼 end -->
        </div>
        <!-- 內容 end -->


      </main>
      <!-- 主要區塊 main end-->
    </div>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>
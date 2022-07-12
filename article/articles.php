<?php
// 連結資料庫
require("../db-connect.php");

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

// 發佈狀態
$publish = isset($_GET["publish"]) ? $_GET["publish"] : "";
switch ($publish) {
  case 1:
    $publishType = "valid=1";
    break;

  case 2:
    $publishType = "valid=2";
    break;

  default:
    $publishType = "valid=1";
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
$sqlAll = "SELECT * FROM article WHERE $categoryOrderType $sqlSearch $publishType";
$resultAll = $conn->query($sqlAll);
$articleCount = $resultAll->num_rows;

// 頁碼
$perPage = 6;
$startPage = ($page - 1) * $perPage;
$sqlArticle = "SELECT * FROM article WHERE $categoryOrderType $sqlSearch $publishType ORDER BY $orderType  LIMIT $startPage, $perPage";

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
  <title>HAMAYA MUSIC - 文章管理</title>

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

    .publish-true {
      padding: 5px;
      margin-left: 10px;
      background-color: #4a81b0;
      color: #fff;
    }

    .categoryTag {
      padding: 5px;
      margin-left: 10px;
      color: #fff;

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

    /* 白色按鈕 */
    .btn-white,
    .btn-white:focus {
      padding: 0;
      background: white;
      border-color: white;
      color: #265f74;
      text-decoration: underline;
      text-underline-offset: 3px;
    }

    .btn-white:hover,
    .btn-white:active:hover {
      padding: 0;
      background: white;
      border-color: white;
      color: #265f74;
      text-decoration: none;
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
              <input type="hidden" value="<?= $publish ?>" name="publish">
              <div class="row">
                <p class="col-8 m-auto"><?php
                                        if ($startItem == $endItem) {
                                          echo "最後1筆";
                                        } else {
                                          echo "第 " . $startItem . " - " . $endItem . " 筆";
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

        <!-- 新增按鈕 -->
        <div class="container">
          <div class="d-flex justify-content-between">
            <div class="col">
              <a class="col btn btn-green me-2" href="article-create.php">
                <img class="mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                新增文章
              </a>
            </div>
            <!-- 排序、篩選按鈕 -->
            <div class="d-flex justify-content-end  align-items-center">
              <form class="d-flex" action="articles.php" method="get">
                <div class="me-2">
                  發佈狀態：
                  <input class="form-check-input" type="radio" id="flexRadioDefault1" value="1" name="publish" <?php if ($publish == 1 || $publish == "") echo "checked"; ?> onclick="this.form.submit()">
                  <label class="form-check-label me-2" for="flexRadioDefault1">
                    未發佈
                  </label>
                  <input class="form-check-input" type="radio" id="flexRadioDefault2" value="2" name="publish" <?php if ($publish == 2) echo "checked"; ?> onclick="this.form.submit()">
                  <label class="form-check-label me-4" for="flexRadioDefault2">
                    已發佈
                  </label>
                </div>
              </form>
              <div class="me-2">
                <form action="articles.php" method="get">
                  <input type="hidden" value="<?= $page ?>" name="page">
                  <input type="hidden" value="<?= $search ?>" name="search">
                  <input type="hidden" value="<?= $order ?>" name="order">
                  <input type="hidden" value="<?= $categoryOrder ?>" name="categoryOrder">
                  <input type="hidden" value="<?= $publish ?>" name="publish">
                  <input type="hidden" value="<?php if ($order == "") {
                                                echo "1";
                                              } ?>" name="order">
                  <button class="btn  btn-khak me-3" type="submit">
                    建立時間排序
                  </button>
                </form>
              </div>
              <!-- 文章類別篩選 -->
              <form class="d-flex" action="articles.php" method="get">
                <input type="hidden" value="<?= $page ?>" name="page">
                <input type="hidden" value="<?= $search ?>" name="search">
                <input type="hidden" value="<?= $order ?>" name="order">
                <input type="hidden" value="<?= $publish ?>" name="publish">
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
                <div class="card position-relative">
                  <div class="px-2 categoryTag rounded-bottom position-absolute top-0 start-0
                      <?php switch ($row["category"]) {
                        case '產品資訊':
                          echo "bg-green-color";
                          break;
                        case '活動快訊':
                          echo "bg-khak-color";
                          break;
                        case '音樂教育':
                          echo "bg-blue-color";
                          break;
                        case '重要通知':
                          echo "bg-red-color";
                          break;
                      }
                      ?>" style="cursor: inherit; ">
                    <?= $row["category"] ?>
                  </div>
                  <img src="../images/<?= $row["image"] ?>" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <!-- 文章詳細 -->
                    <form action="article.php" method="git">
                      <button class="btn btn-white" type="submit">
                        <input type="hidden" value="<?= $page ?>" name="page">
                        <input type="hidden" value="<?= $search ?>" name="search">
                        <input type="hidden" value="<?= $order ?>" name="order">
                        <input type="hidden" value="<?= $categoryOrder ?>" name="categoryOrder">
                        <input type="hidden" value="<?= $publish ?>" name="publish">
                        <input type="hidden" value="<?= $row["id"] ?>" name="id">
                        <h5 class="card-title fw-bold"><?= $row["title"] ?></h5>
                      </button>
                    </form>
                    <p class="ellipsis card-text mt-1"><?= $row["content"] ?></p>
                    <p class="card-text mt-2 fw-bold" style="color:#a79a7e;">建立時間：<?= date("Y年m月d日 H:i", strtotime($row["creation_date"])) ?></p>
                    <div class="d-flex justify-content-between">
                      <div class="fw-bold mt-2" style="  text-decoration: underline;
      text-underline-offset: 3px;<?php if ($row["valid"] == 1) {
                                    echo "color:#61002d;";
                                  } else {
                                    echo "color:#6194a7;";
                                  } ?>"><?php if ($row["valid"] == 1) {
                                          echo "文章未發佈";
                                        } else {
                                          echo "文章已發佈";
                                        } ?></div>
                      <form action="article-edit.php" method="git">
                        <input type="hidden" value="<?= $page ?>" name="page">
                        <input type="hidden" value="<?= $search ?>" name="search">
                        <input type="hidden" value="<?= $order ?>" name="order">
                        <input type="hidden" value="<?= $categoryOrder ?>" name="categoryOrder">
                        <input type="hidden" value="<?= $publish ?>" name="publish">
                        <input type="hidden" value="<?= $row["id"] ?>" name="id">
                        <button class="btn btn-khak btn-sm mt-1" type="submit">
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
              <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                <li class="page-item"><a class="page-link <?php if ($page == $i) echo "active"; ?>" href="articles.php?page=<?= $i ?>&search=<?= $search ?>&categoryOrder=<?= $categoryOrder ?>&publish=<?= $publish ?>"><?= $i ?></a></li>
              <?php endfor; ?>
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
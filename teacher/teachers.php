<?php
// 連結資料庫
require("../db-connect.php");
$sqlTeacher="WHERE teachers.php";
session_start();

//search
if (!isset($_GET["search"])) {
  $search = "";
  $sqlSearch = "";
  // $teacherCount = 0;
} else {
  $search = $_GET["search"];
  // 搜尋條件要群組!!
  $sqlSearch = "(name LIKE '%$search%' OR courses LIKE '%$search%' OR field LIKE '%$search%' OR profile LIKE '%$search%') AND";
}

// 排序
$order = isset($_GET["order"]) ? $_GET["order"] : "";
switch ($order) {
  case 1:
    $orderType = "id DESC";
    break;

  default:
    $orderType = "id ASC";
}

//教學領域篩選
$fieldOrderArray = ["琴鍵類音樂", "弦樂類音樂", "管樂類音樂", "熱音類音樂", "其他類音樂"];
if (!isset($_GET["fieldOrder"])) {
  $fieldOrder = "教學領域";
  $fieldOrderType = "";
} else if ($_GET["fieldOrder"] == "教學領域") {
  $fieldOrder = "教學領域";
  $fieldOrderType = "";
} else {
  $fieldOrder = $_GET["fieldOrder"];
  switch ($fieldOrder) {
    case '琴鍵類音樂':
      $fieldOrderType = "field='琴鍵類音樂' AND";
      break;
    case '弦樂類音樂':
      $fieldOrderType = "field='弦樂類音樂' AND";
      break;
    case '管樂類音樂':
      $fieldOrderType = "field='管樂類音樂' AND";
      break;
    case '熱音類音樂':
      $fieldOrderType = "field='熱音類音樂' AND";
      break;
    case '其他類音樂':
      $fieldOrderType = "field='其他類音樂' AND";
      break;
    default:
      $fieldOrderType = "";
  }
}

if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = 1;
}

// 抓師資資料
$sqlAll = "SELECT * FROM teacher WHERE $fieldOrderType $sqlSearch valid=1";
$resultAll = $conn->query($sqlAll);
$teacherCount = $resultAll->num_rows;


// 頁碼
$perPage = 5;
$startPage = ($page - 1) * $perPage;
$sqlTeacher = "SELECT * FROM teacher WHERE $fieldOrderType $sqlSearch valid=1 ORDER BY $orderType LIMIT $startPage, $perPage";

$resultTeacher = $conn->query($sqlTeacher);
$pageTeacherCount = $resultTeacher->num_rows;
$teacherRows = $resultTeacher->fetch_all(MYSQLI_ASSOC);

$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;

if ($endItem > $teacherCount) $endItem = $teacherCount;
$totalPage = ceil($teacherCount / $perPage);

?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <title>HAMAYA MUSIC - 師資管理</title>

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
      width: 80px;
      height: 80px;
      object-fit: cover;
    }

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
            <li class="breadcrumb-item" aria-current="page"><a href="teachers.php">師資管理</a></li>
          </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end -->

        <hr>

        <!-- 頁碼、搜尋 -->
        <div class="container">
          <div class="row">
            <form action="teachers.php" method="get">
              <input type="hidden" value="<?= $order ?>" name="order">
              <div class="row">
                <p class="col-8 m-auto"><?php
                                        if ($startItem == $endItem) {
                                          echo "最後1筆";
                                        } else {
                                          echo "第 " . $startItem . " - " . $endItem . " 筆";
                                        }
                                        ?>，總共 <?= $teacherCount  ?> 筆資料</p>
                <input class="col form-control me-3" type="text" name="search" placeholder="<?php if ($search != "") {
                                                                                              echo "搜尋 " . $search . " 結果";
                                                                                            } else {
                                                                                              echo "搜尋關鍵字";
                                                                                            } ?>" onfocus="this.placeholder='搜尋關鍵字'">
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
              <a class="col btn btn-green me-2" href="teacher-create.php">
                <img class="mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                新增師資
              </a>
            </div>
            <!-- 排序、篩選按鈕 -->
            <div class="col d-flex justify-content-end">
              <!-- 教學領域篩選 -->
              <form class="d-flex" action="teachers.php" method="get">
                <input type="hidden" value="<?= $search ?>" name="search">
                <input type="hidden" value="<?= $order ?>" name="order">
                <select class="col form-select me-2" aria-label="Default select example" name="fieldOrder">
                  <option selected value="教學領域">教學領域</option>
                  <?php foreach ($fieldOrderArray as $rowOrderArray) : ?>
                    <option value="<?= $rowOrderArray ?>"><?= $rowOrderArray ?></option>
                  <?php endforeach; ?>
                </select>
                <button class="btn btn-grey me-4" type="submit">
                  篩選
                </button>
              </form>
              <form action="teachers.php" method="get">
                <input type="hidden" value="<?= $page ?>" name="page">
                <input type="hidden" value="<?= $search ?>" name="search">
                <input type="hidden" value="<?= $order ?>" name="order">
                <input type="hidden" value="<?= $fieldOrder ?>" name="fieldOrder">
                <input type="hidden" value="<?php if ($order == "") {
                                              echo "1";
                                            } ?>" name="order">
                <button class="btn  btn-khak" type="submit">
                  師資編號排序
                </button>
              </form>
            </div>
          </div>
          <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">編號</th>
                <th scope="col">師資照片</th>
                <th scope="col">師資姓名</th>
                <th scope="col">教學領域</th>
                <th scope="col" width="270">教授課程</th>
                <th scope="col" width="400">師資簡介</th>
                <th scope="col-2">管理操作</th>
              </tr>
            </thead>
            <tbody>
              <!-- 撈每一筆資料 -->
              <?php foreach ($teacherRows as $row) : ?>
                <tr>
                  <td><?= $row["id"] ?></td>
                  <td><img class="object-cover  rounded" src="
                        <?php if (empty($row["image"])) {
                          // 如果沒有照片就顯示頭像icon
                          echo "../images/img-icon.svg";
                        } else {
                          // 如果有照片就顯示上傳的照片
                          $teacherImage = $row["image"];
                          echo "../images/$teacherImage";
                        }
                        ?>
                        "></td>
                  <td><?= $row["name"] ?></td>
                  <td><?= $row["field"] ?></td>
                  <td align="left"><?= $row["courses"]; ?></td>
                  <td align="left">
                    <p class="ellipsis">
                      <?= $row["profile"] ?>
                    </p>
                  </td>
                  <td>
                    <div class="d-flex">
                      <form class="col" action="teacher.php" method="git">
                        <input type="hidden" value="<?= $page ?>" name="page">
                        <input type="hidden" value="<?= $search ?>" name="search">
                        <input type="hidden" value="<?= $order ?>" name="order">
                        <input type="hidden" value="<?= $fieldOrder ?>" name="fieldOrder">
                        <input type="hidden" value="<?= $row["id"] ?>" name="id">
                        <button class="btn btn-green" type="submit">
                          <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                          詳細
                        </button>
                      </form>
                      <form class="col" action="teacher-edit.php" method="git">
                        <input type="hidden" value="<?= $page ?>" name="page">
                        <input type="hidden" value="<?= $search ?>" name="search">
                        <input type="hidden" value="<?= $order ?>" name="order">
                        <input type="hidden" value="<?= $fieldOrder ?>" name="fieldOrder">
                        <input type="hidden" value="<?= $row["id"] ?>" name="id">
                        <button class="btn btn-khak" type="submit">
                          <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                          修改
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php if ($teacherCount == 0) : ?>
            <div class="d-flex mt-3  justify-content-center">
              <?= "沒有符合條件的資料"; ?>
            <?php endif; ?>
            </div>
            <!-- 頁碼 -->
            <div aria-label="Page navigation example text-end" class="d-flex mt-4  justify-content-center">
              <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                  <li class="page-item"><a class="page-link <?php if ($page == $i) echo "active"; ?>" href="teachers.php?page=<?= $i ?>&search=<?= $search ?>&order=<?= $order ?>&fieldOrder=<?= $fieldOrder ?>"><?= $i ?></a></li>
                <?php endfor; ?>
              </ul>
            </div>
            <!-- 頁碼 end -->
        </div>
    </div>
    <!-- 內容 end -->

    </main>
    <!-- 主要區塊 main end-->
  </div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>
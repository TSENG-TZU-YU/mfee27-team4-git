<?php
// 連結資料庫
require_once("../db-connect.php");

// 抓搜尋關鍵字
$search = $_GET["search"];


// 抓師資資料
$sql = "SELECT * FROM teacher WHERE name='$search'";
$result = $conn->query($sql);

// 回傳資料總數量
$teacherCount = $result->num_rows;




?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <title>師資管理</title>

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
      <!-- 導覽列 nav end -->

      <!-- 主要區塊 main -->
      <main class="col-10 px-5 py-4">

        <!-- 麵包屑 breadcrumb -->
        <biv aria-label="breadcrumb">
          <ol class="breadcrumb fw-bold">
            <li class="breadcrumb-item"><a href="#">首頁</a></li>
            <li class="breadcrumb-item" aria-current="page">師資管理</li>
          </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end -->

        <hr>
        <!-- 內容 -->
        <div class="container">
          <div class="row">
            <p class="col-9 m-auto">總共 <?= $teacherCount ?> 筆資料</p>
            <div class="col-3">
              <form action="teachers-search.php" method="get">
                <div class="input-group">
                  <input class="form-control" type="text" name="search">
                  <button class="btn btn-green">
                    <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                    搜尋
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <hr>
        <div class="container">
          <a class="col btn btn-green me-2" href="create-teacher.php">
            <img class="mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
            新增師資
          </a>
          <h5><?= $search ?> 的搜尋結果</h5>
          <table class="table mt-2">
            <thead>
              <tr>
                <th scope="col">編號</th>
                <th scope="col">師資照片</th>
                <th scope="col">師資姓名</th>
                <th scope="col">教學領域</th>
                <th scope="col">教授課程</th>
                <th scope="col" width="350">師資簡介</th>
                <th scope="col">管理操作</th>
              </tr>
            </thead>
            <tbody>
              <!-- 撈每一筆資料 -->
              <?php if ($teacherCount > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <td><?= $row["id"] ?></td>
                    <td>
                      <img class="object-cover  rounded" src="
                    <?php if (empty($row["image"])) {
                      // 如果沒有照片就顯示頭像icon
                      echo "../images/img-icon.png";
                    } else {
                      // 如果有照片就顯示上傳的照片
                      $teacherImage = $row["image"];
                      echo "../images/$teacherImage";
                    }
                    ?>
                  ">
                    </td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["field"] ?></td>
                    <td>教授課程</td>
                    <td align="left">
                      <p class="ellipsis">
                        <?= $row["profile"] ?>
                      </p>
                    </td>
                    <td>
                      <a class="btn btn-grey me-3" type="button" href="teacher.php?id=<?= $row["id"] ?>">
                        <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                        詳細
                      </a>
                      <a class="btn btn-khak" type="button" href="update-teacher.php?id=<?= $row["id"] ?>">
                        <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                        修改
                      </a>
                    </td>
                  </tr>


                <?php endwhile; ?>
              <?php else : ?>
                <h5 class="text-center">目前沒有符合條件的資料</h5>
              <?php endif; ?>
            </tbody>
          </table>

          <!-- 頁碼 -->
          <div aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
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
<?php
require("db-connect.php");
$sqlHome="WHERE home.php";
session_start();


?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <title>HAMAYA MUSIC - 首頁</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
    </link>
  <style>
    a {
      text-decoration: none;
      cursor: pointer;
    }

    a:hover {
      filter: saturate(1.3);
    }

    /* .list-link {
      color: #41464b;
    } */
  </style>

</head>

<body>
  <div class="container-fluid">
    <div class="row d-flex">

      <!-- 導覽列 nav -->
      <?php require("nav.php"); ?>
      <!-- 導覽列 nav end -->

      <!-- 主要區塊 main -->
      <main class="col-10 px-5 py-4">

        <!-- 麵包屑 breadcrumb -->
        <biv aria-label="breadcrumb">
          <ol class="breadcrumb fw-bold">
            <li class="breadcrumb-item" aria-current="page"><a href="http://localhost/mfee27-team4-git/home-page.php">首頁</a></li>
          </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end -->

        <hr>

        <!-- 內容 -->
        <div class="container p-3">
          <!-- 第一列 -->
          <div class="row">
            <!-- 會員管理 -->
            <div class="col bg-grey-color p-3 position-relative">
              <div class="bg-grey-color rounded p-4" style=" height: 17rem; background: #bfbfbf;">
                <a type="" href="member/users.php">
                  <h2 class="fw-bold" style="color:#41464b;">會員管理</h2>
                </a>
                <!-- 子項目 -->
                <div class="border-top border-3 border-white ">
                </div>
                <!-- 子項目 end -->
                <div class="position-absolute bottom-0 end-0 m-5">
                  <img src="/mfee27-team4-git/icon/member-icon.svg" style="height: 5rem;">
                </div>
              </div>
            </div>

            <!-- 訂單管理 -->
            <div class="col bg-grey-color p-3 position-relative">
              <div class="bg-grey-color rounded p-4" style=" height: 17rem; background: #C4D5DB;">
                <a type="" href="order/order-list.php">
                  <h2 class="fw-bold" style="color:#265F74;">訂單管理</h2>
                </a>
                <!-- 子項目 -->
                <div class="border-top border-3 border-white ">
                </div>
                <!-- 子項目 end -->
                <div class="position-absolute bottom-0 end-0 m-5">
                  <img src="/mfee27-team4-git/icon/order-icon.svg" style="height: 5rem;">
                </div>
              </div>
            </div>

            <!-- 商品管理 -->
            <div class="col bg-grey-color p-3 position-relative">
              <div class="bg-grey-color rounded p-4" style=" height: 17rem; background: #E2C4D2;">
                <a type="" href="#">
                  <h2 class="fw-bold" style="color:#61002D;">商品管理</h2>
                </a>
                <!-- 子項目 -->
                <div class="border-top border-3 border-white ">
                  <div class="mt-3"><a class="link-dark fw-bold fs-5" href="ins-shop/ins-shop.php">樂器商城</a></div>
                  <div class="mt-1"><a class="link-dark fw-bold fs-5" href="course-shop/course-shop.php">音樂教育</a></div>
                  <div class="mt-1"><a class="link-dark fw-bold fs-5" href="place-shop/place-shop.php">場地租借</a></div>
                  
                </div>
                <!-- 子項目 end -->
                <div class="position-absolute bottom-0 end-0 m-5">
                  <img src="/mfee27-team4-git/icon/products-icon.svg" style="height: 5rem;">
                </div>
              </div>
            </div>
            <!-- 文章管理 -->
            <div class="col bg-grey-color p-3 position-relative">
              <div class="bg-grey-color rounded p-4" style=" height: 17rem; background: #F5E7D7;">
                <a type="" href="article/articles.php">
                  <h2 class="fw-bold" style="color:#BC5D19;">文章管理</h2>
                </a>
                <!-- 子項目 -->
                <div class="border-top border-3 border-white ">
                </div>
                <!-- 子項目 end -->
                <div class="position-absolute bottom-0 end-0 m-5">
                  <img src="/mfee27-team4-git/icon/article-icon.svg" style="height: 5rem;">
                </div>
              </div>
            </div>
          </div>
          <!-- 第二列 -->
          <div class="row">
            <!-- 師資管理 -->
            <div class="col bg-grey-color p-3 position-relative">
              <div class="bg-grey-color rounded p-4" style=" height: 17rem; background: #E3DCCB;">
                <a type="" href="teacher/teachers.php">
                  <h2 class="fw-bold" style="color:#664D03;">師資管理</h2>
                </a>
                <!-- 子項目 -->
                <div class="border-top border-3 border-white ">
                </div>
                <!-- 子項目 end -->
                <div class="position-absolute bottom-0 end-0 m-5">
                  <img src="/mfee27-team4-git/icon/teacher-icon.svg" style="height: 5rem;">
                </div>
              </div>
            </div>
            <!-- 客服系統 -->
            <div class="col bg-grey-color p-3 position-relative">
              <div class="bg-grey-color rounded p-4" style=" height: 17rem; background: #CEE4F6;">
                <a type="" href="#">
                  <h2 class="fw-bold" style="color:#4A81B0;">客服系統</h2>
                </a>
                <!-- 子項目 -->
                <div class="border-top border-3 border-white ">
                  <div class="mt-3"><a class="link-dark fw-bold fs-5" href="customer/order_qna/order_qna.php">訂單問題</a></div>
                  <div class="mt-1"><a class="link-dark fw-bold fs-5" href="customer/user_qna/user_qna.php">客服問答</a></div>
                </div>
                <!-- 子項目 end -->
                <div class="position-absolute bottom-0 end-0 m-5">
                  <img src="/mfee27-team4-git/icon/customer-service-icon.svg" style="height: 5rem;">
                </div>
              </div>
            </div>
            <!-- 優惠券 -->
            <div class="col bg-grey-color p-3 position-relative">
              <div class="bg-grey-color rounded p-4" style=" height: 17rem; background: #E0D7F3;">
                <a type="" href="coupon/coupons.php?page=1&order=1">
                  <h2 class="fw-bold" style="color:#533B7E;">優惠券</h2>
                </a>
                <!-- 子項目 -->
                <div class="border-top border-3 border-white ">
                </div>
                <!-- 子項目 end -->
                <div class="position-absolute bottom-0 end-0 m-5">
                  <img src="/mfee27-team4-git/icon/sell-icon.svg" style="height: 5rem;">
                </div>
              </div>
            </div>
            <!-- 空的 -->
            <div class="col bg-grey-color p-3 position-relative">

            </div>
          </div>
          

        </div>


        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>
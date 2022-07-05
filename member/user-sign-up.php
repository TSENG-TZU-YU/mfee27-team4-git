<?php
require("../db-connect.php");
session_start();
$sqlWhere = "WHERE member.users.php";
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>後台系統</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../style.css">
    </link>

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
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item"><a href="http://localhost/mfee27-team4-git/member/users.php">會員管理</a></li>
                        <li class="breadcrumb-item" aria-current="page">註冊</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <hr>

                <!-- 註冊會員 -->
                <h1 class="text-center">會員註冊</h1>
                <div class=" d-flex justify-content-center align-items-center mt-4">
                    <div class="panel">
                        <div class="mb-2 ">
                            <label for="">帳號</label>
                            <input type="text" class="form-control" name="account" id="account">
                        </div>
                        <div class="mb-2">
                            <label for="">密碼</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-2">
                            <label for="">性別</label>
                            <div class="d-flex">
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="gender" id="man" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        男
                                    </label>
                                </div>
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="radio" name="gender" id="female">
                                    <label class="form-check-label " for="flexRadioDefault1">
                                        女
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="">生日</label>
                            <input type="date" class="form-control" name="birthday" id="birthday">
                        </div>
                        <div class="mb-2">
                            <label for="">郵件</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-2">
                            <label for="">電話</label>
                            <input type="number" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="mb-2">
                            <label for="">地址</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                        <button class="btn btn-green pe-3" type="button" id="send">送出</button>

                    </div>
                </div>
                <!-- 註冊會員 end -->

        </div>


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
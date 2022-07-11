<?php

?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>新增場地</title>

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

                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
            <form action="docreate-place.php" method="post">
                <div class="mb-2">
                    <label for="">店面</label>
                    <input type="text" class="form-control" name="location">
                </div>
                <div class="mb-2">
                    <label for="">場地類型</label>
                    <input type="text" class="form-control" name="placetype">
                </div>                
                <div class="mb-2">
                    <label for="">庫存</label>
                    <input type="number" class="form-control" name="stock">
                </div>
                <div class="mb-2">
                    <label for="">定價</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="mb-2">
                    <label for="">開放時間</label>
                    <input type="date" class="form-control" name="begin_time">
                </div>
                <div class="mb-2">
                    <label for="">結束時間</label>
                    <input type="date" class="form-control" name="over_time">
                </div>
                <div class="mb-2">
                    <label for="">場地介紹</label>
                    <textarea type="text" class="form-control" name="place_intro"></textarea>
                </div>
                <button class="btn btn-info" type="submit">送出</button>
                <button class="btn btn-info" type="reset">清除</button>
                <a class="btn btn-info" href="place-shop.php">返回上一頁</a>
            </form>
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
<?php

require("../db-connect.php");

// 抓課程商品資料
$sql = "SELECT * FROM course_product WHERE id";

$result = $conn->query($sql);
$courseCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>新增師資</title>

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
            height: 100%;
            object-fit: cover;
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
                        <li class="breadcrumb-item" aria-current="page">xxx</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->

                <div class="container">
                    <form class="mt-4" action="doCreate-teacher.php" method="post">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-fluid rounded object-cover" id="preview" src="images/img-icon.png" style="height: 300px;">
                            </div>
                            <div class="col d-flex flex-column mb-3">
                                <div class="col mb-2">
                                    <label class="form-label" for="">師資姓名</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label" for="">師資照片</label>
                                    <input type="file" class="form-control" id="upload" name="image">
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label" for="">表演影片網址</label>
                                    <input type="url" class="form-control" name="video">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="">教授領域</label>
                                    <input type="text" class="form-control" name="field">
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label" for="">教授課程</label>

                                <!-- 帶入課程商品資料 作為選項check-box -->
                                <?php foreach ($rows as $row) : ?>
                                    <div class="form-check mb-2">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="courseId[]" value="<?= $row["id"] ?>">
                                            <?= $row["course_name"] ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="">師資簡介</label>
                            <textarea class="form-control" id="floatingTextarea2" type="text" name="profile" style="height: 250px; resize:none;"></textarea>
                        </div>

                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <a class="btn btn-khak me-5" href="teacher-index.php">取消新增</a>
                            <button class="btn btn-green" type="submit" name="submit-date">新增完成</button>
                        </div>
                    </form>
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
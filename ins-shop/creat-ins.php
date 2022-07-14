<?php

?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>新增樂器</title>

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
            <form action="docreate-ins.php" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <label for="">樂器類別</label>
                    <select class="form-select mt-1 autoCategory" aria-label="Default select example" name="cate">
                      <option value="電鋼琴">電鋼琴</option>
                      <option value="木吉他">木吉他</option>
                      <option value="電吉他">電吉他</option>
                      <option value="電貝斯">電貝斯</option>
                      <option value="電子鼓">電子鼓</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="">品牌型號</label>
                    <input type="text" class="form-control" name="name" required pattern=".*[^ ].*">
                </div>                
                <div class="mb-2">
                    <label for="">價格</label>
                    <input type="number" class="form-control" name="price" required pattern=".*[^ ].*">
                </div>
                <div class="mb-2">
                    <label for="">庫存</label>
                    <input type="number" class="form-control" name="stock" required pattern=".*[^ ].*">
                </div>
                <div class="mb-2">
                    <label for="">商品簡介</label>
                    <textarea type="text" class="form-control" name="intro" required pattern=".*[^ ].*"></textarea>
                </div>
                <div class="mb-2">
                    <label for="">圖片上傳</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button class="btn btn-info" type="submit">送出</button>
                <button class="btn btn-info" type="reset">清除</button>
                <a class="btn btn-info" href="ins-shop.php">返回上一頁</a>
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
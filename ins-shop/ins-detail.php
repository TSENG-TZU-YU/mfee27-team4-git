<?php
require("../db-connect.php");

if (!isset($_GET["id"])) {
    echo "沒有參數";
    exit;
}

$id = $_GET["id"];
$sql = "SELECT * FROM instrument_product WHERE id=$id AND valid=1";
$result = $conn->query($sql);
$insCount = $result->num_rows;
$row = $result->fetch_assoc();



?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>ins-detail</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../style.css">
    </link>

    <style>
        .panel {
            width: 800px;
            height: 400px;
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
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item"><a href="">樂器商城</a></li>
                        <li class="breadcrumb-item" aria-current="page">詳細</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>



                <div class="container">

                    <!-- 按鈕 -->
                    <div class="row ">
                        <!-- 文字按鈕 -->
                        <a class="col-1 btn btn-green mx-3" href="ins-shop.php">
                            <img class="bi pe-none mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                            返回
                        </a>



                    </div>
                    <!-- 按鈕 end-->

                </div>
                <div class="container mt-5  ">
                    <?php if ($insCount > 0) :
                        $row;
                    ?>
                        <div class="d-flex justify-content-center">
                            <table class="table table-bordered panel">
                                <tr>
                                    <th>商品編號</th>
                                    <td><?= $row["id"] ?></td>
                                </tr>
                                <tr>
                                    <th>樂器類別</th>
                                    <td><?= $row["cate"] ?></td>
                                </tr>
                                <tr>
                                    <th>品牌型號</th>
                                    <td><?= $row["name"] ?></td>
                                </tr>
                                <tr>
                                    <th>商品圖片</th>
                                    <td><img class="object-cover " src="<?$teacherImage = $row["image"];?>"></td>
                                </tr>
                                <tr>
                                    <th>定價</th>
                                    <td><?= $row["price"] ?></td>
                                </tr>
                                <tr>
                                    <th>庫存</th>
                                    <td><?= $row["stock"] ?></td>
                                </tr>
                                <tr>
                                    <th>商品簡介</th>
                                    <td><?= $row["intro"] ?></td>
                                </tr>
                                <tr>
                                    <th>建立時間</th>
                                    <td><?= $row["creat_time"] ?></td>
                                </tr>
                            </table>

                        </div>

                    <?php else : ?>
                        沒有該商品
                    <?php endif; ?>
                    <div class="py-2  ">
                        <div class="d-flex justify-content-center">
                            <a class="col-1 btn btn-khak me-3" href="edit-ins.php?id=<?= $row["id"] ?>">
                                <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                修改
                            </a>
                            <a class="col-1 btn btn-red  me-3" href="dodelete-ins.php?id=<?= $row["id"] ?>">
                            <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                                刪除
                            </a>
                        </div>
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
<?php
require("../db-connect.php");


if (!isset($_GET["id"])) {
    echo "沒有參數";
    exit;
}

$id = $_GET["id"];
$sql = "SELECT * FROM place_produce WHERE id=$id";
$result = $conn->query($sql);
$placeCount = $result->num_rows;
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>修改課程</title>

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
                        <li class="breadcrumb-item"><a href="">場地商城</a></li>
                        <li class="breadcrumb-item" aria-current="page">詳細</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>



                <div class="container">

                    <!-- 按鈕 -->
                    <div class="row ">
                        <!-- 文字按鈕 -->
                        <a class="col-1 btn btn-green mx-3" href="place-detail.php?id=<?= $row["id"] ?>">
                            <img class="bi pe-none mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                            返回
                        </a>



                    </div>
                    <!-- 按鈕 end-->

                </div>
                <div class="container mt-5  ">
                    <?php if ($placeCount > 0) :  $row;?>
                        <form action="doupdate-place.php" method="post">
                            <div class="d-flex justify-content-center">
                            <input name="id" type="hidden" value=" <?= $row["id"] ?>">
                                <table class="table table-bordered panel">
                                     <input name="id" type="hidden" value=" <?= $row["id"] ?>">
                                    <tr>
                                        <th>商品編號</th>
                                        <td ><?= $row["id"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>店面</th>
                                        <td> 
                                        <select class="form-select mt-1 autoCategory" aria-label="Default select example" name="cate">
                                            <option value="台北總店">台北總店</option>
                                            <option value="中壢店">中壢店</option>
                                            <option value="高雄店">高雄店</option>
                                        </select>                                 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>場地類型</th>
                                        <td>
                                        <select class="form-select mt-1 autoCategory" aria-label="Default select example" name="name">
                                            <option value="小練習室">小練習室</option>
                                            <option value="大練習室">大練習室</option>
                                            <option value="錄音室">錄音室</option>
                                        </select>                                    
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>定價</th>
                                        <td><input type="number" class="form-control text-center" value="<?= $row["price"] ?>" name="price" required></td>
                                    </tr>
                                    <tr>
                                        <th>庫存</th>
                                        <td><input type="number" class="form-control text-center" value="<?= $row["stock"] ?>" name="stock" required></td>
                                    </tr>
                                    <tr>
                                        <th>開放時間</th>
                                        <td><input type="datetime-local" class="form-control text-center" value="<?=date(($row["use_time"]));?>" name="use_time" required></td>
                                    </tr>
                                    <tr>
                                        <th>結束時間</th>
                                        <td><input type="datetime-local" class="form-control text-center" value="<?=date(($row["over_time"]));?>" name="over_time" required></td>
                                    </tr>
                                    <tr>
                                        <th>場地簡介</th>
                                        <td><textarea type="text" class="form-control text-center" name="intro" required><?= $row["intro"]?></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>建立時間</th>
                                        <td><?= $row["creat_time"] ?></td>
                                    </tr>
                                </table>

                            </div>
                            <div class="py-2  ">
                                <div class="d-flex justify-content-center">
                                    <button class="col-1 btn btn-khak me-3"  type="submit">
                                        <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16" ></img>
                                        儲存
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php else : ?>
                        沒有該商品
                    <?php endif; ?>

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
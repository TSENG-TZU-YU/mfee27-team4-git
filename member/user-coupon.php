<?php
require("../db-connect.php");

$sqlMember  = "WHERE member.users.php";

session_start();
if (!isset($_GET["id"])) {
    echo "沒有參數";
    exit;
}

$id = $_GET["id"];
$sql = "SELECT users.id, coupon.*  FROM users JOIN coupon ON users.coupon=coupon.coupon_c ";
$result = $conn->query($sql);
$userCount = $result->num_rows;
$row = $result->fetch_assoc();



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
                        <li class="breadcrumb-item"><a href="http://localhost/mfee27-team4-git/member/users.php">會員管理</a></li>
                        <li class="breadcrumb-item" aria-current="page">詳細</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>



                <div class="container">

                    <!-- 按鈕 -->
                    <div class="row mt-5">
                        <!-- 文字按鈕 -->
                        <a class="col-1 btn btn-green mx-3" href="user-detail.php?id=<?= $row["id"] ?>">
                            <img class="bi pe-none mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                            返回
                        </a>
                       



                    </div>
                    <!-- 按鈕 end-->

                </div>
                <div class="container mt-5  ">
                <table class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">優惠券名稱</th>
                                <th scope="col">優惠券折扣</th>
                                <th scope="col">優惠券期限</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $row) : ?>
                                <tr>
                                    <th><?= $row["id"] ?></th>
                                    <td><?= $row["name"] ?></td>
                                    <td><?= $row["account"] ?></td>
                                    <td><?= $row["phone"] ?></td>
                                    <td><?= $row["email"] ?></td>
                                    <td><?= $row["create_time"] ?></td>
                                    <td>
                                        <a class="btn btn-grey  me-3" type="button" href="user-detail.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                            詳細
                                        </a>
                                        <a class="btn btn-red" type="button" href="do-black-list.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                                            加入黑名單
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


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
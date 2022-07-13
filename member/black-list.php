<?php
require("../db-connect.php");
session_start();
$sqlMember = "WHERE member.users.php";

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$order = isset($_GET["order"]) ? $_GET["order"] : 1;

switch ($order) {
    case 1:
        $orderType = "id ASC";
        break;
    case 2:
        $orderType = "id DESC";
        break;
    default:
        $orderType = "id ASC";
}

//page
$sqlAll = "SELECT * FROM users WHERE  valid=1 AND enable=0";
$resultAll = $conn->query($sqlAll);
$userCount = $resultAll->num_rows;

$perPage = 10;
$startPage = ($page - 1) * $perPage;
$sql = "SELECT * FROM users WHERE  valid=1 AND enable=0  ORDER BY $orderType  LIMIT $startPage ,10";

$result = $conn->query($sql);
$pageUserCount = $resultAll->num_rows;

$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;

if ($endItem > $userCount) $endItem = $userCount;
$totalPage = ceil($userCount / $perPage);
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>HAMAYA MUSIC - 會員管理</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../style.css">
    </link>
    <style>
        .page {
            left: 52%;
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
                        <li class="breadcrumb-item" aria-current="page">黑名單</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <div class="row">
                        <p class="col-8 m-auto">
                            第 <?= $startItem ?>-<?= $endItem ?> 筆 ， 總共 <?= $userCount ?> 筆資料
                        </p>
                        <input class="col form-control me-3" type="text">
                        <a class="col-1 btn btn-green" href="#">
                            <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                            搜尋
                        </a>
                    </div>
                </div>
                <hr>
                <div class="container">

                    <!-- 按鈕 -->
                    <div class="row">
                        <!-- 文字按鈕 -->
                        <a class="col-1 btn btn-green mx-3" href="users.php">
                            <img class="bi pe-none mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                            返回
                        </a>
                    </div>
                    <!-- 按鈕 end-->

                    <table class="table mt-3">

                        <thead>
                            <tr>
                                <th scope="col">會員編號</th>
                                <th scope="col">會員姓名</th>
                                <th scope="col">會員帳號</th>
                                <th scope="col">會員電話</th>
                                <th scope="col">會員郵件</th>
                                <th scope="col">建立時間</th>
                                <th colspan="2">管理操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <th><?php echo $row["id"] ?></th>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["account"] ?></td>
                                    <td><?php echo $row["phone"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["create_time"] ?></td>
                                    <td>
                                        <a class="btn btn-grey me-3" type="button" href="user-detail.php?id=<?= $row["id"] ?>&name=<?= $row["name"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                            詳細
                                        </a>
                                        <a class="btn btn-khak" type="button" href="remove-black-list.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                            解除黑名單
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example" class="d-flex mt-4  justify-content-center">
                        <ul class="pagination">
                            <!-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li> -->
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li class="page-item"><a class="page-link <?php if ($page == $i) echo "active"; ?>" href="black-list.php?page=<?= $i ?>&order=<?= $order ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                            <!-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- 頁碼 end -->
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
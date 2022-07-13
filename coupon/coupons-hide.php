<?php

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}



require("../db-connect.php");

$sqlAll = "SELECT * FROM coupon WHERE shelf=1 ";
$resultAll = $conn->query($sqlAll);
$couponHideCount = $resultAll->num_rows;


$perPage = 4;
$start = ($page - 1) * $perPage;

$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;
if ($endItem > $couponHideCount) $endItem = $couponHideCount;

$order = isset($_GET["order"]) ? $_GET["order"] : 1;

switch ($order) {
    case 1:
        $orderType = "ASC";
        break;
    case 2:
        $orderType = "DESC";
        break;
    default:
        $orderType = "ASC";
}



$sql = "SELECT * FROM coupon WHERE shelf=1 ORDER BY id $orderType LIMIT 
$start,4";


$result = $conn->query($sql);
$pageCouponCount = $result->num_rows;

$totalPage = ceil($couponHideCount / $perPage);

$rows = $result->fetch_all(MYSQLI_ASSOC);


?>


<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>Coupons-Hide</title>

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
            width: 500px;
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
                        <li class="breadcrumb-item" aria-current="page"><a href="#">待使用優惠卷列表</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <form action="couponHide-search.php" method="get">
                        <div class="row">
                            <span class="col-5"> 第<?= $startItem ?>- <?= $endItem ?>筆</span>
                            <p class="col-8 m-auto">總共<?= $couponHideCount ?> 筆資料</p>
                            <input class="col form-control me-3" type="text" name="search">
                            <button type="submit" class="col-1 btn btn-green">
                                <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                                搜尋</button>
                        </div>
                    </form>
                    <hr>




                    <a href="coupons-hide.php?page=<?= $page ?>&order=1" class="btn btn-khak  <?php if ($order == 1) echo " active" ?>">By id asc</a>
                    <a href="coupons-hide.php?page=<?= $page ?>&order=2" class="btn btn-khak  <?php if ($order == 2) echo " active" ?>">By id desc</a>



                    <table class="table mt-5">

                        <thead>

                            <tr>

                                <th scope="col">編號</th>
                                <th scope="col">優惠券名稱</th>
                                <th scope="col">使用者資格</th>
                                <th scope="col">序號</th>
                                <th scope="col">折扣</th>
                                <th scope="col">日期</th>
                                <th scope="col">使用次數</th>
                                <th scope="col">最低金額</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $row) : ?>
                                <tr>
                                    <td><?= $row["id"] ?></td>
                                    <td><?= $row["name"] ?></td>
                                    <td><?= $row["member"] ?></td>
                                    <td><?= $row["number"] ?></td>
                                    <td><?= $row["discount"] ?></td>
                                    <td><?= $row["dateline"] ?></td>
                                    <td><?= $row["several_times"] ?></td>
                                    <td><?= $row["min_price"] ?></td>
                                    <td>
                                        <form action="coupon-hide.php" method="get">
                                            <bt class="btn btn-grey me-3" type="" href="coupon-hide.php?id=<?= $row["id"] ?>">
                                                <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                                詳細
                                                </a>
                                        </form>
                                        <a class="btn btn-khak" type="" href="remove-coupon.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                            上架
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li class="page-item <?php if ($page == $i) echo "active";
                                                        ?>"><a class="page-link" href="coupons-hide.php?page=<?= $i ?>"><?= $i ?>
                                    </a></li>
                            <?php endfor; ?>
                            <li>
                                <a class=" btn btn-grey ms-4" href="coupons.php">
                                    <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                    返回上一頁
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
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>
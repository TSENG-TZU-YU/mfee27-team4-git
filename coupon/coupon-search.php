<?php

require("../db-connect.php");


session_start();



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
    case 3:
        $orderType = "min_price ASC";
        break;
    case 4:
        $orderType = "min_price DESC";
        break;
    default:
        $orderType = "name ASC";
}


$perPage = 10;
$start = ($page - 1) * $perPage;

if (!isset($_GET["search"])) {
    $search = "";
    $couponCountS = 0;
} else {

    $search = $_GET["search"];
    $sqlSearch = "SELECT id, name , number, discount, dateline, several_times, min_price FROM coupon 
    WHERE shelf=0 AND name  LIKE '%$search%' ORDER BY $orderType  LIMIT $start,  10";
    $resultS = $conn->query($sqlSearch);
    $couponCountS = $resultS->num_rows;
}

$sqlAll = "SELECT * FROM coupon WHERE  name LIKE '%$search%' AND shelf=0 ";
$resultAll = $conn->query($sqlAll);
$couponCountAll = $resultAll->num_rows;

$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;
if ($endItem > $couponCountAll) $endItem = $couponCountAll;

$totalPage = ceil($couponCountAll / $perPage);
?>






<!doctype html>
<html lang="en">

<head>
    <title>HAMAYA MUSIC - 優惠券</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
                        <li class="breadcrumb-item" aria-current="page"><a href="coupons.php">優惠卷列表</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="#">搜尋優惠卷列表</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>



                <div class="container">

                    <form action="coupon-search.php" method="get">
                        <div class="row">

                            <p class="col-8 m-auto"><?= $search ?>的搜尋結果，總共<?= $couponCountAll ?> 筆資料</p>
                            <input class="col form-control me-3" type="text" name="search">
                            <button type="submit" class="col-1 btn btn-green">
                                <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                                搜尋</button>
                        </div>
                    </form>
                    <hr>
                    <a class="col-1 btn btn-green me-2" href="create-coupon.php">
                        <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                        新增
                    </a>
                    <a class="col-1 btn btn-green me-2" href="coupons-hide.php">
                        <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                        待上架
                    </a>

                    <a href="coupon-search.php?page=<?= $page ?>&order=1" class="btn btn-khak  <?php if ($order == 1) echo " hover" ?>">By id asc</a>
                    <a href="coupon-search.php?page=<?= $page ?>&order=2" class="btn btn-khak  <?php if ($order == 2) echo " hover" ?>">By id desc</a>
                    <a href="coupon-search.php?page=<?= $page ?>&order=3" class="btn btn-khak  <?php if ($order == 3) echo " hover" ?>">By min_price asc</a>
                    <a href="coupon-search.php?page=<?= $page ?>&order=4" class="btn btn-khak  <?php if ($order == 4) echo " hover" ?>">By min_price desc</a>




                    <?php if ($couponCountS > 0) : ?>

                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">編號</th>
                                    <th scope="col">優惠券名稱</th>
                                    <th scope="col">序號</th>
                                    <th scope="col">折扣</th>
                                    <th scope="col">日期</th>
                                    <th scope="col">使用次數</th>
                                    <th scope="col">最低金額</th>
                                    <th scope="col">管理操作</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $resultS->fetch_assoc()) :

                                ?>
                                    <tr>
                                        <td><?= $row["id"] ?></td>
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["number"] ?></td>
                                        <td><?= $row["discount"] ?></td>
                                        <td><?= $row["dateline"] ?></td>
                                        <td><?= $row["several_times"] ?></td>
                                        <td><?= $row["min_price"] ?></td>
                                        <td>
                                            <a class="btn btn-grey me-3" type="" href="coupon.php?id=<?= $row["id"] ?>">
                                                <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                                詳細
                                            </a>
                                            <a class="btn btn-khak" type="" href="coupon-edit.php?id=<?= $row["id"] ?>">
                                                <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                                修改
                                            </a>
                                            <a class="btn btn-khak" type="" href="doHide.php?id=<?= $row["id"] ?>">
                                                <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                                加入待上架
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else :  ?>
                        沒有符合條件結果
                    <?php endif; ?>
                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example" class="d-flex mt-4  justify-content-center">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li class="page-item <?php if ($page == $i) echo "active"; ?>"><a class="page-link" href="coupon-search.php?page=<?= $i?>"><?= $i?>
                                    </a>
                                </li>
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


</body>

</html>
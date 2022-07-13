<?php

require("../db-connect.php");



if (!isset($_GET["search"])) {
    $search = "";
    $couponCount = 0;
} else {

    $search = $_GET["search"];
    $sqlSearch = "SELECT id, name , number, discount, dateline, several_times, min_price FROM coupon 
    WHERE shelf=1 AND name LIKE '%$search%'";
    $result = $conn->query($sqlSearch);
    $couponCount = $result->num_rows;
}




?>

<!doctype html>
<html lang="en">

<head>
    <title>Coupon Hide search</title>
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
                        <li class="breadcrumb-item" aria-current="page"><a href="#">優惠卷列表</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>
                <div class="container">
                    <form action="couponHide-search.php" method="get">
                        <div class="row">

                            <p class="col-8 m-auto"><?= $search ?>的搜尋結果，總共<?= $couponCount ?> 筆資料</p>
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


                    <?php if ($couponCount > 0) : ?>

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

                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $row["id"] ?></td>
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["number"] ?></td>
                                        <td><?= $row["discount"] ?></td>
                                        <td><?= $row["dateline"] ?></td>
                                        <td><?= $row["several_times"] ?></td>
                                        <td><?= $row["min_price"] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else :  ?>
                        沒有符合條件結果
                    <?php endif; ?>

                    <a class=" btn btn-grey me-3" href="coupons-hide.php">
                        <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                        返回上一頁
                    </a>


                </div>
</body>

</html>
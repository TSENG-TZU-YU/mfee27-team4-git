<?php

require("../db-connect.php");
$sqlCoupon  = "WHERE coupons.users.php";


$sqlAll = "SELECT coupon.*, users.name AS users_name FROM coupon
JOIN users ON coupon.coupon_c = users.coupon WHERE shelf=0 ";
$resultAll = $conn->query($sqlAll);
$couponCountAll = $resultAll->num_rows;



if (!isset($_GET["search"])) {
    $search = "";
    $couponCount = 0;
} else {

    $search = $_GET["search"];
    $sqlSearch = "SELECT id, name , number, discount, dateline, several_times, min_price FROM coupon 
WHERE  name  LIKE '%$search%'";
    $result = $conn->query($sqlSearch);
    $couponCount = $result->num_rows;
}




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
        $orderType = "name ASC";
}



// $sql="SELECT * FROM coupon WHERE valid=1 AND shelf=0 ORDER BY $orderType LIMIT 
// $start, 4";

// $result = $conn->query($sql);
// $pageCouponCount=$result->num_rows;



$perPage = 4;
$start = ($page - 1) * $perPage;

$sql = "SELECT coupon.*, users.name AS users_name FROM coupon
  JOIN users ON coupon.coupon_c = users.coupon WHERE shelf=0  ORDER BY $orderType  LIMIT $start, 4 "; //
$result = $conn->query($sql);
$couponCount = $result->num_rows;


$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;
if ($endItem > $couponCountAll) $endItem = $couponCountAll;

$totalPage = ceil($couponCountAll / $perPage);
?>


<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>Coupons-List</title>

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
                    <form action="coupons.php" method="get">
                        <div class="row">

                            <span class="col-5"> 第<?= $startItem ?>- <?= $endItem ?>筆 , 總共<?= $couponCountAll ?>筆資料</span>
                            <!-- <p class="col-8 m-auto">總共<?= $couponCountAll ?>筆資料</p> -->
                            <input class="col form-control me-3 " type="text" name="search">
                            <button type="submit" class="col-1 btn btn-green">
                                <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                                搜尋</button>
                        </div>
                    </form>
                </div>

                <hr>
                <!-- 內容 -->
                <div class="container">


                    <a class="col-1 btn btn-green me-2" href="create-coupon.php">
                        <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                        新增
                    </a>
                    <a class="col-1 btn btn-green me-2" href="coupons-hide.php">
                        <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                        待上架
                    </a>



                    <a href="coupons.php?page=<?= $page ?>&order=1" class="btn btn-khak  <?php if ($order == 1) echo " " ?>">By id asc</a>
                    <a href="coupons.php?page=<?= $page ?>&order=2" class="btn btn-khak  <?php if ($order == 2) echo " " ?>">By id desc</a>


                    <?php if ($couponCountAll > 0) : ?>

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
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $row["id"] ?></td>
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["users_name"] ?></td>
                                        <td><?= $row["number"] ?></td>
                                        <td><?= $row["discount"] ?></td>
                                        <td><?= $row["dateline"] ?></td>
                                        <td><?= $row["several_times"] ?></td>
                                        <td><?= $row["min_price"] ?></td>
                                        <td>
                                            <a class="btn btn-grey me-3" type="" href="coupon.php?
                        id=<?= $row["id"] ?>">
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
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li class="page-item <?php if ($page == $i) echo "active"; ?>"><a class="page-link" href="coupons.php?page=<?= $i ?>&order=<?= $order ?>"><?= $i ?>
                                    </a></li>
                            <?php endfor; ?>



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
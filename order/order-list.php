<?php
session_start();
require("../db-connect.php");
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$_SESSION["page"] = $page;

if (!isset($_GET["search"])) {
    $search = "";
    $sqlSearch = "";
} else {
    $search = $_GET["search"];
    $sqlSearch = "(order_id LIKE '%$search%' OR account LIKE '%$search%' OR create_time LIKE '%$search%' OR total_amount LIKE '%$search%') AND";
}

if (!isset($_GET["order"])) {
    $order = 1;
} else {
    $order = $_GET["order"];
}
switch ($order) {
    case 1:
        $orderType = "order_id DESC";
        $_SESSION["orderType"] =  "&order=1";
        break;
    case 2:
        $orderType = "order_id ASC";
        $_SESSION["orderType"] = "&order=2";
        break;
    case 3:
        $orderType = "total_amount DESC";
        $_SESSION["orderType"] =  "&order=3";
        break;
    case 4:
        $orderType = "total_amount ASC";
        $_SESSION["orderType"] = "&order=4";
        break;
    default:
        $orderType = "order_id DESC";
}

if (!isset($_GET["payment"])) {
    $payment = "";
    $paymentType = "";
} else {
    $payment = $_GET["payment"];
    switch ($payment) {
        case 1:
            $paymentType = "payment_method=1 AND";
            $_SESSION["orderType"] = "payment_method=1 AND";
            break;
        case 2:
            $paymentType = "payment_method=2 AND";
            $_SESSION["orderType"] = "payment_method=2 AND";
            break;
        case 3:
            $paymentType = "payment_state=1 AND";
            $_SESSION["orderType"] = "payment_state=1 AND";
            break;
        case 4:
            $paymentType = "payment_state=2 AND";
            $_SESSION["orderType"] = "payment_state=2 AND";
            break;
    }
}
$sqlAll = "SELECT*FROM order_product WHERE $paymentType $sqlSearch valid=1";
$resultAll = $conn->query($sqlAll);
$rowsAll = $resultAll->fetch_all(MYSQLI_ASSOC);
$list_count = $resultAll->num_rows;

$perPage = 8;
$start = ($page - 1) * $perPage;

$sql = "SELECT * FROM order_product WHERE $paymentType $sqlSearch valid=1 ORDER BY $orderType LIMIT $start, 8"; //
$result = $conn->query($sql);
$pageListCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

//關聯pay_state state pay_by 3個table
for ($i = 0; $i < count($rows); $i++) {
    $paymethod_id = $rows[$i]["payment_method"];
    $paymentState_id = $rows[$i]["payment_state"];
    $orderState_id = $rows[$i]["order_state"];
    // echo "$paymentState_id" . "<br>";
    $sqlPayState = "SELECT * FROM pay_state WHERE id=$paymentState_id";
    $resultPayState = $conn->query($sqlPayState);
    $payStaterow = $resultPayState->fetch_assoc();
    $rows[$i]["payName"] = $payStaterow["name"];
    $sqlOrderState = "SELECT * FROM state WHERE id=$orderState_id";
    $resultOrderState = $conn->query($sqlOrderState);
    $orderStaterow = $resultOrderState->fetch_assoc();
    $rows[$i]["orderStateName"] = $orderStaterow["name"];
    $sqlPayMethod = "SELECT * FROM pay_by WHERE id=$paymethod_id";
    $resultPayMethod = $conn->query($sqlPayMethod);
    $payMethodrow = $resultPayMethod->fetch_assoc();
    $rows[$i]["payMethodName"] = $payMethodrow["name"];
}

$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;
if ($endItem > $list_count) $endItem = $list_count;
if ($endItem < $startItem) $startItem = 0;
$totalPage = ceil($list_count / $perPage);

$conn->close();
$sqlOrder = "WHERE order-list.php";

?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>訂單管理</title>

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
                        <li class="breadcrumb-item"><a href="../home.php">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="order-list.php">訂單管理</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <div class="row">
                        <form action="order-list.php" method="get">
                            <div class="row">
                                <p class="col-8 m-auto">目前第<?= $startItem ?>-<?= $endItem ?>筆，總共<?= $list_count ?>筆資料</p>
                                <input class="col form-control me-3" type="text" name="search">
                                <button type="submit" class="col-1 btn btn-green">
                                    <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                                    搜尋</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="py-2 d-flex justify-content-end align-items-center">
                        <a href="order-list.php?page=<?= $page ?>&order=<?php
                                                                        if ($order == 3 || $order == 4 || $order == 2) echo "1";
                                                                        if ($order == 1) echo "2";
                                                                        ?>" class="btn btn-grey me-2">依照建立時間排序</a>
                        <a href="order-list.php?page=<?= $page ?>&order=<?php
                                                                        if ($order == 1 || $order == 2 || $order == 4) echo "3";
                                                                        if ($order == 3) echo "4";
                                                                        ?>" class="btn btn-grey me-2">依照總金額排序</a>
                        <a href="order-list.php?page=<?= $page ?>&payment=1" class="btn btn-khak me-2">信用卡</a>
                        <a href="order-list.php?page=<?= $page ?>&payment=2" class="btn btn-khak me-2 ">轉帳</a>
                        <a href="order-list.php?page=<?= $page ?>&payment=3" class="btn btn-khak me-2">未付款</a>
                        <a href="order-list.php?page=<?= $page ?>&payment=4" class="btn btn-khak me-2 ">已付款</a>
                    </div>
                    <?php if ($pageListCount > 0) :
                    ?>
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">訂單編號</th>
                                    <th scope="col">會員帳號</th>
                                    <th scope="col">訂單建立時間</th>
                                    <th scope="col">總金額</th>
                                    <th scope="col">結帳方式</th>
                                    <th scope="col">付款狀態</th>
                                    <th scope="col">付款時間</th>
                                    <th scope="col">訂單狀態</th>
                                    <th colspan="2">管理操作</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $row) : ?>
                                    <tr>
                                        <td><?= $row["order_id"] ?></td>
                                        <td><?= $row["account"] ?></td>
                                        <td><?= $row["create_time"] ?></td>
                                        <td><?= $row["total_amount"] ?></td>
                                        <td><?= $row["payMethodName"] ?></td>
                                        <td><?= $row["payName"] ?></td>
                                        <td><?= $row["payment_time"] ?></td>
                                        <td><?= $row["orderStateName"] ?></td>
                                        <td>
                                            <a class="btn btn-grey me-3" type="button" href="order-list-detail.php?order_id=<?= $row["order_id"] ?>"><img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                                詳細</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-khak" type="button" href="list-edit.php?order_id=<?= $row["order_id"] ?>">
                                                <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                                修改</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h2 class="text-center">目前沒有訂單</h2>
                    <?php endif; ?>
                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example" class="d-flex mt-4  justify-content-center">
                        <ul class="pagination">
                            <?php
                            if (!isset($_GET["search"])) :
                                for ($i = 1; $i <= $totalPage; $i++) : ?>
                                    <li class="page-item <?php if ($page == $i) echo "active"; ?>"><a class="page-link" href="order-list.php?page=<?= $i ?>&order=<?= $order ?>"><?= $i ?></a>
                                    </li>
                                <?php

                                endfor;
                            else :
                                // echo $totalPage;
                                $searchPage = $_GET["search"];
                                for ($i = 1; $i <= $totalPage; $i++) :
                                ?>
                                    <li class="page-item <?php if ($page == $i) echo "active"; ?>">
                                        <a class="page-link" href="order-list.php?page=<?=$i?>&?search=<?= $searchPage ?>"><?=$i?></a>
                                    </li>

                            <?php
                                endfor;
                            endif; ?>
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
<?php



if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
require("../db-connect.php");
$sqlAll = "SELECT * FROM order_product WHERE valid=1";
$resultAll = $conn->query($sqlAll);
$list_count = $resultAll->num_rows;

$perPage = 4;
$start = ($page - 1) * $perPage;
$sql = "SELECT * FROM order_product WHERE valid=1 LIMIT $start, 4";
// echo $sql;
$result = $conn->query($sql);
$pageListCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;
if ($endItem > $list_count) $endItem = $list_count;

$totalPage = ceil($list_count / $perPage);

$conn->close();
// var_dump($rows);
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
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="order-list.php">訂單管理</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <div class="row">
                        <p class="col m-auto">第<?= $startItem ?>-<?= $endItem ?>筆</p>
                        <p class="col m-auto">總共<?= $list_count ?>筆資料</p>
                        <input class="col form-control me-3" type="text">
                        <a class="col-1 btn btn-green" href="#">
                            <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                            搜尋
                        </a>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <?php if ($pageListCount > 0) :
                        $paymentState = [
                            "0" => "未付款",
                            "1" => "已付款",
                            "2" => "退款"
                        ];
                        $orderState = [
                            "0" => "訂單確認中",
                            "1" => "訂單成立",
                            "2" => "商家出貨",
                            "3" => "訂單完成",
                            "4" => "退貨處理中"
                        ];
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
                                    <th scope="col"></th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $row) : ?>
                                    <tr>
                                        <th><?= $row["order_id"] ?></th>
                                        <th><?= $row["account"] ?></th>
                                        <th><?= $row["create_time"] ?></th>
                                        <th><?= $row["total_amount"] ?></th>
                                        <td><?= $row["payment_method"] ?></td>
                                        <td><?= $paymentState[$row["payment_state"]] ?></td>
                                        <td><?= $row["payment_time"] ?></td>
                                        <td><?= $orderState[$row["order_state"]] ?></td>
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
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li class="page-item
                        <?php
                                if ($page == $i) echo "active";
                        ?>
                        "><a class="page-link" href="order-list.php?page=<?= $i ?>"><?= $i ?></a></li>
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
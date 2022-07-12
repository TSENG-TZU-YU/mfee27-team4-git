<?php
if (isset($_GET["order_id"])) {
    $order_id = $_GET["order_id"];
} else {
    echo "沒有帶資料喔";
    exit;
}
require("../db-connect.php");

$sql = "SELECT * FROM order_product_detail WHERE order_id=$order_id AND valid=1 ";

$result = $conn->query($sql);
$pageDetailCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

$inArray = array_column($rows, 'category_id');

$conn->close();
$sqlOrder = "WHERE order-list.php";
?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>訂單詳細內容</title>

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
                        <li class="breadcrumb-item" aria-current="page"><a href="order-list-detail.php?order_id=<?= $order_id ?>">訂單詳細內容</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <!-- 內容 -->
                <div class="container">
                    <h5 class="pt-3">訂單編號：<?= $order_id ?>，總共<?= $pageDetailCount ?>筆資料</h5>
                    <hr>
                    <h2 class="text-center py-2">樂器訂單記錄</h2>
                    <hr>
                    <?php if (in_array("A", $inArray)) : ?>
                        <?php foreach ($rows as $row) : ?>
                            <?php if (in_array("A", $row)) : ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">產品編號</th>
                                            <th scope="col">產品類別</th>
                                            <th scope="col">數量</th>
                                            <th scope="col">寄送地址</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows as $row) : ?>
                                            <?php if ($row["category_id"] === "A") : ?>
                                                <tr>
                                                    <td><?= $row["product_id"] ?></td>
                                                    <td><?= $row["category_id"] ?></td>
                                                    <td><?= $row["amount"] ?></td>
                                                    <td><?= $row["address"] ?></td>
                                                    <td>
                                                        <a class="col btn btn-red me-2" href="doListDetailDelete.php?order_id=<?= $order_id ?> &product_id=<?= $row["product_id"] ?>">
                                                            <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                                                            刪除
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php break; ?>
                        <?php endif;
                        endforeach; ?>
                    <?php else : ?>
                        <h5 class="text-center py-2">目前沒有紀錄</h5>
                    <?php endif; ?>

                    <h2 class="text-center py-2">課程訂單記錄</h2>
                    <hr>
                    <?php if (in_array("B", $inArray)) : ?>
                        <?php foreach ($rows as $row) : ?>
                            <?php if (array_search("B", $row)) : ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">產品編號</th>
                                            <th scope="col">產品類別</th>
                                            <th scope="col">數量</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows as $row) : ?>
                                            <?php if ($row["category_id"] === "B") : ?>
                                                <tr>
                                                    <td><?= $row["product_id"] ?></td>
                                                    <td><?= $row["category_id"] ?></td>
                                                    <td><?= $row["amount"] ?></td>
                                                    <td>
                                                        <a class="col btn btn-red me-2" href="doListDetailDelete.php?order_id=<?= $order_id ?> &product_id=<?= $row["product_id"] ?>">
                                                            <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                                                            刪除
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h5 class="text-center py-2">目前沒有紀錄</h5>
                    <?php endif; ?>
                    <h2 class="text-center py-2">場地預約記錄</h2>
                    <hr>
                    <?php if (in_array("C", $inArray)) : ?>
                        <?php foreach ($rows as $row) : ?>
                            <?php if (array_search("C", $row)) : ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">產品編號</th>
                                            <th scope="col">產品類別</th>
                                            <th scope="col">數量</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows as $row) : ?>
                                            <?php if ($row["category_id"] === "C") : ?>
                                                <tr>
                                                    <td><?= $row["product_id"] ?></td>
                                                    <td><?= $row["category_id"] ?></td>
                                                    <td><?= $row["amount"] ?></td>
                                                    <td>
                                                        <a class="col btn btn-red me-2" href="doListDetailDelete.php?order_id=<?= $order_id ?> &product_id=<?= $row["product_id"] ?>">
                                                            <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                                                            刪除
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php break; ?>
                            <?php else : ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h5 class="text-center py-2">目前沒有資料</h5>
                    <?php endif; ?>
                </div>
        </div>
        <!-- 內容 end -->

        </main>
        <!-- 主要區塊 main end-->
    </div>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>
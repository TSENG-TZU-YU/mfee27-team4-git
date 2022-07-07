<?php
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$order_id = $_GET["order_id"];
// echo $order_id;
// exit;
$category_id = $_GET["category_id"];
// echo $category_id;
// exit;

require("../db-connect.php");
$sqlAll = "SELECT * FROM order_product_detail WHERE valid=1";
$resultAll = $conn->query($sqlAll);
$detail_count = $resultAll->num_rows; //不管分類的全部

$perPage = 4;
$start = ($page - 1) * $perPage;
$sql = "SELECT * FROM order_product_detail WHERE order_id=$order_id AND valid=1 LIMIT $start,4"; //
// echo $sql;

$result = $conn->query($sql);
$pageDetailCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;
if ($endItem > $pageDetailCount) $endItem = $pageDetailCount;

$totalPage = ceil($pageDetailCount / $perPage);

// var_dump($rows);

// exit;
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
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page">xxx</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <div class="row">
                        <!-- <p class="col m-auto">第<?php // $startItem ?>-<?php // $endItem ?>筆</p> -->
                        <h5 class="col">訂單編號：<?= $order_id ?></h5>
                        <p class="col m-auto">總共<?= $pageDetailCount ?>筆資料</p>
                        <input class="col form-control me-3" type="text">
                        <a class="col-1 btn btn-green" href="#">
                            <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                            搜尋
                        </a>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <!-- <div class="row">
                        <h4 class="col">訂單編號：<?php //$order_id ?></h4>
                        <a class="col btn btn-green me-2 " href="order_list_detail.php?order_id=<?php // $order_id ?>">
                            全部記錄
                        </a>
                        <a class="col btn btn-green me-2" href="order_list_detail.php?order_id=<?php // $order_id ?>&category_id=a">
                            樂器訂單記錄
                        </a>
                        <a class="col btn btn-green me-2" href="order_list_detail.php?order_id=<?php // $order_id ?>&category_id=b">
                            課程訂單記錄
                        </a>
                        <a class="col btn btn-green me-2" href="order_list_detail.php?order_id=<?php // $order_id ?>&category_id=c">
                            場地預約紀錄
                        </a>
                    </div> -->
                    
                    <h2 class="text-center mt-3">樂器訂單記錄</h2>
                    <hr>
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
                                            <a class="col btn btn-red me-2" href="doListDetailDelete.php?product_id=<?= $row["product_id"] ?>">
                                                <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                                                刪除
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <h2 class="text-center">課程訂單記錄</h2>
                    <hr>
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
                                            <a class="col btn btn-red me-2" href="doListDetailDelete.php?product_id=<?= $row["product_id"] ?>">
                                                <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                                                刪除
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <h2 class="text-center">場地預約記錄</h2>
                    <hr>
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
                                            <a class="col btn btn-red me-2" href="doListDetailDelete.php?product_id=<?= $row["product_id"] ?>">
                                                <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                                                刪除
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>



                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li class="page-item
                        <?php
                                if ($page == $i) echo "active";
                        ?>
                        "><a class="page-link" href="order_list_detail.php?page=<?= $i ?>"><?= $i ?></a></li>
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
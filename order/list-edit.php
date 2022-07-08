<?php
if (isset($_GET["order_id"])) {
    $order_id = $_GET["order_id"];
} else {
    echo "沒有參數";
    exit;
}


require("../db-connect.php");
$sql = "SELECT * FROM order_product WHERE order_id=$order_id AND valid=1 ";

$result = $conn->query($sql);
$orderCount = $result->num_rows;

// echo $sql;
// exit;
$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
    <title>訂單修改</title>
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
                        <li class="breadcrumb-item" aria-current="page"><a href="list-edit.php?order_id=<?= $order_id ?>">修改訂單</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <!-- 內容 -->
                <div class="container">
                    <?php if ($orderCount > 0) :
                        $row = $result->fetch_assoc(); //這個要把接收到的資料拆成一筆一筆
                        // echo var_dump($row);
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
                        <div class="pt-2 pb-5 row align-items-baseline">
                            <a class="col-2 btn btn-green me-2" href="order-list.php">
                                取消修改
                            </a>
                            <h5 class="col-2">訂單編號：<?= $order_id ?></h5>
                        </div>
                        <form action="doListDetailUpdate.php" method="post">
                            <input name="order_id" type="hidden" value="<?= $row["order_id"] ?>">
                            <table class="table">
                                <tr>
                                    <th>order_id</th>
                                    <th>
                                        <?= $row["order_id"] ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Account</th>
                                    <th><?= $row["account"] ?></th>
                                </tr>
                                <tr>
                                    <th>Total_amount</th>
                                    <th><?= $row["total_amount"] ?></th>
                                </tr>
                                <tr>
                                    <th>payment_method</th>
                                    <th><?= $row["payment_method"] ?></th>
                                </tr>
                                <tr>
                                    <th>付款狀態</th>
                                    <th>
                                        <?php if ($row["payment_state"] == "0") : ?>
                                            <select class="form-select" name="paymentState">
                                                <option value="0" selected>未付款</option>
                                                <option value="1">已付款</option>
                                            </select>
                                        <?php else : ?>
                                            <input name="paymentState" type="hidden" value="<?= $row["payment_state"] ?>">
                                            <?= $paymentState[$row["payment_state"]] ?>
                                        <?php endif; ?>
                                    </th>
                                </tr>
                                <tr>
                                    <?php //已儲存時的時間為已付款時間
                                    if ($row["payment_state"] == "1") : ?>
                                        <th>付款時間</th>
                                        <th>
                                            <input name="paymentTime" type="hidden" value="<?= $row["payment_time"] ?>">
                                            <?= $row["payment_time"] ?>
                                        </th>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <th>訂單狀態</th>
                                    <th>
                                        <?php if ($row["order_state"] === "2" ||$row["order_state"] === "3" || $row["order_state"] === "4") : ?>
                                            <input name="orderState" type="hidden" value="<?= $row["order_state"] ?>">
                                            <?= $orderState[$row["order_state"]] ?>
                                        <?php else : ?>
                                            <select class="form-select" name="orderState">
                                                <?php if ($row["order_state"] === "0") : ?>
                                                    <option value="0" selected>訂單確認中</option>
                                                    <option value="1">訂單成立</option>
                                                    <option value="2">商家出貨</option>
                                                <?php endif; ?>
                                                <?php if ($row["order_state"] === "1") : ?>
                                                    <option value="1" selected>訂單成立</option>
                                                    <option value="2">商家出貨</option>
                                                <?php endif; ?>
                                            </select>
                                        <?php endif; ?>
                                    </th>
                                </tr>

                            </table>
                            <div class="py-2">
                                <button class="btn btn-green me-2" type="submit">儲存</button>
                            </div>
                        </form>
                    <?php else : ?>
                        沒有該使用者
                    <?php endif; ?>
                </div>
        </div>
        <!-- 內容 end -->

        </main>
        <!-- 主要區塊 main end-->
    </div>
</body>

</html>
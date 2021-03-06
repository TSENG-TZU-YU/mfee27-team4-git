<?php
session_start();
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
$row = $result->fetch_assoc();

$sqlPayState = "SELECT * FROM pay_state";
$resultPayState = $conn->query($sqlPayState);
$payStaterows = $resultPayState->fetch_all(MYSQLI_ASSOC);
$payStateCount = $resultPayState->num_rows;

$sqlOrderState = "SELECT * FROM state";
$resultOrderState = $conn->query($sqlOrderState);
$orderStaterows = $resultOrderState->fetch_all(MYSQLI_ASSOC);
$orderStateCount = $resultOrderState->num_rows;

$sqlPayMethod = "SELECT * FROM pay_by";
$resultPayMethod = $conn->query($sqlPayMethod);
$payMethodrows = $resultPayMethod->fetch_all(MYSQLI_ASSOC);
$payMethodCount = $resultPayMethod->num_rows;

$conn->close();
$sqlOrder = "WHERE order-list.php";
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
                        <li class="breadcrumb-item"><a href="../home.php">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="order-list.php">訂單管理</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="list-edit.php?order_id=<?= $order_id ?>">修改訂單</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <!-- 內容 -->
                <div class="container">
                    <?php if ($orderCount > 0) :
                        $listPage = $_SESSION["page"];
                        $orderType = $_SESSION["orderType"];
                        // echo $orderType;
                        // echo "<br>";
                    ?>
                        <div class="pt-2 pb-5 row align-items-baseline">
                            <a class="col-1 btn btn-green me-2" href="order-list.php?page=<?= $listPage ?><?php
                                                                                                            if ($orderType == "&order=1") echo "&order=1";
                                                                                                            if ($orderType == "&order=2") echo "&order=2";
                                                                                                            if ($orderType == "payment_method=1 AND") echo "&payment=1";
                                                                                                            if ($orderType == "payment_method=2 AND") echo "&payment=2";
                                                                                                            if ($orderType == "payment_state=1 AND") echo "&payment=3";
                                                                                                            if ($orderType == "payment_state=2 AND") echo "&payment=4";
                                                                                                            ?>">
                                <img class="bi pe-none mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>返回
                            </a>
                            <h5 class="col-2">訂單編號：<?= $order_id ?></h5>
                        </div>
                        <form action="doListDetailUpdate.php" method="post">
                            <input name="order_id" type="hidden" value="<?= $row["order_id"] ?>">
                            <table class="table">
                                <tr>
                                    <th>訂單編號</th>
                                    <td>
                                        <?= $row["order_id"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>會員帳號</th>
                                    <td><?= $row["account"] ?></td>
                                </tr>
                                <tr>
                                    <th>訂單總金額</th>
                                    <td><?= $row["total_amount"] ?></td>
                                </tr>
                                <tr>
                                    <th>結帳方式</th>
                                    <td> <select class="form-select" name="payMethod" id="">
                                            <?php for ($i = 0; $i < $payMethodCount; $i++) : ?>
                                                <option value="<?= $payMethodrows[$i]["id"] ?>" <?php
                                                                                                if ($payMethodrows[$i]["id"] === $row["payment_method"]) echo "selected"; ?>><?= $payMethodrows[$i]["name"] ?></option>
                                            <?php endfor; ?>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>付款狀態</th>
                                    <td>
                                        <?php
                                        if ($row["payment_state"] == "1") : ?>
                                            <select class="form-select" name="paymentState">
                                                <?php for ($i = 0; $i < $payStateCount - 1; $i++) : //-1 先不讓退款顯示
                                                ?>
                                                    <option value="<?= $payStaterows[$i]["id"] ?>" <?php
                                                                                                    if ($payStaterows[$i]["id"] === $row["payment_state"]) echo "selected"; ?>><?= $payStaterows[$i]["name"] ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        <?php else : ?>
                                            <input name="paymentState" type="hidden" value="<?= $row["payment_state"] ?>">
                                            <?= $payStaterows[$row["payment_state"] - 1]["name"] //-1因為索引
                                            ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <?php //儲存時的時間為已付款時間
                                    if ($row["payment_state"] == "2") : ?>
                                        <th>付款時間</th>
                                        <td>
                                            <input name="paymentTime" type="hidden" value="<?= $row["payment_time"] ?>">
                                            <?= $row["payment_time"] ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <th>訂單狀態</th>
                                    <td>
                                        <?php if ($row["order_state"] === "3" || $row["order_state"] === "4" || $row["order_state"] === "5") : ?>
                                            <input name="orderState" type="hidden" value="<?= $row["order_state"] ?>">
                                            <?= $orderStaterows[$row["order_state"] - 1]["name"] ?>
                                        <?php else : ?>
                                            <select class="form-select" name="orderState">
                                                <?php
                                                if ($row["order_state"] === "1") :
                                                    for ($i = 0; $i < $orderStateCount - 2; $i++) :
                                                ?>
                                                        <option value="<?= $orderStaterows[$i]["id"] ?>" <?php
                                                                                                            if ($orderStaterows[$i]["id"] === $row["order_state"]) echo "selected"; ?>><?= $orderStaterows[$i]["name"] ?></option>
                                                <?php endfor;
                                                endif; ?>
                                                <?php if ($row["order_state"] === "2") :
                                                    for ($i = 1; $i < $orderStateCount - 2; $i++) :
                                                ?>
                                                        <option value="<?= $orderStaterows[$i]["id"] ?>" <?php
                                                                                                            if ($orderStaterows[$i]["id"] === $row["order_state"]) echo "selected"; ?>><?= $orderStaterows[$i]["name"] ?></option>
                                                <?php endfor;
                                                endif; ?>
                                            </select>
                                        <?php
                                        endif; ?>
                                    </td>
                                </tr>

                            </table>
                            <div class="py-2">
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-green me-2" type="submit">儲存</button>
                                    <a class=" btn btn-red me-2" href="doListDelete.php?order_id=<?= $row["order_id"] ?>">
                                        <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>刪除</a>
                                </div>
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
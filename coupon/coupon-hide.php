<?php


require("../db-connect.php");

session_start();

if (!isset($_GET["id"])) {
    echo "沒有參數";
    exit;
}




$id = $_GET["id"];



$sql = "SELECT coupon.id, users. * FROM coupon
 JOIN users ON coupon.coupon_c = users.coupon  WHERE coupon.id=$id ";
$result = $conn->query($sql);
$couponCount = $result->num_rows;
$rows = $result->fetch_All(MYSQLI_ASSOC);







$sqlAll = "SELECT * FROM coupon WHERE id=$id AND shelf=1";
$resultAll = $conn->query($sqlAll);
$couponCountAll = $resultAll->num_rows;






if (!isset($_GET["id"])) {
    echo "沒有參數";
    exit;
}
$id = $_GET["id"];

require("../db-connect.php");
$sql = "SELECT * FROM coupon WHERE id=$id AND shelf=0  ";

$result = $conn->query($sql);
// $couponCount = $result->num_rows;



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
    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../style.css">
    </link>
    <style>
        .panel {
            width: 800px;

        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex">

            <!-- 導覽列 nav -->
            <?php require("../nav.php"); ?>
            <!-- 導覽列 nav end -->

            <main class="col-10 px-5 py-4">

                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="coupons-hide.php">使用中優惠卷列表</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="#">優惠卷</a></li>
                    </ol>
                </biv>

                <div class="container">
                    <div class=" d-flex justify-content-center align-items-center mt-4">
                        <?php if ($couponCountAll > 0) :
                            $row = $resultAll->fetch_assoc(); ?>
                            <form action="doUpdate.php" method="post">
                                <input name="id" type="hidden" value="<?= $row["id"] ?>">
                                <table class="table mt-5 panel">
                                    <thead>
                                        <tr>

                                            <th scope="col">編號</th>
                                            <td>
                                                <?= $row["id"] ?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th scope="col">優惠券名稱</th>
                                            <td>
                                                <?= $row["name"] ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="col-2">序號</th>
                                            <td>
                                                <?= $row["number"] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">折扣</th>
                                            <td>
                                                <?= $row["discount"] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">日期</th>
                                            <td>
                                                <?= $row["dateline"] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">使用次數</th>
                                            <td>
                                                <?= $row["several_times"] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">最低金額</th>
                                            <td>
                                                <?= $row["min_price"] ?></td>
                                        <tr>
                                            <th scope="col">建立時間</th>
                                            <td>
                                                <?= $row["create_time"] ?></td>


                                    </thead>
                                </table>

                                <?php if ($couponCount> 0) : ?>
                                    <table class="table panel  ">
                                        <thead>
                                            <?php foreach ($rows as $row) : ?>
                                                <ul class="list-group list-group-flush  text-center">
                                                    <li class="list-group-item panel2  "><?= $row["id"] ?>.<?= $row["name"] ?>&nbsp;&nbsp; 帳號 : <?= $row["account"] ?>
                                                        &nbsp;&nbsp;email : <?= $row["email"] ?></li>
                                                </ul>

                                            <?php endforeach; ?>
                                    </table>
                                    </thead>


                                <?php else : ?>
                                    <p class="text-center">此優惠卷任何會員都能擁有</p>
                                <?php endif; ?>




                                <div class="d-flex justify-content-center align-items-center mt-4">
                             
                                    <a class=" btn btn-grey me-3" href="coupons-hide.php">
                                        <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                        返回上一頁
                                    </a>
                                </div>

                            <?php else : ?>
                                沒有該使用者
                            <?php endif; ?>
                    </div>

                    </form>







</body>

</html>
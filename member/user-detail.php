<?php
require("../db-connect.php");

$sqlMember  = "WHERE member.users.php";

session_start();
if (!isset($_GET["id"])) {
    echo "沒有參數";
    exit;
}
if (!isset($_GET["name"])) {
    echo "沒有參數";
    exit;
}


$id = $_GET["id"];
$name = $_GET["name"];
$sql = "SELECT * FROM users WHERE id=$id AND valid=1";
$result = $conn->query($sql);
$userCount = $result->num_rows;
$row = $result->fetch_assoc();



?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>後台系統</title>

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
            height: 400px;
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
                        <li class="breadcrumb-item"><a href="http://localhost/mfee27-team4-git/member/users.php">會員管理</a></li>
                        <li class="breadcrumb-item" aria-current="page">詳細</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>



                <div class="container">

                    <!-- 按鈕 -->
                    <div class="row mt-5">
                        <!-- 文字按鈕 -->
                        <a class="col-1 btn btn-green mx-3" href="users.php">
                            <img class="bi pe-none mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                            返回
                        </a>
                        <a class="col-1 btn btn-grey mx-3" href="user-coupon.php?id=<?= $row["id"] ?>&name=<?= $row["name"] ?>">
                            <!-- <img class="bi pe-none mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img> -->
                            優惠券
                        </a>



                    </div>
                    <!-- 按鈕 end-->

                </div>
                <div class="container mt-5  ">
                    <?php if ($userCount > 0) :
                        $row;
                    ?>
                        <div class="d-flex justify-content-center">
                            <table class="table table-bordered panel">
                                <tr>
                                    <th>會員編號</th>
                                    <td><?= $row["id"] ?></td>
                                </tr>
                                <tr>
                                    <th>會員姓名</th>
                                    <td><?= $row["name"] ?></td>
                                </tr>
                                <tr>
                                    <th>會員帳號</th>
                                    <td><?= $row["account"] ?></td>
                                </tr>
                                <tr>
                                    <th>會員密碼</th>
                                    <td><?= $row["password"] ?></td>
                                </tr>
                                <tr>
                                    <th>會員性別</th>
                                    <td><?php if ($row["gender"] == 1) {
                                            echo $sex = "男";
                                        } else {
                                            echo $sex = "女";
                                        } ?></td>
                                </tr>
                                <tr>
                                    <th>會員生日</th>
                                    <td><?= $row["birthday"] ?></td>

                                </tr>
                                <tr>
                                    <th>會員電話</th>
                                    <td><?= $row["phone"] ?></td>
                                </tr>
                                <tr>
                                    <th>會員郵件</th>
                                    <td><?= $row["email"] ?></td>
                                </tr>
                                <tr>
                                    <th>會員地址</th>
                                    <td><?= $row["address"] ?></td>
                                </tr>
                                <tr>
                                    <th>註冊時間</th>
                                    <td><?= $row["create_time"] ?></td>
                                </tr>
                            </table>

                        </div>

                    <?php else : ?>
                        沒有該使用者
                    <?php endif; ?>
                    <div class="py-2  ">
                        <div class="d-flex justify-content-center">
                            <a class="col-1 btn btn-khak me-3" href="user-edit.php?id=<?= $id ?>&name=<?=$name?>">
                                <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                修改
                            </a>
                            <a class="col-1 btn btn-red  me-3" href="javascript:if (confirm('是否確定刪除會員？')) location.href='doDelete.php?id=<?=$row['id']?>'">
                                <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                刪除
                            </a>
                        </div>
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
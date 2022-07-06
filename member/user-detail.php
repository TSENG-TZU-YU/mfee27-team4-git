<?php
require("../db-connect.php");

$sqlWhere = "WHERE member.users.php";
session_start();

$id = $_GET["id"];
$sql = "SELECT * FROM users WHERE id=$id AND valid=1";
$result = $conn->query($sql);
$userCount = $result->num_rows;

// $rows=$result->fetch_all(MYSQLI_ASSOC);
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
                    <div class="row ">
                        <!-- 文字按鈕 -->
                        <a class="col-1 btn btn-green mx-3" href="users.php">
                            <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                            返回
                        </a>
                        <a class="col-1 btn btn-grey me-3" href="black-list.php">
                            <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                            訂單修改
                        </a>


                    </div>
                    <!-- 按鈕 end-->

                </div>
                <div class="container mt-5">
                    <?php if ($userCount > 0) :
                        $row = $result->fetch_assoc();
                    ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>id</th>
                                <td><?= $row["id"] ?></td>
                            </tr>
                            <tr>
                                <th>Account</th>
                                <td><?= $row["account"] ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?= $row["name"] ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= $row["phone"] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $row["email"] ?></td>
                            </tr>
                            <tr>
                                <th>Create Time</th>
                                <td><?= $row["create_time"] ?></td>
                            </tr>
                        </table>
                        <div class="py-2  ">
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-info" href="user-edit.php?id=<?= $row["id"] ?>">修改</a>
                                <a class="btn btn-danger " href="doDelete.php?id=<?= $row["id"] ?>">刪除</a>
                            </div>

                        </div>
                    <?php else : ?>
                        沒有該使用者
                    <?php endif; ?>
                </div>

                <!-- 頁碼 -->
                <div aria-label="Page navigation example text-end " class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
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
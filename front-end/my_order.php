<?php
require("../db-connect.php");
session_start();

if (!isset($_SESSION["front_user"])) {
    header("location: front_login.php");
}

$user_id = $_SESSION["front_user"]["id"];
$sql = "SELECT order_product.*,state.name AS order_state ,pay_state.name AS payment_state,pay_by.name AS payment_method,  users.id, users.name FROM order_product 
    JOIN state ON order_product.order_state = state.id
    JOIN pay_state ON order_product.payment_state = pay_state.id 
    JOIN pay_by ON order_product.payment_method = pay_by.id
    JOIN users ON order_product.account = users.account
    WHERE users.id = $user_id";

// $sql="SELECT order_product.*, users.id, users.name FROM order_product 
//     JOIN users ON order_product.account = users.account 
//     WHERE users.id = $user_id";
// print_r($sql);
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="zh-tw">

<head>
    <title>HAMAYA MUSIC</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="zh-tw" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        article img {
            max-width: 100%;
        }

        .avatar {
            width: 80px;
            height: 80px;
            /* background: #aaa; */
        }

        .breadcrumb a {
            text-decoration: none;
        }

        .object-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .reply-state {
            width: 45px;
            height: 30px;
            /* background: red; */
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            font-size: 13px;
            right: -35px;
            top: -9px;
            border-radius: 15px;
        }

        .content {
            min-height: 700px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <header class="py-3">
            <h1 class="mx-3">HAMAYA MUSIC</h1>
        </header>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="front_index.php">??????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_qna_table.php">???????????????</a>
                    </li>
                </ul>
            </div>
            <?php if (isset($_SESSION["front_user"])) : ?>
                Hello!! <?= $_SESSION["front_user"]["name"] ?><a href="doLogut.php" class="btn btn-outline-info mx-3">??????</a>
            <?php else : ?>
                <a href="front_login.php" class="btn btn-outline-info">????????????</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-3">
            <main class="<?php if (isset($_SESSION["front_user"])) {
                                echo "col-md-10";
                            } else {
                                echo "col-md";
                            } ?>">
                <article class="content">
                    <h1><?= $_SESSION["front_user"]["name"] ?>?????????</h1>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col" class="text-nowrap">????????????</th>
                                <th scope="col" class="text-nowrap">????????????</th>
                                <th scope="col" class="text-nowrap">????????????</th>
                                <th scope="col" class="text-nowrap">????????????</th>
                                <th scope="col" class="text-nowrap">?????????</th>
                                <th scope="col" class="text-nowrap">????????????</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $row) : ?>
                                <tr>
                                    <th class="text-nowrap"><?= $row["order_id"] ?> </th>
                                    <td class="text-nowrap"><?= $row["order_state"] ?></td>
                                    <td class="text-nowrap"><?= $row["payment_state"] ?></td>
                                    <td class="text-nowrap"><?= $row["payment_method"] ?></td>
                                    <td class="text-nowrap"><?= $row["total_amount"] ?></td>
                                    <td class="text-nowrap"><?= $row["create_time"] ?></td>
                                    <form action="qna_table.php" method="post">
                                        <td class="text-nowrap">
                                            <button class="btn bg-light-green-color me-2" type="submit">
                                                <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                                ????????????
                                            </button>
                                            <?php
                                            $order_id = $row["order_id"];
                                            $sqlQna = "SELECT * FROM order_qna WHERE order_id = '$order_id'";
                                            $resultQna = $conn->query($sqlQna);
                                            $sqlCount = $resultQna->num_rows;
                                            $rowQna = $resultQna->fetch_assoc();
                                            ?>
                                            <?php if ($sqlCount > 0) : ?>
                                                <button class="btn btn-green me-2 position-relative" type="submit">
                                                    <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                                    ????????????
                                                    <span class="reply-state <?php if ($rowQna["user_reply_state"] == "?????????") {
                                                                                    echo "bg-danger";
                                                                                } else {
                                                                                    echo "bg-success";
                                                                                } ?>"><?= $rowQna["user_reply_state"] ?></span>
                                                </button>

                                            <?php else : ?>
                                                <button class="btn btn-red me-2" type="submit">
                                                    <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                                    ????????????
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                        <input type="hidden" name="sqlCount" value="<?= $sqlCount ?>">
                                        <input type="hidden" name="order_id" value="<?= $row["order_id"] ?>">
                                        <input type="hidden" name="user_id" value="<?= $row["id"] ?>">
                                        <input type="hidden" name="name" value="<?= $row["name"] ?>">
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </article>
            </main>
            <?php if (isset($_SESSION["front_user"])) : ?>
                <aside class="col-md-2">
                    <div class="sticky-top">
                        <h3 class="border-start border-5 border-info ps-2 py-1 ">????????????</h3>
                        <div class="list-group list-group-flush">
                            <a href="my_order.php" class="list-group-item list-group-item-action" aria-current="true">
                                ????????????
                            </a>
                            <a href="my_qna.php" class="list-group-item list-group-item-action" aria-current="true">
                                ????????????
                            </a>
                        </div>
                    </div>
                </aside>
            <?php endif; ?>
        </div>
    </div>
    <footer class="text-center py-4 bg-green-color text-light">Designed by mfee27-team4 2022 </footer>
</body>

</html>
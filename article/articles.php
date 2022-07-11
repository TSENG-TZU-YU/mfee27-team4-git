<?php
// 連結資料庫
require("../db-connect.php");


// 抓文章資料
$sqlAll = "SELECT * FROM article WHERE id AND valid=1";
$resultAll = $conn->query($sqlAll);
$rows = $resultAll->fetch_all(MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>文章管理</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../style.css">
    </link>
    <style>
        .ellipsis {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            white-space: normal;
            text-align: justify;
        }

        /* 淺藍色按鈕 */
        .btn-blue,
        .btn-blue:focus {
            background: #4a81b0;
            border-color: #4a81b0;
            color: #fff;
        }

        .btn-blue:hover,
        .btn-blue:active:hover {
            background: #4075a2;
            border-color: #4075a2;
            color: #fff;
        }
    </style>


</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex">

            <!-- 導覽列 nav -->
            <!-- 導覽列 nav end -->


            <!-- 主要區塊 main -->
            <main class="col-10 px-5 py-4">

                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page">文章管理</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <hr>
                <div class="container">
                    <div class="row">
                        <form action="teacher-search.php" method="get">
                            <div class="row">
                                <p class="col-8 m-auto">本頁 筆資料，總共 筆資料</p>
                                <input class="col form-control me-3" type="text" name="search">
                                <button class="col-1 btn btn-green" type="submit">
                                    <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                                    搜尋
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>

                <!-- 內容 -->
                <div class="container">
                    <!-- 按鈕 -->
                    <div class="d-flex justify-content-between">
                        <div class="col">
                            <a class="col btn btn-green me-2" href="article-create.php">
                                <img class="mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                                新增文章
                            </a>
                        </div>
                        <!-- 排序、篩選按鈕 -->
                        <div class="col d-flex justify-content-end">
                            <!-- 教學領域篩選 -->
                            <form class="d-flex" action="teachers.php" method="get">
                                <select class="col form-select me-2" aria-label="Default select example" name="fieldOrder">
                                    <option selected selected value="">教學領域</option>
                                    <?php foreach ($fieldOrderArray as $rowOrderArray) : ?>
                                        <option value="<?= $rowOrderArray ?>"><?= $rowOrderArray ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button class="btn btn-grey" type="submit">
                                    篩選
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-3 mt-1">
                        <?php foreach ($rows as $row) : ?>
                            <div class="col">
                                <div class="card h-80">
                                    <img src="../images/<?= $row["image"] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="article.php?id=<?= $row["id"] ?>">
                                            <h5 class="card-title fw-bold"><?= $row["title"] ?> &raquo;</h5>
                                        </a>
                                        <p class="ellipsis card-text mt-1"><?= $row["content"] ?></p>
                                        <p class="card-text mt-1" style="color:#a79a7e;">建立時間：<?= date("Y年m月d日 H:i", strtotime($row["creation_date"])) ?></p>
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-sm mt-2
                                            <?php switch ($row["category"]) {
                                                case '產品資訊':
                                                    echo "btn-green";
                                                    break;
                                                case '活動快訊':
                                                    echo "btn-blue";
                                                    break;
                                                case '音樂教育':
                                                    echo "btn-grey";
                                                    break;
                                                case '重要通知':
                                                    echo "btn-red";
                                                    break;
                                            }
                                            ?>" style="cursor: inherit; ">
                                                <?= $row["category"] ?>
                                            </button>
                                            <a class="btn btn-khak btn-sm mt-2" type="button" href="article-edit.php?id=<?= $row["id"] ?>">
                                                <img class="mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                                修改
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example text-end" class="d-flex mt-5  justify-content-center">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- 頁碼 end -->
                </div>
                <!-- 內容 end -->


            </main>
            <!-- 主要區塊 main end-->
        </div>
    </div>

    <!-- jQuery CDN – Latest Stable Versions -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries end -->

    <!-- <script>
        $(function() {

            //預覽上傳圖片
            $('#upload').change(function() {
                var f = document.getElementById('upload').files[0];
                var src = window.URL.createObjectURL(f);
                document.getElementById('preview').src = src;
            });

        });
    </script> -->

</body>

</html>
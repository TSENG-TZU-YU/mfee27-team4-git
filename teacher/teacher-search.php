<?php
// 連結資料庫
require("../db-connect.php");

//search
if (!isset($_GET["search"])) {
    $search = " ";
    $teacherCount = 0;
    $teacherRows = [];
} else {
    $search = $_GET["search"];
    $sqlAll = "SELECT * FROM teacher  WHERE id LIKE '%$search%' || name LIKE '%$search%' || profile LIKE '%$search%' AND valid=1";
    $resultAll = $conn->query($sqlAll);
    $teacherCount = $resultAll->num_rows;
    $teacherRows = $resultAll->fetch_all(MYSQLI_ASSOC);
}

// 抓課程商品資料
$sqlCourseProduct = "SELECT * FROM course_product WHERE id AND valid=1";
$resultCourseProduct = $conn->query($sqlCourseProduct);
$CourseProductRows = $resultCourseProduct->fetch_all(MYSQLI_ASSOC);




?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>師資管理</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../style.css">
    </link>
    <style>
        .object-cover {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

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
                        <li class="breadcrumb-item" aria-current="page">師資管理</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <div class="row">
                        <form action="teacher-search.php" method="get">
                            <div class="row">
                                <p class="col-8 m-auto">總共 <?= $teacherCount ?> 筆資料</p>
                                <input class="col form-control me-3" type="text" name="search" value="搜尋 <?= $search ?>">
                                <button class="col-1 btn btn-green" type="submit">
                                    <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                                    搜尋
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <!-- 按鈕 -->
                    <div class="d-flex justify-content-between">
                        <div class="col">
                            <a class="col btn btn-green me-2" href="teacher-create.php">
                                <img class="mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                                新增師資
                            </a>
                        </div>
                        <div class="me-3">
                            篩選 :
                        </div>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="field">
                                <option selected value="0">教授課程師資</option>
                                <?php foreach ($CourseProductRows as $row) : ?>
                                    <option value="<?= $row["id"] ?>"><?= $row["course_name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">編號</th>
                                <th scope="col">師資照片</th>
                                <th scope="col">師資姓名</th>
                                <th scope="col">教學領域</th>
                                <th scope="col">教授課程</th>
                                <th scope="col" width="350">師資簡介</th>
                                <th scope="col">管理操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 撈每一筆資料 -->
                            <?php foreach ($teacherRows as $row) : ?>
                                <tr>
                                    <td><?= $row["id"] ?></td>
                                    <td><img class="object-cover  rounded" src="
                        <?php if (empty($row["image"])) {
                                    // 如果沒有照片就顯示頭像icon
                                    echo "../images/img-icon.svg";
                                } else {
                                    // 如果有照片就顯示上傳的照片
                                    $teacherImage = $row["image"];
                                    echo "../images/$teacherImage";
                                }
                        ?>
                        "></td>
                                    <td><?= $row["name"] ?></td>
                                    <td>
                                        <?php
                                        switch ($row["field"]) {
                                            case '1':
                                                echo "琴鍵類音樂";
                                                break;
                                            case '2':
                                                echo "弦樂類音樂";
                                                break;
                                            case '3':
                                                echo "管樂類音樂";
                                                break;
                                            case '4':
                                                echo "熱音類音樂";
                                                break;
                                            case '5':
                                                echo "其他類音樂";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $coursesArray = explode(",", $row["courses"]);
                                        foreach ($coursesArray as $key => $value) :
                                            $sqlCourseName = "SELECT course_name FROM course_product WHERE id=$value";
                                            $resultCourseName = $conn->query($sqlCourseName);
                                            $rowsCourseName = $resultCourseName->fetch_array(MYSQLI_ASSOC);
                                        ?>
                                            <div>
                                                <?= $rowsCourseName["course_name"]; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                    <td align="left">
                                        <p class="ellipsis">
                                            <?= $row["profile"] ?>
                                        </p>
                                    </td>
                                    <td>
                                        <a class="btn btn-grey me-3" type="button" href="teacher.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                            詳細
                                        </a>
                                        <a class="btn btn-khak" type="button" href="teacher-update.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                            修改
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if ($teacherCount > 0) : ?>
                                <tr>
                                <?php else : ?>
                                    <td colspan="7">
                                        <?= "沒有符合條件的結果" ?>
                                    </td>
                                <?php endif; ?>
                                </tr>
                        </tbody>
                        <!-- 撈每一筆資料 -->
                    </table>

                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example text-end" class="d-flex mt-5  justify-content-center">
                        <ul class="pagination">
                            <li class="page-item">
                                <!-- <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a> -->
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <!-- <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a> -->
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


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>
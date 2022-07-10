<?php
if (isset($_POST["name"])) {
    // 如果沒抓到name(師資姓名)資料
    echo "<script>alert('沒有輸入師資姓名'); location.href = 'teachers-index.php'; </script>";
    exit;
}
$id = $_GET["id"];

require_once("../db-connect.php");

// 抓師資資料
$sqlAll = "SELECT * FROM teacher WHERE id=$id AND valid=1";
$resultAll = $conn->query($sqlAll);
$teacherCount = $resultAll->num_rows;



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
            width: 100%;
            object-fit: cover;
        }

        .iframe-cover {
            height: 300px;
            width: 100%;
            object-fit: cover;
        }

        .text-align-justify {
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
                        <li class="breadcrumb-item"><a href="teachers.php">師資管理</a></li>
                        <li class="breadcrumb-item" aria-current="page">師資詳細資料</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>
                <p><?php ?></p>
                <!-- 內容 -->
                <div class="container">
                    <h3>師資詳細資料</h3>
                    <hr>
                    <?php if ($teacherCount > 0) :
                        $row = $resultAll->fetch_assoc();
                    ?>
                        <div class="row">
                            <div class="col-3">

                                <img class="img-fluid rounded object-cover mb-3 iframe-cover" id="preview" src="
                 <?php if (empty($row["image"])) {
                            // 如果沒有照片就顯示頭像icon
                            echo "../images/img-icon.svg";
                        } else {
                            // 如果有照片就顯示上傳的照片
                            $teacherImage = $row["image"];
                            echo "../images/$teacherImage";
                        } ?>
              " style="height: 250px;">
                            </div>
                            <div class="col-9 m-auto">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>師資編號</th>
                                            <td align="left">
                                                <?= $row["id"] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>師資姓名</th>
                                            <td align="left">
                                                <?= $row["name"] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="120">教學領域</th>
                                            <td align="left">
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
                                        </tr>
                                        <tr>
                                            <th>教授課程</th>
                                            <td align="left">
                                                <?php
                                                $coursesArray = explode(",", $row["courses"]);
                                                foreach ($coursesArray as $key => $value) :
                                                    $sqlCourseName = "SELECT course_name FROM course_product WHERE id=$value";
                                                    $resultCourseName = $conn->query($sqlCourseName);
                                                    $rowsCourseName = $resultCourseName->fetch_array(MYSQLI_ASSOC);
                                                ?>
                                                    <?= $rowsCourseName["course_name"];
                                                    " "; ?>
                                                <?php endforeach; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>師資簡介</th>
                                            <td colspan="2" align="left" class="text-align-justify">
                                                <div><?= $row["profile"] ?></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>表演作品</th>
                                            <td colspan="2">
                                                <div class="img-fluid rounded p-1">
                                                    <iframe class="img-fluid rounded iframe-cover" src="<?= $row["video"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex mb-3">
                                    <div class="p-2">
                                        <a class="btn btn-green  me-2" href="teachers.php">
                                            <img class="mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                                            返回列表
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <a class="btn btn-khak" type="button" href="teacher-update.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                            修改
                                        </a>
                                    </div>
                                    <div class="ms-auto p-2">
                                        <a class="btn btn-red" href="teacher-doDelete.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                                            刪除
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            <?php else : ?>
                <?= "<script>alert('沒有師資資料'); location.href = 'teachers-index.php'; </script>"; ?>
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
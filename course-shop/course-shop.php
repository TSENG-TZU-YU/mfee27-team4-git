<?php

require("../db-connect.php");
$sqlCourse= "WHERE course-shop.php";
session_start();

// 篩選
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}


if (isset($_GET["catestring"])) {
    $catestring = $_GET["catestring"];
} else {
    $catestring = "";
}

if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $sqlsearch = "name LIKE '%$search%' AND";
} else {
    $search = "";
    $sqlsearch = "";
}



switch($catestring) {
    case 1 :
        $category="";
    break;
    case 2 :
        $category="cate='成人課程' AND";
    break;
    case 3 :
        $category="cate='兒童課程' AND";
    break;
    default : 
        $category="" ;
    break;
}


//page
$sqlAll = "SELECT * FROM course_product WHERE  $category $sqlsearch valid=1 ";
$resultAll = $conn->query($sqlAll);
$courseCount = $resultAll->num_rows;

$perPage = 6;
$startPage = ($page - 1) * $perPage;
$sql = "SELECT * FROM course_product WHERE  $category $sqlsearch valid=1 LIMIT $startPage ,$perPage";

$result = $conn->query($sql);
$pagecourseCount = $resultAll->num_rows;

$startItem = ($page - 1) * $perPage;
$endItem = $page * $perPage;

if ($endItem > $courseCount) $endItem = $courseCount;
$totalPage = ceil($courseCount / $perPage);


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
            <?php require("../nav.php");  ?>
            <!-- 導覽列 nav end -->

            <!-- 主要區塊 main -->
            <main class="col-10 px-5 py-4">

                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page">課程商城</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <form action="course-shop.php" method="get" class="">
                    <div class="row">
                        <p class="col-8 m-auto">總共 <?=$courseCount?>筆資料</p>
                        <input class="col form-control me-2" type="text" name="search">
                        <button class="col-1 btn btn-green" type="submit">
                            <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                            搜尋
                        </button>
                    </div>
                    </form>
                </div>
                <hr>
                <div class="container">
                    <form action="" name="form1">
                        <div class="row">
                            <div class="col-5">
                                <div class="d-flex">
                                    <a class="btn btn-green me-2 text-nowrap" href="creat-course.php">
                                        <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                                        新增
                                    </a>
                                    <select onchange="cateSelect()" name="catestring" id="" class="form-control ">
                                        <option <?php if($catestring==1) echo "selected";?> value="1">全部課程</option>
                                        <option <?php if($catestring==2) echo "selected";?> value="2">成人課程</option>
                                        <option <?php if($catestring==3) echo "selected";?> value="3">兒童課程</option>
                                    </select>
                             
                                </div>
                            </div>
                            <div class="col-4"></div> 
                            <div class="col-3 ps-5">
                                <button class=" btn btn-green me-2 ms-5" onclick="up()">
                                    批次上架
                                </button>
                                <button class=" btn btn-red me-2" onclick="down()">
                                    批次下架
                                </button>
                            </div>
                        </div>
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">勾選</th>
                                    <th scope="col">課程編號</th>                            
                                    <th scope="col">課程類別</th>
                                    <th scope="col">地點</th>
                                    <th scope="col">課程名稱</th>
                                    <th scope="col">指導老師</th>
                                    <th scope="col">庫存</th>
                                    <th scope="col">定價</th>
                                    <th scope="col">開始時間</th>
                                    <th scope="col">結束時間</th>
                                    <th scope="col">上架狀態</th>
                                    <th scope="col">功能</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //把資料轉換成關聯式陣列
                                while($row = $result->fetch_assoc()):  ?>
                                <tr>
                                    <th><input type="checkbox" name="arryid[]" value="<?=$row["id"]?>"></th>
                                    <td><?=$row["product_id"]?></td>                               
                                    <td><?=$row["cate"]?></td>
                                    <td><?=$row["location"]?></td>
                                    <td><?=$row["name"]?></td>
                                    <td>
                                        <?php 
                                        $course= $row["name"];
                                        $sqlSelt="SELECT course_teacher.* ,teacher.name AS tName ,course_product.name AS cName FROM course_teacher 
                                        JOIN teacher ON course_teacher.teacher_id = teacher.id
                                        JOIN course_product ON course_teacher.course = course_product.id  
                                        WHERE course_product.name = '$course'";
                                        $resultSelt = $conn->query($sqlSelt);
                                        $rowsSelt= $resultSelt->fetch_all(MYSQLI_ASSOC);
                                        foreach ($rowsSelt AS $rowSelt){
                                            echo "<p>".$rowSelt["tName"]."</p>";
                                        }
                                        ?>                                     
                                    </td>
                                    <td><?=$row["stock"]?></td>
                                    <td><?=$row["price"]?></td>
                                    <td><?=date('Y-m-d', strtotime($row["begin_date"]));?></td>
                                    <td><?=date('Y-m-d', strtotime($row["over_date"]));?></td>
                                    <td>
                                        <?php if($row["state"]==1):?>
                                            <a class="btn btn-green mx-0 px-4" type="button" href="downstate-course.php?id=<?=$row["id"]?>">
                                                上架
                                            </a>
                                                <?php else: ?>
                                            <a class="btn btn-red me-0 px-4" type="button" href="dostate-course.php?id=<?=$row["id"]?>">
                                                下架
                                            </a>
                                        <?php endif ; ?>
                                    </td>
                                    <td>                 
                                        <a class="btn btn-khak" type="button" id="show" href="course-detail.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                            詳細
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </form> 
                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                        <li class="page-item ">
                        <a class="page-link <?php if ($page == $i) echo "active"; ?>" href="course-shop.php?page=<?= $i ?>"><?= $i ?></a>
                        </li>
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
    
  

    <script>
        function up(){
        document.form1.action="batchstate-course.php";
        document.form1.submit();
                }
        function down(){
        document.form1.action="batchdownstate-course.php";
        document.form1.submit();
                }
        function cateSelect(){
        document.form1.action="course-shop.php";
        document.form1.submit();
                }
    </script>

    
</body>

</html>
<?php

require("../db-connect.php");
$sqlIns= "WHERE ins-shop.php";
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
        $category="cate='電鋼琴' AND";
    break;
    case 2 :
        $category="cate='木吉他' AND";
    break;
    case 3 :
        $category="cate='電吉他' AND";
    break;
    case 4 :
        $category="cate='電貝斯' AND";
    break;
    case 5 :
        $category="cate='電子鼓' AND";
    break;
    default : 
        $category="" ;
    break;
}




//page
$sqlAll = "SELECT * FROM instrument_product";
$resultAll = $conn->query($sqlAll);
$insCount = $resultAll->num_rows;

$perPage = 8;
$startPage = ($page - 1) * $perPage;
$sql = "SELECT * FROM instrument_product WHERE $category $sqlsearch valid=1 LIMIT $startPage ,$perPage";

$result = $conn->query($sql);
$pageinsCount = $resultAll->num_rows;

$startItem = ($page - 1) * $perPage;
$endItem = $page * $perPage;

if ($endItem > $insCount) $endItem = $insCount;
$totalPage = ceil($insCount / $perPage);


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
        .row{
            display: flex;

        }
    </style>
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
                        <li class="breadcrumb-item" aria-current="page">樂器商城</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <div class="row">
                        <form action="ins-shop.php" method="get" class="">
                        <p class="col-8 m-auto">總共 <?=$insCount?>筆資料</p>
                        <input class="col form-control me-2" type="text" name="search">
                        <button class="col-1 btn btn-green" type="submit">
                            <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                            搜尋
                        </button>
                        </form>
                    </div>
                   
                </div>
                <hr>
                <div class="container">

                    <!-- 按鈕 -->
                    <div class="row">
                        <div class="col-8">
                            <!-- 文字按鈕 -->
                            <a class="btn btn-green me-2" href="creat-ins.php">
                                <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                                新增
                            </a>
                            <a href=""   style="font-weight:normal" class=" btn btn-green me-2">
                            <input type="checkbox" id="ckb_selectAll">
                                全選
                            </a>
                            <!-- 無文字按鈕 -->
                            <form action="ins-shop.php" class="col-2 me-2"  >
                            <select onchange="this.form.submit()" name="catestring" id="" class="form-control">
                                <option <?php if($catestring=="") echo "selected";?> value="">全部樂器</option>
                                <option <?php if($catestring==1) echo "selected";?> value="1" >電鋼琴</option>
                                <option <?php if($catestring==2) echo "selected";?> value="2" >木吉他</option>
                                <option <?php if($catestring==3) echo "selected";?> value="3" >電吉他</option>
                                <option <?php if($catestring==4) echo "selected";?> value="4" >電貝斯</option>
                                <option <?php if($catestring==5) echo "selected";?> value="5" >電子鼓</option>
                            </select>
                            </form>
                        </div>
                    </div>
                    <!-- 按鈕 end-->

                    <hr>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">勾選</th>
                                <th scope="col">商品編號</th>
                                <th scope="col">商品圖片</th>
                                <th scope="col">樂器類別</th>
                                <th scope="col">品牌型號</th>
                                <th scope="col">定價</th>
                                <th scope="col">庫存</th>
                                <th scope="col">建立時間</th>
                                <th scope="col">上架狀態</th>                                        
                                <th scope="col">功能</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <form action="" name="form1">
                                <tr>
                                    <div class="col-3">
                                        <button class=" btn btn-green me-2" onclick="up()">
                                            批次上架
                                        </button>
                                        <button class=" btn btn-red me-2" onclick="down()">
                                            批次下架
                                        </button>
                                    </div>
                                </tr>
                                <?php
                                //把資料轉換成關聯式陣列
                                while($row = $result->fetch_assoc()): ?>                            
                                <tr>
                                    <th><input type="checkbox" name="arryid[]" value="<?=$row["id"]?>"></th>
                                    <td><?=$row["product_id"]?></td>
                                    <td>商品圖片</td>
                                    <td><?=$row["cate"]?></td>
                                    <td><?=$row["name"]?></td>
                                    <td><?=$row["price"]?></td>
                                    <td><?=$row["stock"]?></td>                             
                                    <td><?=$row["creat_time"]?></td>
                                    <td>
                                    <?php if($row["state"]==1):?>
                                        <a class="btn btn-green me-3" type="button" href="downstate-ins.php?id=<?=$row["id"]?>">
                                            上架
                                        </a>
                                            <?php else: ?>
                                        <a class="btn btn-red me-3" type="button" href="dostate-ins.php?id=<?=$row["id"]?>">
                                            下架
                                        </a>
                                        <?php endif ; ?>
                                    </td>                    
                                    <td>
                                        <a class="btn btn-khak" type="button" id="show" href="ins-detail.php?id=<?= $row["id"] ?>">
                                            <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                            修改
                                        </a>                         
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </form>
                        </tbody>
                    </table>
                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                        <li class="page-item ">
                        <a class="page-link <?php if ($page == $i) echo "active"; ?>" href="ins-shop.php?page=<?= $i ?>"><?= $i ?></a>
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
                        document.form1.action="batchstate-ins.php";
                        document.form1.submit();
                    }
                    function down(){
                        document.form1.action="batchdownstate-ins.php";
                        document.form1.submit();
                    }
    </script>

    
</body>

</html>
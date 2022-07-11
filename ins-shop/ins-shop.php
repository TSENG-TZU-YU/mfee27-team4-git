<?php

require("../db-connect.php");

// 篩選
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}






//page
$sqlAll = "SELECT * FROM instrument_product WHERE id";
$resultAll = $conn->query($sqlAll);
$insCount = $resultAll->num_rows;

$perPage = 5;
$startPage = ($page - 1) * $perPage;
$sql = "SELECT * FROM instrument_product WHERE  id  LIMIT $startPage ,5";

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
                        <p class="col-8 m-auto">總共 筆資料</p>
                        <input class="col form-control me-2" type="text">
                        <a class="col-1 btn btn-green" href="#">
                            <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                            搜尋
                        </a>
                    </div>
                   
                </div>
                <hr>
                <div class="container">

                    <!-- 按鈕 -->
                    <div class="row">
                        <!-- 文字按鈕 -->
                        <a class="col-1 btn btn-green me-2" href="creat-ins.php">
                            <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                            新增
                        </a>
                        <a href=""   style="font-weight:normal" class="col-1 btn btn-green me-2">
                        <input type="checkbox" id="ckb_selectAll">
                            全選
                        </a>
                        <a class="col-1 btn btn-red me-2" href="#">
                            <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                            批次刪除
                        </a>
                        <!-- 無文字按鈕 -->
                        <form action="ins-shop.php" class="col-6 me-2 "  >
                        <select onchange="this.form.submit()" name="ins_cate" id="">
                            <option value="">全部樂器</option>
                            <option value="1" >電鋼琴</option>
                            <option value="2" >木吉他</option>
                            <option value="3" >電吉他</option>
                            <option value="4" >電貝斯</option>
                            <option value="5" >電子鼓</option>
                        </select>
                        </form>
                        <a class="col-1 btn btn-green me-2" href="ins-shop.php?valid=1">
                            已上架
                        </a>
                        <a class="col-1 btn btn-red me-2" href="ins-shop.php?valid=2">
                            已下架
                        </a>
                    </div>
                    <!-- 按鈕 end-->

                    <hr>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">勾選</th>
                                <th scope="col">商品編號</th>
                                <th scope="col">建立時間</th>
                                <th scope="col">樂器類別</th>
                                <th scope="col">品牌型號</th>
                                <th scope="col">定價</th>
                                <th scope="col">庫存</th>
                                <th scope="col">商品簡介</th>
                                <th scope="col">商品圖片</th>
                                <th scope="col">功能</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //把資料轉換成關聯式陣列
                            while($row = $result->fetch_assoc()):  ?>
                          
                            <tr>
                                <th><input type="checkbox" class="ckb" id=" con.id " value=" con.id "></th>
                                <td><?=$row["product_id"]?></td>
                                <td><?=$row["creat_time"]?></td>
                                <td><?=$row["cate"]?></td>
                                <td><?=$row["name"]?></td>
                                <td><?=$row["price"]?></td>
                                <td><?=$row["stock"]?></td>
                                <td><?=$row["intro"]?></td>
                                <td>商品圖片</td>
                                <td>
                                    <button class="btn btn-red me-3" type="button">
                                        <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                                        下架
                                    </button>
                                    <a class="btn btn-khak" type="button" id="show" href="ins-detail.php?id=<?= $row["id"] ?>">
                                        <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                        修改
                                    </a>
                                    <!-- <dialog id="infoModal">
                                    <div class="container">
                                        <form action="docreate-ins.php" method="post">
                                            <div class="mb-2">
                                                <label for="">樂器類別</label>
                                                <input type="text" class="form-control" name="ins_cate">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">品牌型號</label>
                                                <input type="text" class="form-control" name="brnd_model">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">庫存</label>
                                                <input type="number" class="form-control" name="stock">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">價格</label>
                                                <input type="number" class="form-control" name="price">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">商品簡介</label>
                                                <textarea type="text" class="form-control" name="intro"></textarea>
                                            </div>
                                                    <button class="btn btn-info add" type="submit">送出</button>
                                                    <button class="btn btn-info" type="reset">清除</button>
                                                    <button type="button" class="btn btn-warning" id="close">關閉</button>
                                        </form>
                                    </div>
                                    </dialog> -->
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            
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
        let btn=document.querySelector("#show");
        let infoModal=document.querySelector("#infoModal");
        let close=document.querySelector("#close");

        btn.addEventListener("click", function(){
            infoModal.showModal();
        })
        close.addEventListener("click", function(){
            infoModal.close();
        });





    </script>

    
</body>

</html>
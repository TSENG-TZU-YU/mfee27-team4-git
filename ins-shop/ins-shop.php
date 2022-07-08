<?php



require("../db-connect.php");

// 篩選

if(!isset($_GET["ins_cate"])){
    $catestring="";
}else{
    $catestring=$_GET["ins_cate"];
}

switch($catestring) {
    case 1 :
        $category="WHERE ins_cate='電鋼琴'";
    break;
    case 2 :
        $category="WHERE ins_cate='木吉他'";
    break;
    case 3 :
        $category="WHERE ins_cate='電吉他'";
    break;
    case 4 :
        $category="WHERE ins_cate='電貝斯'";
    break;
    case 5 :
        $category="WHERE ins_cate='電子鼓'";
    break;
    default : 
        $category="" ;
    break;
}


if(isset($_GET["valid"])){
    $valid=($_GET["valid"]);
    if(isset($_GET["ins_cate"])){
        switch($valid) {
            case 1 :
                $offadd="AND valid = 1";
            break;
            case 2 :
                $offadd="AND valid = 0";
            break;
            default : 
                $offadd="" ;
            break;
            }
    }else{
        switch($valid) {
            case 1 :
                $offadd="WHERE valid = 1";
            break;
            case 2 :
                $offadd="WHERE valid = 0";
            break;
            default : 
                $offadd="" ;
            break;
        }
        
    }
    
}else{
        $valid="";
    
}
$sqlSelect="SELECT * FROM instrument_product $category $offadd";
$resultSelect = $conn->query($sqlSelect);





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
    <link rel="stylesheet" href="style.css">
    </link>

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
                            <img class="bi pe-none mb-1" src="/icon/search-icon.svg" width="16" height="16"></img>
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
                            <img class="bi pe-none mb-1" src="icon/create-icon.svg" width="16" height="16"></img>
                            新增
                        </a>
                        <a href="javascript:void(0);" onclick="checkall(this)" title="刪除選定資料" style="font-weight:normal" class="col-1 btn btn-green me-2">
                        <input type="checkbox" id="ckb_selectAll" onclick="checkall(this)" title="選中/取消選中">
                            <img class="bi pe-none mb-1" src="icon/update-icon.svg" width="16" height="16"></img>
                            全選
                        </a>
                        <a class="col-1 btn btn-red me-2" href="#">
                            <img class="bi pe-none mb-1" src="icon/delete-icon.svg" width="16" height="16"></img>
                            批次刪除
                        </a>
                        <!-- 無文字按鈕 -->
                        <form action="ins-shop.php" class="col-6 me-2 "  >
                        <select onchange="this.form.submit()" name="ins_cate" id="">
                            <option value="">全部樂器</option>
                            <option value="1" <?php if($catestring==1) echo "selected" ?>>電鋼琴</option>
                            <option value="2" <?php if($catestring==2) echo "selected" ?>>木吉他</option>
                            <option value="3" <?php if($catestring==3) echo "selected" ?>>電吉他</option>
                            <option value="4" <?php if($catestring==4) echo "selected" ?>>電貝斯</option>
                            <option value="5" <?php if($catestring==5) echo "selected" ?>>電子鼓</option>
                        </select>
                        </form>
                        <a class="col-1 btn btn-red me-2" href="ins-shop.php?valid=1">
                            <img class="bi pe-none mb-1" src="icon/delete-icon.svg" width="16" height="16"></img>
                            已上架
                        </a>
                        <a class="col-1 btn btn-red me-2" href="ins-shop.php?valid=2">
                            <img class="bi pe-none mb-1" src="icon/delete-icon.svg" width="16" height="16"></img>
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
                            while($row = $resultSelect->fetch_assoc()):  ?>
                          
                            <tr>
                                <th><input type="checkbox" class="ckb" id=" con.id " value=" con.id "></th>
                                <td><?=$row["product_id"]?></td>
                                <td><?=$row["creat_time"]?></td>
                                <td><?=$row["ins_cate"]?></td>
                                <td><?=$row["brnd_model"]?></td>
                                <td><?=$row["price"]?></td>
                                <td><?=$row["stock"]?></td>
                                <td><?=$row["intro"]?></td>
                                <td>商品圖片</td>
                                <td>
                                    <button class="btn btn-grey me-3" type="button">
                                        <img class="bi pe-none mb-1" src="icon/read-icon.svg" width="16" height="16"></img>
                                        下架
                                    </button>
                                    <button class="btn btn-khak" type="button">
                                        <img class="bi pe-none mb-1" src="icon/update-icon.svg" width="16" height="16"></img>
                                        修改
                                    </button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            
                        </tbody>
                    </table>
                    <!-- 頁碼 -->
                    <!-- <div aria-label="Page navigation example">
                        <ul class="pagination">
                        <?php for($i=1; $i<=$totalPage; $i++): ?>
                        <li class="page-item <?php if($page==$i)echo "active";?>">
                        <a class="page-link" href="ins-shop.php?page=<?=$i?>"><?=$i?></a>
                        </li>
                        <?php endfor; ?>
                        </ul>
                    </div> -->
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

    function xxx(qx)
        let ckb = document.getElementsByClassName("ckb");
        if (qx.checked){
            for(i = 0; i<ckb.length; i++){
                ckb[i].setAttribute("checked","checked");
            }
        }else{
            for(let i = 0;i < ckb.length;i++){
                ckb[i].removeAttribute("checked");
            }
        }

    </script>
</body>

</html>
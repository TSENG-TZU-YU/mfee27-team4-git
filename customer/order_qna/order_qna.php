<?php
require("../../db-connect.php");
$sqlOrder_qna = "WHERE order_qna.php";
session_start();


if(isset($_GET["perPage"])){
    $_SESSION["orderstate"]["perPage"]=$_GET["perPage"];
}elseif(isset($_SESSION["orderstate"]["perPage"])){
    $_SESSION["orderstate"]["perPage"]=$_SESSION["orderstate"]["perPage"];
}else{
    $_SESSION["orderstate"]["perPage"]=4;
}
$perPage=$_SESSION["orderstate"]["perPage"];
// $perPage=isset($_GET["perPage"])? $_GET["perPage"] : 4;

if(isset($_GET["page"])){
    $_SESSION["orderstate"]["page"]=$_GET["page"];
}elseif(isset($_SESSION["orderstate"]["page"])){
    $_SESSION["orderstate"]["page"]=$_SESSION["orderstate"]["page"];
}else{
    $_SESSION["orderstate"]["page"]=1;
}
$page=$_SESSION["orderstate"]["page"];
// $page=isset($_GET["page"])? $_GET["page"] : 1;

if(isset($_GET["category"])){
    $_SESSION["orderstate"]["category"]=$_GET["category"];
}elseif(isset($_SESSION["orderstate"]["category"])){
    $_SESSION["orderstate"]["category"]=$_SESSION["orderstate"]["category"];
}else{
    $_SESSION["orderstate"]["category"]="";
}
$category=$_SESSION["orderstate"]["category"];
// $category=isset($_GET["category"])? $_GET["category"] : "";
switch($category){
    case 1:
        $sqlWhere="";
        break;
    case 2:
        $sqlWhere="order_qna.reply_state ='未回覆' AND";
        break;
    case 3:
        $sqlWhere="order_qna.reply_state ='已回覆' AND";
        break;
    case 4:
        $sqlWhere="order_qna.reply_state ='新訊息' AND";
        break;    
    default:
        $sqlWhere="";
        break;     
}

if (isset($_GET["search"])){
    $_SESSION["orderstate"]["search"]=$_GET["search"];
    $search=$_SESSION["orderstate"]["search"];
    $sqlseach="( users.account LIKE '%$search%' OR users.name LIKE '%$search%') AND"; 
}elseif(isset($_SESSION["orderstate"]["search"])){
    $_SESSION["orderstate"]["search"]=$_SESSION["orderstate"]["search"];
    $search=$_SESSION["orderstate"]["search"];
    $sqlseach="( users.account LIKE '%$search%' OR users.name LIKE '%$search%') AND"; 
}else{
    $_SESSION["orderstate"]["search"]="";
    $search="";
    $sqlseach="";
}

if(isset($_GET["order"])){
    $_SESSION["orderstate"]["order"]=$_GET["order"];
}elseif(isset($_SESSION["orderstate"]["order"])){
    $_SESSION["orderstate"]["order"]=$_SESSION["orderstate"]["order"];
}else{
    $_SESSION["orderstate"]["order"]=2;
}
$order=$_SESSION["orderstate"]["order"];
// $order=isset($_GET["order"])? $_GET["order"] : 2;
switch($order){
    case 1:
        $orderType="order_qna.order_id ASC";
        break;
    case 2:
        $orderType="order_qna.order_id DESC";
        break;
    case 3:
        $orderType="users.account ASC";
        break;
    case 4:
        $orderType="users.account DESC";
        break; 
    case 5:
        $orderType="order_qna.create_time ASC";
        break;
    case 6:
        $orderType="order_qna.create_time DESC";
        break;   
    default:
        $orderType="order_qna.order_id DESC";
        break;
}

$start=($page-1)*$perPage;

$sql="SELECT order_qna.*, users.account , users.name FROM order_qna
    JOIN users ON order_qna.user_id = users.id WHERE $sqlWhere $sqlseach order_qna.valid=1 ORDER BY $orderType
    LIMIT $start, $perPage" ; 
   
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

$sqlAll="SELECT order_qna.*, users.account, users.name FROM order_qna
    JOIN users ON order_qna.user_id = users.id  AND $sqlWhere $sqlseach order_qna.valid=1";
$resultAll=$conn->query($sqlAll);
$userCount=$resultAll->num_rows;

$startItem=($page-1)*$perPage+1;
$endItem=$page*$perPage;
if($endItem>$userCount)$endItem=$userCount;

$totalPage=ceil($userCount/$perPage);

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
    <link rel="stylesheet" href="/mfee27-team4-git/style.css">
    </link>
    <style>
        .reply-state{
            width: 60px;
            height: 30px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;   
            font-size: 14px;
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row d-flex">

            <!-- 導覽列 nav -->
            <?php require("../../nav.php");?>
            <!-- 導覽列 nav end -->

            <!-- 主要區塊 main -->
            <main class="col-10 px-5 py-4">

                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="home.php">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page">訂單問答</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h1>訂單問題</h1>
                        </div>
                        <div>
                            <form action="order_qna.php" method="get">
                                <div class="d-flex align-items-center">
                                    <?php if(!empty($search)):?>
                                    <h2 class="text-nowrap" ><?=$search?> 的搜尋結果 </h2>
                                    <?php endif;?>
                                    <input  class="form-control me-3" type="text" name="search">
                                    <button class=" btn btn-green " type="submit" href="#">
                                        <img class="bi pe-none mb-1" src="/mfee27-team4-git/icon/search-icon.svg" width="16" height="16"></img>
                                        <p class="text-nowrap">會員搜尋</p> 
                                    </button>
                                </div>
                                <input type="hidden" name="category" value="<?=$category?>">
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container">    
                    <form class="" action="order_qna.php" method="get">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>   
                                每頁顯示
                                <select onchange="this.form.submit()" name="perPage">
                                    <option <?php if($perPage==4)echo "selected";?> value="4">4</option>
                                    <option <?php if($perPage==6)echo "selected";?> value="6">6</option>
                                    <option <?php if($perPage==8)echo "selected";?> value="8">8</option>
                                    <option <?php if($perPage==10)echo "selected";?> value="10">10</option>
                                </select>
                                筆, 第 <?=$startItem?>-<?=$endItem?> 筆, 共 <?=$userCount?> 筆資料
                                </div> 
                            <div>
                                回覆狀態:
                                <input type="radio" name="category" id="category1" class="" value="1" <?php if($category==1 || $category=="")echo "checked";?> onclick="this.form.submit()">
                                <label for="category1">全部</label>
                                <input type="radio" name="category" id="category2" class="" value="2" <?php if($category==2)echo "checked";?> onclick="this.form.submit()">
                                <label for="category2">未回覆</label>
                                <input type="radio" name="category" id="category3" class="" value="3" <?php if($category==3)echo "checked";?> onclick="this.form.submit()">
                                <label for="category3">已回覆</label>
                                <input type="radio" name="category" id="category4" class="" value="4" <?php if($category==4)echo "checked";?> onclick="this.form.submit()">
                                <label for="category4">新訊息</label>
                            </div>
                        </div>
                    </form> 
                    <!-- <hr>                    -->
                    <table class="table mt-2">
                        <thead>
                            <tr >
                                <?php //echo $order ?>
                                <th scope="col" class="text-nowrap"><a href="order_qna.php?page=<?=$page?>&perPage=<?=$perPage?>&category=<?=$category?>&search=<?=$search?>&order=<?php if($order==1){echo "2";}else{echo "1";}?>">訂單編號</a> </th>
                                <th scope="col" class="text-nowrap"><a href="order_qna.php?page=<?=$page?>&perPage=<?=$perPage?>&category=<?=$category?>&search=<?=$search?>&order=<?php if($order==3){echo "4";}else{echo "3";}?>">會員帳號</a></th>
                                <th scope="col" class="text-nowrap">姓名</th>
                                <th scope="col" class="text-nowrap">問題類型</th>
                                <th scope="col" class="text-nowrap">問題標題</th>
                                <th scope="col" class="text-nowrap">回覆狀態</th>
                                <th scope="col" class="text-nowrap"><a href="order_qna.php?page=<?=$page?>&perPage=<?=$perPage?>&category=<?=$category?>&search=<?=$search?>&order=<?php if($order==5){echo "6";}else{echo "5";}?>">詢問時間</a></th>
                                <th scope="col" class="text-nowrap">最後更新時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $row): ?>
                            <tr>
                                <th><?=$row["order_id"]?></th>
                                <td ><?=$row["account"]?></td>
                                <td class="text-nowrap"><?=$row["name"]?></td>
                                <td class="text-nowrap"><?=$row["q_category"]?></td>
                                <td><?=$row["title"]?></td>        
                              
                                <td class="text-nowrap">
                                    <div class="d-flex justify-content-center">    
                                        <span class="reply-state
                                        <?php 
                                        switch($row["reply_state"]){
                                            case '未回覆':
                                                echo "bg-danger";
                                                break;
                                            case '已回覆':
                                                echo "bg-success";
                                                break;
                                            case '新訊息':
                                                echo "bg-warning";
                                                break;    
                                            default:
                                                echo "bg-dark";
                                                break;     
                                            }?>
                                        "><?=$row["reply_state"]?>
                                        </span>
                                    </div>
                                </td>
                                <td><?=$row["create_time"]?></td>
                                <td><?=$row["update_time"]?></td>
                                <td class="text-nowrap">
                                    <form action="order_qna_detail.php" method="post">
                                        <button class="btn btn-khak me-3" type="submit">
                                            <img class="bi pe-none mb-1" src="../../icon/read-icon.svg" width="16" height="16"></img>
                                            詳細
                                        </button>
                                        <input type="hidden" name="order_qna_id" value="<?=$row["id"]?>">
                                        <input type="hidden" name="page" value="<?=$page?>">
                                        <input type="hidden" name="perPage" value="<?=$perPage?>">
                                        <input type="hidden" name="category" value="<?=$category?>">
                                        <input type="hidden" name="order" value="<?=$order?>">
                                        <input type="hidden" name="search" value="<?=$search?>">
                                    </form>                                
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for($i=1; $i<=$totalPage; $i++): ?>
                            <li class="page-item <?php if($page==$i)echo "active";?>">
                                <a class="page-link" href="order_qna.php?page=<?=$i?>&perPage=<?=$perPage?>&category=<?=$category?>&order=<?=$order?>&search=<?=$search?>"><?=$i?></a>
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

</body>

</html>
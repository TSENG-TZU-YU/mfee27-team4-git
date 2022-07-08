<?php
require("../db-connect.php");

// $user_id=isset($_GET["user_id"])? $_GET["user_id"] : "zxcasd";

$account=isset($_GET["account"])? $_GET["account"] : "zxcasd";
$sql="SELECT * FROM order_product WHERE account = '$account'" ;
print_r($sql);
$result=$conn->query($sql); 
$rows=$result->fetch_all(MYSQLI_ASSOC);  

$sqluser="SELECT * FROM users WHERE account = '$account'" ;
$resultuser=$conn->query($sqluser); 
$rowuser = $resultuser->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <title><?=$rowuser["name"]?>的訂單</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../style.css"></link>
</head>
<body>
    <div class="container">
        <main class=" px-5 py-4">
            <!-- 麵包屑 breadcrumb -->
            <biv aria-label="breadcrumb">
                <ol class="breadcrumb fw-bold">
                    <li class="breadcrumb-item"><a href="#">首頁</a></li>
                    <li class="breadcrumb-item" aria-current="page">我的訂單</li>
                </ol>
            </biv>
            <!-- 麵包屑 breadcrumb end -->
            <hr>
            <!-- 內容 -->
            <div class="">
                <h1><?=$rowuser["name"]?>的訂單</h1>
            </div>    
            <table class="table mt-2">
                <thead>
                    <tr >
                        <th scope="col" class="text-nowrap">訂單編號</th>
                        <th scope="col" class="text-nowrap">訂單狀態</th>
                        <th scope="col" class="text-nowrap">付款狀態</th>
                        <th scope="col" class="text-nowrap">付款方式</th>
                        <th scope="col" class="text-nowrap">總金額</th>                                   
                        <th scope="col" class="text-nowrap">下單時間</th>        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row): ?>
                    <tr>
                        <th class="text-nowrap"><?=$row["order_id"]?> </th>
                        <td class="text-nowrap"><?=$row["order_state"]?></td>
                        <td class="text-nowrap"><?=$row["payment_state"]?></td>
                        <td class="text-nowrap"><?=$row["payment_method"]?></td>
                        <td class="text-nowrap"><?=$row["total_amount"]?></td>
                        <td class="text-nowrap"><?=$row["payment_time"]?></td>
                        <form action="qna_table.php" method="post">
                            <td class="text-nowrap">
                                <button class="btn bg-orange-color me-2" type="submit">
                                    <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                                    訂單詳細
                                </button>       
                                <button class="btn btn-red me-2" type="submit">
                                    <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                    我要問問題
                                </button>        
                            </td>
                            <input type="hidden" name="order_id" value="<?=$row["order_id"]?>">
                            <input type="hidden" name="user_id" value="<?=$rowuser["id"]?>">
                            <input type="hidden" name="name" value="<?=$rowuser["name"]?>">
                        </form>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>    
            <!-- 內容 end -->
        </main>                  
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries end -->
</body>
</html>
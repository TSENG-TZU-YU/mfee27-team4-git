<<<<<<< HEAD
<?php
if(!isset($_GET["id"])){
    echo "沒有參數";
    exit;
}
$id=$_GET["id"];
=======
<<<<<<< HEAD
<?php
if(!isset($_GET["id"])){
    echo "沒有參數";
    exit;
}
$id=$_GET["id"];

require("../db-connect.php");
$sql="SELECT * FROM coupon WHERE id=$id AND valid=1 ";

$result = $conn->query($sql);
$couponCount=$result->num_rows;


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Coupon Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <!-- 版面元件樣式 css -->
 <link rel="stylesheet" href="../style.css">
    </link>
    <style>
        .panel{
            width:800px;

        }
    </style>
  </head>
  <body>
  <div class="container-fluid">
        <div class="row d-flex">

        
            <main class="col-10 px-5 py-4">

                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="coupons.php">優惠卷列表</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="#">優惠卷</a></li>
                    </ol>
                </biv>
  
    <div class="container">
    <div class=" d-flex justify-content-center align-items-center mt-4">
        <?php if($couponCount>0):
        $row = $result->fetch_assoc();?>
       <form action="doUpdate.php" method="post">
        <input name="id" type="hidden" value="<?=$row["id"]?>">
        <table class="table mt-5 panel">
                        <thead>
                            <tr>
                                <th scope="col">編號</th>
                                <td>
                                <?=$row["id"]?>
                                </td>
                               
                          
                             </tr>

                             <tr>
                             <th scope="col">優惠券名稱</th>
                             <td>
                             <?=$row["name"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">使用者資格</th>
                             <td>
                            <?=$row["members"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">序號</th>
                             <td>
                            <?=$row["number"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">折扣</th>
                             <td>
                             <?=$row["discount"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">日期</th>
                             <td>
                            <?=$row["dateline"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">使用次數</th>
                             <td>
                             <?=$row["several_times"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">最低金額</th>
                             <td>
                            <?=$row["min_price"]?></td>
                             </tr>
                      </thead>
                    </table>
                    <div class="d-flex justify-content-center align-items-center mt-4">
                    <a class="btn btn-khak me-3" type="" href="coupon-edit.php?id=<?=$row["id"]?>">
                        <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                        修改
                        </a>
                        <a class=" btn btn-grey me-3" href="coupons.php">
                       <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                        返回上一頁
                        </a>
                        </div>
                    <?php else: ?>
                        沒有該使用者
                        <?php endif; ?>
                    </div> 
                    </form>
         </div>      
      
  </body>
</html>


=======
<!DOCTYPE html>
<html lang="zh-tw">
>>>>>>> 4609369059da681773dd28f2efdfb780bd1aaebf

require("../db-connect.php");
$sql="SELECT * FROM coupon WHERE id=$id AND valid=1 ";

$result = $conn->query($sql);
$couponCount=$result->num_rows;


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Coupon Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <!-- 版面元件樣式 css -->
 <link rel="stylesheet" href="../style.css">
    </link>
    <style>
        .panel{
            width:800px;

        }
    </style>
  </head>
  <body>
  <div class="container-fluid">
        <div class="row d-flex">

<<<<<<< HEAD
        
=======
            <!-- 導覽列 nav -->
            <?php require("../nav.php"); ?>
            <!-- 導覽列 nav end -->

            <!-- 主要區塊 main -->
>>>>>>> 4609369059da681773dd28f2efdfb780bd1aaebf
            <main class="col-10 px-5 py-4">

                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="coupons.php">優惠卷列表</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="#">優惠卷</a></li>
                    </ol>
                </biv>
  
    <div class="container">
    <div class=" d-flex justify-content-center align-items-center mt-4">
        <?php if($couponCount>0):
        $row = $result->fetch_assoc();?>
       <form action="doUpdate.php" method="post">
        <input name="id" type="hidden" value="<?=$row["id"]?>">
        <table class="table mt-5 panel">
                        <thead>
                            <tr>
                                <th scope="col">編號</th>
                                <td>
                                <?=$row["id"]?>
                                </td>
                               
                          
                             </tr>

                             <tr>
                             <th scope="col">優惠券名稱</th>
                             <td>
                             <?=$row["name"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">使用者資格</th>
                             <td>
                            <?=$row["members"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">序號</th>
                             <td>
                            <?=$row["number"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">折扣</th>
                             <td>
                             <?=$row["discount"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">日期</th>
                             <td>
                            <?=$row["dateline"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">使用次數</th>
                             <td>
                             <?=$row["several_times"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">最低金額</th>
                             <td>
                            <?=$row["min_price"]?></td>
                             </tr>
                      </thead>
                    </table>
                    <div class="d-flex justify-content-center align-items-center mt-4">
                    <a class="btn btn-khak me-3" type="" href="coupon-edit.php?id=<?=$row["id"]?>">
                        <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                        修改
                        </a>
                        <a class=" btn btn-grey me-3" href="coupons.php">
                       <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                        返回上一頁
                        </a>
                        </div>
                    <?php else: ?>
                        沒有該使用者
                        <?php endif; ?>
                    </div> 
                    </form>
         </div>      
      
  </body>
</html>


<<<<<<< HEAD
=======
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
>>>>>>> 3ceb0e13ce16e15488e13d85d3187f6d39818c28
>>>>>>> 4609369059da681773dd28f2efdfb780bd1aaebf

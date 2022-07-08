<<<<<<< HEAD
<?php
if(!isset($_GET["id"])){
    echo "沒有參數";
    exit;
}
$id=$_GET["id"];

require("../db-connect.php");
$sql="SELECT * FROM coupon WHERE id=$id  ";

$result = $conn->query($sql);
$couponCount=$result->num_rows;


?>
<!doctype html>
<html lang="en">
  <head>
    <title>cou</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <!-- 版面元件樣式 css -->
 <link rel="stylesheet" href="../style.css">
    </link>
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
        <?php if($couponCount>0):
        $row = $result->fetch_assoc();?>
        <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">編號</th>
                                <td><?=$row["id"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">優惠券名稱</th>
                             <td><?=$row["name"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">使用者資格</th>
                             <td><?=$row["member"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">序號</th>
                             <td><?=$row["number"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">折扣</th>
                             <td><?=$row["discount"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">日期</th>
                             <td><?=$row["dateline"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">使用次數</th>
                             <td><?=$row["several_times"]?></td>
                             </tr>
                             
                             <tr>
                             <th scope="col">最低金額</th>
                             <td><?=$row["create_time"]?></td>
                             </tr>
                      </thead>
              
                 
                    </table>
                    <?php else: ?>
                        沒有該使用者
                        <?php endif; ?>
                        <button class="btn btn-grey me-3" type="button">
                        <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                        刪除
                    </button>
                    <button class="btn btn-khak" type="button">
                        <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                        儲存
                    </button>
         </div>
  </body>
</html>


=======
<?php
if(!isset($_GET["id"])){
    echo "沒有參數";
    exit;
}
$id=$_GET["id"];

require("../db-connect.php");
$sql="SELECT * FROM coupon WHERE id=$id  ";

$result = $conn->query($sql);
$couponCount=$result->num_rows;


?>
<!doctype html>
<html lang="en">
  <head>
    <title>cou</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <!-- 版面元件樣式 css -->
 <link rel="stylesheet" href="../style.css">
    </link>
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
        <?php if($couponCount>0):
        $row = $result->fetch_assoc();?>
        <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">編號</th>
                                <td><?=$row["id"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">優惠券名稱</th>
                             <td><?=$row["name"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">使用者資格</th>
                             <td><?=$row["member"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">序號</th>
                             <td><?=$row["number"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">折扣</th>
                             <td><?=$row["discount"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">日期</th>
                             <td><?=$row["dateline"]?></td>
                             </tr>

                             <tr>
                             <th scope="col">使用次數</th>
                             <td><?=$row["several_times"]?></td>
                             </tr>
                             
                             <tr>
                             <th scope="col">最低金額</th>
                             <td><?=$row["create_time"]?></td>
                             </tr>
                      </thead>
              
                 
                    </table>
                    <?php else: ?>
                        沒有該使用者
                        <?php endif; ?>
                        <button class="btn btn-grey me-3" type="button">
                        <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                        刪除
                    </button>
                    <button class="btn btn-khak" type="button">
                        <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                        儲存
                    </button>
         </div>
  </body>
</html>


>>>>>>> 4609369059da681773dd28f2efdfb780bd1aaebf

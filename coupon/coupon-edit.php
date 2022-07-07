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
                             <td><input type="text" name="name" required  class="form-control"
                             value="<?=$row["name"]?>"></td>
                             </tr>

                             <tr>
                             <th scope="col">使用者資格</th>
                             <td><input type="text" name="members" required  class="form-control"
                             value="<?=$row["members"]?>"></td>
                             </tr>

                             <tr>
                             <th scope="col">序號</th>
                             <td><input type="text" name="number" required  class="form-control"
                             value="<?=$row["number"]?>"></td>
                             </tr>

                             <tr>
                             <th scope="col">折扣</th>
                             <td><input type="text" name="discount" required  class="form-control"
                             value="<?=$row["discount"]?>"></td>
                             </tr>

                             <tr>
                             <th scope="col">日期</th>
                             <td><input type="date" name="dateline"  required  class="form-control"
                             value="<?=$row["dateline"]?>"></td>
                             </tr>

                             <tr>
                             <th scope="col">使用次數</th>
                             <td>
                             <select class="form-select" aria-label="Default select example" type="time" 
                               name="times" required  value="<?=$row["several_times"]?>">
                               <option selected><?=$row["several_times"]?></option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option>
                               </select></td>
                             </tr>

                             <tr>
                             <th scope="col">最低金額</th>
                             <td><input type="text" name="price" required  class="form-control"
                             value="<?=$row["min_price"]?>"></td>
                             </tr>
                      </thead>
              
                      
                    </table>
                   
                    <?php else: ?>
                        沒有該使用者
                        <?php endif; ?>
                        </div>
                        <div class="col-8">
                        <div class=" d-flex justify-content-end align-items-center mt-4">
                        <a class=" btn btn-red me-3" href="doDelete.php?id=<?=$row["id"]?>">
                        <img class="bi pe-none mb-1" src="../icon/delete-icon.svg" width="16" height="16"></img>
                        刪除
                    </a>
                        <button class="btn btn-khak " type="submit">
                        <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                        儲存
                    </button>
                    <a class=" btn btn-grey  ms-3" href="coupons.php">
                    <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
                      返回上一頁
                      </a>
                    </div> 
                    </form>
                    </div>
         </div>      
      
  </body>
</html>



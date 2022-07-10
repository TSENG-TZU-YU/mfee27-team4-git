<?php

require("../db-connect.php");




  
  





if(!isset($_GET["search"])){
    $search="";
    $couponCountS=0;

}else{

 $search=$_GET["search"];
$sqlSearch="SELECT id, name , number, discount, dateline, several_times, min_price FROM coupon 
WHERE  name  LIKE '%$search%'";
$resultS = $conn->query($sqlSearch);
$couponCountS=$resultS->num_rows;


}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Coupon search</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    </link>
  </head>
  <body>
     <div class="container">
        <div class="row">
       <h3 class="mt-5"><?=$search?>的搜尋結果</h3>
       <br>
        </div>
        <form action="coupon-search.php" method="get">   
                    <div class="row">    
              
                    <h3 class="col-8 m-auto">總共<?=$couponCountS?> 筆資料</h3>
                    <input class="col form-control me-3" type="text" name="search">
                      <button type="submit" class="col-1 btn btn-green">
                      <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                    搜尋</button>
                        </div>
                       </form>

                  <?php if($couponCountS>0): ?>
                
        <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">編號</th>
                                <th scope="col">優惠券名稱</th>
                             
                                <th scope="col">序號</th>
                                <th scope="col">折扣</th>
                                <th scope="col">日期</th>
                                <th scope="col">使用次數</th>
                                <th scope="col">最低金額</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = $resultS->fetch_assoc()): ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["name"]?></td>
                       
                        <td><?=$row["number"]?></td>
                        <td><?=$row["discount"]?></td>
                        <td><?=$row["dateline"]?></td>
                        <td><?=$row["several_times"]?></td>
                        <td><?=$row["min_price"]?></td>
                    </tr>
                <?php endwhile; ?>       
               </tbody>
            </table>
        <?php else:  ?>
         沒有符合條件結果
         <?php endif; ?>  
         
         <div>
         <div aria-label="Page navigation example">
                        <ul class="pagination">
                       
                            <a class=" btn btn-grey me-3" href="coupons.php">
 <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
    返回上一頁
</a>
         </div>
         
      
         
 
     </div>
  </body>
</html>
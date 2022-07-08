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
        .panel{
            width:400px;

        }
    </style>

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
                        <li class="breadcrumb-item" aria-current="page"><a href="coupons.php">優惠券列表</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="create-coupon.php">新增優惠券</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <hr>
                <h1 class="text-center mt-5">新增優惠券</h1> 
                <div class=" d-flex justify-content-center align-items-center mt-4">
                <div class="panel">
    <form action="doCreate.php" method="post">                
      <div class="mb-2 ">
      <label for="">優惠券名稱</label>
      <input type="text" class="form-control" name="name" required>
     </div>
     <div class="mb-2">
      <label for="">使用者資格</label>
      <input type="text " class="form-control" name="number" required >
  </div>
  <div class="mb-2">
      <label for="">序號</label>
      <input type="text " class="form-control" name="number" required >
  </div>
  <div class="mb-2">
      <label for="">折扣</label>
      <input type="text "  class="form-control" name="discount"  required>
  </div>
  <div class="mb-2">
      <label for="">日期</label>
      <input type="date"    class="form-control" name="dateline" required>
  </div>
  <div class="mb-2">
  <label for="">使用次數</label>
  <select class="form-select" aria-label="Default select example" type="time"   name="times" required>
  <option selected>0</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select>
</div>
  <div class="mb-2">
      <label for="">最低金額</label>
      <input type="number "  class="form-control"  name="price" required >
  </div>
  <button class="btn btn-green me-3" type="submit">
  <img class="bi pe-none mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
              送出
     </button>
     <form action="create-coupon.php" method="post"> 
  <button  class="btn btn-khak me-3" type="reset">
  <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
    重置
</button>
<a class=" btn btn-grey me-3" href="coupons.php">
 <img class="bi pe-none mb-1" src="../icon/read-icon.svg" width="16" height="16"></img>
    返回上一頁
</a>
 </form>
 
</form>
</div>   
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
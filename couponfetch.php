<?php
require("db-connect.php");

$sql="SELECT * FROM coupon";

$result = $conn->query($sql);
$couponCount=$result->num_rows;

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
           
            <!-- 導覽列 nav end -->

            <!-- 主要區塊 main -->
            <main class="col-10 px-5 py-4">

                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="#">優惠卷</a></li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <div class="row">
                        <p class="col-8 m-auto">總共<?=$couponCount?> 筆資料</p>
                        <input class="col form-control me-3" type="text">
                        <a class="col-1 btn btn-green" href="#">
                            <img class="bi pe-none mb-1" src="/icon/search-icon.svg" width="16" height="16"></img>
                            搜尋
                        </a>
                    </div>
                    <hr>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">編號</th>
                                <th scope="col">優惠券名稱</th>
                                <th scope="col">使用者資格</th>
                                <th scope="col">序號</th>
                                <th scope="col">折扣</th>
                                <th scope="col">日期</th>
                                <th scope="col">使用次數</th>
                                <th scope="col">最低金額</th>
                                <th scope="col">建立時間</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php   //把資料轉換成關聯式陣列
               while($row = $result->fetch_assoc()): ?> 
                            <tr>
                                
                                <td><?=$row["id"]?></td>
                                <td><?=$row["name"]?></td>
                                <td><?=$row["member"]?></td>
                                <td><?=$row["number"]?></td>
                                <td><?=$row["discount"]?></td>
                                <td><?=$row["dateline"]?></td>
                                <td><?=$row["several_times"]?></td>
                                <td><?=$row["min_price"]?></td>
                                <td><?=$row["create_time"]?></td>
                                <td>
                                <button class="btn btn-grey me-3" type="button">
                                        <img class="bi pe-none mb-1" src="/icon/read-icon.svg" width="16" height="16"></img>
                                        詳細
                                    </button>
                                    <button class="btn btn-khak" type="button">
                                        <img class="bi pe-none mb-1" src="/icon/update-icon.svg" width="16" height="16"></img>
                                        修改
                                    </button>
                              </td>
                              <?php endwhile; ?>
               </tbody>
                    </table>
                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
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
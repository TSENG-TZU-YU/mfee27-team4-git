<?php
require("../../db-connect.php");

$order_qna_id=$_GET["order_qna_id"];

$sql="SELECT order_qna.*, users.account AS account FROM order_qna
    JOIN users ON order_qna.user_id = users.id WHERE order_qna.id = $order_qna_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$order_id=$row["order_id"];

$sqlDetail="SELECT * FROM order_qna_detail WHERE order_id = $order_id";
$resultDetail = $conn->query($sqlDetail);
$rowsDetail = $resultDetail->fetch_all(MYSQLI_ASSOC);

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
        .inputcontent{
            height: 100px;    
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
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item" aria-current="page">xxx</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <hr>
                <!-- 內容 -->
                <div class="container">
                    
                    <form action="doReply.php" method="post">
                        <table class="table">
                            <tr>
                                <th>訂單編號:</th>
                                <td colspan="2"><?=$row["order_id"]?></td>
                            </tr>
                            <tr>
                                <th>問題類型:</th>
                                <td colspan="2"><?=$row["q_category"]?></td>
                            </tr>
                            <tr>
                                <th>問題標題:</th>
                                <td colspan="2"><?=$row["title"]?></td>
                            </tr>
                            <tr>
                                <th>回覆狀態:</th>
                                <td colspan="2" class="<?php if($row["reply_state"]=="未回覆"){echo"text-danger";}else{echo"text-success";}?>"><?=$row["reply_state"]?></td>
                            </tr>
                            <tr>
                                <th>詢問時間:</th>
                                <td colspan="2"><?=$row["create_time"]?></td>
                            </tr>
                            <tr>
                                <th>最後更新時間:</th>
                                <td colspan="2"><?=$row["update_time"]?></td>
                            </tr>
                            <tr>
                                <th >問題內容</th>              
                            </tr>
                            <tr> 
                                <td>
                                    <?php foreach($rowsDetail as $rowDetail): ?>
                                    <p class="text-end my-2"><?=$rowDetail["name"]." : "?></p>
                                    <?php endforeach;?> 
                                </td>
                                <td >
                                    <?php foreach($rowsDetail as $rowDetail): ?>
                                    <p class="text-start my-2"><?=$rowDetail["q_content"]?></p>
                                    <?php endforeach;?>    
                                </td>
                                <td>
                                    <?php foreach($rowsDetail as $rowDetail): ?>
                                    <p class="text-start my-2"><?=$rowDetail["create_time"]?></p>
                                    <?php endforeach;?>
                                </td>
                            </tr>
                            
                            <tr>
                                <th>進行回覆:</th>
                                <td colspan="1">
                                    <!-- <textarea type="" pattern=".*[^ ].*" class="form-control inputcontent" placeholder='輸入對話' name="reply" ></textarea> -->
                                    <input type="text" name="reply" class="form-control inputcontent" pattern=".*[^ ].*" placeholder='輸入對話' autocomplete="off" oninvalid="setCustomValidity('不能為空值');" oninput="setCustomValidity('');" required >
                                </td>  
                                <td>

                                </td>  
                            </tr>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="py-2 mx-2  ">
                                    <button class="btn btn-green" type="submit">確定</button>
                                    <input type="hidden" name="order_id" value="<?=$order_id?>">
                                    <input type="hidden" name="order_qna_id" value="<?=$order_qna_id?>">
                                </div>
                                <div class="py-2 mx-2">
                                    <a class="btn btn-grey" href="order_qna.php">離開</a>
                                </div>
                            </div>
                            <div class="py-2">                                
                                <button class="btn btn-red" type="submit">
                                    <img class="bi pe-none mb-1" src="/mfee27-team4-git/icon/delete-icon.svg" width="16" height="16"></img>刪除
                                </button>
                            </div>
                        </div>
                    </form>     
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
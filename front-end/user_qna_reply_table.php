<?php
require("../db-connect.php");
session_start();

if(!isset($_SESSION["front_user"])){
    header("location: front_login.php");
  }


$user_qna_id=$_GET["user_qna_id"];

$sql="SELECT * FROM user_qna WHERE id = $user_qna_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


// $sqlDetail="SELECT * FROM user_qna_detail WHERE user_qna_id = $user_qna_id";
// $resultDetail = $conn->query($sqlDetail);
// $rowsDetail = $resultDetail->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>HAMAYA MUSIC</title>

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
            height: 70px;    
        }
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
        .content{
            width: 960px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row d-flex">
            <!-- 主要區塊 main -->
            <main class="col px-5 py-4">
                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item"><a href="my_order.php">我的訂單</a></li>
                        <li class="breadcrumb-item" aria-current="page">查看問題</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <hr>
                <!-- 內容 -->
                <div class="content mx-auto">
                    <h1><?=$_SESSION["front_user"]["name"]?>的提問</h1>
                        <table class="table">
                            <tr>
                                <th width=200>提問編號</th>
                                <td><?=$row["id"]?></td>
                            </tr>
                            <tr>
                                <th>問題類型</th>
                                <td><?=$row["q_category"]?></td>
                            </tr>
                            <tr>
                                <th>回覆狀態</th>
                                <td>
                                <div class="d-flex justify-content-center">    
                                        <span class="reply-state
                                        <?php 
                                        switch($row["user_reply_state"]){
                                            case '未回覆':
                                                echo "bg-danger";
                                                break;
                                            case '已回覆':
                                                echo "bg-success";
                                                break;    
                                            default:
                                                echo "bg-dark";
                                                break;     
                                            }?>
                                        "><?=$row["user_reply_state"]?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>詢問時間</th>
                                <td><?=$row["create_time"]?></td>
                            </tr>
                            <tr>
                                <th>最後更新時間</th>
                                <td><?=$row["update_time"]?></td>
                            </tr>
                            <tr>
                                <th>問題標題</th>
                                <th><?=$row["title"]?></th>
                            </tr>
                        </table>    
                    <form action="user_qna_doReply.php" method="post">
                        <table class="table">        
                            <tr>
                                <th width=200  class="align-top fs-6">問題內容</th>
                                <td style="word-break:break-all" class="">
                                    <div id="viewContent">
                                        <?php
                                        $sqlDetail="SELECT * FROM user_qna_detail WHERE user_qna_id = $user_qna_id AND valid=1";
                                        $resultDetail = $conn->query($sqlDetail);
                                        $rowsDetail = $resultDetail->fetch_all(MYSQLI_ASSOC);
                                        ?>
                                        <?php foreach($rowsDetail as $rowDetail): ?>
                                        <p class="text-start ">
                                            <label>
                                                <span class=" fs-5 fw-bolder"><?=$rowDetail["name"]?></span>&nbsp
                                                <span class="fs-6"><?=$rowDetail["create_time"]?></span>
                                            </label>
                                        </p>
                                        <p class="text-start  fs-6"><?=$rowDetail["q_content"]?></p>
                                        <?php endforeach;?>
                                    </div>   
                                </td>  
                            </tr>
                            <tr>
                                <th>進行回覆</th>
                                <td>
                                    <!-- <textarea type="" pattern=".*[^ ].*" class="form-control inputcontent" placeholder='輸入對話' name="reply" ></textarea> -->
                                    <input type="text" name="reply" class="form-control inputcontent" autofocus pattern=".*[^ ].*" placeholder='輸入內容' autocomplete="off" oninvalid="setCustomValidity('不能為空值');" oninput="setCustomValidity('');" required >
                                </td>    
                            </tr>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="py-2 mx-2  ">
                                    <button class="btn btn-green" type="submit">確定</button>
                                    <input type="hidden" name="user_qna_id" value="<?=$user_qna_id?>">
                                    <input type="hidden" name="name" value="<?=$row["name"]?>">
                                </div>
                                <div class="py-2 mx-2">
                                    <a class="btn btn-grey" href="my_qna.php">離開</a>
                                </div>
                            </div>    
                        </div>
                    </form>     
                </div>        
                <!-- 內容 end -->
            </main>
        <!-- 主要區塊 main end-->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        setInterval(function () {
            $("#viewContent").load(location.href + " #viewContent>*","");//注意後面DIV的ID前面的空格，很重要！沒有空格的話，會出錯（也可以使用類名）
        }, 5000);//5秒自動刷新
    </script>                               

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>
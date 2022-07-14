<?php
require("../../db-connect.php");
session_start();

$user_qna_id=$_GET["user_qna_id"];

$sql="SELECT user_qna.*,users.account FROM user_qna LEFT JOIN users ON user_qna.user_id = users.id WHERE user_qna.id= $user_qna_id";
$result=$conn->query($sql);
$row = $result->fetch_assoc();

$sqlDetail="SELECT * FROM user_qna_detail WHERE user_qna_id = $user_qna_id AND valid=1" ;
$resultDetail = $conn->query($sqlDetail);
$rowsDetail = $resultDetail->fetch_all(MYSQLI_ASSOC);

// $order_qna_id=$_GET["order_qna_id"];

// $sql="SELECT order_qna.*, users.account FROM order_qna
//     JOIN users ON order_qna.user_id = users.id 
//     WHERE order_qna.id = $order_qna_id";
// $result = $conn->query($sql);
// $row = $result->fetch_assoc();

// $order_id=$row["order_id"];

// $sqlDetail="SELECT * FROM order_qna_detail WHERE order_id = $order_id";
// $resultDetail = $conn->query($sqlDetail);
// $rowsDetail = $resultDetail->fetch_all(MYSQLI_ASSOC);

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
    <!-- <meta http-equiv="refresh" content="10" >  -->
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
        .contback{
            background-color: rgba(100,100,100,.5);
        }
        .countview{
            width: 800px;
            height: 450px;  
        }
        .countviewtop{
            height: 350px;
            overflow: auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid  p-0 m-0 ">
        <div class="row d-flex m-0 p-0">
            <div class="contback m-0 vw-100 vh-100 fixed-top d-flex justify-content-center align-items-center " >
                <div class="countview bg-light border border-info border-3  rounded  p-4 " >
                    <form action="user_doDelete.php" method="post">
                        <div class="countviewtop" >
                        <?php foreach($rowsDetail as $rowDetail): ?>
                            <p class="text-start ">
                                <label>
                                    <input type="checkbox" name="arrayId[]" value="<?=$rowDetail["id"]?>">&nbsp
                                    <span class=" fs-5 fw-bolder"><?=$rowDetail["name"]?></span>&nbsp
                                    <span class="fs-6"><?=$rowDetail["create_time"]?></span>
                                </label>
                            </p>
                            <p class="text-start  fs-6">&nbsp&nbsp&nbsp&nbsp<?=$rowDetail["q_content"]?></p>
                            <?php endforeach;?>   
                        </div>    
                        <div class="countviewbottom my-3" >
                            <button class="btn btn-red mx-2" type="submit">
                                <img class="bi pe-none mb-1" src="/mfee27-team4-git/icon/delete-icon.svg" width="16" height="16"></img>    
                                確定刪除
                            </button>
                            <a class="btn btn-grey" href="user_qna_detail.php?user_qna_id=<?=$user_qna_id?>">離開</a>
                        </div>
                        <input type="hidden" name="user_qna_id" value="<?=$user_qna_id?>">
                    </form>
                </div>
            </div>

            <!-- 導覽列 nav -->
            <?php require("../../nav.php");?>
            <!-- 導覽列 nav end -->

            <!-- 主要區塊 main -->
            <main class="col-10 px-5 py-4">
                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="../../home.php">首頁</a></li>
                        <li class="breadcrumb-item"><a href="user_qna.php">客服問答</a></li>
                        <li class="breadcrumb-item" aria-current="page">問答詳細</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <hr>
                <!-- 內容 -->
                <div class="container">
                    
                        <table class="table">
                            <tr>
                                <th width=200>編號</th>
                                <td><?=$row["id"]?></td>
                            </tr>
                            <tr>
                                <th>會員帳號</th>
                                <td class="<?php if(isset($row["account"])==null){echo "text-danger fw-bolder";}?>"><?php if(!isset($row["account"])==null){echo $row["account"];}else{echo "訪客";}?></td>
                            </tr>
                            <tr>
                                <th>姓名</th>
                                <td><?=$row["name"]?></td>
                            </tr>
                            <tr>
                                <th>E-MAIL</th>
                                <td><a class="text-dark fw-bolder" href = "mailto: <?=$row["email"]?>"><?=$row["email"]?></a></td>
                            </tr>
                            <tr>
                                <th>電話</th>
                                <td><?=$row["phone"]?></td>
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
                    <script>
                    function rep(){
                        document.form1.action="user_doReply.php";
                        document.form1.submit();
                    }
                    function del(){
                        document.form1.action="user_doDelete.php";
                        document.form1.submit();
                    }
                    </script>
                    <form name="form1" action="" method="post">    
                        <table class="table">
                            <tr>
                                <th width=200 class="align-top fs-6">問題內容</th>
                                <td style="word-break:break-all" class="">
                                    <div id="viewContent">
                                    </div>   
                                </td>  
                            </tr>
                            <tr>
                                <th class="">進行回覆</th>
                                <td >
                                    <!-- <textarea type="" pattern=".*[^ ].*" class="form-control inputcontent" placeholder='輸入對話' name="reply" ></textarea> -->
                                    <input type="text" name="reply" class="form-control inputcontent" autofocus  placeholder="<?php if(isset($row["account"])==null){echo "非會員請由其他方式聯絡";}else{echo "輸入內容";}?>" autocomplete="off" <?php if(isset($row["account"])==null){echo "disabled";}?> >
                                </td>    
                            </tr>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="py-2 mx-2 ">
                                    <button onclick="rep()" class="btn btn-green" type=""><?php if(isset($row["account"])==null){echo "確定聯絡";}else{echo "確定";}?></button>
                                    <input type="hidden" name="user_qna_id" value="<?=$user_qna_id?>">
                                </div>
                                <div class="py-2 mx-2">
                                    <a class="btn btn-grey" href="user_qna.php">離開</a>
                                </div>
                            </div>
                            <div class="py-2">                                
                                <button onclick="del()" class="btn btn-red" type="">
                                    <img class="bi pe-none mb-1" src="/mfee27-team4-git/icon/delete-icon.svg" width="16" height="16"></img>
                                    刪除訊息
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
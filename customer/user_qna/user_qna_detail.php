<?php
require("../../db-connect.php");

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
    <style>
        .inputcontent{
            height: 100px;    
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
                                <th>編號</th>
                                <td colspan="2"><?=$row["id"]?></td>
                            </tr>
                            <tr>
                                <th>會員帳號</th>
                                <td colspan="2"><?php if(!isset($row["account"])==null){echo $row["account"];}else{echo "非會員\"訪客\"";}?></td>
                            </tr>
                            <tr>
                                <th>姓名</th>
                                <td colspan="2"><?=$row["name"]?></td>
                            </tr>
                            <tr>
                                <th>E-MAIL</th>
                                <td colspan="2"><?=$row["email"]?></td>
                            </tr>
                            <tr>
                                <th>電話</th>
                                <td colspan="2"><?=$row["phone"]?></td>
                            </tr>
                            <tr>
                                <th>問題類型</th>
                                <td colspan="2"><?=$row["q_category"]?></td>
                            </tr>
                            <tr>
                                <th>回覆狀態</th>
                                <td colspan="2" >
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
                                <td colspan="2"><?=$row["create_time"]?></td>
                            </tr>
                            <tr>
                                <th>最後更新時間</th>
                                <td colspan="2"><?=$row["update_time"]?></td>
                            </tr>
                            <tr>
                                <th>問題標題</th>
                                <th colspan="2"><?=$row["title"]?></th>
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
                                    <!-- <form action="user_doDelete.php" method="post"> -->
                                    <?php foreach($rowsDetail as $rowDetail): ?>
                                    <p class="text-start my-2">
                                        <?=$rowDetail["create_time"]?>
                                        <input type="checkbox" name="arrayId[]" value="<?=$rowDetail["id"]?>">
                                    </p>
                                    <?php endforeach;?>
                                    <!-- <button class="btn btn-red" type="submit">
                                        <img class="bi pe-none mb-1" src="/mfee27-team4-git/icon/delete-icon.svg" width="16" height="16"></img>刪除
                                    </button> -->
                                    <input type="hidden" name="user_qna_id" value="<?=$rowDetail["user_qna_id"]?>">
                                    <!-- </form> -->
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <th>進行回覆</th>
                                <td colspan="1">
                                    <!-- <textarea type="" pattern=".*[^ ].*" class="form-control inputcontent" placeholder='輸入對話' name="reply" ></textarea> -->
                                    <input type="text" name="reply" class="form-control inputcontent"  placeholder="輸入內容" autocomplete="off" >
                                </td>  
                                <td>

                                </td>  
                            </tr>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="py-2 mx-2  ">
                                    <button onclick="rep()" class="btn btn-green" type="">確定</button>
                                    <input type="hidden" name="user_qna_id" value="<?=$user_qna_id?>">
                                </div>
                                <div class="py-2 mx-2">
                                    <a class="btn btn-grey" href="user_qna.php">離開</a>
                                </div>
                            </div>
                            <div class="py-2">                                
                                <button onclick="del()" class="btn btn-red" type="">
                                    <img class="bi pe-none mb-1" src="/mfee27-team4-git/icon/delete-icon.svg" width="16" height="16"></img>
                                    刪除
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
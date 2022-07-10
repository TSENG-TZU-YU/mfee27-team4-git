<?php
require("../../db-connect.php");

// $sqlCount=$_POST["sqlCount"];
// if($sqlCount>0){
//     $order_id=$_POST["order_id"];
//     header("location: qna_reply_table.php?order_id=".$order_id);
// }

// $name=$_POST["name"];
// $user_id=$_POST["user_id"];
// $order_id=$_POST["order_id"];
// $sql="SELECT * FROM order_product WHERE order_id = $order_id" ;
// $result=$conn->query($sql); 
// $row = $result->fetch_assoc();
// // print_r($row);
// ?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>我要問問題</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../../style.css">
    </link>
    <style>
        .inputcontent{
            height: 100px;    
        }
        .content{
            width: 960px;
        }
    </style>
</head>
<body>
<div class="container">
    <main class="px-5 py-4">
        <!-- 麵包屑 breadcrumb -->
        <biv aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="#">首頁</a></li>
                <li class="breadcrumb-item" aria-current="page">與我們聯絡</li>
            </ol>
        </biv>
        <!-- 麵包屑 breadcrumb end --> 
        <div class="content mx-auto">
            <h1>聯絡表單</h1>
            <hr>                   
            <form action="doAsker.php" method="post">
                <table class="table">
                    <tr>
                        <th>姓名:</th>
                        <td colspan="1">
                            <!-- <textarea type="" pattern=".*[^ ].*" class="form-control inputcontent" placeholder='輸入對話' name="reply" ></textarea> -->
                            <input type="text" name="title" class="form-control " placeholder='請輸入您的姓名' required >
                        </td>
                    </tr> 
                    <tr>
                        <th>電子郵件:</th>
                        <td colspan="1">
                            <!-- <textarea type="" pattern=".*[^ ].*" class="form-control inputcontent" placeholder='輸入對話' name="reply" ></textarea> -->
                            <input type="email" name="title" class="form-control " placeholder='請輸入您的E-MAIL'  required >
                        </td>
                    </tr> 
                    <tr>
                        <th>聯絡電話:</th>
                        <td colspan="1">
                            <!-- <textarea type="" pattern=".*[^ ].*" class="form-control inputcontent" placeholder='輸入對話' name="reply" ></textarea> -->
                            <input type="phone" name="title" class="form-control " placeholder='請填寫連絡電話'  required >
                        </td>
                    </tr> 
                    <tr>
                        <th>問題類型:</th>
                        <td>
                        <select  class="form-control " name="q_category">
                            <option value="其他問題">選擇問題</option>
                            <option value="商品問題">商品問題</option>
                            <option value="訂單問題">訂單問題</option>
                            <option value="課程問題">課程問題</option>
                            <option value="場地租借問題">場地租借問題</option>
                            <option value="退貨、退款問題">退貨、退款問題</option>
                            <option value="運費、寄送問題">運費、寄送問題</option>
                            <option value="其他問題">其他問題</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th>問題標題:</th>
                        <td colspan="1">
                            <input type="text" name="title" class="form-control " placeholder='輸入標題' required >
                        </td>
                    </tr>                            
                    <tr>
                        <th>題問內容:</th>
                        <td colspan="1">
                            <textarea class="form-control inputcontent" placeholder='輸入內容' name="reply" oninvalid="setCustomValidity('不能為空值');" oninput="setCustomValidity('');" required></textarea>
                            <!-- <input type="text" name="reply" class="form-control inputcontent" pattern=".*[^ ].*" autocomplete="off" oninvalid="setCustomValidity('不能為空值');" oninput="setCustomValidity('');" required > -->
                        </td>  
                        <td></td>  
                    </tr>
                </table>
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="py-2 mx-2  ">
                            <button class="btn btn-green" type="submit">確定</button>
                            <input type="hidden" name="order_id" value="<?=$order_id?>">
                            <input type="hidden" name="user_id" value="<?=$user_id?>">
                            <input type="hidden" name="name" value="<?=$name?>">
                            <input type="hidden" name="account" value="<?=$row["account"]?>">                                                                        
                        </div>
                        <div class="py-2 mx-2">
                            <a class="btn btn-grey" href="my_order.php">取消</a>
                        </div>
                    </div>    
                </div>
            </form>     
        </div>      
    </main>
</div>
</body>
</html>
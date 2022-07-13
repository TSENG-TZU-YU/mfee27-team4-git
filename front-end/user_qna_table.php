<?php
session_start();
require("../../db-connect.php");
// var_dump($_SESSION);


?>
<!doctype html>
<html lang="zh-tw">
<head>
    <title>HAMAYA MUSIC</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="zh-tw" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        article img{
            max-width: 100%;
        }
        .avatar{
            width: 80px;
            height: 80px;
            background: #aaa;
        }
        .breadcrumb a{
            text-decoration: none;
        }
        .object-cover{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .content{
            min-height:700px;
        }
        .inputcontent{
            height: 150px;    
        }
        .formitem{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <header class="py-3">
            <h1 class="mx-3">HAMAYA MUSIC</h1>
        </header>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="front_index.php">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">關於我門</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">最新消息</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">音樂教育</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">樂器商城</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">場地租借</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_qna_table.php">與我們聯絡</a>
                    </li>
                    </ul>
                </div>
                <?php if(isset($_SESSION["front_user"])):?>
                     Hello!! <?=$_SESSION["front_user"]["name"]?><a href="doLogut.php" class="btn btn-outline-info mx-3" >登出</a>
                <?php else:?>
                    <a href="front_login.php" class="btn btn-outline-info" >會員登入</a>    
                <?php endif;?>                
            </div>
          </nav>
        <div class="container">
        <div class="row mt-3">
            <main class="<?php if(isset($_SESSION["front_user"])){echo"col-md-10";}else{echo"col-md";}?>">
            <article class="content">
                <h1>聯絡表單</h1>
                <hr>                   
                <form action="user_qna_doAsker.php" method="post">
                    <div class="formitem">
                        <label for="name" class="fs-5 fw-bolder">姓名</label>
                        <input type="text" id="name" name="name" class="form-control mt-2 mb-3" placeholder='請輸入您的姓名' value="<?php if(isset($_SESSION["front_user"])) echo $_SESSION["front_user"]["name"]?>"<?php if(isset($_SESSION["front_user"])) echo"disabled"?> required >
                        <label for="email" class="fs-5 fw-bolder">電子郵件</label>
                        <input type="email" id="email" name="email" class="form-control mt-2 mb-3" placeholder='請輸入您的E-MAIL' value="<?php if(isset($_SESSION["front_user"])) echo $_SESSION["front_user"]["email"]?>"<?php if(isset($_SESSION["front_user"])) echo"disabled"?> required >
                        <label for="phone" class="fs-5 fw-bolder">聯絡電話</label>
                        <input type="phone" id="phone" name="phone" class="form-control mt-2 mb-3" placeholder='請填寫連絡電話' value="<?php if(isset($_SESSION["front_user"])) echo $_SESSION["front_user"]["phone"]?>"<?php if(isset($_SESSION["front_user"])) echo"disabled"?> required >
                        <label for="q_category" class="fs-5 fw-bolder">問題類型</label>
                        <select id="q_category" class="form-control mt-2 mb-3" name="q_category">
                            <option value="其他問題">選擇問題</option>
                            <option value="商品問題">商品問題</option>
                            <option value="訂單問題">訂單問題</option>
                            <option value="課程問題">課程問題</option>
                            <option value="場地租借問題">場地租借問題</option>
                            <option value="退貨、退款問題">退貨、退款問題</option>
                            <option value="運費、寄送問題">運費、寄送問題</option>
                            <option value="其他問題">其他問題</option>
                        </select>
                        <label for="title" class="fs-5 fw-bolder">問題標題</label>
                        <input type="text" id="title" name="title" class="form-control mt-2 mb-3" placeholder='請輸入標題' required >
                        <label for="reply" class="fs-5 fw-bolder">題問內容</label>
                        <textarea id="reply" class="form-control inputcontent mt-2 mb-3" placeholder='輸入內容' name="reply" pattern=".*[^ ].*" oninvalid="setCustomValidity('不能為空值');" oninput="setCustomValidity('');" required></textarea>
                        <div class="d-flex">
                            <div class="py-2 mx-2  ">
                                <button class="btn btn-green" type="submit">送出</button>
                            </div>
                            <div class="py-2 mx-2">
                                <a class="btn btn-grey" href="front_index.php">取消</a>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
            </article>
            </main>
            <?php if(isset($_SESSION["front_user"])):?>
            <aside class="col-md-2">
                <div class="sticky-top">
                    <h3 class="border-start border-5 border-info ps-2 py-1 ">會員專區</h3>
                    <div class="list-group list-group-flush">
                    <a href="my_order.php" class="list-group-item list-group-item-action" aria-current="true">
                        我的訂單
                    </a>
                    <a href="my_qna.php" class="list-group-item list-group-item-action" aria-current="true">
                        我的提問
                    </a>
                  </div>
                </div>
            </aside>
            <?php endif;?>
        </div>
    </div>
    <footer class="text-center py-4 bg-green-color text-light">Designed by mfee27-team4 2022 </footer>
</body>

</html>
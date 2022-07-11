<?php
session_start();
if(!isset($_SESSION["front_user"])){
    header("location: front_login.php");
  }
require("../db-connect.php");

$user_id=$_SESSION["front_user"]["id"];

$sql="SELECT * FROM user_qna WHERE user_id =$user_id";
// print_r($sql);
$result=$conn->query($sql); 
$rows=$result->fetch_all(MYSQLI_ASSOC); 
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
        .reply-state{
            width: 45px;
            height: 30px;
            /* background: red; */
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            font-size: 13px;
            right: -35px;
            top: -9px;
            border-radius: 15px;
        }
        .content{
            min-height:700px;
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
                <h1><?=$_SESSION["front_user"]["name"]?>的提問<a class="btn btn-khak fs-5 p-1" href="user_qna_table.php">我要提問＋</a></h1>
                <table class="table mt-2">
                    <thead>
                        <tr >
                            <th scope="col" class="text-nowrap">提問編號</th>
                            <th scope="col" class="text-nowrap">問題類型</th>
                            <th scope="col" class="text-nowrap">問題標題</th>
                            <th scope="col" class="text-nowrap">回覆狀態</th>
                            <th scope="col" class="text-nowrap">詢問時間</th>
                            <th scope="col" class="text-nowrap">最後更新時間</th>        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rows as $row): ?>
                        <tr>
                            <th class="text-nowrap"><?=$row["id"]?> </th>
                            <td class="text-nowrap"><?=$row["q_category"]?></td>
                            <td class="text-nowrap"><?=$row["title"]?></td>
                            <td class="text-nowrap"><?=$row["user_reply_state"]?></td>
                            <td class="text-nowrap"><?=$row["create_time"]?></td>
                            <td class="text-nowrap"><?=$row["update_time"]?></td>
                            <td class="text-nowrap">
                                <form action="user_qna_reply_table.php" method="get">  
                                <button class="btn btn-green me-2 position-relative" type="submit">
                                    <img class="bi pe-none mb-1" src="../icon/update-icon.svg" width="16" height="16"></img>
                                    查看問題
                                    <span class="reply-state <?php if($row["user_reply_state"]=="未回覆"){echo"bg-danger";}else{echo"bg-success";}?>" ><?=$row["user_reply_state"]?></span>
                                </button>
                                <input type="hidden" name="user_qna_id" value="<?=$row["id"]?>">
                                </form>  
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
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
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
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
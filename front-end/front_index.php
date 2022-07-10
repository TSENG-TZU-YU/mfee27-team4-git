<?php
session_start();
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
                    <h1>私たちに関しては</h1>
                    <div class="mb-3">
                        <img width=700 class="rounded mx-auto d-block" src="../icon/musical-note-decoration-bg.svg" alt="">
                    </div>
                    <p>
                    は、静岡県浜松市に本社を置く、楽器や半導体、音響機器（オーディオ・ビジュアル）、スポーツ用品、自動車部品、ネットワーク機器の製造発売を手がける日本のメーカー。日経平均株価の構成銘柄のひとつ。1969年にピアノ生産台数で世界一となり、販売額ベースで現在でも世界首位である。このほかの楽器でも、ハーモニカやリコーダー、ピアニカといった学校教材用からエレクトリックギターやドラム、ヴァイオリン、チェロ、トランペット、サクソフォーンなど100種類以上もの楽器を生産する世界最大の総合楽器・音響メーカーである。
                    </p>
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
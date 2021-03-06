<?php
require("../db-connect.php");
session_start();

$sqlCount=$_POST["sqlCount"];
if($sqlCount>0){
    $order_id=$_POST["order_id"];
    header("location: qna_reply_table.php?order_id=".$order_id);
}

$name=$_POST["name"];
$user_id=$_POST["user_id"];
$order_id=$_POST["order_id"];
$sql="SELECT * FROM order_product WHERE order_id = $order_id" ;
$result=$conn->query($sql); 
$row = $result->fetch_assoc();
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
            height: 100px;    
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
                        <a class="nav-link active" aria-current="page" href="front_index.php">??????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_qna_table.php">???????????????</a>
                    </li>
                    </ul>
                </div>
                <?php if(isset($_SESSION["front_user"])):?>
                     Hello!! <?=$_SESSION["front_user"]["name"]?><a href="doLogut.php" class="btn btn-outline-info mx-3" >??????</a>
                <?php else:?>
                    <a href="front_login.php" class="btn btn-outline-info" >????????????</a>    
                <?php endif;?>                
            </div>
          </nav>
        <div class="container">
        <div class="row mt-3">
            <main class="<?php if(isset($_SESSION["front_user"])){echo"col-md-10";}else{echo"col-md";}?>">
                <article class="content">
                <h1>??????"<?=$order_id?>"?????????</h1>
                <hr>                   
                <form action="qna_doAsker.php" method="post" class="formitem">
                    <div class="formitem">
                        <label for="q_category" class="fs-5 fw-bolder">????????????</label>    
                        <select id="q_category" class="form-control mt-2 mb-3" name="q_category">
                            <option value="????????????">????????????</option>
                            <option value="????????????">????????????</option>
                            <option value="????????????">????????????</option>
                            <option value="????????????">????????????</option>
                            <option value="??????????????????">??????????????????</option>
                            <option value="?????????????????????">?????????????????????</option>
                            <option value="?????????????????????">?????????????????????</option>
                            <option value="????????????">????????????</option>
                        </select>
                        <label for="title" class="fs-5 fw-bolder">????????????</label>
                        <input type="text" id="title" name="title" class="form-control mt-2 mb-3" placeholder='???????????????' required >
                        <label for="reply" class="fs-5 fw-bolder">????????????</label>
                        <textarea id="reply" class="form-control inputcontent mt-2 mb-3" placeholder='????????????' name="reply" oninvalid="setCustomValidity('???????????????');" oninput="setCustomValidity('');" required></textarea>
                        <div class="d-flex">
                            <div class="py-2 mx-2  ">
                                <button class="btn btn-green" type="submit">??????</button>
                                <input type="hidden" name="order_id" value="<?=$order_id?>">
                                <input type="hidden" name="user_id" value="<?=$user_id?>">
                                <input type="hidden" name="name" value="<?=$name?>">

                            </div>
                            <div class="py-2 mx-2">
                                <a class="btn btn-grey" href="my_order.php">??????</a>
                            </div>
                        </div>
                    </div>
                </form>   
                </article>
            </main>
            <?php if(isset($_SESSION["front_user"])):?>
            <aside class="col-md-2">
                <div class="sticky-top">
                    <h3 class="border-start border-5 border-info ps-2 py-1 ">????????????</h3>
                    <div class="list-group list-group-flush">
                    <a href="my_order.php" class="list-group-item list-group-item-action" aria-current="true">
                        ????????????
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        ????????????
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
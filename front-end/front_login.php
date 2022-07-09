<?php
session_start();
if(isset($_SESSION["user"])){
    header("location: dashboard.php");
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body{
            background: url("/images/sky.jpg") center center;
            background-size: cover;
        }
        .sing-out-panel{
            width: 280px;
        }
        .logo{
            height: 64px;
        }
        .input-top{
            border-radius: 0.375rem 0.375rem 0 0;
            border-bottom: 0 ;
        }
        .input-bottom{
            border-radius: 0 0 0.375rem 0.375rem ;
        }
        .form-floating>label{
            z-index: 2;
        }
        .form-control{
            position: relative;
        }
       .form-control:focus{
            z-index: 1;
       }
    </style>
</head>
<body>
    <div class="container">
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="sing-out-panel">
            <?php if(isset($_SESSION["error"]) && $_SESSION["error"]["times"]>=5): ?>
                <h2 class="text-success">您已嘗試錯誤超過5次,請稍後再登入</h2>
            <?php else: ?>
                <form action="doLogin.php" method="post">
                    <div class="text-center">
                        <img class="logo" src="images/Bootstrap_logo.svg" alt="">
                        <h1 class="h2 mt-2">Please sign in</h1>
                    </div>    
                    <div class="form-floating">
                        <input type="text" class="form-control input-top"id="floatingInput" placeholder="your account" name="account">
                        <label for="floatingInput">Account</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control input-bottom" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="mt-3 mb-2 d-flex">
                        <?php if(isset($_SESSION["error"])):?>
                            <div class="text-success">
                                <?=$_SESSION["error"]["message"]?>
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                    <div class="pt-4 text-center text-muted">
                        © 2017–2022
                    </div>
                </form>
            <?php endif;?>    
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
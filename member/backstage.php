<?php
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <title>後台登入</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">

    <style>
        body {
            background: #265f74;
            background: -webkit-linear-gradient(to top, #aaa, #265f74);
            background: linear-gradient(to top, #aaa, #265f74);


        }

        .sign-up-width {
            width: 280px;
        }
     
    
    </style>
</head>

<body>

    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div>
            <div class=" mb-5 ">
                <h1>HAMAY 後臺登入</h1>
            </div>
            <form action="bgDoLogin.php" method="post" class="sign-up-width">

                <div class="form-floating mb-3  ">
                    <input name="account" type="text" class="form-control input-top" id="floatingInput" placeholder="your account">
                    <label for="floatingInput">Account</label>
                </div>
                <div class="form-floating mb-3  ">
                    <input name="password" type="password" class="form-control input-button" id="floatingPassword" placeholder="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="my-3 d-flex mb-2  ">

                    <?php if (isset($_SESSION["error"])) : ?>
                        <div class="text-danger"><?= $_SESSION["error"]["message"] ?> </div>
                    <?php endif; ?>

                </div>

                <div class="d-grid gap-2 mb-3 ">
                    <button type="submit" class="btn btn-green d-grid">Sign in</button>
                </div>

            </form>
        </div>
    </div>

</html>
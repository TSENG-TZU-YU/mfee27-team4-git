<!doctype html>
<html lang="en">

<head>
    <title>後台登入</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        body {
            background: #265f74;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #6194a7, #265f74);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #6194a7, #265f74);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        .sign-up-width {
            width: 280px;
        }

    
    </style>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="sign-up-width">
            <form>
                <div class="form-floating mb-3 ">
                    <input name="account" type="text" class="form-control input-top" id="floatingInput" placeholder="your account">
                    <label for="floatingInput">Account</label>
                </div>
                <div class="for-floating mb-3 ">
                    <input type="password" class="form-control" id="exampleInputPassword1">
                    <label for="floatingInputPassword" class="form-label h4">密碼</label>
                </div>

                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary d-grid">登入</button>
                </div>

            </form>
        </div>
    </div>

</html>
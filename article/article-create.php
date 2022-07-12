<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>HAMAYA MUSIC - 新增文章</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../style.css">
    </link>
    <style>
        .object-cover {
            width: 100%;
            object-fit: cover;
        }

        .iframe-cover {
            height: 300px;
            width: 100%;
            object-fit: cover;
        }

        .text-align-justify {
            text-align: justify;
        }
    </style>


</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex">

            <!-- 導覽列 nav -->
            <!-- 導覽列 nav end -->


            <!-- 主要區塊 main -->
            <main class="col-10 px-5 py-4">

                <!-- 麵包屑 breadcrumb -->
                <biv aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold">
                        <li class="breadcrumb-item"><a href="#">首頁</a></li>
                        <li class="breadcrumb-item"><a href="articles.php">文章管理</a></li>
                        <li class="breadcrumb-item" aria-current="page">新增文章</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <h3>新增文章</h3>
                    <hr>
                    <div class="row">
                        <div class="container">
                            <form action="article-doCreate.php" method="post" enctype="multipart/form-data">
                                <div class="form-row row">
                                    <div class="form-group col-6 mt-1">
                                        <label for="title" class="fw-bold">文章標題</label>
                                        <input type="text" class="form-control mt-1" name="title">
                                    </div>
                                    <div class="form-group col-6 mt-1">
                                        <label for="category" class="fw-bold">文章類別</label>
                                        <select class="form-select mt-1" aria-label="Default select example" name="category">
                                            <option selected value="請選擇文章類別">請選擇文章類別</option>
                                            <option value="產品資訊">產品資訊</option>
                                            <option value="活動快訊">活動快訊</option>
                                            <option value="音樂教育">音樂教育</option>
                                            <option value="重要通知">重要通知</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="content" class="fw-bold mt-3">文章內容</label>
                                        <div class=" mt-1">
                                            <textarea class="form-control" style="resize:none; height: 400px" name="content"></textarea>
                                            <!-- <label for="floatingTextarea2"></label> -->
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="image" class="fw-bold mt-3">文章圖片</label>
                                        <input type="file" class="form-control mt-2" id="upload" name="image">
                                        <img class="img-fluid rounded object-cover mb-3 iframe-cover mt-3" id="preview" src="../images/article-img-icon.svg" style="height: 340px;">
                                    </div>
                                </div>


                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <a class="btn btn-khak me-5" href="articles.php">
                                        <img class="mb-1" src="../icon/redo-icon.svg" width="16" height="16"></img>
                                        取消新增
                                    </a>
                                    <button class="btn btn-green" type="submit" name="submit">
                                        <img class="mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                                        送出新增
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- 內容 end -->


            </main>
            <!-- 主要區塊 main end-->
        </div>
    </div>

    <!-- jQuery CDN – Latest Stable Versions -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries end -->

    <script>
        $(function() {

            //預覽上傳圖片
            $('#upload').change(function() {
                var f = document.getElementById('upload').files[0];
                var src = window.URL.createObjectURL(f);
                document.getElementById('preview').src = src;
            });

        });
    </script>

</body>

</html>
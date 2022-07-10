<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>文章管理</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="../style.css">
    </link>



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
                        <li class="breadcrumb-item" aria-current="page">文章管理</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->
                <hr>
                <div class="container">
                    <div class="row">
                        <form action="teacher-search.php" method="get">
                            <div class="row">
                                <p class="col-8 m-auto">本頁 筆資料，總共 筆資料</p>
                                <input class="col form-control me-3" type="text" name="search">
                                <button class="col-1 btn btn-green" type="submit">
                                    <img class="bi pe-none mb-1" src="../icon/search-icon.svg" width="16" height="16"></img>
                                    搜尋
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>

                <!-- 內容 -->
                <div class="container">
                    <!-- 按鈕 -->
                    <div class="d-flex justify-content-between">
                        <div class="col">
                            <a class="col btn btn-green me-2" href="teacher-create.php">
                                <img class="mb-1" src="../icon/create-icon.svg" width="16" height="16"></img>
                                新增文章
                            </a>
                        </div>
                        <!-- 篩選還沒做 -->
                        <form action="teacher-course-search.php" method="get">
                            <div class="d-flex justify-content-between">
                                <div class="me-3">
                                    <select class="form-select mt-1" aria-label="Default select example" name="category">
                                        <option selected value="0">請選擇文章類別</option>
                                        <option value="1">產品資訊</option>
                                        <option value="2">活動快訊</option>
                                        <option value="3">音樂教育</option>
                                        <option value="4">重要通知</option>
                                        <option value="5">最新文章</option>
                                    </select>
                                </div>
                                <button class="btn btn-green" type="submit">
                                    篩選
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="">

                    </div>

                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example text-end" class="d-flex mt-5  justify-content-center">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- 頁碼 end -->
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
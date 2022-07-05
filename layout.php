

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>後台系統</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- 版面元件樣式 css -->
    <link rel="stylesheet" href="style.css">
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
                        <li class="breadcrumb-item" aria-current="page">xxx</li>
                    </ol>
                </biv>
                <!-- 麵包屑 breadcrumb end -->

                <hr>

                <!-- 內容 -->
                <div class="container">
                    <div class="row">
                        <p class="col-8 m-auto">總共 筆資料</p>
                        <input class="col form-control me-3" type="text">
                        <a class="col-1 btn btn-green" href="#">
                            <img class="bi pe-none mb-1" src="icon/search-icon.svg" width="16" height="16"></img>
                            搜尋
                        </a>
                    </div>
                </div>
                <hr>
                <div class="container">

                    <!-- 按鈕 -->
                    <div class="row">
                        <!-- 文字按鈕 -->
                        <a class="col-1 btn btn-green me-2" href="#">
                            <img class="bi pe-none mb-1" src="icon/create-icon.svg" width="16" height="16"></img>
                            新增
                        </a>
                        <a class="col-1 btn btn-khak me-2" href="#">
                            <img class="bi pe-none mb-1" src="icon/update-icon.svg" width="16" height="16"></img>
                            修改
                        </a>
                        <a class="col-1 btn btn-red me-2" href="#">
                            <img class="bi pe-none mb-1" src="icon/delete-icon.svg" width="16" height="16"></img>
                            刪除
                        </a>
                        <a class="col-1 btn btn-grey me-2" href="#">
                            <img class="bi pe-none mb-1" src="icon/read-icon.svg" width="16" height="16"></img>
                            詳細
                        </a>
                        <!-- 無文字按鈕 -->
                        <a class="col-1 btn btn-green me-2" href="#" src="icon/create-icon.svg">
                            <img class="bi pe-none mb-1" src="icon/create-icon.svg" width="16" height="16"></img>
                        </a>
                        <a class="col-1 btn btn-khak me-2" href="#">
                            <img class="bi pe-none mb-1" src="icon/update-icon.svg" width="16" height="16"></img>
                        </a>
                        <a class="col-1 btn btn-red me-2" href="#">
                            <img class="bi pe-none mb-1" src="icon/delete-icon.svg" width="16" height="16"></img>
                        </a>
                        <a class="col-1 btn btn-grey me-2" href="#">
                            <img class="bi pe-none mb-1" src="icon/read-icon.svg" width="16" height="16"></img>
                        </a>
                    </div>
                    <!-- 按鈕 end-->

                    <hr>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">管理者編號</th>
                                <th scope="col">管理者名字</th>
                                <th scope="col">管理者帳號</th>
                                <th scope="col">管理權限</th>
                                <th scope="col">建立時間</th>
                                <th scope="col">管理操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>
                                    <button class="btn btn-grey me-3" type="button">
                                        <img class="bi pe-none mb-1" src="icon/read-icon.svg" width="16" height="16"></img>
                                        詳細
                                    </button>
                                    <button class="btn btn-khak" type="button">
                                        <img class="bi pe-none mb-1" src="icon/update-icon.svg" width="16" height="16"></img>
                                        修改
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@fat</td>
                                <td>
                                    <button class="btn btn-grey me-3" type="button">
                                        <img class="bi pe-none mb-1" src="icon/read-icon.svg" width="16" height="16"></img>
                                        詳細
                                    </button>
                                    <button class="btn btn-khak" type="button">
                                        <img class="bi pe-none mb-1" src="icon/update-icon.svg" width="16" height="16"></img>
                                        修改
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- 頁碼 -->
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- 頁碼 end -->
                </div>


        </div>
        <!-- 內容 end -->

        </main>
        <!-- 主要區塊 main end-->
    </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries end -->

</body>

</html>
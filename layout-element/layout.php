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
            <nav class="col-2 align-self-stretch">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white">
                    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none text-center">
                        <img class="bi pe-none mb-1 me-2" src="icon/music-icon.svg" width="25" height="25"></img>
                        <span class="fs-4">Hamaya music</span>
                    </div>
                    <hr>
                    <div class="d-flex text-white text-decoration-none">
                        <img class="my-2 mx-3" src="icon/avatar-icon.svg" alt="" width="50" height="50" style="color:#fff;"></img>
                        <div class="row g-0">
                            <p class="pt-2">管理者</p>
                            <h4>May</h4>
                        </div>
                    </div>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link my-1 nav-active" aria-current="page">
                                <img class="bi pe-none mb-1 me-2" src="icon/home-icon.svg" width="16" height="16" style="color:#fff;"></img>
                                首頁
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link my-1">
                                <img class="bi pe-none mb-1 me-2" src="icon/member-icon.svg" width="16" height="16"></img>
                                會員管理
                            </a>
                        </li>
                        <li>
                            <a class="nav-link my-1" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <img class="bi pe-none mb-1 me-2" src="icon/order-icon.svg" width="16" height="16"></img>
                                訂單管理
                            </a>
                        </li>
                        <div class="collapse" id="multiCollapseExample1">
                            <div>
                                <a href="#" class="nav-link nav-link-item my-1">樂器商城-訂單紀錄</a>
                                <a href="#" class="nav-link nav-link-item my-1">音樂教育-報名紀錄</a>
                                <a href="#" class="nav-link nav-link-item my-1">場地租借-預約紀錄</a>
                            </div>
                        </div>
                        <li>
                            <a class="nav-link my-1" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <img class="bi pe-none mb-1 me-2" src="icon/products-icon.svg" width="16" height="16"></img>
                                商品管理
                            </a>
                        </li>
                        <div class="collapse" id="multiCollapseExample2">
                            <div>
                                <a href="#" class="nav-link nav-link-item my-1">樂器商城</a>
                                <a href="#" class="nav-link nav-link-item my-1">音樂教育</a>
                                <a href="#" class="nav-link nav-link-item my-1">場地租借</a>
                            </div>
                        </div>
                        <li>
                            <a href="#" class="nav-link my-1">
                                <img class="bi pe-none mb-1 me-2" src="icon/article-icon.svg" width="16" height="16"></img>
                                文章管理
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link my-1">
                                <img class="bi pe-none mb-1 me-2" src="icon/teacher-icon.svg" width="16" height="16"></img>
                                師資管理
                            </a>
                        </li>
                        <li>
                            <a class="nav-link my-1" data-bs-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <img class="bi pe-none mb-1 me-2" src="icon/customer-service-icon.svg" width="16" height="16"></img>
                                客服系統
                            </a>
                        </li>
                        <div class="collapse" id="multiCollapseExample3">
                            <div>
                                <a href="#" class="nav-link nav-link-item my-1">訂單問題</a>
                                <a href="#" class="nav-link nav-link-item my-1">客服問答</a>
                            </div>
                        </div>
                    </ul>
                    <div>
                        <a href="#" class="signOutLink position-absolute bottom-0 start-0 ms-4 mb-2">
                            <img class="bi pe-none mb-1 me-2" src="icon/signout-icon.svg" width="25" height="25"></img>
                            登出
                        </a>
                    </div>
                </div>
            </nav>
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
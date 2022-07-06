<nav class="col-2 align-self-stretch">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white">
        <div class="d-flex align-items-center  my-2 mx-auto text-white text-decoration-none text-center">
            <img class="mb-1 me-2" src="icon/music-icon.svg" width="25" height="25"></img>
            <span class="fs-4">HAMAYA MUSIC</span>
        </div>
        <hr>
        <div class="d-flex text-white text-decoration-none">
            <img class="my-2 mx-3" src="../icon/avatar-icon.svg" alt="" width="50" height="50" style="color:#fff;"></img>
            <div class="row g-0">
                <p class="pt-2">管理者</p>
                <?php if (isset($_SESSION["user"])) : ?>
                    <h4><?= $_SESSION["user"]["name"] ?></h4>
                <?php endif; ?>
            </div>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link my-1 nav-active" aria-current="page">
                    <img class="mb-1 me-2" src="icon/home-icon.svg" width="16" height="16" style="color:#fff;"></img>
                    首頁
                </a>
            </li>
            <li>
                <a href="#" class="nav-link my-1">
                    <img class="mb-1 me-2" src="icon/member-icon.svg" width="16" height="16"></img>
                    會員管理
                </a>
            </li>
            <li>
                <a class="nav-link my-1" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <img class="mb-1 me-2" src="icon/order-icon.svg" width="16" height="16"></img>
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
                    <img class="mb-1 me-2" src="icon/products-icon.svg" width="16" height="16"></img>
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
                    <img class="mb-1 me-2" src="icon/article-icon.svg" width="16" height="16"></img>
                    文章管理
                </a>
            </li>
            <li>
                <a href="#" class="nav-link my-1">
                    <img class="mb-1 me-2" src="icon/teacher-icon.svg" width="16" height="16"></img>
                    師資管理
                </a>
            </li>
            <li>
                <a class="nav-link my-1" data-bs-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <img class="mb-1 me-2" src="icon/customer-service-icon.svg" width="16" height="16"></img>
                    客服系統
                </a>
            </li>
            <div class="collapse" id="multiCollapseExample3">
                <div>
                    <a href="#" class="nav-link nav-link-item my-1">訂單問題</a>
                    <a href="#" class="nav-link nav-link-item my-1">客服問答</a>
                </div>
            </div>
            <li>
                <a href="#" class="nav-link my-1">
                    <img class="mb-1 me-2" src="icon/teacher-icon.svg" width="16" height="16"></img>
                    優惠券
                </a>
            </li>
        </ul>
        <div>
            <a href="#" class="signOutLink bottom-0 start-0 ms-4 mb-3 fixed-bottom">
                <img class="mb-1 me-2" src="icon/signout-icon.svg" width="25" height="25"></img>
                登出
            </a>
        </div>
    </div>
</nav>
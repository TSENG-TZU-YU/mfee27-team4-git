<nav class="col-2 align-self-stretch">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white">
        <div class="d-flex align-items-center  my-2 mx-auto text-white text-decoration-none text-center">
            <img class="mb-1 me-2" src="/mfee27-team4-git/icon/music-icon.svg" width="25" height="25"></img>
            <span class="fs-4">HAMAYA MUSIC</span>
        </div>
        <hr>
        <div class="d-flex text-white text-decoration-none">
            <img class="my-2 mx-3" src="/mfee27-team4-git/icon/avatar-icon.svg" alt="" width="50" height="50" style="color:#fff;"></img>
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
                <a href="http://localhost/mfee27-team4-git/home.php" class="nav-link my-1 " aria-current="page">
                    <img class="mb-1 me-2" src="/mfee27-team4-git/icon/home-icon.svg" width="16" height="16" style="color:#fff;"></img>
                    首頁
                </a>
            </li>
            <li>
                <a href="http://localhost/mfee27-team4-git/member/users.php" class="nav-link my-1 <?php if ($sqlMember) echo "nav-active" ?> ">
                    <img class="mb-1 me-2" src="/mfee27-team4-git/icon/member-icon.svg" width="16" height="16"></img>
                    會員管理
                </a>
            </li>
            <li>
                <a href="http://localhost/mfee27-team4-git/order/order-list.php" class="nav-link my-1 <?php if ($sqlOrder) echo "nav-active" ?>">
                    <img class="mb-1 me-2" src="/mfee27-team4-git/icon/order-icon.svg" width="16" height="16"></img>
                    訂單管理
                </a>
            </li>
            <li>
                <a class="nav-link my-1" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <img class="mb-1 me-2" src="/mfee27-team4-git/icon/products-icon.svg" width="16" height="16"></img>
                    商品管理
                </a>
            </li>
            <div class="<?php if ($sqlIns || $sqlCourse || $sqlPlace){echo "collapse-in";}else {echo "collapse";}  ?>" id="multiCollapseExample2">
                <div>
                    <a href="http://localhost/mfee27-team4-git/ins-shop/ins-shop.php" class="nav-link nav-link-item my-1 <?php if ($sqlIns) echo "nav-active " ?>">樂器商城</a>
                    <a href="http://localhost/mfee27-team4-git/course-shop/course-shop.php" class="nav-link nav-link-item my-1 <?php if ($sqlCourse) echo "nav-active " ?>">音樂教育</a>
                    <a href="http://localhost/mfee27-team4-git/place-shop/place-shop.php" class="nav-link nav-link-item my-1 <?php if ($sqlPlace) echo "nav-active " ?>">場地租借</a>
                </div>
            </div>
            <li>
                <a href="http://localhost/mfee27-team4-git/article/articles.php" class="nav-link my-1">
                    <img class="mb-1 me-2" src="/mfee27-team4-git/icon/article-icon.svg" width="16" height="16"></img>
                    文章管理
                </a>
            </li>
            <li>
                <a href="http://localhost/mfee27-team4-git/teacher/teachers.php" class="nav-link my-1">
                    <img class="mb-1 me-2" src="/mfee27-team4-git/icon/teacher-icon.svg" width="16" height="16"></img>
                    師資管理
                </a>
            </li>
            <li>
                <a class="nav-link my-1" data-bs-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <img class="mb-1 me-2" src="/mfee27-team4-git/icon/customer-service-icon.svg" width="16" height="16"></img>
                    客服系統
                </a>
            </li>
            <div class="<?php if ($sqlOrder_qna ||$sqlUser_qna){echo "collapse-in";}else {echo "collapse";}  ?>" id="multiCollapseExample3">
                <div>
                    <a href="http://localhost/mfee27-team4-git/customer/order_qna/order_qna.php" class="nav-link nav-link-item my-1 <?php if ($sqlOrder_qna) echo "nav-active " ?>">訂單問題</a>
                    <a href="http://localhost/mfee27-team4-git/customer/user_qna/user_qna.php" class="nav-link nav-link-item my-1  <?php if ($sqlUser_qna) echo "nav-active " ?>">客服問答</a>
                </div>
            </div>
            <li>
                <a href="http://localhost/mfee27-team4-git/coupon/coupons.php" class="nav-link my-1 <?php if ($sqlCoupon) echo "nav-active" ?>">
                    <img class="mb-1 me-2" src="/mfee27-team4-git/icon/sell-icon.svg" width="16" height="16"></img>
                    優惠券
                </a>
            </li>
        </ul>
        <a href="http://localhost/mfee27-team4-git/user-doLogut.php" class="signOutLink bottom-0 start-0 position-fixed p-2 m-2">
            <img class="mb-1 me-2" src="/mfee27-team4-git/icon/signout-icon.svg" width="25" height="25"></img>
            登出
        </a>
    </div>
</nav>
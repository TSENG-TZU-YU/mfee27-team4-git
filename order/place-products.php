<?php
require("../db-connect.php");
session_start();



$sqlPla = "SELECT * FROM place_produce";

$resultPla = $conn->query($sqlPla);
$product_countPla = $resultPla->num_rows;
$rows = $resultPla->fetch_all(MYSQLI_ASSOC);

?>
<!doctype html>
<html lang="en">

<head>
    <title>place-Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<style>
    .ellipsis {
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      /* display: -webkit-box; */
      /* -webkit-line-clamp: 3; */
      /* -webkit-box-orient: vertical; */
      /* white-space: normal; */
      text-align: justify;
    }
    .object-cover {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cart-count {
        width: 28px;
        height: 28px;
        background: red;
        color: white;
        display: flex;
        position: absolute;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        right: -14px;
        top: -14px;
        border-radius: 50%;
    }
</style>

<body>
    <div class="container">
        <?php
        $cart_count = isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0;
        ?>
        <div class="pt-5 pb-2 text-end">
            <a class="btn btn-grey position-relative" href="cart.php">購物車<span id="cartCount" class="cart-count"><?= $cart_count ?></span></a>
        </div>
        <ul class="nav nav-pills py-3">
            <li class="nav-item ">
                <a class="btn btn-grey me-3" href="ins-products.php">樂器商城</a>
                <a class="btn btn-grey me-3" href="place-products.php">場地租借</a>
                <a class="btn btn-grey me-3" href="course-products.php">音樂教育</a>
            </li>
        </ul>
        <?php require("price-filter.php") 
        ?>
        <div class="py-2">
            共<?= $product_countPla ?>筆資料
        </div>

        <?php require("product-list.php") ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        const btnCart = document.querySelectorAll(".btn-cart");
        const count = document.querySelector("#cartCount");
        for (let i = 0; i < btnCart.length; i++) {
            btnCart[i].addEventListener("click", function() {
                // console.log("click");
                let id = this.dataset.id //抓產品id
                let cate = this.dataset.cate; //抓產品cate
                // console.log(id)
                // console.log(cate)
                $.ajax({
                        method: "POST", //or GET 
                        url: "add-cart.php", //撈資料 那裏寫了php
                        dataType: "json",
                        data: {
                            product_id: id,
                            category: cate
                        }
                    })
                    .done(function(response) {
                        // console.log(response);
                        let cartCount = response.count;
                        count.innerText = cartCount;
                        alert("成功加入購物車");

                    }).fail(function(jqXHR, textStatus) {
                        console.log("Request failed: " + textStatus);
                    });
            })
        }
    </script>
</body>

</html>
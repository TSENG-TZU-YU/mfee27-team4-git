<?php
session_start();
// if (!isset($_SESSION["cart"])) {
//     header("location:music-products.php");
// }
require("../db-connect.php");
$sqlPayMethod = "SELECT * FROM pay_by";
$resultPayMethod = $conn->query($sqlPayMethod);
$payMethodrows = $resultPayMethod->fetch_all(MYSQLI_ASSOC);
$payMethodCount = $resultPayMethod->num_rows;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="py-2 text-end">
            <a class="btn btn-info" href="ins-products.php">繼續購物</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>產品名稱</th>
                    <th>單價</th>
                    <th>數量</th>
                    <th>小記</th>
                </tr>
            </thead>
            <?php
            // var_dump($_SESSION["cart"]);
            // echo "<br>";

            $total = 0;
            $cateArr = [];
            foreach ($_SESSION["cart"] as $item) :
                $product_id = key($item);
                array_push($cateArr, $product_id);
            endforeach;

            $_SESSION["proCate"] = $cateArr;
            $products = array_count_values($cateArr); //算數量
            var_dump($products);
            echo "<br>";
            $_SESSION["products"] = $products;




            foreach ($products as $key => $value) :
                $arrKey = str_split($key);

                if ($arrKey[0] == "A") {
                    $sql = "SELECT instrument_product.*
                FROM instrument_product 
                WHERE product_id='$key'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                }
                if ($arrKey[0] == "B") {
                    $sql = "SELECT course_product.*
                FROM course_product
                WHERE product_id='$key'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                }
                if ($arrKey[0] == "C") {
                    $sql = "SELECT place_produce.*
                FROM place_produce
                WHERE product_id='$key'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                }
            ?>
                <tr>
                    <td><?= $row["name"] ?><input type="hidden" name="category_id" value="<?= $row["category"] ?>"></td>
                    <td class="text-end"><?= $row["price"] ?></td>
                    <td class="text-end"><?= $value ?></td>
                    <td class="text-end"><?= $row["price"] * $value ?></td>
                </tr>
            <?php
                $total += ($row["price"] * $value);
                $_SESSION["total_amount"] = $total;

            endforeach;

            ?>
            <tr>
                <td colspan="4" class="text-end">總計: <span><?= $total ?></span></td>
            </tr>
        </table>
        <form action="pay.php" method="POST">
            <table class="table">
                <tr>
                    <th class="text-end">付款方式：</th>
                    <td>
                        <select class="form-select" name="payMethod">
                            <?php for ($i = 0; $i < $payMethodCount; $i++) : ?>
                                <option value="<?= $payMethodrows[$i]["id"] ?>"><?= $payMethodrows[$i]["name"] ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <?php
                foreach ($products as $key => $value) :
                    // echo $key;
                    // echo "<br>";
                    $arrKey = str_split($key);
                    var_dump($arrKey);
                    if ($arrKey[0] == "A") : ?>
                        <tr>
                            <th class="text-end">貨物寄送地址：</th>
                            <td>
                                <input type="text" name="address" class="form-control">
                            </td>
                        </tr>
                        <?php break; else: ?>
                            <tr></tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
            <div class="py-2 text-end">
                <button type="submit" class="btn btn-info">結帳</button>
            </div>
        </form>
    </div>
</body>

</html>
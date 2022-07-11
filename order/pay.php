<?php
session_start();

// if(!isset($_SESSION["cart"])){
//   echo "購物車不可為空";
//   exit;
// }

require("../db-connect.php");
$user_id = "test123"; //因為沒有登入狀態所以先預設
// $cate=$_POST["category_id"];
$payMethod = $_POST["payMethod"];
$address = $_POST["address"];
echo $payMethod . "<br>";
echo $address . "<br>";
$amount = count($_SESSION["cart"]);
date_default_timezone_set("Asia/Taipei");
$now = date('Y-m-d H:i:s');
$total_amount = $_SESSION["total_amount"];
// echo $total_amount . "<br>";
$sql = "INSERT INTO order_product (account, create_time,total_amount,payment_method,payment_state,order_state,valid) VALUES ('$user_id', '$now',$total_amount,'$payMethod',1,1,1)";
// echo $sql;
// echo "<br>";
$pro = $_SESSION["products"];
// var_dump($pro);
// echo "<br>";


if ($conn->query($sql) === TRUE) {
  $order_id = $conn->insert_id; //取得insert進去這筆訂單的id
  echo $order_id;
  foreach ($pro as $key => $value) {
    $sql = "SELECT * FROM instrument_product WHERE product_id='$key'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $category_id = $row["category"];

    $sqlDetail = "INSERT INTO order_product_detail (order_id, product_id, category_id,amount,valid) VALUES ('$order_id', '$key', '$category_id',$value,1)";
    echo $sqlDetail;
    echo "<br>";
    var_dump($row);
    echo "<br>";
  



  // foreach ($_SESSION["cart"] as $item) {
  //   $product_id = key($item);
  //   $category_id = current($item);
  //   var_dump($item);
  //   echo "<br>";

  //   // 要把總數傳過來
  //   $sqlDetail = "INSERT INTO order_product_detail (order_id, product_id, category_id,valid) VALUES ('$order_id', '$product_id', '$category_id',1)";

    if (!$conn->query($sqlDetail)) {
      echo "Error: " . $sqlDetail . "<br>" . $conn->error;
    }
  }
  unset($_SESSION["cart"]);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>結帳</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
  <h1 class="text-center">訂單成立</h1>
  <div class="py-2 text-center">
    <a href="music-products.php">回產品列表</a>
  </div>
</body>

</html>
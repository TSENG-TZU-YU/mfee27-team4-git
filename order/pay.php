<?php
session_start();
if(!isset($_SESSION["cart"])){
  echo "購物車不可為空";
  exit;
}
require("../db-connect.php");

$user_id = "qazwsx"; //因為沒有登入狀態所以先預設
$payMethod = $_POST["payMethod"];
if(isset($_POST["address"])){
  $address=$_POST["address"];
}else{
  $address="";
}
date_default_timezone_set("Asia/Taipei");
$now = date('Y-m-d H:i:s');
$total_amount = $_SESSION["total_amount"];
$sql = "INSERT INTO order_product (account, create_time,total_amount,payment_method,payment_state,order_state,valid) VALUES ('$user_id', '$now',$total_amount,'$payMethod',1,1,1)";
$pro = $_SESSION["products"];


if ($conn->query($sql) === TRUE) {
  $order_id = $conn->insert_id; //取得insert進去這筆訂單的id
  // echo $order_id;
  foreach ($pro as $key => $value) {
    $arrKey = str_split($key);
    if ($arrKey[0] == "A") {
      $sqlDetail = "INSERT INTO order_product_detail (order_id, product_id, category_id,amount,address,valid) VALUES ('$order_id','$key','A',$value,'$address',1)";
    }
    if ($arrKey[0] == "B") {
      $sqlDetail = "INSERT INTO order_product_detail (order_id, product_id, category_id,amount,valid) VALUES ('$order_id', '$key', 'B',$value,1)";
    }
    if ($arrKey[0] == "C") {
      $sqlDetail = "INSERT INTO order_product_detail (order_id, product_id, category_id,amount,valid) VALUES ('$order_id', '$key', 'C',$value,1)";
    }
    ////////}

    if(!$conn->query($sqlDetail)){
      echo "Error: ".$sqlDetail."<br>".$conn->error;
    }
  }
  unset($_SESSION["cart"],$_SESSION["total_amount"],$_SESSION["products"]);
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
    <a href="ins-products.php">回產品列表</a>
  </div>
</body>

</html>
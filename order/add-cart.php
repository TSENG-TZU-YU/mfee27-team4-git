<?php
session_start();
// $newItem=[
//     $product_id=>1,
//     $product_id=>$category//這行會覆蓋上面的key=>value
// ];

$product_id=$_POST["product_id"];
$category=$_POST["category"];

$newItem=[
    $product_id=>$category
];
if(isset($_SESSION["cart"])){
    $cart=$_SESSION["cart"];
}else{
    $cart=[];
}
$product_exist=0;//flag 先預設購物車產品0個
foreach($cart as $value){
    if(array_key_exists($product_id,$value)){
        $product_exist=1;
        
    }else{
        $product_exist++;
    }
}
array_push($cart,$newItem);
$_SESSION["cart"]=$cart;

$data=[
    "count"=>count($cart)
];


echo json_encode($data);
?>
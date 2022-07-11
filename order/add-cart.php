<?php
session_start();


//原本
// $cart=[
//     [
//         "id"=>1,
//         "amount"=>1
//     ]
//     ];

//實際 
// $cart=[
//     [
//         //product_id(產品)=>amount(數量)
//         1=>1
//     ],
//     [
//         2=>2
//     ],
//     [
//         4=>2
//     ]
// ];

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
        //array_key_exists 判斷key($product_id)如果存在$value(陣列)回傳true 否則false
        $product_exist=1;
        
    }else{
        $product_exist++;
    }
}
// if($product_exist==0){
//     
// }
array_push($cart,$newItem);
$_SESSION["cart"]=$cart;

$data=[
    "count"=>count($cart)
];


echo json_encode($data);
?>
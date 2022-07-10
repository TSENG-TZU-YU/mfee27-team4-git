<?php
require("../db-connect.php");

if(!isset($_POST["brnd_model"])){  //後端檢查是否帶資料
    echo"沒帶資料";
    exit;
}

$ins_cate=$_POST["ins_cate"];
$brnd_model=$_POST["brnd_model"];
$price=$_POST["price"];
$stock=$_POST["stock"];
$intro=$_POST["intro"];
$create_time=date('Y-m-d H-i-s');

if(empty($ins_cate)){    //後端檢查 
    echo"沒有填 ins_cate";
    exit;
}
if(empty($brnd_model)){    
    echo"沒有填 brnd_model";
    exit;
}
if(empty($price)){
    echo"沒有填price";
    exit;
}
if(empty($stock)){
    echo"沒有填stock";
    exit;
}


if ($conn->query($sql) === TRUE) {
    $sqlselect="SELECT * FROM instrument_product ORDER BY id DESC LIMIT 1";
    $result=$conn->query($sqlselect);
    $row=$result->fetch_assoc();
    $rowid="A".$row["id"];
    $product_id=$row["id"];
    $sqlInsert="UPDATE instrument_product SET product_id = '$rowid' WHERE id = $product_id";
    $conn->query($sqlInsert);
    echo "新資料輸入成功";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$sql="SELECT product_id FROM instrument_product WHERE product_id='$product_id'";

$result = $conn->query($sql); //存取物件
$insCount = $result->num_rows;  //幾筆資料
if($insCount>0){
    echo"該帳號已存在";
    exit;
}
// 寫入資料庫
$sqlCreate="INSERT INTO instrument_product (ins_cate, brnd_model, price, stock, intro, create_time, valid) 
                            VALUES ('$ins_cate','$brnd_model', '$price','$stock','$intro','$create_time',1)";

if ($conn->query($sqlCreate) === TRUE) {
    echo "<script language='JavaScript'>;alert('新增成功');location.href='ins-shop.php';</script>;";
    // header("location:users.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
header("location: ins-shop.php");

?>
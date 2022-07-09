<?php

use function PHPSTORM_META\elementType;

require("../db-connect.php");

if(!isset($_POST["account"])){  //後端檢查是否帶資料
    echo"沒帶資料";
    exit;
}

$name=$_POST["name"];
$account=$_POST["account"];
$password=$_POST["password"];
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$address=$_POST["address"];
// $coupon=$_POST["coupon"];
$create_time=date('Y-m-d H-i-s');

if(empty($name)){    //後端檢查 
    echo"沒有填 name";
    exit;
}
if(empty($account)){    
    echo"沒有填 account";
    exit;
}
if(empty($password)){
    echo"沒有填密碼";
    exit;
}
if(empty($gender)){
    echo"沒有填性別";
    exit;
}
if(empty($birthday)){
    echo"沒有填生日";
    exit;
}
if(empty($phone)){
    echo"沒有填電話";
    exit;
}
if(empty($email)){
    echo"沒有填郵件";
    exit;
}
if(empty($address)){
    echo"沒有填地址";
    exit;
}



//當gender選擇時 value 輸出1 or 2  前端checkbox 有男女兩個選擇時

// 判斷checkbox 未勾選時 
  $coupon=false;    
  if(isset($_POST['coupon'])){
    $coupon=true;
    echo"1";
  } 
  else{
    echo"0";
  }



$password=md5($password);

$sql="SELECT account FROM users WHERE account='$account'";

$result = $conn->query($sql); //存取物件
$userCount = $result->num_rows;  //幾筆資料
if($userCount>0){
    echo"該帳號已存在";
    exit;
}
// 寫入資料庫
$sqlCreate="INSERT INTO users (name,account, password,gender,birthday,phone,email,address,coupon,create_time,enable,valid) VALUES ('$name','$account', '$password','$gender','$birthday','$phone','$email','$address','$coupon','$create_time',1,1)";

if ($conn->query($sqlCreate) === TRUE && $coupon==1) {
    echo "<script language='JavaScript'>;alert('註冊成功 獲得商品50元折價券');location.href='users.php';</script>;";
    // header("location:users.php");
}if ($conn->query($sqlCreate) === TRUE  && $coupon==0){
    echo "<script language='JavaScript'>;alert('註冊成功');location.href='users.php';</script>;";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
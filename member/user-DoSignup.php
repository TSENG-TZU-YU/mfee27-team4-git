<<<<<<< HEAD
<?php
require("../db-connect.php");

$name=$_POST["name"];
$account=$_POST["account"];
$password=$_POST["password"];
$gender=$_POST["gender"];


$password=md5($password);

$sql="SELECT account FROM backstage WHERE account='$account' ";

$result = $conn->query($sql); //存取物件
$userCount = $result->num_rows;  //幾筆資料
if($userCount>0){
    echo"該帳號已存在";
    exit;
}
// 寫入資料庫
$sqlCreate="INSERT INTO backstage (name,account, password) VALUES ('$name','$account', '$password')";

if ($conn->query($sqlCreate) === TRUE) {
    echo "新資料輸入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
=======
<?php
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

//當gender選擇時 value 輸出1 or 2  





$password=md5($password);

$sql="SELECT account FROM users WHERE account='$account'";

$result = $conn->query($sql); //存取物件
$userCount = $result->num_rows;  //幾筆資料
if($userCount>0){
    echo"該帳號已存在";
    exit;
}
// 寫入資料庫
$sqlCreate="INSERT INTO users (name,account, password,gender,birthday,phone,email,address,create_time,enable,valid) VALUES ('$name','$account', '$password','$gender','$birthday','$phone','$email','$address','$create_time',1,1)";

if ($conn->query($sqlCreate) === TRUE) {
    echo "<script language='JavaScript'>;alert('註冊成功');location.href='users.php';</script>;";
    // header("location:users.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
>>>>>>> 3ceb0e13ce16e15488e13d85d3187f6d39818c28
?>
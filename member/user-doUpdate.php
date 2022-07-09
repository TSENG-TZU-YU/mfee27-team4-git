<?php
if(!isset($_POST["account"])){
    echo "沒有參數";
}
require("../db-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$account=$_POST["account"];
$password=$_POST["password"];
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$address=$_POST["address"];

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


$sql="UPDATE users SET name='$name',account='$account',password='$password',gender='$gender',birthday='$birthday', phone='$phone',email='$email',address='$address' WHERE id=$id AND valid=1";


if ($conn->query($sql) === TRUE) {
    echo "資料表 users 修改完成";
    echo "<script language='JavaScript'>;alert('成功加入黑名單');location.href='users.php';</script>;";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close(); 

header("location: user-detail.php?id=".$id);



?>

<?php

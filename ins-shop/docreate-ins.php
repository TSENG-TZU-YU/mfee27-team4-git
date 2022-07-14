<?php
require("../db-connect.php");
$sqlIns= "WHERE ins-shop.php";
session_start();
if(!isset($_POST["name"])){  //後端檢查是否帶資料
    echo"沒帶資料";
    exit;
}


$cate=$_POST["cate"];
$name=$_POST["name"];
$price=$_POST["price"];
$stock=$_POST["stock"];
$intro=$_POST["intro"];
$creat_time=date('Y-m-d H-i-s');
$fileName = $_FILES["image"]["name"];
$image = $_FILES["image"];


// 寫入資料庫
$sql="INSERT INTO instrument_product (creat_time, cate, name, stock, price, image, intro, valid) VALUES ('$creat_time','$cate', '$name', '$stock','$price','$fileName','$intro', 1)";

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


move_uploaded_file($_FILES["image"]["tmp_name"], "../images/ins-image/" . $_FILES["image"]["name"]);
    // 將關於圖片的文字資料傳入 images 資料表
 




$conn->close();
header("location: ins-shop.php");

?>
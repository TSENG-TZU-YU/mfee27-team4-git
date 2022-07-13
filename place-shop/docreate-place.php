<?php
require("../db-connect.php");
if(!isset($_POST["name"])){
    echo "沒有帶資料到本頁";
    exit;
}

$cate=$_POST["cate"];
$name=$_POST["name"];
$stock=$_POST["stock"];
$price=$_POST["price"];
$use_time=date('Y-m-d H-i-s');
$over_time=date('Y-m-d H-i-s');
$intro=$_POST["intro"];
$creat_time=date('Y-m-d H-i-s');
$fileName = $_FILES["image"]["name"];
$image = $_FILES["image"];



// 寫入資料庫
$sql="INSERT INTO place_produce (cate, name, price, stock, use_time, over_time, creat_time, image, intro, valid) 
                            VALUES ('$cate','$name', '$price','$stock','$use_time','$over_time', '$creat_time','$fileName', '$intro' ,1)";



if ($conn->query($sql) === TRUE) {
    $sqlselect="SELECT * FROM place_produce ORDER BY id DESC LIMIT 1";
    $result=$conn->query($sqlselect);
    $row=$result->fetch_assoc();
    $rowid="C".$row["id"];
    $product_id=$row["id"];
    $sqlInsert="UPDATE place_produce SET product_id = '$rowid' WHERE id = $product_id";
    $conn->query($sqlInsert);
    echo "新資料輸入成功";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

move_uploaded_file($_FILES["image"]["tmp_name"], "../images/ins-image/" . $_FILES["image"]["name"]);
    // 將關於圖片的文字資料傳入 images 資料表
   




$conn->close();
header("location: place-shop.php");

?>
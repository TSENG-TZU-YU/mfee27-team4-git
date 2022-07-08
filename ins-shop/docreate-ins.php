<?php
require("../db-connect.php");
if(!isset($_POST["brnd_model"])){
    echo "沒有帶資料到本頁";
    exit;
}


$creat_time=date('Y-m-d H:i:s');
$ins_cate=$_POST["ins_cate"];
$brnd_model=$_POST["brnd_model"];
$stock=$_POST["stock"];
$price=$_POST["price"];
$intro=$_POST["intro"];

$sql="INSERT INTO instrument_product (creat_time, ins_cate, brnd_model, stock, price, intro, valid) VALUES ('$creat_time','$ins_cate', '$brnd_model', '$stock','$price','$intro', 1)";

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

$conn->close();
header("location: ins-shop.php");

?>
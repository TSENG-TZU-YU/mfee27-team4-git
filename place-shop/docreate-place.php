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



// 寫入資料庫
$sqlCreate="INSERT INTO place_produce (cate, name, price, stock, use_time, over_time, creat_time, intro, valid) 
                            VALUES ('$cate','$name', '$price','$stock','$use_time','$over_time', '$creat_time','$intro' ,1)";



if ($conn->query($sql) === TRUE) {
    $sqlselect="SELECT * FROM place_produce ORDER BY id DESC LIMIT 1";
    $result=$conn->query($sqlselect);
    $row=$result->fetch_assoc();
    $rowid="B".$row["id"];
    $product_id=$row["id"];
    $sqlInsert="UPDATE place_produce SET product_id = '$rowid' WHERE id = $product_id";
    $conn->query($sqlInsert);
    echo "新資料輸入成功";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}








$conn->close();
header("location: course-shop.php");

?>
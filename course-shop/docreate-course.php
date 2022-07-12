<?php
require("../db-connect.php");
if(!isset($_POST["name"])){
    echo "沒有帶資料到本頁";
    exit;
}

$cate=$_POST["cate"];
$name=$_POST["name"];
$location=$_POST["location"];
$stock=$_POST["stock"];
$price=$_POST["price"];
$begin_date=date('Y-m-d H-i-s');
$over_date=date('Y-m-d H-i-s');
$intro=$_POST["intro"];
$creat_time=date('Y-m-d H-i-s');



// 寫入資料庫
$sql="INSERT INTO course_product (cate, name, location, price, stock, begin_date, over_date, intro, creat_time, valid) 
                            VALUES ('$cate','$name', '$location', '$price','$stock','$begin_date','$over_date', '$intro', '$creat_time',1)";


if ($conn->query($sql) === TRUE) {
    $sqlselect="SELECT * FROM course_product ORDER BY id DESC LIMIT 1";
    $result=$conn->query($sqlselect);
    $row=$result->fetch_assoc();
    $rowid="B".$row["id"];
    $product_id=$row["id"];
    $sqlInsert="UPDATE course_product SET product_id = '$rowid' WHERE id = $product_id";
    $conn->query($sqlInsert);
    echo "新資料輸入成功";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




$conn->close();
header("location: course-shop.php");

?>
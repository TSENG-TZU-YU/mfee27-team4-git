<?php
require("../db-connect.php");
if(!isset($_POST["course_name"])){
    echo "沒有帶資料到本頁";
    exit;
}

$course_name=$_POST["course_name"];
$creat_time=date('Y-m-d H:i:s');
$course_cate=$_POST["course_cate"];
$stock=$_POST["stock"];
$price=$_POST["price"];
$begin_date=$_POST["begin_date"];
$over_date=$_POST["over_date"];

$sql="INSERT INTO course_product (course_name, creat_time, course_cate, stock, price, begin_date, over_date, valid) 
    VALUES ('$course_name','$creat_time', '$course_cate', '$stock','$price','$begin_date', '$begin_date', 1)";

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
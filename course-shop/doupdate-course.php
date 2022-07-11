<?php
if(!isset($_POST["course_name"])){
    echo "沒有參數";
}
require("../db-connect.php");

$id=$_POST["id"];
$course_cate=$_POST["course_cate"];
$course_name=$_POST["course_name"];
$location=$_POST["location"];
$stock=$_POST["stock"];
$price=$_POST["price"];
$begin_date=date('Y-m-d H-i-s');
$over_date=date('Y-m-d H-i-s');
$course_intro=$_POST["course_intro"];
$create_time=date('Y-m-d H-i-s');

$sql="UPDATE course_product SET 
course_cate='$course_cate',course_name='$course_name',price='$price',stock='$stock',date('Y-m-d H-i-s')='$begin_date', date('Y-m-d H-i-s')='$over_date',course_intro='$course_intro'
WHERE id=$id AND valid=1";


if ($conn->query($sql) === TRUE) {
    echo "修改完成";
} else {
    echo "修改錯誤: " . $conn->error;
}

$conn->close(); 

header("location: course-detail.php?id=".$id);



?>

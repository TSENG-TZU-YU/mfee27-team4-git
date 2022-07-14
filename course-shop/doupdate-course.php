<?php
if(!isset($_POST["name"])){
    echo "沒有參數";
}
require("../db-connect.php");


$id=$_POST["id"];
$cate=$_POST["cate"];
$name=$_POST["name"];
$location=$_POST["location"];
$stock=$_POST["stock"];
$price=$_POST["price"];
$begin_date=$_POST["begin_date"];
$over_date=$_POST["over_date"];
$intro=$_POST["intro"];
$creat_time=date('Y-m-d H-i-s');

$sql="UPDATE course_product SET cate='$cate',name='$name',price='$price',stock='$stock',begin_date='$begin_date', over_date='$over_date',intro='$intro'
WHERE id=$id AND valid=1";

if(empty($cate)){    //後端檢查 
    echo"沒有填 name";
    exit;
}

if ($conn->query($sql) === TRUE) {
    echo "修改完成";
} else {
    echo "修改錯誤: " . $conn->error;
}

$conn->close(); 

header("location: course-detail.php?id=".$id);



?>

<?php
require("../db-connect.php");
if(!isset($_POST["course_name"])){
    echo "沒有帶資料到本頁";
    exit;
}

$course_cate=$_POST["course_cate"];
$course_name=$_POST["course_name"];
$location=$_POST["location"];
$stock=$_POST["stock"];
$price=$_POST["price"];
$begin_date=date('Y-m-d');
$over_date=date('Y-m-d');
$course_intro=$_POST["course_intro"];
$create_time=date('Y-m-d H-i-s');

if(empty($course_cate)){    //後端檢查 
    echo"沒有填 course_cate";
    exit;
}
if(empty($course_name)){    
    echo"沒有填 course_name";
    exit;
}
if(empty($price)){
    echo"沒有填price";
    exit;
}
if(empty($stock)){
    echo"沒有填stock";
    exit;
}


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



$sql="SELECT product_id FROM course_product WHERE product_id='$product_id'";

$result = $conn->query($sql); //存取物件
$courseCount = $result->num_rows;  //幾筆資料
if($courseCount>0){
    echo"該課程已存在";
    exit;
}
// 寫入資料庫
$sqlCreate="INSERT INTO course_product (course_cate, course_name, location, price, stock, begin_date, over_date, create_time, valid) 
                            VALUES ('$course_cate','$course_name', '$location', '$price','$stock','$begin_date','$over_date', '$create_time',1)";

if ($conn->query($sqlCreate) === TRUE) {
    echo "<script language='JavaScript'>;alert('新增成功');location.href='course-shop.php';</script>;";
    // header("location:users.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
header("location: course-shop.php");

?>
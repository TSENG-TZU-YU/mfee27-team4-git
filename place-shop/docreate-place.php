<?php
require("../db-connect.php");
if(!isset($_POST["location"])){
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
$create_time=date('Y-m-d H-i-s');

if(empty($location)){    //後端檢查 
    echo"沒有填 cate";
    exit;
}
if(empty($placetype)){    
    echo"沒有填 name ";
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



$sql="SELECT product_id FROM place_produce WHERE product_id='$product_id'";

$result = $conn->query($sql); //存取物件
$placeCount = $result->num_rows;  //幾筆資料
if($placeCount>0){
    echo"該課程已存在";
    exit;
}
// 寫入資料庫
$sqlCreate="INSERT INTO place_produce (cate, name, price, stock, use_time, over_time, create_time, intro, valid) 
                            VALUES ('$cate','$name', '$price','$stock','$use_time','$over_time', '$create_time','$intro' ,1)";

if ($conn->query($sqlCreate) === TRUE) {
    echo "<script language='JavaScript'>;alert('新增成功');location.href='place-shop.php';</script>;";
    // header("location:users.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
// header("location: course-shop.php");

?>
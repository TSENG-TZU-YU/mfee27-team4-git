<<<<<<< HEAD
<?php

require("../db-connect.php");

if(!isset($_POST["name"])){ 
    echo "沒有帶資料到本頁";
    exit;
}

$name=$_POST["name"];
$number=$_POST["number"];
$members=$_POST["members"];
$discount=$_POST["discount"];
$dateline=$_POST["dateline"];
$times=$_POST["times"];
$price=$_POST["price"];
$now=date('Y-m-d H:i:s');


//echo "$name, $number, $discount, $dateline, $times, $price";
$sql="INSERT INTO coupon (name, number, discount, dateline, several_times, min_price, create_time, valid ) VALUES
 ('$name', '$number', '$discount', '$dateline', '$times', '$price','$now', 1 )"; 

if ($conn->query($sql) === TRUE) {
    echo "新資料輸入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("location: coupons.php"); 

=======
<?php

require("../db-connect.php");

if(!isset($_POST["name"])){ 
    echo "沒有帶資料到本頁";
    exit;
}

$name=$_POST["name"];
$number=$_POST["number"];
$members=$_POST["members"];
$discount=$_POST["discount"];
$dateline=$_POST["dateline"];
$times=$_POST["times"];
$price=$_POST["price"];
$now=date('Y-m-d H:i:s');


//echo "$name, $number, $discount, $dateline, $times, $price";
$sql="INSERT INTO coupon (name, number, members, discount, dateline, several_times, min_price, create_time, valid ) VALUES
 ('$name', '$number', '$members', '$discount', '$dateline', '$times', '$price', '$now', 1 )"; 

if ($conn->query($sql) === TRUE) {
    echo "新資料輸入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("location: coupons.php"); 

>>>>>>> 4609369059da681773dd28f2efdfb780bd1aaebf
?>
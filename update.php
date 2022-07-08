<<<<<<< HEAD
<?php
require("db-connect.php");

$sql="UPDATE coupon SET name='class coupon' WHERE id=3";

if ($conn->query($sql)===TRUE){
    echo "資料表修改完成";
}else{
    echo "資料表修改錯誤: ".  $conn->error;
}

$conn->close();

=======
<?php
require("db-connect.php");

$sql="UPDATE coupon SET name='class coupon' WHERE id=3";

if ($conn->query($sql)===TRUE){
    echo "資料表修改完成";
}else{
    echo "資料表修改錯誤: ".  $conn->error;
}

$conn->close();

>>>>>>> 4609369059da681773dd28f2efdfb780bd1aaebf
?>
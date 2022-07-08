<<<<<<< HEAD
<?php

require("../db-connect.php");

$sql="SELECT * FROM coupon WHERE id='3'";


$result = $conn->query($sql);
$couponCount=$result->num_rows; 

if($couponCount>0){
    // while($row = $result->fetch_assoc()):
    //  var_dump($row);
    //  echo"<br>";
    // endwhile;
    $row = $result->fetch_assoc();
    var_dump($row);

    
}




$conn->close();



=======
<?php

require("../db-connect.php");

$sql="SELECT * FROM coupon WHERE id='3'";


$result = $conn->query($sql);
$couponCount=$result->num_rows; 

if($couponCount>0){
    // while($row = $result->fetch_assoc()):
    //  var_dump($row);
    //  echo"<br>";
    // endwhile;
    $row = $result->fetch_assoc();
    var_dump($row);

    
}




$conn->close();



>>>>>>> 4609369059da681773dd28f2efdfb780bd1aaebf
?>
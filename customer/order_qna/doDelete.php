<?php
require("../../db-connect.php");

$sql="UPDATE users SET name='$name', phone='$phone', email='$email' WHERE id=$id"
$conn->query($sql)
$conn->close();
?>
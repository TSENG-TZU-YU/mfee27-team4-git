<?php
require("../db-connect.php");

$name=$_POST["name"];
$number=$_POST["number"];
$discount=$_POST["discount"];
$dateline=$_POST["dateline"];
$severaltimes=$_POST["several_times"];
$price=$_POST["price"];


echo "$name, $number, $discount, $dateline, $severaltimes, $price";



?>
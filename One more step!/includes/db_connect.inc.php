<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "food_delivery_system";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
  echo "Error: " . mysqli_connect_err();
  die();
}

?>

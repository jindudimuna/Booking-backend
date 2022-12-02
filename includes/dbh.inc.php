<?php 


$servername ="localhost";
$dBusername ="jindu";
$dbPassword= "swerve";
$dbName = "loginsystem";

$conn = mysqli_connect($servername, $dBusername, $dbPassword, $dbName);

if(!$conn){
    die('connection failed : . mysqli_connect_error()');
}
<?php
$user = 'root';
$password = 'root';
$db = 'Accathon';
$host = 'localhost';
$port = 8889;



$mysqli = new mysqli($host,$user,$password,$db);

 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
<?php 
$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'eCommerce';




 $connection = mysqli_connect($servername, $username, $password, $database);  
 if(!$connection) {
     die("Database connection failed");
 }


?>
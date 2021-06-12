<?php 
$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'ecommerce';




 $connection = mysqli_connect($servername, $username, $password, $database);  
 if(!$connection) {
     die("Database connection failed");
 }


?>
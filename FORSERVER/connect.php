<?php 
$servername = 'localhost';
$username = 'roc09090';
$password = 'je5umyju5';
$database = 'roc09090_wordpress';


 $connection = mysqli_connect($servername, $username, $password, $database);  
 if(!$connection) {
     die("Database connection failed");
 }


?>
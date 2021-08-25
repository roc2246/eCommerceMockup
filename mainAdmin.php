<?php 
ob_start();
session_start(); 
?>
<?php include 'include/connect.php'; ?>
<?php include 'functions.php';?>
<?php pleaseLoginAdmin();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Admin Page</h1>
    <a href="uploadProduct.php">Upload Inventory Item</a><br>
    <a href="deleteProduct.php">Delete Inventory Item</a><br>
    <a href="updateProduct.php">Update Inventory Item</a><br>
    <br>
    <br>
    <a href="index.php">Home</a>
</body>
</html>

<?php 
/** 
 * The Condo - Admin Directory
 * 
 * PHP version 7.4
 * 
 * @category Admin_Pages
 * @package  Pages
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/mainAdmin.php
 */
ob_start();
session_start(); 
?>
<?php require 'include/connect.php'; ?>
<?php require 'functions.php';?>


<?php require 'include/header.php'; ?>
    <title>Admin Page</title>
</head>
<body>
<header>    
    <h1>Admin Page</h1>
    <?php pleaseLoginAdmin();?>
</header>
    <a href="uploadProduct.php">Upload Inventory Item</a><br>
    <a href="deleteProduct.php">Delete Inventory Item</a><br>
    <a href="updateProduct.php">Update Inventory Item</a><br>
    <br>
    <br>
    <a href="index.php">Home</a>
</body>
</html>

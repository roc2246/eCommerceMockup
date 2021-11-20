<?php 

/** 
 * The Condo - Admin Login
 * PHP version 7.4
 * 
 * @category Admin_Login_Pages
 * @package  Admin
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/admin.php
 */

ob_start();
session_start(); 
?>
<?php require 'include/connect.php' ?>
<?php require 'functions.php'?>

<?php require 'include/header.php'; ?>
    <title>Admin Login</title>
</head>
<body>
  <header>  
    <h1>Admin Login</h1>
  </header>  
  <form name="adminLogin" method="post" action="admin.php" autocomplete="off"> 
    <input type="text" name="AMusername" placeholder = "username"><br><br>
    <input type="password" name="AMpassword" placeholder="password"><br><br>
    <input type="submit" name="submit" onclick="loginValid(AMusername, AMpassword)">
    <?php login('admin', '0', 'URL = mainAdmin.php', 'AMusername', 'AMpassword'); ?>
  </form>
  <a href="newAdmin.php">Register Admin Account</a><br>
  <a href="index.php">Home</a>

<script src = "validation.js"></script>

</body>
</html>
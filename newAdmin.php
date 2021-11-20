<?php 
/** 
 * The Condo - Register admin account
 * PHP version 7.4
 * 
 * @category Admin_Login_Pages
 * @package  Logins
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/newUser.php
 */

require 'include/connect.php'; ?>
<?php require 'functions.php';?>

<?php require 'include/header.php'; ?>
    <title>Admin Login</title>
</head>
<body>
<header>    
<h1>Register New Admin</h1>
</header>
    <form name="newAdmin" method="post" action="newAdmin.php" autocomplete="off"> 
    <input type="text" name="AMusername" placeholder = "username"><br>
    <input type="password" name="AMpassword" placeholder="password"></br>
    <input type="submit" name="submit"></br>
    <h4>Username Available?</h4>
    <?php checkAvailable('admin', 'admin.php', 'AMusername', 'AMpassword');?>
  </form><br>
<a href="admin.php">Back</a>


</body>
</html>
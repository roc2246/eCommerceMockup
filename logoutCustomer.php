<?php 
/** 
 * The Condo - User Logout Cofirmation
 * 
 * PHP version 7.4
 * 
 * @category User_Login_Pages
 * @package  Logins
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/logoutCustomer.php
 */ 
require 'include/header.php'; ?>
<title>Customer Logout</title>
</head>
<body>
<?php require 'functions.php';
logout('Customer', 'username', 'password', 'index.php'); ?>

</body>
</html>
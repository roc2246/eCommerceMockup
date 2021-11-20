<?php
/** 
 * The Condo - Admin Logout COofirmation
 * 
 * PHP version 7.4
 * 
 * @category Admin_Pages
 * @package  Pages
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/logoutAdmin.php
 */ 
require 'include/header.php'; ?>
<title>Admin Logout</title>
</head>
<body>
<?php require 'functions.php';
logout('Admin', 'AMusername', 'AMpassword', 'admin.php'); ?>

</body>
</html>
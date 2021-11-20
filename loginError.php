<?php
/** 
 * The Condo - Admin Access Error
 * 
 * PHP version 7.4
 * 
 * @category Admin_Login_Pages
 * @package  Logins
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/loginError.php
 */ 
require 'include/header.php'; ?>
    <title>ERROR</title>
</head>
<body>
<h1>ERROR</h1>
<h2>You must be logged in to use admin features.</h2>

<?php header('Refresh: 2; URL = admin.php'); ?>
</body>
</html>

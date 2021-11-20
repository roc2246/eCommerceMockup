<?php 
/** 
 * The Condo - Register user account
 * PHP version 7.4
 * 
 * @category User_Login_Pages
 * @package  Logins
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/newUser.php
 */
require 'include/connect.php'; 
require 'functions.php';
require 'include/header.php'; ?>
    <title>Register Account</title>
</head>
<body>
  <header>  
    <h1>New User</h1>
  </header> 
    <form name="newUser" method="post" action="newUser.php" autocomplete="off">
       <label>Username:</label>
        <input type="text" name="username"><br><br>
       <label>Password:</label>
        <input type="password" name="password"><br><br>
<input type="submit" value="submit" name="submit">
<h4>Username Available?</h4>
<?php checkAvailable('users', 'index.php', 'username', 'password');?>
    </form><br>
<a href="index.php">Home</a>


</body>
</html>
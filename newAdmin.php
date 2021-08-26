<?php include 'include/connect.php'; ?>
<?php include 'functions.php';?>

<?php include 'include/header.php'; ?>
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
<?php 
ob_start();
session_start(); 
?>
<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>

<?php include 'include/header.php'; ?>
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
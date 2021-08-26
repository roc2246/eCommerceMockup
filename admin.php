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
    
<div id="login">
<h4>Admin Login</h4>
<form name="adminLogin" method="post" action="admin.php" autocomplete="off"> 
<input type="text" name="AMusername" placeholder = "username">
<input type="password" name="AMpassword" placeholder="password">
<input type="submit" name="submit" onclick="loginValid()">
<?php login('admin', '0', 'URL = mainAdmin.php', 'AMusername', 'AMpassword'); ?>
</form>
<a href="newAdmin.php">Register Admin Account</a><br>
<a href="index.php">Home</a>
</div>

</div>
<script>
function loginValid(){
  let userName = document.adminLogin.username;
  let password = document.adminLogin.password;
  if (userName.value == "" || password.value == ""){
    alert("Please enter both a username and password.");
  } 
}

</script>

</body>
</html>
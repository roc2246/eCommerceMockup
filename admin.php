<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="#">
    <title>Admin Login</title>
</head>
<body>
    
<div id="login">
<h4>Admin Login</h4>
<form name="adminLogin" method="post" action="admin.php"> 
<input type="text" name="username" placeholder = "username">
<input type="password" name="password" placeholder="password">
<input type="submit" name="submit" onclick="loginValid()">
<?php
if (isset($_POST['username']) && isset($_POST['password'])){
echo "Login Successful. Please wait...";  
login('admin');
header('Refresh: 2; URL = mainAdmin.php');}
else {
  echo "";
}
?>
</form>
<a href="newAdmin.php">Register Admin Account</a>
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
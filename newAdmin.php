<?php include 'include/connect.php'; ?>
<?php include 'functions.php';?>

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
<h4>Register New Admin</h4>
<form name="newAdmin" method="post" action="newAdmin.php"> 
<input type="text" name="username" placeholder = "username">
<input type="password" name="password" placeholder="password">
<input type="submit" name="submit" onclick="loginValid()">
<?php checkAvailable('admin', 'admin.php');?>

</form>

</div>

</div>
<script>
function loginValid(){
  let userName = document.newAdmin.username;
  let password = document.newAdmin.password;
  if (userName.value == "" || password.value == ""){
    alert("Please enter both a username and password.");
  } 
}


</script>

</body>
</html>
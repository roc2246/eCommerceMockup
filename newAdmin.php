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
    <form name="newAdmin" method="post" action="newAdmin.php" autocomplete="off"> 
    <input type="text" name="AMusername" placeholder = "username">
    <input type="password" name="AMpassword" placeholder="password">
    <input type="submit" name="submit" onclick="loginValid()">
    <h4>Username Available?</h4>
    <?php checkAvailable('admin', 'admin.php', 'AMusername', 'AMpassword');?>
  </form><br>
<a href="admin.php">Back</a>

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
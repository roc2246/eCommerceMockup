<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register Account</title>
</head>
<body>
  <header>  
    <h1>New User</h1>
  </header> 
    <form name="newUser" method="post" action="newUser.php">
       <label>Username:</label>
        <input type="text" name="username"><br><br>
       <label>Password:</label>
        <input type="password" name="password"><br><br>
<button type="submit" value="submit" name="submit" onclick="loginValid()">submit</button>
<h4>Username Available?</h4>
<?php checkAvailable();?>
    </form>

    <script>
function loginValid(){
  let userName = document.newUser.username;
  let password = document.newUser.password;
  if (userName.value == "" || password.value == ""){
    alert("Please enter both a username and password to register.");
    document.newUser.setAttribute("onsubmit", "return false;");
  } else{
    document.newUser.setAttribute("onsubmit", "return true;");
  }
}

    </script>

</body>
</html>
<?php include 'include/connect.php'; ?>
<?php include 'functions.php';?>

<?php include 'include/header.php'; ?>
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
<button type="submit" value="submit" name="submit" onclick="loginValid()">submit</button>
<h4>Username Available?</h4>
<?php checkAvailable('users', 'index.php', 'username', 'password');?>
    </form><br>
<a href="index.php">Home</a>
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
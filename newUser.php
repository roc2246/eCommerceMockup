<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
</head>
<body>
    <h1>New User</h1>
    <form name="newUser" method="post" action="newUser.php">
       <label>Username:</label>
        <input type="text" name="username"><br><br>
       <label>Password:</label>
        <input type="password" name="password"><br><br>
<button type="submit" value="submit" name="submit">submit</button>
<h4>Username Available?</h4>
<?php checkAvailable();?>
    </form>
    
</body>
</html>
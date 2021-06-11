<?php include 'include/connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="brand">
        <input type="text" name="product">
        <input type="text" name="price">
        <input type="file" name="image">
<input type="submit">
    <!--Use php to track amount of an item in inventory
    https://www.w3schools.com/php/php_mysql_update.asp
    
    -->
    </form>

<!--Reformat Later-->
<?php 
if(isset($_POST['submit'])) {
    global $connection;
        
    $username = $_POST['username'];
    $password = $_POST['password'];
        
    $username = mysqli_real_escape_string($connection, $username );   
    $password = mysqli_real_escape_string($connection, $password );
       
    
    $hashFormat = "$2y$10$"; 
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password,$hashF_and_salt);   
        
        $query = "INSERT INTO users(username,password) ";
        $query .= "VALUES ('$username', '$password')";
        
       $result = mysqli_query($connection, $query);
        if(!$result) {
            die('Query FAILED' . mysqli_error());
        
        } else {
        
        echo "Record Create"; 
        
        }


?>


</body>
</html>
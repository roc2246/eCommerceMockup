<?php 
ob_start();
session_start(); 
?>
<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>
<?php deleteRows(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="#">
    <title>Delete Product</title>
</head>
<body>
    <h1>Delete Product</h1>
    <form action="deleteProduct.php" method="post">
            
             <div class="form-group">
             
             <select name="id" id="">
                <?php 
                showAllData();
                  ?>
             </select>
             
             </div>
            
            <input type="submit" name="submit" value="DELETE">
            
        </form>

<a href="mainAdmin.php">Back</a>

</body>
</html>
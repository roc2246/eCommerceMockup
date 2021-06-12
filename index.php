<?php include 'include/connect.php' ?>
<?php 

if(isset($_POST['submit'])) {
   global $connection;
$username = $_POST['username'];
$password = $_POST['password'];
    
    if($connection) {
    
    echo "We are connected";
    
    } else {
    
    die("Database connection failed");
    
    }

}

function getInventory() {
    global $connection;
    $query = "SELECT * FROM inventory";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error($connection));
    }
        
while($row = mysqli_fetch_assoc($result)) {
        $product = "<div class='item'>";
        $product.=  "<img src='uploads/" . $row['image'] . "' width='50px' height='120px'><br>";
        $product.= "Brand: " . $row['brand'] . "<br>";
        $product.= "Model: " . $row['model'] . "<br>";
        $product.= "Size: " . $row['size'] . "<br>";
        $product.= "Price: " . $row['price'] . "<br>";
        $product.= "<a href=''>Add to Cart</a>";
        $product.="</div>";
        echo $product;
    }  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   
    <title>Document</title>
</head>
<body onload="hideSubCats()">
<header>
<h1>The Condo</h1>
<h4>Second-Rate Bardshop</h4>
</header>
<?php include 'include/navigation.php' ?>


<div class="main-content">

<?php getInventory(); ?>

<div id="login">
<h4>Login</h4>
<form name="login" method="post" action="">
<input type="text" name="username">
<input type="password" name="password">
<input type="submit">
</form>
<a href="">Register Account</a>
</div>

</div>




<script src="dropdownScript.js"></script>


</body>
</html>
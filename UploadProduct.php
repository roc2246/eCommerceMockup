<?php include 'include/connect.php' ?>

<!--Reformat Later-->
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//https://www.w3schools.com/php/php_file_upload.asp
if(isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
}
?>

<?php 
if(isset($_POST['submit'])) {
    global $connection;
        
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $image = $_FILES["image"]["name"];


        
        $query = "INSERT INTO inventory(brand,model,price,size, image) VALUES ('$brand', '$model','$price', '$size', '$image')";
        
       $result = mysqli_query($connection, $query);
        if(!$result) {
            die('Query FAILED' . mysqli_error($connection));
        
        } else {
        
        echo "Record Create<br><br>"; 
        
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="uploadProduct.php" method="post" enctype="multipart/form-data">
        <input type="text" name="brand">
        <input type="text" name="model">
        <input type="text" name="price">
        <input type="text" name="size">
        <input type="file" name="image">
<input type="submit" name="submit">
    <!--Use php to track amount of an item in inventory
    https://www.w3schools.com/php/php_mysql_update.asp
    
    -->
    </form>




</body>
</html>
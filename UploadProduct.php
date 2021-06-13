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
    <form name="uploads"  method="post" enctype="multipart/form-data">
       <label>Brand:</label>
        <input type="text" name="brand"><br><br>
       <label>Model:</label>
        <input type="text" name="model"><br><br>
       <label>Price:</label>
        <input type="text" name="price"><br><br>
       <label>Size:</label>
        <input type="text" name="size"><br><br>
       <label>Product Image:</label>
        <input type="file" name="image"><br><br>
<button type="submit" value="submit" name="submit">submit</button>
 
<?php include 'functions.php'?>
<div id="concept">
<?php uploadImage();
      invenProd();?>
</div>



    </form>

</body>
</html>
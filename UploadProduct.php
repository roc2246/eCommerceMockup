<?php include 'include/connect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIpload YOur Inventory</title>
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
<h4>Upload Status</h4>
<?php invenProd();?>
</div>

    </form>
  <!--  
<script>
var uploads = document.uploads;
console.log(document.uploads.submit.clicked);
//txtboxes
var brand = document.uploads.brand;
var model = document.uploads.model;
var price = document.uploads.price;
var size = document.uploads.size;

if (document.uploads.brand.value == ""){
    alert("test");
    brand.focus();
    uploads.setAttribute("action", "");
	uploads.setAttribute("onsubmit", "return false;");
} else {
    uploads.action = "uploadProduct.php";
    document.getElementByID('concept').innerHTML = ;
}


</script>
-->

</body>
</html>
<?php 
ob_start();
session_start(); 
?>
<?php include 'functions.php'?>
<?php include 'include/connect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Upload Your Inventory</title>
</head>
<body>
    <h1>Upload Your Product</h1>
    <form name="uploads"  method="post">
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
 
<div id="concept">
<h4>Upload Status</h4>
<?php invenProd();?>
</div>

    </form>

<script>
//Form
var uploadFrm = document.uploads;

//Textboxes
var brand = document.uploads.brand;
var model = document.uploads.model;
var price = document.uploads.price;
var size = document.uploads.size;

//RegEx
var regExPrice = /^[0-9]+(\.[0-9]{2})?$/;

//Enable Data Submission
function enableSubmit(){
    uploads.setAttribute("action", "uploadProduct.php");
    uploads.setAttribute("enctype", "multipart/form-data");
    uploads.setAttribute("onsubmit", "return true");
}

//Prevent Data Submission
function preventSubmit() {
	uploads.setAttribute("action", "");
    uploads.setAttribute("enctype", "");
	uploads.setAttribute("onsubmit", "return false;");
}


//////////Checks for errors upon submission///////////////////
document.uploads.submit.addEventListener("click", function(){
    if (brand.value != "" && 
        model.value != "" && 
        regExPrice.test(price.value) && 
        size.value != "" ){
        alert("SUCCESS");
        enableSubmit();
    }else if (brand.value == ""){
        preventSubmit();
        alert("Please Enter a Brand Name");
        brand.focus();
		brand.select();
    }else if (model.value == ""){
        preventSubmit();
        alert("Please Enter a Model Name");
        model.focus();
		model.select();
    }else if (!regExPrice.test(price.value)){
        preventSubmit();
        alert("Please Enter a Legitemate price");
        price.focus();
		price.select();
    } else if (size.value == ""){
        preventSubmit();
        alert("Please Enter a size");
        size.focus();
		size.select();
    }
    
});




</script>
<a href="mainAdmin.php">Back</a>

</body>
</html>
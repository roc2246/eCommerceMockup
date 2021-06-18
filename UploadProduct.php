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
 
<?php include 'functions.php'?>
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
var RegExPrice = /(\d+\.\d{1,2})/g;
var RegExSize = //g;

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
    }else{
        preventSubmit();
        alert("FAILURE");
    }
});




</script>


</body>
</html>
<?php 
ob_start();
session_start(); 
?>
<?php include 'functions.php';?>
<?php include 'include/connect.php'; ?>

<?php include 'include/header.php'; ?>
    <title>Upload Your Inventory</title>
</head>
<body>
<header>    
    <h1>Upload Your Product</h1>
    <?php pleaseLoginAdmin();?>
</header>
    <form name="uploads"  method="post" autocomplete="off">
       <label>Brand:</label>
        <input type="text" name="brand"><br><br>
       <label>Model:</label>
        <input type="text" name="model"><br><br>
       <label>Price:</label>
        <input type="text" name="price"><br><br>
       <label>Size:</label>
        <input type="text" name="size"><br><br>
       <label>Product Image:</label>
       <?php enableUpload();?>
<button type="submit" value="submit" name="submit">submit</button>
 
<div id="concept">
<h4>Upload Status</h4>
<?php invenProd(); checkTempLocation(); ?>
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
    prodValidation();
});




</script>
<script src="validation.js"></script>
<a href="mainAdmin.php">Back</a>

</body>
</html>
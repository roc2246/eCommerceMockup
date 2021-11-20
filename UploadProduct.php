<?php 
/** 
 * The Condo - Upload Product Page
 * 
 * PHP version 7.4
 * 
 * @category Admin_Pages
 * @package  Pages
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/uploadProduct.php
 */

ob_start();
session_start(); 
?>
<?php 
require 'functions.php';
require 'include/connect.php'; 
require 'include/images.php';
require 'include/phpCRUD.php';
require 'include/header.php'; 
?>

<script src="validation.js"></script>
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
<?php invenProd(); uploadImage('uploads'); checkTempLocation(); ?>
</div>

    </form>

<script>
//////////Checks for errors upon submission///////////////////
document.uploads.submit.addEventListener("click", function(){
   prodValidation();
    
});




</script>
<a href="mainAdmin.php">Back</a>

</body>
</html>
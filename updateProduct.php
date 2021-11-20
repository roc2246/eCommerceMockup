<?php 
/** 
 * The Condo - Update Product Page
 * 
 * PHP version 7.4
 * 
 * @category Admin_Pages
 * @package  Pages
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/updateProduct.php
 */

ob_start();
session_start(); 
?>
<?php
require 'include/connect.php';
require 'include/images.php'; 
require 'include/phpCRUD.php';
require 'functions.php';
?>



<?php require 'include/header.php'; ?>
<script src="validation.js"></script>
    <title>Update Inventory Item</title>
</head>
<body>
<header>    
    <h1>Update Inventory Items</h1>
    <?php pleaseLoginAdmin();?>
</header>
            <form name="update" method="post" autocomplete="off">
              <label>Brand:</label>
              <input type='text' name='brand'><br><br>
              <label>Model:</label>
              <input type='text' name='model'><br><br>
              <label>Price:</label>
              <input type='text' name='price'><br><br>
              <label>Size:</label>
              <input type='text' name='size'><br><br>
              <label>Product Image:</label>
              <?php enableUpload();?>
                 <select id="ID" name="ID">
                    <?php showAllData();?>
                 </select>
              <input type="submit" name="submit" value="UPDATE">
              <?php updateProduct(); checkTempLocation(); ?>
            </form>

<a href="mainAdmin.php">Back</a>

<script>
  //For assigning values to textboxes
  let totalOptions = document.getElementById("ID").options;
    function option(optNo, strNo){
    return totalOptions.item(optNo).text.split(" - ")[strNo];
    }

  function displayOption(opt){
    document.update.brand.value = option(opt, 1);
    document.update.model.value = option(opt, 2);
    document.update.size.value = option(opt, 3);
    document.update.price.value = option(opt, 4);
  }


 document.getElementById("ID").onchange = () => {
     displayOption(document.getElementById("ID").selectedIndex);
 }



</script>
<script>
//////////Checks for errors upon submission///////////////////
document.update.submit.addEventListener("click", () => {
  if (document.getElementById("ID").value === "Select Inventory Item:"){
      alert("Please make a selection.");
    }else{
      prodValidation();
    }
});

</script>


</body>
</html>
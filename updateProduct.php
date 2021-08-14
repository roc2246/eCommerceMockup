<?php 
ob_start();
session_start(); 
?>
<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>

<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inventory Item</title>
</head>
<body>
        <h1>Update</h1>
     <form name="update" method="post">
        <?php showAllDataFORM();?>
             <select id="ID" name="ID">
                <?php 
                showAllData();
                  ?>
             </select>
            <input type="submit" name="submit" value="UPDATE">
            <?php updateProduct();
            uploadImage();?>
        </form>

<a href="mainAdmin.php">Back</a>

<!--For assigning values to textboxes-->
<script>
    //Fix and Refactor
    //For reference : https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_onchange
    //For reference : https://www.w3schools.com/jsref/event_onchange.asp
    let totalOptions = document.getElementById("ID").options;
    function option(optNo, strNo){
    return totalOptions.item(optNo).text.split(" ")[strNo];
    }

  function displayOption(opt){
    document.update.brand.value = option(opt, 1);
    document.update.model.value = option(opt, 2);
    document.update.size.value = option(opt, 3);
    document.update.price.value = option(opt, 4);
  }

 // displayOption(1);

</script>
<script>
//Form
var updateFrm = document.update;

//Textboxes
var brand = document.update.brand;
var model = document.update.model;
var price = document.update.price;
var size = document.update.size;

//RegEx
var regExPrice = /^[0-9]+(\.[0-9]{2})?$/;
//var RegExSize = //g;

//Enable Data Submission
function enableSubmit(){
    update.setAttribute("action", "updateProduct.php");
    update.setAttribute("enctype", "multipart/form-data");
    update.setAttribute("onsubmit", "return true");
}

//Prevent Data Submission
function preventSubmit() {
	update.setAttribute("action", "");
    update.setAttribute("enctype", "");
	update.setAttribute("onsubmit", "return false;");
}


//////////Checks for errors upon submission///////////////////
document.update.submit.addEventListener("click", function(){
    if (brand.value != "" && 
        model.value != "" && 
        regExPrice.test(price.value) && 
        size.value != "" ){
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


</body>
</html>
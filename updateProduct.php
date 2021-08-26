<?php 
ob_start();
session_start(); 
?>
<?php include 'include/connect.php'; ?>
<?php include 'functions.php';?>
<?php pleaseLoginAdmin();?>


<?php include 'include/header.php'; ?>
    <title>Update Inventory Item</title>
</head>
<body>
        <h1>Update</h1>
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

<!--For assigning values to textboxes-->
<script>

    let totalOptions = document.getElementById("ID").options;
    function option(optNo, strNo){
    return totalOptions.item(optNo).text.split("-")[strNo];
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
//Form
const updateFrm = document.update;

//Textboxes
const brand = document.update.brand;
const model = document.update.model;
const price = document.update.price;
const size = document.update.size;

//RegEx
const regExPrice = /(\d+\.\d{1,2})/g;

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
document.update.submit.addEventListener("click", () => {
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
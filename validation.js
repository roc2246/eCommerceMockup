//for main page
if (window.location.pathname == "/eCommerce/" 
|| window.location.pathname == "/eCommerce/index.php" 
&& document.getElementsByTagName("a")[0].innerHTML!= "Logout"){
var userName = document.login.username;
var userPassword = document.login.password;
} 

//for admin page
if (window.location.pathname == "/eCommerce/admin.php"){
var adminName = document.adminLogin.AMusername;
var adminPassword = document.adminLogin.AMpassword;
}

function loginValid(username, password){
    if (username.value == "" || password.value == ""){
      alert("Please enter both a username and password.");
    } 
  }


//For upload/update products (Will work on)
if(window.location.pathname == "/eCommerce/uploadProduct.php"){

    //Form
    var uploadFrm = document.uploads;

    //Textboxes
    var brand = document.uploads.brand;
    var model = document.uploads.model;
    var price = document.uploads.price;
    var size = document.uploads.size;

}else if(window.location.pathname == "/eCommerce/updateProduct.php"){

    //Form
    var updateFrm = document.update;

    //Textboxes
    var brand = document.update.brand;
    var model = document.update.model;
    var price = document.update.price;
    var size = document.update.size;
    
}

//RegEx
var regExPrice = /^[0-9]+(\.[0-9]{2})?$/;

function prodValidation(){
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
    }else if (size.value == ""){
       preventSubmit();
       alert("Please Enter a size");
       size.focus();
       size.select();
    }
}
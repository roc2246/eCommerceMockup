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

//For upload/update products
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
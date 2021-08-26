//for main page
if (window.location.pathname == "/eCommerce/index.php" 
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

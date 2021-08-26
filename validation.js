//for main page
if (window.location.pathname == "/eCommerce/index.php" && document.getElementsByTagName("a")[0].innerHTML!= "Logout"){
const userName = document.login.username;
const userPassword = document.login.password;
}

//for admin page
if (window.location.pathname == "/eCommerce/admin.php"){
const adminName = document.adminLogin.AMusername;
const adminPassword = document.adminLogin.AMpassword;
}

function loginValid(username, password){
    if (username.value == "" || password.value == ""){
      alert("Please enter both a username and password.");
    } 
  }

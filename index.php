<?php 
ob_start();
session_start(); 
?>
<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="#">
<script src="ajax.js"></script>

<script>
loadPBasket("basket.xml");

var c = -1;//Counter for cart items

function removeItem(itemNo){
    c--;//Counter for cart items
    var cart = document.getElementById("cart");
    document.getElementById("count").innerHTML = cart.childElementCount - 1;

    var cartItem = document.getElementsByClassName("cart-item");
    document.getElementById("cart").removeChild(cartItem[itemNo]);

    //Resets input counter value    
    var removeBttn = document.getElementsByClassName("remove-button");
    for (var b=0; b<removeBttn.length; b++){
        removeBttn[b].setAttribute("onclick", "removeItem("+ b + "); removeCOItem("+ b + ")");
    }

}


</script>

    <title>The Condo</title>
</head>
<body onload="hideSubCats()">
<header>
<h1>The Condo</h1>
<h4>Second-Rate Boardshop</h4>
<?php greetUser();?>
</header>
<?php include 'include/navigation.php' ?>


<div class="main-content">

<?php getInventory(); ?>

<div id="login">
<h4>Login</h4>
<form name="login" method="post" action="index.php"> 
<input type="text" name="username" placeholder = "username">
<input type="password" name="password" placeholder="password">
<input type="submit" name="submit" onclick="loginValid()">
<?php login();?>
</form>
<a href="newUser.php">Register Account</a>
</div>

</div>

<!--Checkout Window----------------------------------->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <table id="checkout-purchases"></table>
  </div>

</div>
<!---------------------------------------------------->

<script>
//Error if user adds item to cart without being logged on
function error(){
  alert("You must be logged in!")
}

//Validates login form
function loginValid(){
  let userName = document.login.username;
  let password = document.login.password;
  if (userName.value == "" || password.value == ""){
    alert("Please enter both a username and password.");
  } 
}

//Deletes login element if logged on
var check = document.getElementsByClassName("item");
for(let q = 0; q<check.length; q++){
if (check[q].childNodes[14].getAttribute("onclick") === "toCart("+[q]+");"){
 document.getElementById("login").remove();

 //Creates logout link
 var logout = document.createElement("a");
 logout.innerHTML = "Clear Session";
 logout.href = "logout.php";
 document.getElementsByClassName("main-content")[0].appendChild(logout);
 break;
}
}

document.getElementById("count").innerHTML = 0; //counts number of items in cart

function toCart(i){
  c++;//Counter for cart items
  k++;//Counter for checkout items

  //creates item placed in cart
  var cartItem = document.createElement("li");
  cartItem.className = "cart-item";
  var inventory = document.getElementsByClassName("item");
  cartItem.innerHTML= inventory[i].innerHTML;

  //Replace "Add to cart" with "Remove Item"
  cartItem.childNodes[14].remove();
  var removeBttn = document.createElement("button");
  removeBttn.innerHTML = "Remove Item";
  removeBttn.className = "remove-button";
  removeBttn.setAttribute("onclick", "removeItem("+ c + ");  removeCOItem("+ k + ")");
  cartItem.appendChild(removeBttn);

  //Adds item to cart
  document.getElementById("cart").appendChild(cartItem);
  var cart = document.getElementById("cart");

  //changes classes of item categories
  document.getElementsByClassName("cart-item")[c].childNodes[3].className = "CIbrand";
  document.getElementsByClassName("cart-item")[c].childNodes[6].className = "CImodel";
  document.getElementsByClassName("cart-item")[c].childNodes[9].className = "CIsize";
  document.getElementsByClassName("cart-item")[c].childNodes[12].className = "CIprice";

  //pushes cart item prices to array
  prices.push(Number(document.getElementsByClassName("CIprice")[c].innerHTML.slice(1)));

  //Counts amount of items in cart
  document.getElementById("count").innerHTML = cart.childElementCount;

  //Adds new item to checkout screen using AJAX
  newItem();
}

//Places order for user
function confirmOrder(){
  if(document.getElementById("cart").childElementCount == 0){
    alert("Error: Your cart is empty!");
  } else{

  alert("Thank you for your order!");
  for (let s = c; s<document.getElementsByClassName("cart-item").length; s--){
    removeItem([s]);  
    removeCOItem([s]);

    //prevents error
    if(c === -1){
      document.getElementById("place-order").setAttribute("onclick", "document.getElementById('myModal').style.display = 'none';");
      document.getElementById("place-order").innerHTML = "Return to Home Page";
      break;
    }

    }

  }
}


</script>
<script src="checkout.js"></script>
</body>
</html>
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

var c = -1;

function removeItem(itemNo){
    c--;
    var cart = document.getElementById("cart");
    document.getElementById("count").innerHTML = cart.childElementCount - 1;

    var cartItem = document.getElementsByClassName("cart-item");
    document.getElementById("cart").removeChild(cartItem[itemNo]);

    //Resets input counter value    
    var removeBttn = document.getElementsByClassName("remove-button");
    for (var b=0; b<removeBttn.length; b++){
        removeBttn[b].setAttribute("onclick", "removeItem("+ b + "); removeCOItem("+ b + ")");
        document.getElementsByClassName("XbuttonCO")[b].setAttribute("onclick", "removeItem("+ b + "); removeCOItem("+ b + ")");
    }

}


</script>

    <title>The Condo</title>
</head>
<body onload="hideSubCats()">
<header>
<h1>The Condo</h1>
<h4>Second-Rate Boardshop</h4>
</header>
<?php include 'include/navigation.php' ?>


<div class="main-content">

<?php getInventory(); ?>

<div id="login">
<h4>Login</h4>
<form name="login" method="post" action="">
<input type="text" name="username">
<input type="password" name="password">
<input type="submit">
</form>
<a href="">Register Account</a>
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
document.getElementById("count").innerHTML = 0; //counts number of items in cart

function toCart(i){
    c++;
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



document.getElementById("cart").appendChild(cartItem);
var cart = document.getElementById("cart");

//changes classes of item categories
document.getElementsByClassName("cart-item")[c].childNodes[3].className = "CIbrand";
document.getElementsByClassName("cart-item")[c].childNodes[6].className = "CImodel";
document.getElementsByClassName("cart-item")[c].childNodes[9].className = "CIsize";
document.getElementsByClassName("cart-item")[c].childNodes[12].className = "CIprice";

//Counts amount of items in cart
document.getElementById("count").innerHTML = cart.childElementCount;

newItem();
//document.getElementById("XbuttonCO").setAttribute("onclick", "removeItem("+ c + ");  removeCOItem("+ k + ")");

}


</script>
<script src="checkout.js"></script>
</body>
</html>
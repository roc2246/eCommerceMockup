<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   
<script>
var c = -1;

function removeItem(itemNo){
    c--;

    var cart = document.getElementById("cart");
    document.getElementById("count").innerHTML = cart.childElementCount - 1;

    var cartItem = document.getElementsByClassName("cart-item");
    document.getElementById("cart").removeChild(cartItem[itemNo]);

    //Resets input counter value    
    var removeBttn = document.getElementsByClassName("remove-button");
    for (var b=0; b<=removeBttn.length; b++){
        removeBttn[b].setAttribute("onclick", "removeItem("+ b + ");");
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
    <div id="checkout-purchases"></div>
  </div>

</div>
<!---------------------------------------------------->
<?php updateBasket();?>
<script>
document.getElementById("count").innerHTML = 0;

function toCart(i){
    c++;

//creates item placed in cart
var cartItem = document.createElement("li");
cartItem.className = "cart-item";
var inventory = document.getElementsByClassName("item");
cartItem.innerHTML= inventory[i].innerHTML;



//Replace "Add to cart" with "Remove Item"
function removeBttn(){
  cartItem.childNodes[10].remove();
  var removeBttn = document.createElement("button");
  removeBttn.innerHTML = "Remove Item";
  removeBttn.className = "remove-button";

  removeBttn.setAttribute("onclick", "removeItem("+ c + ");");
  cartItem.appendChild(removeBttn);
}
removeBttn();
document.getElementById("cart").appendChild(cartItem);
var cart = document.getElementById("cart");

document.getElementById("count").innerHTML = cart.childElementCount;

}


/*-------------------Chekcout Window---------------------------------------------*/
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

/*-------------------Data inside checkout window--------------------------------*/
//Tracks the request
var xmlhttp;

//Checks if XMLHttpRequest is compatible with the browser
function compatibility() {
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
}

//Loads items in basket
function loadPBasket(url) {
  compatibility();
  xmlhttp.onreadystatechange = function() {
    //Keeps the 'Failed Request' message from displaying during the request
    if (xmlhttp.readyState !=4){
        return;
    }
    if (xmlhttp.status==200 && xmlhttp.readyState ==4) {
        setPS();
    } else {
        alert("Failed Request: " + xmlhttp.statusText);
    }
  };
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}

//Sets basket items to checkout window
function setPS() {
  document.getElementById("checkout-purchases").innerHTML = " ";
  var i;
  var xmlDoc = xmlhttp.responseXML;
  var x = xmlDoc.getElementsByTagName("item");
  for (i = 0; i < x.length; i++) {
      document.getElementById("checkout-purchases").innerHTML +=
        "<span class = 'details'>"+
        x[i].getElementsByTagName("brand")[0].childNodes[0].nodeValue +
        "</span> " +
        x[i].getElementsByTagName("model")[0].childNodes[0].nodeValue +
        "</span> " +
        x[i].getElementsByTagName("size")[0].childNodes[0].nodeValue +
        "</span> " +
        x[i].getElementsByTagName("price")[0].childNodes[0].nodeValue +
        "<br>";
      }

}

loadPBasket("basket.xml");
</script>

</body>
</html>
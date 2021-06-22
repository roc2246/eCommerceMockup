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

function removeItem(c){
    var cartItem = document.getElementsByClassName("cart-item");
    document.getElementById("cart").removeChild(cartItem[c]);
}

function RIpara (){
    return c;
}

</script>

    <title>The Condo</title>
</head>
<body onload="hideSubCats()">
<header>
<h1>The Condo</h1>
<h4>Second-Rate Bardshop</h4>
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
<script>


function toCart(i){
    c++;
  
document.getElementById("cartParent").style.borderColor = "red";  

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

  removeBttn.setAttribute("onclick", "removeItem("+ RIpara() + ")");
  cartItem.appendChild(removeBttn);
}
removeBttn();
document.getElementById("cart").appendChild(cartItem);

console.log(cartItem);
console.log(c);

}




</script>





</body>
</html>
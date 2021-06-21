<?php include 'include/connect.php' ?>
<?php include 'functions.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   
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
var c = 0;
console.log(c);
function toCart(i){
    c++;
document.getElementById("cartParent").style.borderColor = "red";  

//creates item placed in cart
var cartItem = document.createElement("li");
cartItem.className = "cart-item";

var inventory = document.getElementsByClassName("item");

cartItem.innerHTML= inventory[i].innerHTML;

cartItem.childNodes[10].remove();

var removeBttn = document.createElement("button");
removeBttn.innerHTML = "Remove Item";
removeBttn.onclick = function(){
    document.getElementById("cart").removeChild(document.getElementById("cart").childNodes[c]);
c--;
}
cartItem.appendChild(removeBttn);

document.getElementById("cart").appendChild(cartItem);


}


</script>





</body>
</html>
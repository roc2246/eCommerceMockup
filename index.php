<?php 
/** 
 * The Condo - Main Page
 * 
 * PHP version 7.4
 * 
 * @category Main_Pages
 * @package  Pages
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/
 */


  //Tracks user session
  ob_start();
  session_start(); 

  //Stroes php connection 
  require 'include/connect.php'; 

  //Stores php functions
  require 'include/phpCRUD.php';
  require 'functions.php';

  //Stores page header
  require 'include/header.php';
?>

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
        removeBttn[b].setAttribute("onclick", 
        "removeItem("+ b + "); removeCOItem("+ b + ")");
    }

  }
</script>

    <title>The Condo</title>
</head>
<!--End of head-->

<body onload="hideSubCats()">
  <header>
    <h1>The Condo</h1>
    <h4>Second-Rate Boardshop</h4>
    <?php greetUser();?>
  </header>
  <?php require 'include/navigation.php'; ?>


  <div class="main-content">
    <?php getInventory(); ?>
    <div id="login">
      <h4>Login</h4>
      <form name="login" method="post" action="index.php" autocomplete="off"> 
        <input type="text" name="username" placeholder = "username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="submit" 
        onclick="loginValid(userName, userPassword)">
        <?php login('users', '0', '', 'username', 'password');?>
      </form>
      <a href="newUser.php">Register Account</a><br>
      <?php adminPage(); ?><br><br>
    </div>
  </div>

  <!--Checkout Window-->
  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <table id="checkout-purchases"></table>
    </div>
  </div>


  <script src = "shoppingEvents.js"></script>
  <script src = "validation.js"></script>
  <script src="checkout.js"></script>
</body>
</html>
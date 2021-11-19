<?php
/** 
 * Navigation for pages on The Condo
 * 
 * PHP version 7.4
 * 
 * @category Libraries
 * @package  Pages
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     http://wh963069.ispot.cc/projects/eCommerce/include/navigation.php
 */
?>

<navigation>
    <ul id="selectGear">
      <li class="category" id="cartParent" 
      onmouseover="revealCat(1)"
      onmouseleave="hideCat(1)">
          Cart (<span id="count"></span> items)
          <ul id="cart">
          </ul>
      </li>
<li class="category"><span id="myBtn" 
onmouseover="changeColor()"
onmouseleave="defaultColor()">Checkout</span></li>
    </ul>
</navigation>

<script>
    function changeColor(){
        document.getElementById("myBtn").style.color = "blue";
    }

    function defaultColor(){
        document.getElementById("myBtn").style.color = "black";
    }
</script>

<script src="dropdownScript.js"></script>
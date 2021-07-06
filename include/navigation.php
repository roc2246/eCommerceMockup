<navigation>
<ul id="selectGear">

		<li class="category" id="cartParent" onmouseover="revealCat(1)" onmouseleave="hideCat(1)">Cart (<span id="count"></span> items)
			<ul id="cart">
			</ul> 
			
		</li>
		<li class="category"><span id="myBtn" onmouseover="changeColor()" onmouseleave="defaultColor()">Checkout</span></li>

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
<navigation>
<ul id="selectGear">
		<li class="category" onmouseover="revealCat(1)" onmouseleave="hideCat(1)">Boards
			<ul>
				<li><a href="nothing.html">Ride Society</a></li>
				<li><a href="nothing.html">Burton Fish</a></li>
				<li><a href="nothing.html">Rome Agent</a></li>
			</ul>
		</li> 

		<li class="category" onmouseover="revealCat(2)" onmouseleave="hideCat(2)">Boots
			<ul>
				<li><a href="nothing.html">Vans Infusion</a></li>
				<li><a href="nothing.html">Burton Ruler</a></li>
				<li><a href="nothing.html">DC Allegance</a></li>
			</ul> 
		</li>

		<li class="category" onmouseover="revealCat(3)" onmouseleave="hideCat(3)">Bindings
			<ul>
				<li><a href="nothing.html">Union Eloite22</a></li>
				<li><a href="nothing.html">Union Contact</a></li>
				<li><a href="nothing.html">Burton Mission</a></li>
			</ul> 
		</li>

		<li class="category" id="cartParent" onmouseover="revealCat(4)" onmouseleave="hideCat(4)">Cart (<span id="count"></span> items)
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
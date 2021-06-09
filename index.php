<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   
    <title>Document</title>
</head>
<body onload="hideSubCats()">
<header>
<h1>The Condo</h1>
<h4>Second-Rate Bardshop</h4>
</header>
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
				<li><a href="nothing.html">Union Flite</a></li>
				<li><a href="nothing.html">Union Contact</a></li>
				<li><a href="nothing.html">Burton Mission</a></li>
			</ul> 
		</li>

</ul>
</navigation>


<div class="main-content">

</div>

<script src="dropDownScript.js"></script>


</body>
</html>
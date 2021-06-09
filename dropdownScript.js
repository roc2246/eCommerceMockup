// Hides Child Elements
function hideSubCats(){
	var subCats = document.getElementsByTagName("UL");
	for(var i = 1; i<=4; i++){
		subCats[i].style.display = "none";
	}
}

// Reveals/Hides Child Elements
function revealCat(ulNo) {
		document.getElementsByTagName("UL")[ulNo].style.display = "block";

}

function hideCat(ulNo) {
		document.getElementsByTagName("UL")[ulNo].style.display = "none";

}


/* eslint-disable no-plusplus */
/* eslint-disable vars-on-top */
/* eslint-disable no-unused-vars */
// Hides Child Elements
function hideSubCats() {
  const subCats = document.getElementsByTagName('UL');
  for (let i = 1; i <= 1; i++) {
    subCats[i].style.display = 'none';
  }
}

// Reveals/Hides Child Elements
function revealCat(ulNo) {
  document.getElementsByTagName('UL')[ulNo].style.display = 'block';
}

function hideCat(ulNo) {
  document.getElementsByTagName('UL')[ulNo].style.display = 'none';
}

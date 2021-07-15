
/*-------------------Data inside checkout window--------------------------------*/
/*
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
*/
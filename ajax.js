
/*-------------------Data inside checkout window--------------------------------*/
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
        
        let brand = xmlDoc.createElement("brand");
        let model = xmlDoc.createElement("model");
        let size = xmlDoc.createElement("size");
        let price = xmlDoc.createElement("price");

        x[i].appendChild(brand);
        x[i].appendChild(model);
        x[i].appendChild(size);
        x[i].appendChild(price);

        x[i].getElementsByTagName("brand")[0].childNodes[0].nodeValue = document.getElementsByClassName("brand")[0].innerHTML;
        x[i].getElementsByTagName("model")[0].childNodes[0].nodeValue = document.getElementsByClassName("model")[0].innerHTML;
        x[i].getElementsByTagName("size")[0].childNodes[0].nodeValue = document.getElementsByClassName("size")[0].innerHTML;
        x[i].getElementsByTagName("price")[0].childNodes[0].nodeValue = document.getElementsByClassName("price")[0].innerHTML;

        document.getElementById("checkout-purchases").innerHTML +=
        "<table>"+
        "<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>"+
        "<tr>"+
        "<td>"+
        x[i].getElementsByTagName("brand")[0].childNodes[0].nodeValue +
        "</td> " +
          "<td>"+
        x[i].getElementsByTagName("model")[0].childNodes[0].nodeValue +
        "</td> " +
          "<td>"+
        x[i].getElementsByTagName("size")[0].childNodes[0].nodeValue +
        "</td> " +
          "<td>"+
        x[i].getElementsByTagName("price")[0].childNodes[0].nodeValue+
        "</td> " +
          "<td>"+
          "</table>";
        
        }
}




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
var g = -1;//counter variable for checkout items

//Loads items in basket
function loadPBasket(url) {
  g++;//counter variable for checkout items
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
  var newItem = xmlDoc.createElement("item");
  xmlDoc.getElementsByTagName("basket")[0].appendChild(newItem);
  var x = xmlDoc.getElementsByTagName("item");
  console.log(g);
      for (i = 0; i < x.length; i++) {
 
        let brand = xmlDoc.createElement("brand");
        let model = xmlDoc.createElement("model");
        let size = xmlDoc.createElement("size");
        let price = xmlDoc.createElement("price");

        let purBrand = document.getElementsByClassName("brand");
        let purModel = document.getElementsByClassName("model");
        let purSize= document.getElementsByClassName("size");
        let purPrice = document.getElementsByClassName("price");

        x[i].appendChild(brand);
        x[i].appendChild(model);
        x[i].appendChild(size);
        x[i].appendChild(price);

        x[i].childNodes[1].innerHTML = purBrand[0].innerHTML;
        x[i].childNodes[2].innerHTML = purModel[0].innerHTML;
        x[i].childNodes[3].innerHTML = purSize[0].innerHTML;
        x[i].childNodes[4].innerHTML = purPrice[0].innerHTML;
        
        //debugg
        console.log(xmlDoc.getElementsByTagName("basket")[0]);

        document.getElementById("checkout-purchases").innerHTML +=
        "<table>"+
        "<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>"+
        "<tr>"+
        "<td>"+
        x[i].childNodes[1].innerHTML +
        "</td> " +
          "<td>"+
        x[i].childNodes[2].innerHTML +
        "</td> " +
          "<td>"+
        x[i].childNodes[3].innerHTML +
        "</td> " +
          "<td>"+
        x[i].childNodes[4].innerHTML+
        "</td> " +
          "<td>"+
          "</table>";
        
        }
}



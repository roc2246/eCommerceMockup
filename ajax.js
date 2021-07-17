
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
  var i;
  var xmlDoc = xmlhttp.responseXML;  
  var table = "<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>";     
  var newItem = xmlDoc.createElement("item");
  xmlDoc.getElementsByTagName("basket")[0].appendChild(newItem);
  var x = xmlDoc.getElementsByTagName("item");
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

        x[i].getElementsByTagName("brand").innerHTML = purBrand[0].innerHTML;
        x[i].getElementsByTagName("model").innerHTML = purModel[0].innerHTML;
        x[i].getElementsByTagName("size").innerHTML = purSize[0].innerHTML;
        x[i].getElementsByTagName("price").innerHTML = purPrice[0].innerHTML;
        
        //debugg
        console.log(xmlDoc.getElementsByTagName("basket")[0]);

        table +=
        "<tr>"+
        "<td>"+ x[i].getElementsByTagName("brand").innerHTML + "</td> " +
        "<td>"+ x[i].getElementsByTagName("model").innerHTML + "</td> " +
        "<td>"+ x[i].getElementsByTagName("size").innerHTML + "</td> " +
        "<td>"+ x[i].getElementsByTagName("price").innerHTML+ "</td> " +
        "</tr>";
        }
        document.getElementById("checkout-purchases").innerHTML = table;
}




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

var k = -1;//Counter for checkout items

//Sets basket items to checkout window
function setPS() {
  var j;
  var xmlDoc = xmlhttp.responseXML;  
  var table = "<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>";     
  var newItem = xmlDoc.createElement("item");
  xmlDoc.getElementsByTagName("basket")[0].appendChild(newItem);
  var x = xmlDoc.getElementsByTagName("item");
      for (j = 0; j < x.length; j++) {

        let brand = xmlDoc.createElement("brand");
        let model = xmlDoc.createElement("model");
        let size = xmlDoc.createElement("size");
        let price = xmlDoc.createElement("price");

        let purBrand = document.getElementsByClassName("brand");
        let purModel = document.getElementsByClassName("model");
        let purSize= document.getElementsByClassName("size");
        let purPrice = document.getElementsByClassName("price");

        x[j].appendChild(brand);
        x[j].appendChild(model);
        x[j].appendChild(size);
        x[j].appendChild(price);

        //Conditional to prevent console errors
        if (k <= -1){
          x[j].getElementsByTagName("brand").innerHTML = " ";
          x[j].getElementsByTagName("model").innerHTML = " ";
          x[j].getElementsByTagName("size").innerHTML = " ";
          x[j].getElementsByTagName("price").innerHTML = " ";
        }else{
          //maybe add for loop here once I figured out how to add multiple tag elements
          x[j].getElementsByTagName("brand").innerHTML = purBrand[k].innerHTML;
          x[j].getElementsByTagName("model").innerHTML = purModel[k].innerHTML;
          x[j].getElementsByTagName("size").innerHTML = purSize[k].innerHTML;
          x[j].getElementsByTagName("price").innerHTML = purPrice[k].innerHTML;
        }

        table +=
        "<tr>"+
        "<td>"+ x[j].getElementsByTagName("brand").innerHTML + "</td> " +
        "<td>"+ x[j].getElementsByTagName("model").innerHTML + "</td> " +
        "<td>"+ x[j].getElementsByTagName("size").innerHTML + "</td> " +
        "<td>"+ x[j].getElementsByTagName("price").innerHTML+ "</td> " +
        "</tr>";
        }
        document.getElementById("checkout-purchases").innerHTML = table;
console.log(k);//debugg

}


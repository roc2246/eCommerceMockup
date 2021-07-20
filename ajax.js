
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

//Adds item to checkout window
function newItem(){
  var xmlDoc = xmlhttp.responseXML;  
  
  //Creates catregories for each checkout item
  let brand = xmlDoc.createElement("brand");
  let model = xmlDoc.createElement("model");
  let size = xmlDoc.createElement("size");
  let price = xmlDoc.createElement("price");

  //Retrieves categories for each item
  let purBrand = document.getElementsByClassName("CIbrand");
  let purModel = document.getElementsByClassName("CImodel");
  let purSize= document.getElementsByClassName("CIsize");
  let purPrice = document.getElementsByClassName("CIprice");

  //Creates new Checkout Item Tag for XML
  var newItem = xmlDoc.createElement("item");
  var item = xmlDoc.getElementsByTagName("item");

  //Edit Later
  newItem.appendChild(brand);
  newItem.appendChild(model);
  newItem.appendChild(size);
  newItem.appendChild(price);

  xmlDoc.getElementsByTagName("basket")[0].appendChild(newItem);

  //Conditional to prevent console errors
  if (k <= -1){
    item[k].getElementsByTagName("brand")[0].innerHTML = " ";
    item[k].getElementsByTagName("model")[0].innerHTML = " ";
    item[k].getElementsByTagName("size")[0].innerHTML = " ";
    item[k].getElementsByTagName("price")[0].innerHTML = " ";
  }else{
    item[k].getElementsByTagName("brand")[0].innerHTML = purBrand[k].innerHTML;
    item[k].getElementsByTagName("model")[0].innerHTML = purModel[k].innerHTML;
    item[k].getElementsByTagName("size")[0].innerHTML = purSize[k].innerHTML;
    item[k].getElementsByTagName("price")[0].innerHTML = purPrice[k].innerHTML;
  }


  //Debugg
  console.log( xmlDoc.getElementsByTagName("basket")[0]);
  console.log(k);
}

//Removes item from checkout window
function removeCOItem(test){
  k--;//Counter for checkout items
  var xmlDoc = xmlhttp.responseXML;  
  var selectedItem = xmlDoc.getElementsByTagName("item");
  xmlDoc.getElementsByTagName("basket")[0].removeChild(selectedItem[test]);

  //debugg
  console.log( xmlDoc.getElementsByTagName("basket")[0]);
  console.log(k);
}

//Sets basket items to checkout window
function setPS() {
  var j;
  var xmlDoc = xmlhttp.responseXML;  
  var table = "<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>";     
  var x = xmlDoc.getElementsByTagName("item");

      for (j = 0; j < x.length; j++) {

        table +=
        "<tr>"+
        "<td>"+ x[j].getElementsByTagName("brand")[0].innerHTML + "</td> " +
        "<td>"+ x[j].getElementsByTagName("model")[0].innerHTML + "</td> " +
        "<td>"+ x[j].getElementsByTagName("size")[0].innerHTML + "</td> " +
        "<td>"+ x[j].getElementsByTagName("price")[0].innerHTML+ "</td> " +
        "</tr>";
        }
        document.getElementById("checkout-purchases").innerHTML = table;
}


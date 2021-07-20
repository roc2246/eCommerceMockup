
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
  k++;//Counter for checkout items
  var xmlDoc = xmlhttp.responseXML;  
  
  //Creates catregories for each checkout item
  let brand = xmlDoc.createElement("brand");
  let model = xmlDoc.createElement("model");
  let size = xmlDoc.createElement("size");
  let price = xmlDoc.createElement("price");

  //Retrieves categories for each item
  let purBrand = document.getElementsByClassName("brand");
  let purModel = document.getElementsByClassName("model");
  let purSize= document.getElementsByClassName("size");
  let purPrice = document.getElementsByClassName("price");

  //Creates new Checkout Item Tag for XML
  var newItem = xmlDoc.createElement("item");

  //Edit Later
  newItem.appendChild(brand);
  newItem.appendChild(model);
  newItem.appendChild(size);
  newItem.appendChild(price);

  xmlDoc.getElementsByTagName("basket")[0].appendChild(newItem);

  //Debugg
  console.log( xmlDoc.getElementsByTagName("basket")[0]);
}

//Removes item from checkout window
function removeCOItem(test){
  k--;//Counter for checkout items
  var xmlDoc = xmlhttp.responseXML;  
  var selectedItem = xmlDoc.getElementsByTagName("item");
  xmlDoc.getElementsByTagName("basket")[0].removeChild(selectedItem[test]);

  //debugg
  console.log( xmlDoc.getElementsByTagName("basket")[0]);
  
}

//Sets basket items to checkout window
function setPS() {
  var j;
  var xmlDoc = xmlhttp.responseXML;  
  var table = "<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>";     
  var x = xmlDoc.getElementsByTagName("item");

  //Creates catregories for each checkout item
  let brand = xmlDoc.createElement("brand");
  let model = xmlDoc.createElement("model");
  let size = xmlDoc.createElement("size");
  let price = xmlDoc.createElement("price");

  //Retrieves categories for each item
  let purBrand = document.getElementsByClassName("brand");
  let purModel = document.getElementsByClassName("model");
  let purSize= document.getElementsByClassName("size");
  let purPrice = document.getElementsByClassName("price");


      for (j = 0; j < x.length; j++) {

        //Edit Later
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

}



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

//For checkoput screen
var table = " ";     

//Calculates total of purchases
function totalCost(){
  let CIprice = document.getElementsByClassName("CIprice");
  var orderCost = 0;
  for(var p=0; p<=CIprice.length; p++){
    if (CIprice.length<=0){
      return "$" + Number(0.00).toFixed(2);
    } else if(CIprice.length>1){
      orderCost += Number(CIprice[p].innerHTML.slice(1))+ Number(CIprice[p+1].innerHTML.slice(1));
      return "$" + orderCost.toFixed(2);
    } else {
    orderCost += Number(CIprice[p].innerHTML.slice(1));
     return "$" + orderCost.toFixed(2);
    }
  }
}

//Adds item to checkout window
function newItem(){
  var xmlDoc = xmlhttp.responseXML;  
var table = "<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>";     

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

    item[k].getElementsByTagName("brand")[0].innerHTML = purBrand[k].innerHTML;
    item[k].getElementsByTagName("model")[0].innerHTML = purModel[k].innerHTML;
    item[k].getElementsByTagName("size")[0].innerHTML = purSize[k].innerHTML;
    item[k].getElementsByTagName("price")[0].innerHTML = purPrice[k].innerHTML;
  
///////////////////////////////////////////////////Test
for(var g = 0; g<item.length; g++){
    table +=
    "<tr class='order-list'>"+
      "<td>"+ item[g].getElementsByTagName("brand")[0].innerHTML + "</td> " +
      "<td>"+ item[g].getElementsByTagName("model")[0].innerHTML + "</td> " +
      "<td>"+ item[g].getElementsByTagName("size")[0].innerHTML + "</td> " +
      "<td>"+ item[g].getElementsByTagName("price")[0].innerHTML+ "</td> " +
      "<td class='XbuttonCO close' onclick='removeItem("+ g + "); removeCOItem("+ g + ")'>X</td>"+
      "</tr>";
}
table += "<tr><td>TOTAL: </td>" + "<td>"+totalCost()+"</td></tr>";
    document.getElementById("checkout-purchases").innerHTML = table;
//////////////////////////////

}

//Removes item from checkout window
function removeCOItem(test){
  k--;//Counter for checkout items
  var xmlDoc = xmlhttp.responseXML;  
  var selectedItem = xmlDoc.getElementsByTagName("item");
  xmlDoc.getElementsByTagName("basket")[0].removeChild(selectedItem[test]);

  //Subtract item from table
  document.getElementsByClassName("order-list")[test].remove();

var table = "<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>";     

  ///////////////////////////////////////////////////Test
if (selectedItem.length == 0){
  table = "<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>";
}else{
  for(var z = 0; z<selectedItem.length; z++){
        table +=
        "<tr class='order-list'>"+
        "<td>"+ selectedItem[z].getElementsByTagName("brand")[0].innerHTML + "</td> " +
        "<td>"+ selectedItem[z].getElementsByTagName("model")[0].innerHTML + "</td> " +
        "<td>"+ selectedItem[z].getElementsByTagName("size")[0].innerHTML + "</td> " +
        "<td>"+ selectedItem[z].getElementsByTagName("price")[0].innerHTML+ "</td> " +
      "<td class='XbuttonCO close' onclick='removeItem("+ z + "); removeCOItem("+ z + ")'>X</td>"+
      "</tr>";
  }
}
table += "<tr><td>TOTAL: </td>" + "<td>"+totalCost()+"</td></tr>";
        document.getElementById("checkout-purchases").innerHTML = table;
//////////////////////////////

}

//Sets basket items to checkout window
function setPS() {  
        document.getElementById("checkout-purchases").innerHTML = table;
}


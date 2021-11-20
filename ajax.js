/* eslint-disable no-useless-concat */
/* eslint-disable no-plusplus */
/* eslint-disable no-alert */
/* eslint-disable func-names */
/* eslint-disable no-unused-vars */

// Tracks the request
let xmlhttp;

// Checks if XMLHttpRequest is compatible with the browser
function compatibility() {
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    // eslint-disable-next-line no-undef
    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
  }
}

// For checkout screen
let table = '<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr><tr><td>TOTAL:</td><td>$0.00</td></tr>';

// Sets basket items to checkout window (AJAX callback function)
function setPS() {
  document.getElementById('checkout-purchases').innerHTML = table;
}

// Loads items in basket
function loadPBasket(url) {
  compatibility();
  xmlhttp.onreadystatechange = function () {
    // Keeps the 'Failed Request' message from displaying during the request
    if (xmlhttp.readyState !== 4) {
      return;
    }
    if (xmlhttp.status === 200 && xmlhttp.readyState === 4) {
      setPS();
    } else {
      alert(`Failed Request: ${xmlhttp.statusText}`);
    }
  };
  xmlhttp.open('GET', url, true);
  xmlhttp.send();
}

let k = -1;// Counter for checkout items

// For total cost of checout items
let orderCost = 0;
let v = -1;// Counter to calculate prices
const prices = [];

// Calculates total of purchases
function totalCost() {
  v++;// Counter to calculate prices
  if (prices.length === 0) {
    orderCost = 0;
    return `$${orderCost.toFixed(2)}`;
  }
  orderCost += prices[v];
  return `$${orderCost.toFixed(2)}`;
}

function reduceCost(no) {
  v--;// Counter to calculate prices
  if (prices.length === 0) {
    orderCost = 0;
    return `$${orderCost.toFixed(2)}`;
  }
  orderCost -= prices[no];
  prices.splice(no, 1);
  return `$${orderCost.toFixed(2)}`;
}

// Adds item to checkout window
function newItem() {
  const xmlDoc = xmlhttp.responseXML;
  table = '<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>';

  // Creates catregories for each checkout item
  const brand = xmlDoc.createElement('brand');
  const model = xmlDoc.createElement('model');
  const size = xmlDoc.createElement('size');
  const price = xmlDoc.createElement('price');

  // Retrieves categories for each item
  const purBrand = document.getElementsByClassName('CIbrand');
  const purModel = document.getElementsByClassName('CImodel');
  const purSize = document.getElementsByClassName('CIsize');
  const purPrice = document.getElementsByClassName('CIprice');

  // Creates new Checkout Item Tag for XML
  // eslint-disable-next-line no-shadow
  const newItem = xmlDoc.createElement('item');
  const item = xmlDoc.getElementsByTagName('item');

  newItem.appendChild(brand);
  newItem.appendChild(model);
  newItem.appendChild(size);
  newItem.appendChild(price);

  xmlDoc.getElementsByTagName('basket')[0].appendChild(newItem);

  // Adds data from cart to xml doc
  item[k].getElementsByTagName('brand')[0].innerHTML = purBrand[k].innerHTML;
  item[k].getElementsByTagName('model')[0].innerHTML = purModel[k].innerHTML;
  item[k].getElementsByTagName('size')[0].innerHTML = purSize[k].innerHTML;
  item[k].getElementsByTagName('price')[0].innerHTML = purPrice[k].innerHTML;

  // Adds item to checkout list
  for (let g = 0; g < item.length; g++) {
    table
    += `${"<tr class='order-list'>"
      + '<td>'}${item[g].getElementsByTagName('brand')[0].innerHTML}</td> `
      + `<td>${item[g].getElementsByTagName('model')[0].innerHTML}</td> `
      + `<td>${item[g].getElementsByTagName('size')[0].innerHTML}</td> `
      + `<td>${item[g].getElementsByTagName('price')[0].innerHTML}</td> `
      + `<td class='XbuttonCO close' onclick='removeItem(${g}); removeCOItem(${g})'>X</td>`
      + '</tr>';
  }
  table
+= `${'<tr><td>TOTAL: </td>' + '<td>'}${totalCost()}</td></tr>`
+ '<tr><td><button id=\'place-order\' onclick=\'confirmOrder();\'>Place Order</button></td></tr>';
  document.getElementById('checkout-purchases').innerHTML = table;
}

// Removes item from checkout window
function removeCOItem(no) {
  k--;// Counter for checkout items
  const xmlDoc = xmlhttp.responseXML;
  const selectedItem = xmlDoc.getElementsByTagName('item');
  xmlDoc.getElementsByTagName('basket')[0].removeChild(selectedItem[no]);

  // Subtract item from table
  document.getElementsByClassName('order-list')[no].remove();

  table = '<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>';

  // Removes item from checkout list
  if (selectedItem.length === 0) {
    table = '<tr><th>Brand</th><th>Model</th><th>Size</th><th>Price</th></tr>';
  } else {
    for (let z = 0; z < selectedItem.length; z++) {
      table
        += `${"<tr class='order-list'>"
        + '<td>'}${selectedItem[z].getElementsByTagName('brand')[0].innerHTML}</td> `
        + `<td>${selectedItem[z].getElementsByTagName('model')[0].innerHTML}</td> `
        + `<td>${selectedItem[z].getElementsByTagName('size')[0].innerHTML}</td> `
        + `<td>${selectedItem[z].getElementsByTagName('price')[0].innerHTML}</td> `
      + `<td class='XbuttonCO close' onclick='removeItem(${z}); removeCOItem(${z})'>X</td>`
      + '</tr>';
    }
  }
  table
  += `${'<tr><td>TOTAL: </td>' + '<td>'}${reduceCost(no)}</td></tr>`
  + '<tr><td><button id=\'place-order\' onclick=\'confirmOrder();\'>Place Order</button></td></tr>';
  document.getElementById('checkout-purchases').innerHTML = table;
}

/* eslint-disable block-scoped-var */
/* eslint-disable no-alert */
/* eslint-disable no-mixed-operators */
/* eslint-disable no-var */
/* eslint-disable vars-on-top */
/* eslint-disable no-redeclare */
/* eslint-disable no-unused-vars */

// Object for product forms
const inventoryItem = {
  brand: document.uploads.brand,
  model: document.uploads.model,
  price: document.uploads.price,
  size: document.uploads.size,
};

// for main page
if (window.location.pathname === '/eCommerce/'
|| window.location.pathname === '/eCommerce/index.php'
|| window.location.pathname === '/projects/eCommerce/'
|| window.location.pathname === '/projects/eCommerce/index.php'
&& document.getElementsByTagName('a')[0].innerHTML !== 'Logout') {
  var userName = document.login.username;
  var userPassword = document.login.password;
}

// for admin page
if (window.location.pathname === '/eCommerce/admin.php'
|| window.location.pathname === '/projects/eCommerce/admin.php'
) {
  var adminName = document.adminLogin.AMusername;
  var adminPassword = document.adminLogin.AMpassword;
}

function loginValid(username, password) {
  if (username.value === '' || password.value === '') {
    alert('Please enter both a username and password.');
  }
}

// For upload/update products
function prodValidation() {
  // Assigns variables based off of URL location path
  if (window.location.pathname === '/eCommerce/uploadProduct.php'
  || window.location.pathname === '/projects/eCommerce/uploadProduct.php') {
    // Assigns where form will process data
    var page = 'uploadProduct.php';

    // Form
    var form = document.uploads;
  } else if (window.location.pathname === '/eCommerce/updateProduct.php'
  || window.location.pathname === '/projects/eCommerce/updateProduct.php') {
    // Assigns where form will process data
    var page = 'updateProduct.php';

    // Form
    var form = document.update;
  }

  // Enable Data Submission
  function enableSubmit() {
    form.setAttribute('action', page);
    form.setAttribute('enctype', 'multipart/form-data');
    form.setAttribute('onsubmit', 'return true');
  }

  // Prevent Data Submission
  function preventSubmit() {
    form.setAttribute('action', '');
    form.setAttribute('enctype', '');
    form.setAttribute('onsubmit', 'return false;');
  }

  // RegEx
  var regExPrice = /^[0-9]+(\.[0-9]{2})?$/;

  if (inventoryItem.brand.value !== ''
  && inventoryItem.model.value !== ''
  && regExPrice.test(inventoryItem.price.value)
  && inventoryItem.size.value !== '') {
    alert('SUCCESS');
    enableSubmit();
  } else if (inventoryItem.brand.value === '') {
    preventSubmit();
    alert('Please Enter a Brand Name');
    inventoryItem.brand.focus();
    inventoryItem.brand.select();
  } else if (inventoryItem.model.value === '') {
    preventSubmit();
    alert('Please Enter a Model Name');
    inventoryItem.model.focus();
    inventoryItem.model.select();
  } else if (!regExPrice.test(inventoryItem.price.value)) {
    preventSubmit();
    alert('Please Enter a Legitemate price');
    inventoryItem.price.focus();
    inventoryItem.price.select();
  } else if (inventoryItem.size.value === '') {
    preventSubmit();
    alert('Please Enter a size');
    inventoryItem.size.focus();
    inventoryItem.size.select();
  }
}

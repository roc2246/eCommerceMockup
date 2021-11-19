/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */
 //Deletes login element if shopper is logged on
 var check = document.getElementsByClassName("item");
 for(let q = 0; q<check.length; q++){
 if (check[q].childNodes[14].getAttribute("onclick") === "toCart("+[q]+");"){
  document.getElementsByTagName("h4")[2].remove();
  document.getElementsByTagName("form")[0].remove();
  document.getElementsByTagName("a")[1].remove();
 
  break;
 }
 }

//Error if user adds item to cart without being logged on
function error(){
    alert("You must be logged in!")
  }
  
  document.getElementById("count").innerHTML = 0; //counts number of items in cart
  
  function toCart(i){
    c++;//Counter for cart items
    k++;//Counter for checkout items
  
    //creates item placed in cart
    var cartItem = document.createElement("li");
    cartItem.className = "cart-item";
    var inventory = document.getElementsByClassName("item");
    cartItem.innerHTML= inventory[i].innerHTML;
  
    //Replace "Add to cart" with "Remove Item"
    cartItem.childNodes[14].remove();
    var removeBttn = document.createElement("button");
    removeBttn.innerHTML = "Remove Item";
    removeBttn.className = "remove-button";
    removeBttn.setAttribute("onclick", "removeItem("+ c + ");  removeCOItem("+ k + ")");
    cartItem.appendChild(removeBttn);
  
    //Adds item to cart
    document.getElementById("cart").appendChild(cartItem);
    var cart = document.getElementById("cart");
  
    //changes classes of item categories
    document.getElementsByClassName("cart-item")[c].childNodes[3].className = "CIbrand";
    document.getElementsByClassName("cart-item")[c].childNodes[6].className = "CImodel";
    document.getElementsByClassName("cart-item")[c].childNodes[9].className = "CIsize";
    document.getElementsByClassName("cart-item")[c].childNodes[12].className = "CIprice";
  
    //pushes cart item prices to array
    prices.push(Number(document.getElementsByClassName("CIprice")[c].innerHTML.slice(1)));
  
    //Counts amount of items in cart
    document.getElementById("count").innerHTML = cart.childElementCount;
  
    //Adds new item to checkout screen using AJAX
    newItem();
  }
  
  //Places order for user
  function confirmOrder(){
    if(document.getElementById("cart").childElementCount == 0){
      alert("Error: Your cart is empty!");
    } else{
  
     alert("Thank you for your order!");
     // eslint-disable-next-line for-direction
     for (let s = c; s<document.getElementsByClassName("cart-item").length; s--){
        removeItem([s]);  
       removeCOItem([s]);
  
      //prevents error
      if(c === -1){
        document.getElementById("place-order").setAttribute("onclick", "document.getElementById('myModal').style.display = 'none';");
        document.getElementById("place-order").innerHTML = "Return to Home Page";
        break;
       }
  
    }
   }
  }
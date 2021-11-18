<?php 
include 'include/connect.php';
global $connection;

//Create
function invenProd(){
    if(isset($_POST['submit'])) {
    global $connection;
        
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $image = $_FILES["image"]["name"];

    $query = "INSERT INTO inventory(brand,model,price,size, image) VALUES ('$brand', '$model','$price', '$size', '$image')";
    $result = mysqli_query($connection, $query);

      if($brand == '') {
          echo "<p class='upload-fail'>please enter a brand name</p>";
          
        } 
        if($model == '') {
          
          echo "<p class='upload-fail'>please enter a model name</p>";
        }
        if($size == '') {
          
          echo "<p class='upload-fail'>please enter a size</p>";
        } 
        if($price == '') {
          
          echo "<p class='upload-fail'>please enter a price</p>";
        } 
     
        if(!$result) {
            die('Query FAILED: ' . mysqli_error($connection));
        } else {
            echo "<p class='upload-success'>Item successfully added to inventory.</p>";
          }
        }
      }

//Read
function getInventory() {
    global $connection;
    $query = "SELECT * FROM inventory";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error($connection));
    }
    
    $i = -1;       
while($row = mysqli_fetch_assoc($result)) {
        
        $i++;
        $product = "<div class='item'>";

        if ($row['image'] == ''){
          $product.=  "<img src='noImage.png' width='50px' height='120px'><br>";
        }else {
          $product.=  "<img src='uploads/" . $row['image'] . "' width='50px' height='120px'><br>";
        }
        $product.= "Brand: <span class='brand'>" . $row['brand'] . "</span><br>";
        $product.= "Model: <span class='model'>" . $row['model'] . "</span><br>";
        $product.= "Size: <span class='size'>" . $row['size'] . "</span><br>";
        $product.= "Price: <span class='price'>$" . $row['price'] . "</span><br>";
        if(isset($_SESSION['username']) && isset($_SESSION['password']) ){
          $product.= "<button onclick='toCart(". $i .");'>Add to Cart</button>";
        }else{
          $product.= "<button onclick='error();'>Add to Cart</button>";
        }
        $product.="</div>";
        echo $product;
    }  
}

function showAllData() {
  global $connection;
  $query = "SELECT * FROM inventory";
  $result = mysqli_query($connection, $query);
  if(!$result) {
      die('Query FAILED' . mysqli_error($connection));
  }
  echo "<option>Select Inventory Item:</option>";

  while($row = mysqli_fetch_assoc($result)) {
     $id = $row['prodID'];
     $brand = $row['brand'];
     $model = $row['model'];
     $size = $row['size'];
     $price = $row['price'];

  echo "<option name = '$id' value='$id'>$id - $brand - $model - $size - $price</option>";
  }
} 

//Update
function updateProduct() {
    if(isset($_POST['submit'])) {  
      global $connection;
      $id = $_POST['ID'];
      $brand = $_POST['brand'];
      $model = $_POST['model'];
      $size = $_POST['size'];
      $price = $_POST['price'];
      $image = $_FILES["image"]["name"];
    
      $query = "UPDATE inventory SET ";
      $query .= "brand = '$brand', ";
      $query .= "model = '$model', ";
      $query .= "size = '$size', ";
      if(!file_exists(sys_get_temp_dir())){
        $query .= "price = '$price' ";
      } else{
        $query .= "price = '$price', ";
        $query .= "image = '$image' ";
      }
      $query .= "WHERE prodID = '$id'";

      $result = mysqli_query($connection, $query);
        if(!$result) {
          die("QUERY FAILED" . mysqli_error($connection)); 
        }else if($id=="Select Inventory Item:"){
          echo "Please Make a Selection.";
          header('Refresh: 1');
        }else {
          header('Refresh: 1');
          }   
        }
      }

//Delete
function deleteRows() {
    global $connection;
    if(isset($_POST['submit'])) {
       $prodID = $_POST['ID'];
       $query = "DELETE FROM inventory WHERE prodID = '$prodID' ";
      $result = mysqli_query($connection, $query);
          if(!$result) {
            die("QUERY FAILED" . mysqli_error($connection));    
          }else {
             echo "Record Deleted"; 
         header('Refresh: 1');
         }
      }
    }

?>
<?php
//For debugging purposes
//echo sys_get_temp_dir() . "<br><br>";

function uploadImage(){
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "<br><br>File is an image - " . $check["mime"] . ".<br><br>";
    $uploadOk = 1;
  } else {
    echo "File is not an image.<br><br>";

    /*
    FOR DEBUGGING PURPOSES:
    print_r($_FILES);
    echo $_FILES["image"]["tmp_name"];*/
    $uploadOk = 0;

    }
  }

  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br><br>";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" && isset($_POST['image'])) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br><br>";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br><br>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.<br><br>";
  } else if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && isset($_POST['image'])){
    echo "Sorry, there was an error uploading your file.<br><br>";
    }
  }
}

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

//Checks if username is available, then creates new login credentials if username is available
function checkAvailable($table, $loginPage, $col1, $col2){
  if (empty($_POST[$col1]) && isset($_POST['submit'])|| empty($_POST[$col2]) && isset($_POST['submit'])){
    echo "<h4>Please enter a username and password!</h4>";
  }else if(isset($_POST['submit']) && !empty($_POST)) {
    global $connection;

    $username = $_POST[$col1];
    $password = $_POST[$col2];     
    $btwnQuotes = str_replace("'", " ", $col1);
        
    $query = "SELECT * from $table where $btwnQuotes = '$username'";

    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);

    if($count>0)
    {
      echo "User unavailable";
    } else if($count == 0) {

      //Encrypts password
      $username = mysqli_real_escape_string($connection, $username );   
      $password = mysqli_real_escape_string($connection, $password );
      $hashFormat = "$2y$10$"; 
      $salt = "iusesomecrazystrings22";
      $hashF_and_salt = $hashFormat . $salt;
      $password = crypt($password,$hashF_and_salt);   

      //Creates New User
      $query = "INSERT INTO $table($col1,$col2) ";
      $query .= "VALUES ('$username', '$password')";  
      header('Refresh: 2; URL = ' . $loginPage);
   
      $result = mysqli_query($connection, $query);
      if(!$result) {
          die("QUERY FAILED" . mysqli_error($connection));    
      }else {
          echo "User Created"; 
      }
     }
  } 
}

//Greets user/admin
function greetUser(){
  if (isset($_SESSION['username']) && isset($_SESSION['password'])){
    echo "<h4>Hello, ".$_SESSION['username']."!  <a href='logoutCustomer.php'>Logout</a></h4>";
  }
}

function pleaseLoginAdmin(){

  if(isset($_SESSION['AMusername']) && isset($_SESSION['AMpassword']) ){
    echo "<h4>Hello" . " " .$_SESSION['AMusername'] . " <a href='logoutAdmin.php'>Logout</a></h4>";
   } else{
    header('Refresh: 0; loginError.php');
   }
     
  } 

function login($table, $time, $otherPara, $col1, $col2){
 global $connection;
 $username = $_POST[$col1];
 $password = $_POST[$col2];

 //For decryption
 $hashFormat = "$2y$10$"; 
 $salt = "iusesomecrazystrings22";
 $hashF_and_salt = $hashFormat . $salt;
 $password = crypt($password,$hashF_and_salt); 

 $btwnQuotes = str_replace("'", " ", $col1);
 $btwnQuotesPssWrd = str_replace("'", " ", $col2);

 //Strores query and query results
 $query = "SELECT * from $table where $btwnQuotes = '$username' ";
 $query .= "AND $btwnQuotesPssWrd = '$password' limit 1";
 $result = mysqli_query($connection, $query);
 $count = mysqli_num_rows($result);

 if(isset($username) && isset($password) && !empty($username) && $count ==1){
    $_SESSION[$col1] = $username;
    $_SESSION[$col2] = $password;

    header("Refresh:". $time .";". $otherPara); 
    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    
 } else if ($count ==0 && !empty($username)){
   echo "</h4>Error: Username/password does not exist!</h4>";
  } else {
    echo "";
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
      if(sys_get_temp_dir() == '/tmp'){
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

  function checkTempLocation(){
    if (sys_get_temp_dir() == '/tmp'){
      echo "<h4>Sorry, image uploading is down for maintenance.</h4>";
    
    } else {
      uploadImage();
    echo "";
  }
}

function enableUpload(){
  if(sys_get_temp_dir() != '/tmp'){
    echo "<input type='file' name='image'><br><br>";
     } else {
    echo "<input type='file' name='image' disabled><br><br>";
     }
}


function adminPage(){

  if(isset($_SESSION['AMusername']) && isset($_SESSION['AMpassword']) ){
    echo "<a href='mainAdmin.php'>Admin</a>";
   } else{
    echo "<a href='admin.php'>Admin Login</a>";
   }
     
  } 

 function logout($userType, $col1, $col2, $page){
  echo "<header><h4>" . $userType . ' has logged out.</h4></header>';
  echo "<h4>You will be redirected momentarily.</h4>";

  session_start();
  unset($_SESSION[$col1]);
  unset($_SESSION[$col2]);
  
  header("Refresh: 2; URL = " . $page);

 } 

?>
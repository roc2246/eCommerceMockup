<?php
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
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.<br><br>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.<br><br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
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
  } else {
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

        if($brand == '') {
          echo "please enter a brand name<br><br>";
        } else if($model == '') {
          echo "please enter a model name<br><br>";
        }else if($size == '') {
          echo "please enter a size<br><br>";
        } else if($price == '') {
          echo "please enter a price<br><br>";
        } else{
        
        $query = "INSERT INTO inventory(brand,model,price,size, image) VALUES ('$brand', '$model','$price', '$size', '$image')";
        
       $result = mysqli_query($connection, $query);
        if(!$result) {
            die('Query FAILED: ' . mysqli_error($connection));
        
        } else {
            echo "Item successfully added to inventory.<br><br>";
            uploadImage();
        }

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
        
while($row = mysqli_fetch_assoc($result)) {
        $product = "<div class='item'>";
        $product.=  "<img src='uploads/" . $row['image'] . "' width='50px' height='120px'><br>";
        $product.= "Brand: " . $row['brand'] . "<br>";
        $product.= "Model: " . $row['model'] . "<br>";
        $product.= "Size: " . $row['size'] . "<br>";
        $product.= "Price: $" . $row['price'] . "<br>";
        $product.= "<a href=''>Add to Cart</a>";
        $product.="</div>";
        echo $product;
    }  
}

?>
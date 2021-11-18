<?php

//Register Username
function checkAvailable($table, $loginPage, $col1, $col2){

  //Validates form data before submission
  if (
    empty($_POST[$col1]) && isset($_POST['submit']) ||
    empty($_POST[$col2])&& isset($_POST['submit'])
  ){
    echo "<h4>Please enter a username and password!</h4>";
  }else if(isset($_POST['submit']) && !empty($_POST)) {
    global $connection;

  $username = $_POST[$col1];
  $password = $_POST[$col2];     
  $btwnQuotes = str_replace("'", " ", $col1);
        
  $query = "SELECT * from $table where $btwnQuotes = '$username'";

  $result = mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);

  //Checks if username is available
  if($count>0){
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
   
    //Checks if query is successful
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

//Checks if admin is logged in
function pleaseLoginAdmin(){
  if(isset($_SESSION['AMusername']) && isset($_SESSION['AMpassword']) ){
    echo "<h4>Hello" . " " .$_SESSION['AMusername'] . " <a href='logoutAdmin.php'>Logout</a></h4>";
   } else{
    header('Refresh: 0; loginError.php');
   }
     
  } 

//Logs in users  
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

//Echos admin link depending on if admin user is logged in
function adminPage(){
  if(isset($_SESSION['AMusername']) && isset($_SESSION['AMpassword']) ){
    echo "<a href='mainAdmin.php'>Admin</a>";
   } else{
    echo "<a href='admin.php'>Admin Login</a>";
   }
} 

//Logs out user
function logout($userType, $col1, $col2, $page){
  echo "<header><h4>" . $userType . ' has logged out.</h4></header>';
  echo "<h4>You will be redirected momentarily.</h4>";

  session_start();
  unset($_SESSION[$col1]);
  unset($_SESSION[$col2]);
  
  header("Refresh: 2; URL = " . $page);
} 

?>
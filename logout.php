<?php
   echo 'You have logged out.';

   session_start();
   session_destroy();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   header('Refresh: 2; URL = index.php');
?>
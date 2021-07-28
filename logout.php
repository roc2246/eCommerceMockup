<?php
   session_start();
   session_destroy();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = index.php');
?>
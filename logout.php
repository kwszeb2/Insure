<?php
   session_start();
   include('config.php');
   unset($_SESSION['email']);
   unset($_SESSION['passcode']);

   unset($_COOKIE['email']);
   unset($_COOKIE['pass']);

   setcookie('email', '', time() - 60 * 60 * 24);
   setcookie('pass', '', time() - 60 * 60 * 24);

   header("Location: index.html");
  
?>
<?php

session_start();
   //unset($_SESSION['email']);
   
   unset($_SESSION['loggedin']);
   unset($_SESSION['uid']);
    unset($_SESSION['usn']);
    unset($_SESSION['utype']);
   session_destroy();
  // session_close();
   echo "<script>window.location.replace('mainpage.php')</script>";
   exit;
?>
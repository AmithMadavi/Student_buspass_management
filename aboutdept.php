<?php
session_start();
 include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Bus pass</title>  
<link rel="shortcut icon" type="image" href="images/mahadasara logo.jpg">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  color:black;
}
.two{
    color:blue;
}
  body{
    background-image: url(images/deptbg.jpg);
    height:100vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}

</style>

<body>
<div>
<?php
include('depthome.php');
?>
</div>
<?php

include 'dbcon.php';
if (!isset($_SESSION['uid'])&&($_SESSION['utype']=="dc" ))
{
     echo "<script>window.location.replace('login.php')</script>";
}
else
{   
    ?>
     <h3 style=" color: black" align="center"><?php echo "<b> Welcome : ".$_SESSION['uid']."</br></br> To The College Page</b>";?></h3></br>
     <h2 style=" color: crimson" align="center">You can now verify student's bus pass Application . </h2>

    <form class="form-horizontal" method="post" action="<?php  $_SERVER['PHP_SELF'];?>">
    <?php
}
?>
<table class="borderd">  
    
</body>

</html>
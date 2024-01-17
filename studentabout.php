<?php
session_start();
 include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Bus pass</title>  
<link rel="shortcut icon" type="image" href="images/mahadasara logo.jpg">
<link rel="stylesheet" type="text/css" href="studentwelcome.css">
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
</style>

<body  style="background-image: linear-gradient(358.4deg,rgba(249,151,119,1)-2.1%,rgba(98,58,162,1)90%);">
<div>
<?php
include('studentpage.php');
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
     <h3 style=" color: black" align="center"><?php echo "<b> Welcome : ".$_SESSION['uid']."</b>";?></br></br>Apply for bus the pass now!</br></br>Please keep checking your application status. </h3>
    <form class="form-horizontal" method="post" action="<?php  $_SERVER['PHP_SELF'];?>">
    <?php
}
?>
<table class="borderd">
    
    
<table class="borderd">
    
    
</body>
</html>
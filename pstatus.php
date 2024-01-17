<?php 
 include 'dbcon.php';
 $bp_id=$_GET['bp_id'];
 echo $bp_id;
 $status=$_GET['status'];
 echo $status;

 if($status==0)
 {
 
 $sql="update buspass set status='1' where  bp_id='$bp_id'";

 echo $sql;
 }
 

mysqli_query($con,$sql);
header("location:payment.php");
 
?>
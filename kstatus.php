
<?php 
 include 'dbcon.php';
 $bp_id=$_GET['bp_id'];
 echo $bp_id;
 $status=$_GET['status'];
 echo $status;

 if($status==2)
 {
$sql1="update buspass set status='3' where buspass. bp_id='$bp_id'";
  echo $sql1;
 }

mysqli_query($con,$sql1);

header("location:ksrtc page.php");
 
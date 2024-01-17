<?php
session_start();
 include 'dbcon.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Bus_pass</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="studentwelcome.css">
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 />
              <meta name=" description content="" />
    <meta name="author" content=""/>
    <body>
    <?php 
    include('studentpage.php');
    ?>
<?php



//if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true" )))
if (!isset($_SESSION['uid'])&&!($_SESSION['utype']=="ec"))
{
     echo "<script>window.location.replace('index.php')</script>";
}

else{
    

?>
   <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">
 <?php
    include 'dbcon.php';
    
     $email=$_SESSION['uid'];
     ?>
    <!-- <legend style=" color: #FF5733"><b>Welcome Student:<?php echo $email?> </b>  </legend>-->
     <div align="center">
            <h3 style=" color:black">Apply for Bus pass</h3>
</div>
            <?php
              $sql = "select Name ,reg_no from student where email='$email'";
              //echo $sql;
              $result = mysqli_query($con,$sql);
          
              $sql="SELECT Name,reg_no from student where email='$email'";
              //echo $sql;
              $query=mysqli_query($con,$sql);
              while ($r= mysqli_fetch_array($query)) 
              {
            ?>
            <tr>
            <td>    
            <div class="form-group">
            <label class="col-md-4 control-label" for="name">Name</label>  
            <div class="col-md-4">
                  <input type=text  name = Name value=" <?php echo $r['Name'];?>">
                  <span class="help-block">Your Name</span>  
                  </div>
</div>
              </td>
              <td>
<div class="form-group">
            <label class="col-md-4 control-label" for="reg_no">reg_no</label>  
            <div class="col-md-4">
                  <input type=text  name = reg_no value=" <?php echo $r['reg_no'];?>">
                  <span class="help-block">Your regno</span>  
                  </div>
</div>
              </td>
             
              </td>
              <td>
              <div class="form-group">
  <label class="col-md-4 control-label" for="startingpoint">FROM</label>
  <div class="col-md-4">
    <input id="startingpoint" name="startingpoint" type="text" placeholder="startingpoint" class="form-control input-md" required="">
    <span class="help-block">Starting point  </span>
  </div>
</div>
</td>
<td>
<div class="form-group">
  <label class="col-md-4 control-label" for="endingpoint">To</label>
  <div class="col-md-4">
    <input id="endingpoint" name="endingpoint" type="text" placeholder="endingpoint" class="form-control input-md" required="">
    <span class="help-block">ending point </span>
  </div>
</div>
              </td>
              <td>
<div class="form-group">
  <label class="col-md-4 control-label" for="change_over">change over</label>
  <div class="col-md-4">
    <input id="change_over" name="change_over" type="text" placeholder="change_over" class="form-control input-md" required="">
    <span class="help-block">mid point </span>
  </div>
</div>
              </td>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file_upload"> Aadhar Photo</label>
  <div class="col-md-4">
    <input id="fileToUpload" name="fileToUpload" class="input-file" type="file">
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file_upload">fees Photo</label>
  <div class="col-md-4">
    <input id="fileToUpload" name="fileToUpload" class="input-file" type="file">
  </div>
</div>
              </td>
              <!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="register"></label>
  <div class="col-md-8">
    <button id="register" name="register" class="btn btn-primary">Register</button>
    <button id="clear" name="clear" class="btn btn-danger"  type="reset">Clear</button>
  </div>
</div>


</form>
 
    </body>

</html>


                <?php
              }

            }

                     ?>
                

                <?php

if(isset($_POST['register']))
{
    include 'dbcon.php';
    $reg_no=$_POST['reg_no'];
    
  
    $sql = "select * from buspass where reg_no ='$reg_no'";
     
       // echo $sql;
        
    $result = mysqli_query($con,$sql);
    $no_of_rows=mysqli_num_rows($result);
    
    if($no_of_rows>0)
    {
        echo("<script>alert(\"You have already Registered...\")</script>");
    }
    else{
    
    
     $reg_no=$_POST['reg_no'];
    // echo $reg_no;
     $startingpoint=$_POST['startingpoint'];
    // echo $startingpoint;
     $endingpoint=$_POST['endingpoint'];
    // echo $endingpoint;
     $change_over=$_POST['change_over'];
    // echo $change_over;
    
   
  //  $file_name=$_POST['file_upload'];
    
    
    
    
    
    
    
   $target_dir = "Doc_photos/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   
   $newfilename=$target_dir;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


$date = new DateTime();
$newfilename.= $date->getTimestamp();
            $random=rand(10,1000);
            $newfilename=$newfilename."".$random.".".$imageFileType;


// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
//}
// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jfif"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename)) {
     //   echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
        //Logic for data insertion
        
        $sql = "insert into buspass(reg_no,doc_upload,doc_upload2,startingpoint,endingpoint,change_over,status) values('$reg_no','$newfilename','$newfilename','$startingpoint','$endingpoint','$change_over','0')";
     
     // echo $sql;
        
    $result = mysqli_query($con,$sql);
    if($result)
{
  echo("<script>alert(\"You have Succesfully Applied...,\\n Your bus pass will be approved within 3days\")</script>");
   // echo "<b>You have Succesfully Registered, Login Register For Events (Sports/Cultural) <b>";
}
else{
     echo("<script>alert(\"Registration Failed...\n\n Try Again\")</script>");
}
        
        
        
        
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    } //end else
    
    
    
    
    
    
    
    
    
    
    
    
}//end if(isset($_POST['register']))


?>
    
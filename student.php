<?php
include('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Bus_pass</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="student.css">
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 />
              <meta name=" description content="" />
    <meta name="author" content=""/>
    <script>
    function check_usn(str)
        {
            //ajax call to retrievents.php
            alert("usn=>"+str);
            
//            
             x = new XMLHttpRequest();
                    x.open("POST", "check_usn.php?d=" + str, true);
                    x.send();
                    x.onreadystatechange = function ()
                    {
                        if (x.readyState == 4 && x.status == 200)
                        {
                            document.getElementById("usn_info").innerHTML = x.responseText;
                        }
                    };
            
        }
       
        
        </script>
    
    
</head>
<body style="font-family:Monospace;font-size: 20px;;color:white;">

<?php 
    include('Registerhome.php');
    ?></br></br>

    <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">

<div class="form-group">
  <label class="col-md-4 control-label" for="Reg">Register_number</label>  
  <div class="col-md-4">
      <input id="Reg" name="Reg_no" type="text" placeholder="Register number" class="form-control input-md" required="" >
  <span class="help-block" id="usn_info" style="color:white">Type Your Register number</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Full Name" class="form-control input-md" required="">
  <span class="help-block" style="color:white">Type your Full Name</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email Id</label>  
  <div class="col-md-4">
      <input id="email" name="email" type="email" placeholder="Email Id" class="form-control input-md" required="">
  <span class="help-block" style="color:white">Type a valid Email Id</span>  
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone No</label>  
  <div class="col-md-4">
      <input id="phone" name="phone" type="tel"  pattern="[0-9]{10}" placeholder="Mobile No" class="form-control input-md" required="true">
  <span class="help-block" style="color:white" style="color:white">Type a valid Mobile Number</span>  
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Gender</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="gender" id="gender" value="Male" checked="checked">
      Male
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="gender" id="gender" value="Female">
      Female
    </label>
	</div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="branch">college</label>
  <div class="col-md-4">
    <select id="college" name="admin_id" class="form-control" required="">
          <option value="">Select college</option>
        <?php

//code for retrieving branches


 $sql = "select admin_id,collegename from admin where admin_id<10";
     
    $result = mysqli_query($con,$sql);

while ($rows = mysqli_fetch_array($result)) {

?>
    
      <option value="<?php echo $rows['admin_id'] ?>"><?php echo $rows['collegename'] ?></option>
         <?php
} //end while($rows = mysql_fetch_array($result))
      ?>  
    </select>
</div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="year">Select year</label>
  <div class="col-md-4">
    <select id="year" name="year" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
  </div>
</div>



<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password(3 characters minimum)</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="Create your Password" minlength="3" class="form-control input-md" required="true">
    <span class="help-block" style="color:white">Use at least 3 characters </span>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Cpassword"> Confirm Password</label>
  <div class="col-md-4">
    <input id="Cpassword" name="Cpassword" type="password" placeholder="Create your Password" class="form-control input-md" required="true">
    <span class="help-block" style="color:white">Confirm password </span>
  </div>
</div>

    
<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file_upload">Upload your Photo</label>
  <div class="col-md-4">
    <input id="fileToUpload" name="fileToUpload" class="input-file" type="file">
  </div>
</div>








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

if(isset($_POST['register']))
{
  
    include 'dbcon.php';
    $Reg_no=$_POST['Reg_no'];
    
  
    $sql = "select * from student where Reg_no ='$Reg_no'";
     
       // echo $sql;
        
    $result = mysqli_query($con,$sql);
    $no_of_rows=mysqli_num_rows($result);
    $password=$_POST['password'];
    $Cpassword=$_POST['Cpassword'];
    if($no_of_rows>0 )
    {
        echo("<script>alert(\"You have already Registered...\")</script>");
    }

    else if($password!=$Cpassword)
    {
      echo("<script>alert(\"Password did not matched...\")</script>");
    }
    else
    {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $year=$_POST['year'];
    $password=$_POST['password'];
    $Cpassword=$_POST['Cpassword'];
    $phone=$_POST['phone'];
    $admin_id=$_POST['admin_id'];
  //  $file_name=$_POST['file_upload']; 
   $target_dir = "student_photos/";
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
        
        $sql = "insert into student(reg_no,name,email,gender,password,Cpassword,photo,year,phone,admin_id) values('$Reg_no','$name','$email','$gender','$password','$Cpassword','$newfilename','$year','$phone','$admin_id')";
     
       // echo $sql;
        
    $result = mysqli_query($con,$sql);
   
    
if($result)
{
  echo("<script>alert(\"You have Succesfully Registered...,\\n Now Login and Apply for bus pass\")</script>");

}
else{
     echo("<script>alert(\"Registration Failed...\n\n Try Again\")</script>");
}
        
        
        
        
        
    } else {
        echo "Sorry, there was an error while uploading your file.";
    }
}
    } //end else
    
    
    
    
    
    
    
    
    
    
    
    
}//end if(isset($_POST['register']))


?>
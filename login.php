<?php
session_start();
 include 'dbcon.php';
?>


<!DOCTYPE html>
<html>
<head>
<title>BUS PASS</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="login.css">
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 />
              <meta name=" description" content="" />
    <meta name="author" content=""/>
   
</head>
<body>

<?php 
    include('login_header.php');
    ?></br></br>

    <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">
<fieldset align="center">

    <h3 style="color:white">KSRTC/College/Student Login</h3>

<div style="align-items: center" class="form-group" ></br></br>

  <label class="col-md-5 control-label" for="Email" style="color:white;font-size:20px;">Email Id</label>  
  <div class="col-md-2">
  <input id="email" name="email" type="email" placeholder="Type Registered EmailId" class="form-control input-md" required="">

  </div>
</div></br></br>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="password" style="color:white;font-size:20px;">Password</label>
  <div class="col-md-2">
    <input id="password" name="password" type="password" placeholder="Type Password" class="form-control input-md" required="">
    <span class="help-block"></span>
  </div>
</div></br></br>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
<div class="col-md-4">
    <button  name="login" class="btn btn-primary">Login</button>
  
  </div>
</div>


    </fieldset> 
       
  
</form>

    
   
<?php
if(isset($_POST['login']))
{
   // echo "login part";
     include 'dbcon.php';
   // echo "You Clicked on login";
    $ct=0;

    $flag=0;

    //code for login
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    //admin login
    if($flag==0)
    {
 $sql = "select admin_id,email  from admin where email='$email' and password='$password'";
// echo $sql;
  
 $query = mysqli_query($con,$sql);

 if(mysqli_num_rows($query)==1)
 {
    $r = mysqli_fetch_array($query);
    $adminid=$r['admin_id'];
    $email=$r['email'];
  
        $_SESSION['uid'] = $email;
        $_SESSION['utype']="admin";
        //$_SESSION['loggedin'] = true;
        //header('location:Admin_Home.php');
        $flag=1;
  echo "<script>window.location.replace('aboutdept.php')</script>";
     
    }
    //dept coordinator login
    else if ($ct==0) {
      $sql = "select ksrtc_id,email  from department where email='$email' and password='$password'";
      // echo $sql;
        
       $query = mysqli_query($con,$sql);
      
       if(mysqli_num_rows($query)==1)
       {
          $r=mysqli_fetch_array($query);
          $adminid=$r['admin_id'];
          $email=$r['email'];
        
              $_SESSION['uid'] = $email;
              $_SESSION['utype']="department";
              //$_SESSION['loggedin'] = true;
              //header('location:Admin_Home.php');
              $flag=1;
        echo "<script>window.location.replace('ksrtc page.php')</script>";
           
          }
          //dept coordinator login
    
    else{
    
    //event student login
    //else if ($flag==0) {
      //echo "student part";
        //$sql = "SELECT count(*) as ct from user_reg where email_id='$name' and password='$password' ";
        
        $sql = "select * from student where email='$email' and password='$password'";
    //echo $sql;
        $query = mysqli_query($con,$sql);
  if(mysqli_num_rows($query)==1)
  {
      $row=mysqli_fetch_array($query);
      $Reg_no=$row['reg_no'];
      $email=$row['email'];
    //$ct=$r[0];
   $_SESSION['Reg_no']=$Reg_no;
       $_SESSION['uid'] = $email;
        $_SESSION['utype'] = "student";
       // $_SESSION['uid']=$uid;
       // $_SESSION['loggedin'] = true;
          $flag=1;
        //echo "<script>alert('Valid student login')</script>";
        //header('location:Admin_Home.php');
     echo "<script>window.location.replace('student_home.php')</script>";
    
    }//end else if($ct==0)//student
    
    else {
        //echo "Invalid Login";
         echo("<script>alert(\"Invalid Username and Password... Please Try Again\")</script>");
    }
    }//end else(stduent)
    //}//end else(eventco)
    }//end else(deptco)
    }//end if(admin)   
}//end if(isset($_POST['login']))

if(isset($_POST['forgotpassword']))
{
    
}



?>
        
    
    
    
    
    
    </body>
</html>
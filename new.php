
<!DOCTYPE html>
<html>
<head>
<title>bus pass</title>  
<link rel="shortcut icon" type="image" href="images/mahadasara logo.jpg">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 />
              <meta name=" description content="" />
    <meta name="author" content=""/>
  
                                      
    <script type="text/javascript">
        
        
        function call_students(str)
        {
            //ajax call to retrievents.php
           // alert("selected eventid=>"+str);
            
            
             x = new XMLHttpRequest();
                    x.open("POST", "call_students.php?d=" + str, true);
                    x.send();
                    x.onreadystatechange = function ()
                    {
                        if (x.readyState == 4 && x.status == 200)
                        {
                            document.getElementById("display_events").innerHTML = x.responseText;
                        }
                    };
            
        }//end function call_students(str)()
        </script>    
</head>
<body style="background-color:#f7e6ff;">
<div>
<?php
include('ksrtchome.php');
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
    <legend style=" color: #FF5733" align="left"><?php echo "<b> Welcome User: ".$_SESSION['uid']."</b>";?></legend>
    <form class="form-horizontal" method="post" action="<?php  $_SERVER['PHP_SELF'];?>">
<fieldset>

<!-- Form Name -->
<legend>Dept Coordinator Register for Events</legend>

<!-- Select Basic -->

<div class="form-group">
  <label class="col-md-4 control-label" for="event_type">Select College</label>
  <div class="col-md-4">
      <select id="event_type" name="event_type" class="form-control" onchange="call_students(this.value)">
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

<div id="display_events"></div>
    
    




<!-- Button -->
<!--<div class="form-group"> 
  <label class="col-md-4 control-label" for="save"></label>
  <div class="col-md-4">
    <button id="save" name="save" class="btn btn-primary">Save</button>
  </div>
</div>-->

</fieldset>
</form>
    
 
<?php
    
}//end else
  ?>  
    </body>
</html>


<?php
if(isset($_POST['save']))
{
    //session_start();
    include 'dbcon.php';
    
    //code for approving stduents to events
    $email=$_SESSION['uid'];
    $sql="select Reg_no from v1 where admin_id='$admin_id'";
//echo $sql;
$query = mysqli_query($con,$sql);
$r = mysqli_fetch_array($query);
$dept_cid=$r['dept_cid'];
$branchid=$r['branchid'];
    
  
    $eventid=$_POST['event'];
    
    
    //Reset status to 0
    $sql="select reg_no,admin_id from v1 where admin_id='$admin_id'";
       // echo $sql;
        $query = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($query))
        {
        $reg_no=$row['reg_no'];
       // $eventid=$row['eventid'];
        $sql1 = "update buspass set status=0 where reg_no='$reg_no' and admin_id='$admin_id'";
        //echo $sql;
        $query1 = mysqli_query($con,$sql1);
        }
    //update checked event status
    if(isset($_POST['c1']))
    {
        
    //
    //if($_POST['c1']=="0" && $sid!="")
    
     
    $usn_list=$_POST['c1'];  
    
   // print_r($selected_event_list);
        
        foreach($usn_list as $usn)
        {
             $sql2 = "update buspass set status=1 where reg_no='$reg_no' and admin_id='$admin_id'";
         //$sql = "insert into participant(sid,eventid) values('$sid','$eventid')";
           $result = mysqli_query($con,$sql2);
            
        }//end foreach()
        
        echo("<script>alert(\"You have Successfuly Approved students for the selected event... \")</script>");

    }//end if(isset($_POST['c1]))
    


    
    
}//end if(isset($_POST['save']))

?>



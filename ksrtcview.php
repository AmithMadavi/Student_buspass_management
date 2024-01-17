<?php
session_start();
 include 'dbcon.php';
?>
<!DOCTYPE html>
<html>

<head>
<title>bus_pass</title>  
<link rel="shortcut icon" type="image" href="mahadasara logo.jpg">  
    <script>
      
      
      function call_home()
      {
          //alert(" home()");
           window.location.replace('dept_cohome.php'); 
          
          
      }
        
        </script>
    
    
    
    
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="ksrtcpage.css">
  

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    
</head>
<body>

    
        <?php
        include('ksrtchome.php')  ;
        ?>
        </div>
<?php


include 'dbcon.php';
if (!isset($_SESSION['uid'])&&($_SESSION['utype']=="dc" ))
{
     echo "<script>window.location.replace('index.php')</script>";
}
else
{
    
    ?>
    <!-- <legend style=" color: #FF5733" align="left"><?php echo "<b> Welcome User: ".$_SESSION['uid']."</b>";?></legend>-->
    <form class="form-horizontal" method="post" action="<?php  $_SERVER['PHP_SELF'];?>">
<fieldset>

<!-- Form Name -->
<h3 style=" color:purple;text-align:center;">LIST OF APPROVED COLLEGES</h3></br>
<!--<button id="logout" name="logout" type='button' class="btn btn-success" align='right' onclick="call_logout()">Logout</button>-->
<!-- Select Basic -->

<div class="form-group">
  <label class="col-md-4 control-label" for="branch"></label>
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
<br>
    <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="view"></label>  
<div class="col-md-3" align="right">
    <button id="view" name="view" class="btn btn-primary" >View</button>
  </div>
</div>
  </div>
 </div>
     
</form>
    <?php

}//end else
?>


<?php


if (isset($_POST['view'])) {

    include 'dbcon.php';
      $admin_id=$_POST['admin_id'];

      
//echo $email;
     
    $query = mysqli_query($con,"select * from admin where admin_id='$admin_id'");
                               $r = mysqli_fetch_array($query);
                                    $collegename=$r[1];
  
?>

  <legend style=" color: #FF5733" align="center"><?php echo "<b>".$collegename."</b>";?></legend>
    <div class="content-wrapper">
        <div class="container<div class="container-fluid"><div class="card mb-3">
  <div class="card-header">
      <i class="fa fa-table"></i>&emsp; College Wise List
  </div>
  <div class="card-body">
      <div class="table-responsive">
  <br>
  <?php
                                
                              

  $sql="SELECT Reg_no,name,doc_upload2,photo,Startingpoint,endingpoint,change_over,status from v1 where  admin_id='$admin_id' and status='3'";
                               // echo $sql;
                              
              $query=mysqli_query($con,$sql);
              ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                <td>photo</td>
                  <td>REG_NO</td>
                  <td>Name</td>
                  <td>from</td>
                  <td>TO</td>
                  <td>Change_over</td>
            <td>Aadhar</td>
              
                  <td>Approval</td>
                                    
                    
                                    
              </tr>
                <tbody>
                   <?php
               while ($r= mysqli_fetch_array($query))
                                {
          
                 ?>
                                  <tr>
                                  <td><img src="<?php  echo $r['photo']?>" width="80" height="100"></td>
                    <td>
                                      <?php 
                                     // $usn=$r['usn'];
                   echo $r['Reg_no']; 
                              
                                     ?>
                   </td>
                                     <td>
                                      <?php 
                   echo $r['name']; 
                                     ?>
                    </td>
                                     <td>
                                      <?php 
                    echo $r['Startingpoint']; 
                                     ?>
                                     </td>
                   <td>
                    <?php 
                                     echo $r['endingpoint']; 
                                     ?>
                    </td>
                                     <td>
                                      <?php 
                                     echo $r['change_over']; 
                    ?>
                                     </td>
                                     <td><img src="<?php  echo $r['doc_upload2']?>"width="80" height="100"></td>
                     
                                      <?php 
                    
                     $Reg_no=$r['Reg_no'];
                     // $usn_eventid=$usn."-".$eventid;
                                       $status=$r['status'];
                                       if($status==0)
                       {
                                       echo '<td><p><a href="" class="btn btn-warning">payment not done</a></p></td>';
                                     
                  }
                                    else if($status==3)
                   {

                    echo '<td><p><a href="" class="btn btn-success">Approved</a></p></td>';
                                      
        
                                     //$usn=$r['usn'];
                               
            }
        }
                              
                                     ?>
                                     
                   </td>
                                                   
                                  </tbody>
                               </table>
                    </div>
                </div>
                             
                 
                </div>     
               <!-- <div class="form-group">
  <label class="col-md-4 control-label" for="save"></label>
  <form method='post'>
  <div class="col-md-4">
    <button id="save" name="save" class="btn btn-primary">Save</button>
  </div></form>
</div>    -->                              
                <br><br>
            </div>
        </div>
    </div>

    </body>

</html>                       

 
                   
<?php
if(isset($_POST['save']))
{
    //session_start();
    include 'dbcon.php';
    
    //code for approving stduents to events


      //$selected_event_list=$_POST['c1'];
  // echo "sid=".$sid;
    //if($sid)
   // {
       // echo " deleted";
        
       // $sql="delete from participant p where p.sid='$sid' and p.eventid in (select e.eventid from events e where e.event_type_id='$event_type_id')";
        //echo $sql;
       
        
       // echo $sql;
    //echo $sql;
        //$query = mysqli_query($con,$sql) 
    
    //}
    //Reset status to 0
    $sql="select usn,eventid from v9 where branchid='$branchid' and eventid='$eventid'";
       // echo $sql;
        $query = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($query))
        {
        $usn=$row['usn'];
       // $eventid=$row['eventid'];
        $sql1 = "update buspass set status=0 where usn='$Reg_no'";
        //echo $sql;
        $query1 = mysqli_query($con,$sql1);
        }
   
    //update checked event status
    if(isset($_POST['c1']))
    {
        
    //
    //if($_POST['c1']=="0" && $sid!="")
    
     
    $Reg_no_list=$_POST['c1'];  
    
   // print_r($selected_event_list);
        
        foreach($Reg_no_list as $usn)
        {
             $sql2 = "update buspass set status=1 where Reg_no='$Reg_no'";
         //$sql = "insert into participant(sid,eventid) values('$sid','$eventid')";
           $result = mysqli_query($con,$sql2);
            
        }//end foreach()
        
        echo("<script>alert(\"You have Successfuly Approved students for the selected event... \")</script>");

    }//end if(isset($_POST['c1]))
    
//    else{
//        echo "UNCHECKED CHECK BOXES";
//        
//        
//        if($sid!="" )
//    {
//        echo "no events selected or unchecked all selcted events";
//        
//        $sql="delete from participant where sid='$sid' and eventid in(select eventid from event where evenet_type_id='$event_type_id')";
//       
//     
//    $result = mysql_query($sql);
//    }
//        
//   
//     
//    }//end else   
}//end if(isset($_POST['save']))

?>
  
    
     <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small></small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
   
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="vendor/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="vendor/sb-admin-datatables.min.js"></script>
    
   <?php 
   // echo "<script>window.location.replace('view_events2.php')</script>";
}//end if(isset($_POST['Submit'))
                        //}                                   
?>
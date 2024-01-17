
<html>

<head>
    
    <script>
      
      
      function call_home()
      {
          //alert(" home()");
          // window.location.replace('admin_home.php'); 
          
          
      }
        
        </script>
<body>
<?php

session_start();
include 'dbcon.php';

//echo $event_type_id;
//echo "call stdeunt.php";
$email=$_SESSION['uid'];
$sql="select admin_id,collegename from v1 where email='$email' ";
//echo $sql;
$query=mysqli_query($con,$sql);
$r=mysqli_fetch_array($query);

$admin_id=$r['admin_id'];
$collegename=$r['collegename'];
                                                              
?>
 <legend style=" color: #FF5733" align="center"><?php echo "<b>".$collegename."</b>";?></legend>

     <div class="content-wrapper">
        <div class="container">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i>&emsp; College Wise List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                                </thead>
                               
                                <tbody>
                                <?php
                                
                              
                                
                        
                                
                                $sql="SELECT Reg_no,name,doc_upload2,photo,Startingpoint,endingpoint,change_over,admin_id,status from v1 where  admin_id='$admin_id' and status='0'";
                                // echo $sql;
                            
                                 $query=mysqli_query($con,$sql);
                               // $sql="select ename,gender,name,bname,email,phoneno from v7 where event_type_id='$event_type_id'";
                              
                              
                                $total= mysqli_num_rows($query);
                               // echo "<tr><td>".$query."</td></tr>";
                               ?>
                               <div class="card-header">
                               <b style="color: #0066ff;float:right;"> <?php echo "Total Partcipants:". $total ?></b>
                           </div>
              <?php
                                while ($r=mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                     <td><img src="<?php  echo $r['photo']?>" width="80" height="100"></td>
                                        <td><?php echo $r['Reg_no']; ?></td>
                                  
                                        <td><?php echo $r['name']; ?></td>
                                      
                                        <td><?php echo $r['Startingpoint']; ?></td>
                                         <td><?php echo $r['endingpoint']; ?></td>
                                         <td><?php echo $r['change_over']; ?></td>
                                         <td><img src="<?php  echo $r['doc_upload2']?>" width="80" height="100"></td>
                                         <?php
                                         $admin_id=$r['admin_id'];
                                         $Reg_no=$r['Reg_no'];
                                        // $usn_eventid=$usn."-".$eventid;
                                    
                                         
                                         if($status==0)
                                         {
                                        
//                                        echo "<td><input type='checkbox' name='c1[]' value='$usn'  /></td></tr>";
                                             echo "<td><input type='checkbox' name='c1[]' value='$Reg_no'  /></td></tr>";
                                     
                                       
                                         }
                                         else if($status==1)
                                         {
                                             echo "<td><input type='checkbox' name='c1[]' value='$Reg_no' checked /></td></tr>";                                         
                                       
                                          }
                                          else if($status==2)
                                         {
//                                             echo "<td><input type='checkbox' name='c1[]' value='$usn' checked /></td></tr>";                                         
                                              echo "<td><span style='background-color:#99ccff;'><b>Participated</b></span></td></tr>";                                         
                                       
                                          }
                                         }//end if(event type_id)
                                        
                                         
                                         if($status==0)
                                         {
                                        
                                        echo "<td><input type='checkbox' name='c1[]' value='$Reg_no'  /></td></tr>";
//                                             echo "<td>Approval Pending</td></tr>";
                                     
                                       
                                         }
                                         else if($status==1)
                                         {
                                              echo "<td><span style='background-color:#99ff99;'><b>Approved</b></span></td></tr>";                                         
                                              // echo "<td><input type='checkbox' name='c1[]' value='$usn' checked /></td></tr>";                                         
                                       
                                          }
                                        else if($status==2)
                                         {
                                              echo "<td><span style='background-color:#99ccff;'><b>Participated</b></span></td></tr>";                                         
                                       
                                          }
                                        
                                         
                                
                                ?>
                                </tbody>
                                 
                            </table>
                        </div>
                    </div>
                    <!--                  
                </div>

                               

                
                <br><br>
            </div>
        </div>
    </div>


--><div class="form-group">
  <label class="col-md-4 control-label" for="save"></label>
  <div class="col-md-4">
    <button id="save" name="save" class="btn btn-primary">Save</button>
  </div>
</div><!--



    
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
<?php
session_start();
 include 'dbcon.php';
?>
<html>
    <head> 
    <script>
function print_current_page()
{
window.print();
}
    </script>
    
<style>
  
body{
    
    min-height: 380px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
     
     @page {
       size: A4 ;
       margin: 0;
     }
     @media print {
       html, body {
     	width: 220mm;
     	height: 295mm;        
       }
      }
       </style>
        </head>
       <body style=" background-image: linear-gradient(10deg,#ddd6f3,#faaca8);">
   <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">
 <?php
    include 'dbcon.php';
    
     $email=$_SESSION['uid'];
     ?>
     <div align="center">
     <img src="images/ksrtc.jpg" alt="logo" width="150px" height="100px"/>
    </div>
   
     <!--<legend style=" color: #FF5733"><b>Welcome Student:<?php echo $email?> </b>  </legend>-->
     <div align="center">
            <h1 style=" color: black;padding:30px;">BUS PASS CARD</h1>
</div>
      <div style="text-align:center">
            <?php
              $sql = "select name ,Reg_no , photo, Startingpoint,endingpoint,change_over from v1 where email='  $email'";
              //echo $sql;
              $result = mysqli_query($con,$sql);
          
              $sql="SELECT name,Reg_no , Startingpoint,endingpoint,change_over,photo from v1 where email='$email'";
              //echo $sql;
              $query=mysqli_query($con,$sql);
              while ($r= mysqli_fetch_array($query)) 
              {
            ?>
            <div style="text-align:center">
            <img src="<?php  echo $r['photo']?>" width="100" height="100"></br>
              </div>
            <br>
            <tr>
<td>
<div class="form-group">
            <td>
            <div class="form-group">
             <b><label class="col-md-4 control-label" for="name">NAME:</label></b> <?php echo $r['name']; ?> 
               
              
                  </div>
</div>
              </td>
              <br>
              <td>
<div class="form-group">
  <b><label class="col-md-4 control-label" for="Reg_no">REGISTER NUMBER:</label></b>  
             <?php echo $r['Reg_no'];?>
                
                  </div>
              </td>
              <br>
                  <td>
<div class="form-group">
 <b><label class="col-md-4 control-label" for=" Startingpoint">FROM:</label> </b>
             <?php echo $r['Startingpoint'];?>
             <td>&nbsp; &nbsp; &nbsp;  &nbsp;</td>
           <b> <label class="col-md-4 control-label" for="endingpoint">TO:</label>  </b>
             <?php echo $r['endingpoint'];?>
                
                  </div>
                  <br>
                  <td>
<div class="form-group"> <td> <b><label class="col-md-4 control-label" for="change_over">CHANGE OVER:</label> </b> 
            <?php echo $r['change_over'];?>
                
                  </div>
                  <br>
                  <div class="form-group">
                <b><label class="col-md-4 control-label" for=" Valid">Valid:</label> </b>
                  <?php echo 'june-2022';?>
                  <td></td>
            <b><label class="col-md-4 control-label" for="endingpoint">UPTO:</label></b>  
             <?php echo 'April-2023';?>
              </div>
              </td>
              <td>
                <br>
              <div class="form-group">
                  <b> <label class="col-md-4 control-label" for=" Price">PRICE:</label> </b>
                  <?php echo 'Rs1050/-';?>
              </div>
              <br>
              <br>
                  <?php
              }

            
                     ?>
   <button id="submit" name="View" class="btn btn-primary" onclick="print_current_page()">PRINT</button>
                                    <b><a href="mainpage.php" style="float:center;padding-left:50px" >HOME</a></b>
                                    </div>
            </body>

            
</html>















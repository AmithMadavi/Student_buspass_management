<?php
session_start();
 include 'dbcon.php';
?>
<html>
    
<style>

     
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
       <body  style="background-image: linear-gradient(90deg,#de6262,orange);">

    <?php
?>
   <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">
 <?php
    include 'dbcon.php';
    
     $email=$_SESSION['uid'];
     ?>
     <!--<legend style=" color: #FF5733"><b>Welcome Student:<?php echo $email?> </b>  </legend>-->
     <div align="left">
   
           
</div>
            <?php
              
              $sql="SELECT name,Reg_no ,Startingpoint,endingpoint,change_over,photo,bp_id,status from v1 where email='$email'";
              //echo $sql;
              $query=mysqli_query($con,$sql);
              while ($r= mysqli_fetch_array($query)) 
              {
            ?>
            <br>
            <tr>
<td>
<div class="form-group" >
            <td>
            <fieldset>
            <legend style=" color: white">BUS PASS PAYMENT</legend>
            <div class="form-group">
            <div>
            <img src="<?php  echo $r['photo']?>" width="100" height="100"></br>
            </div>
            <td> Challan NO:<b> <?php echo $r['bp_id']; ?></b></td><br><br>
         <td>  Name:<b> <?php echo $r['name']; ?></b></td><br><br>
           <td>Reg_no:<b> <?php echo $r['Reg_no']; ?></b></td><br><br>

          <td> Startpoint:<b> <?php echo $r['Startingpoint']; ?> </b></td> <br><br>
          <td> Endpoint:<b> <?php echo $r['endingpoint']; ?></b></td><br><br>
           <td>fees:<b> <?php echo 'Rs1050/-';?></b></td><br><br>
           <td>
          <?php
           $status=$r['status'];
           if($status==0)
          {
          echo '<p><a href="pstatus.php?bp_id='.$r['bp_id'].'& status=0""class="btn btn-warning">Make payment</a></p>';
           }
          else if($status==1)
           {
           echo '<p>Payment Successful</p>';
           }
           ?>
           </td>
          </td>
     <?php
              }
              ?>
              <a href="studentabout.php">BACK TO STUDENT PAGE</a>
<br></fieldset>
</div>
</div>

 </body>

  </html
 


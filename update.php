<?php
if(isset($_POST['save']))
{
    //session_start();
    include 'dbcon.php';
    
    //Reset status to 0
    $sql="select Reg_no from v1 where admin_id='$admin_id'";
        echo $sql;
        $query = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($query))
        {
        $Reg_no=$row['Reg_no'];
       // $eventid=$row['eventid'];
        $sql1 = "update buspass set status=1 where usn='$Reg_no'";
        echo $sql;
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
             echo $sql2;
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

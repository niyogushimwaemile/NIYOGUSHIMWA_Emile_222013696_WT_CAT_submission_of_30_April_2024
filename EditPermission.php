<?php

 		include('db.php');
          session_start();
        
         if(!isset($_SESSION['id'])){
           header("location:index.php");
         }

	$id = $_POST['pid'];
	$reason = $_POST['reason'];
	$start = $_POST['leave'];
	$end = $_POST['return'];

	$update = mysqli_query($con, "UPDATE permissions SET Reason='".$reason."', LeaveStartDate='".$start."', LeaveEndDate='".$end."' WHERE Status='Pending' AND PermissionID=".$id);
	
	if($update) {
		header("location:Permissions.php");
	}
	else{
		echo "<script>alert('FAILED TO UPDATE')</script>";
		header("location:Permissions.php");
	}
		

?>
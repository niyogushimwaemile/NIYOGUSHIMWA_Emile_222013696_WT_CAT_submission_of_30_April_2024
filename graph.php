<?php
	include('db.php');
	 session_start();
	    
	     if(!isset($_SESSION['id'])){
	       header("location:index.php");
	     }
	$name = $_SESSION["name"];
	$role = $_SESSION["role"];
	$regno = $_SESSION["regno"];

	$userid = $_SESSION["id"];
	$monthDummy = ""; 
	$data[]=0;

	$stm1 = mysqli_query($con, "SELECT COUNT(*) AS jan FROM permissions WHERE MONTH(LeaveStartDate)=1 AND RegNo='".$regno."'");
	$stm2 = mysqli_query($con, "SELECT COUNT(*) AS feb FROM permissions WHERE MONTH(LeaveStartDate)=2 AND RegNo='".$regno."'");
	$stm3 = mysqli_query($con, "SELECT COUNT(*) AS mar FROM permissions WHERE MONTH(LeaveStartDate)=3 AND RegNo='".$regno."'");
	$stm4 = mysqli_query($con, "SELECT COUNT(*) AS apr FROM permissions WHERE MONTH(LeaveStartDate)=4 AND RegNo='".$regno."'");
	$stm5 = mysqli_query($con, "SELECT COUNT(*) AS may FROM permissions WHERE MONTH(LeaveStartDate)=5 AND RegNo='".$regno."'");
	$stm6 = mysqli_query($con, "SELECT COUNT(*) AS jun FROM permissions WHERE MONTH(LeaveStartDate)=6 AND RegNo='".$regno."'");
	$stm7 = mysqli_query($con, "SELECT COUNT(*) AS jul FROM permissions WHERE MONTH(LeaveStartDate)=7 AND RegNo='".$regno."'");
	$stm8 = mysqli_query($con, "SELECT COUNT(*) AS aug FROM permissions WHERE MONTH(LeaveStartDate)=8 AND RegNo='".$regno."'");
	$stm9 = mysqli_query($con, "SELECT COUNT(*) AS sept FROM permissions WHERE MONTH(LeaveStartDate)=9 AND RegNo='".$regno."'");
	$stm10 = mysqli_query($con, "SELECT COUNT(*) AS oct FROM permissions WHERE MONTH(LeaveStartDate)=10 AND RegNo='".$regno."'");
	$stm11 = mysqli_query($con, "SELECT COUNT(*) AS nov FROM permissions WHERE MONTH(LeaveStartDate)=11 AND RegNo='".$regno."'");
	$stm12 = mysqli_query($con, "SELECT COUNT(*) AS dece FROM permissions WHERE MONTH(LeaveStartDate)=12 AND RegNo='".$regno."'");

	$count1 = mysqli_fetch_array($stm1);
	 $data[0] = $count1["jan"]; 
	
	$count2 = mysqli_fetch_array($stm2);
	 $data[1] = $count2["feb"];

	$count3 = mysqli_fetch_array($stm3);
	 $data[2] = $count3["mar"]; 

	$count4 = mysqli_fetch_array($stm4); 
		$data[3] = $count4["apr"]; 

	$count5 = mysqli_fetch_array($stm5);
	 $data[4] = $count5["may"];

	$count6 = mysqli_fetch_array($stm6); 
		$data[5] = $count6["jun"]; 

	$count7 = mysqli_fetch_array($stm7);
	 $data[6] = $count7["jul"]; 

	$count8 = mysqli_fetch_array($stm8);
	 $data[7] = $count8["aug"];

	$count9 = mysqli_fetch_array($stm9);
	 $data[8] = $count9["sept"];

	$count10 = mysqli_fetch_array($stm10);
	 $data[9] = $count10["oct"];

	$count11 = mysqli_fetch_array($stm11);
	 $data[10] = $count11["nov"];

	$count12 = mysqli_fetch_array($stm12);
	 $data[11] = $count12["dece"];
	
	for($i=0; $i<=11; $i++) {

	
			$monthDummy = $monthDummy.",".$data[$i];
		
	}
	
	echo($monthDummy);
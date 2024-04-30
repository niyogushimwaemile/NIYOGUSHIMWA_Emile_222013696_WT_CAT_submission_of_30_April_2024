<?php

	include('db.php');
    session_start();
    
	 if(!isset($_SESSION['id'])){
	   header("location:index.php");
	 }

	
		$start = $_POST["leave"];
		$end = $_POST["return"];
		$reason = $_POST["reason"];
		
		$name = $_SESSION["name"];
		$role = $_SESSION["role"];
		$regno = $_SESSION["regno"];

		$insert = mysqli_query($con, "INSERT INTO permissions VALUES(null,'".$regno."','".$reason."','".$start."','".$end."','Pending')");
			
		header("location:permissions.php");

?>
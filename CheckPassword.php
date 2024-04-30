<?php
	include('db.php');
      session_start();
    
     if(!isset($_SESSION['id'])){
       header("location:index.php");
     }


		$name = $_SESSION["name"];
		$role = $_SESSION["role"];
		$regno = $_SESSION["regno"];

		
		$rs = mysqli_query($con, "SELECT * FROM studentaccounts WHERE RegNo='".$regno."'");
		$r = mysqli_fetch_array($rs);

		echo $r["Password"];
?>
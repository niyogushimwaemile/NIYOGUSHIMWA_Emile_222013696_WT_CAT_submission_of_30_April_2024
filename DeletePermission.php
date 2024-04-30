<?php
	include('db.php');
      session_start();
    
     if(!isset($_SESSION['id'])){
       header("location:index.php");
     }

		$id = $_GET['id'];

	$rs = mysqli_query($con, "DELETE FROM permissions WHERE PermissionID=$id");


?>
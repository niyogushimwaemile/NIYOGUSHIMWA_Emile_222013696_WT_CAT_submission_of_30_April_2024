
<!DOCTYPE html>
<html lang="en">
	<?php
   	include('./static/head.php')
  ?>
<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    	<?php
   		include('./static/navbar.php')
   	?>
    <!-- Navbar -->

    <!-- Sidebar -->
   	<?php
   		include('./static/sidebar.php')
   	?>
    <!-- Sidebar -->

  </header>

  <main class="pt-5 mx-lg-3">
  	<div class="container-fluid mt-5 mb-3">
  		<?php

		$name = $_SESSION["name"];
		$role = $_SESSION["role"];
		$regno = $_SESSION["regno"];

		
		$rs = mysqli_query($con, "SELECT * FROM students WHERE RegNo='".$regno."'");
		
		$row = mysqli_fetch_array($rs);
		
		?>
		   <div class="">
				<div class="modal-dialog cascading-modal modal-avatar modal-sm"> 
					
					<div class="modal-content"> 
					    <div class="modal-header">
					
							<i class="fas fa-user-circle fa-8x text-dark shadow rounded-circle img-responsive mx-auto mt-2"></i>
					    </div>
					    <div class="modal-body text-center"> 
					
					        <h4 class=" mb-2 text-center">
					        	<b><?php echo $row["FirstName"]." ".$row["LastName"];?></b>
					        </h4>
					
					        <div class="ml-0 mr-0">
								<b>Reg Number:</b><?php echo $row["RegNo"];?><br>
								<b>Email:</b><?php echo $row["Email"];?><br>
								<b>Phone number:</b><?php echo $row["PhoneNumber"];?><br>
								<b>Department:</b><?php echo $row["Department"]?>
					        </div>
					
			                <div class="text-center mt-4">
					                  <button class="btn btn-primary "data-toggle="modal" data-target="#modalLRFormDemo">Change password
					                    <i class="fas fa-sign-in-alt"></i>
					                  </button>
					                </div>
					              </div> 
					            </div>
					            </div>
					
			<div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
					          aria-hidden="true">
					          <div class="modal-dialog" role="document">
					            <div class="modal-content">
					              <div class="modal-header">
					                <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                  <span aria-hidden="true">&times;</span>
					                </button>
					              </div>
					              <div class="modal-body px-4">

					<form action="" method='POST'>					
					<div class="md-form ml-0 mr-0">
					                  <input type="password" name='current' id="form1" class="form-control" onkeyup='changePassword(this.id)' required>
					                  <label for="form1" class="ml-0">Enter current password</label>
					                  <i id='form1Check'></i>
											<span id='get' style='display:none'></span>
					                </div>
											<div class="md-form ml-0 mr-0">
					                  <input type="password" id="form2" name='new' class="form-control" onkeyup='changePassword(this.id)' required>
					                  <label for="form2" class="ml-0">New password</label>
											 <i id='form2Check'></i>
					                </div>
											<div class="md-form ml-0 mr-0">
					                  <input type="password" id="form3" name='confirm' class="form-control" onkeyup='changePassword(this.id)' required>
					                  <label for="form3" class="ml-0">Confirm new password</label>
											 <i id='form3Check'></i>
					                </div>
					
					              </div>
					              <div class="modal-footer">
					                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					                <button type="submit" name="save" id='submit' class="btn btn-primary">Save changes</button>
					              </div>
								</form>
					            </div>
					          </div>
					        </div>
					
		   	
<?php
	if(isset($_POST['save'])) {
		$current = $_POST["current"];
		$news = $_POST["new"];
		$confirm = $_POST["confirm"];
		

		$name = $_SESSION["name"];
		$role = $_SESSION["role"];
		$regno = $_SESSION["regno"];

		
		$update = mysqli_query($con, "UPDATE studentaccounts SET Password='".$news."' WHERE RegNo='".$regno."'");
			
		//header("location:Profile.php");
	}



	include './static/footer.php';
	?>
			
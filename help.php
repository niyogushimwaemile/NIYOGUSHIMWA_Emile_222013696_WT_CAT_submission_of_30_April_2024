
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
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-3">
  	<div class="container-fluid mt-5 mb-3">
   
   			<div class="pt-2 px-4">
		   		<h4 class='text-center'> Help and Support</h4>
		   		<div class="accordion mx-4 mt-2" id="accordionFlushExample">
		   		<div class="accordion-item">
		   		  <h2 class="accordion-header" id="flush-headingOne">
		   		    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
		   		      Account
		   		    </button>
		   		  </h2>
		   		  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
		   		    <div class="accordion-body">
		   				<h4>Login</h4>
		   			To access this system you need to login with correct credentials (Username and password) to authenticate your account.
		   			<h4>Change password</h4>
		   			To change your password go to <a href='Profile'>profile <i class='fas fa-external-link-alt'></i></a> then click on CHANGE PASSWORD button. 
		   			Enter your correct current password to confirm if you are YOU, enter a new password and the confirm your password.<br>
		   			New password must be strong, means having at least 6 characters length, having at least one small letter, having at least one capital letter, and having at least one number. 
		   		 You can't change your password if your current password is not correct, when your new password is week, or when your password is not confirmed.
		   		</div> 
		   		  </div> 
		   		</div> 
		   		<div class="accordion-item"> 
		   		  <h2 class="accordion-header" id="flush-headingTwo"> 
		   		    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"> 
		   		      Permissions 
		   		    </button> 
		   		  </h2> 
		   		  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample"> 
		   		    <div class="accordion-body">
		   		<h4>Show permissions</h4>
		   		You can access your permissions by clicking on <a href='Permissions'>Permissions <i class='fas fa-external-link-alt'></i></a> menu.
		   		You can edit or delete a requested permission only when it is pending. To edit a permission click on <i class='fa fa-edit text-success'></i> 
		   		 right to the end of a requested permission
		   		To delete a permission click on <i class='fa fa-trash-alt text-danger'></i> right to the end of a requested permission
		   		<br><h4>Request new permission</h4>
		   		To request a new permissions go to <a href='Permissions'>Permissions <i class='fas fa-external-link-alt'></i></a> menu, then
		   		 click on NEW button from up right corner and fill the form. You can't choose a leave date which is past, and returning date must be
		   		on leaving date or dates after leaving date, otherwise you cannot submit a form.
		   		
		   		</div> 
		   		  </div> 
		   		</div> 
		   		<div class="accordion-item"> 
		   		  <h2 class="accordion-header" id="flush-headingThree"> 
		   		    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"> 
		   		      Contact 
		   		    </button> 
		   		  </h2> 
		   		  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample"> 
		   		    <div class="accordion-body">
		   			If you have any further query contact Dean.
		   		</div> 
		   		  </div> 
		   		</div> 
		   		</div>
		   		</div>
    
   </div>
  </main>
  <!--Main layout-->

  <?php
   		include('./static/footer.php')
   	?>

</body>

</html>

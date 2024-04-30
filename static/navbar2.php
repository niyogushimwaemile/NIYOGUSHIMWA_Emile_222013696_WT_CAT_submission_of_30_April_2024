      <?php 
        include('db.php');
          session_start();
        
         if(!isset($_SESSION['did'])){
           header("location:index.php");
         }
          $date = date("Y-m-d");

          $upd = mysqli_query($con, "UPDATE permissions SET Status='Terminated' WHERE LeaveEndDate < '$date' ");
         

         
       ?>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect mr-4 d-none d-md-flex" href="home2.php">
          <strong class="blue-text h3">OPS</strong>
        </a>
        <a class="navbar-brand waves-effect p-6 d-block d-md-none" href="#">
         	 <img src="img/ops.png" class="img-fluid" alt="OPS" width="100">
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto  d-none d-md-flex">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="home2.php"><i class='fas fa-home'></i>Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect ml-2" href="About.php"><i class='fas fa-info-circle'></i>About OPS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect ml-2" href="#"><i class='fas fa-phone-alt'></i>Contact Dean</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect ml-2" href="Help.php"><i class='fas fa-question-circle'></i>Help</a>
            </li>
          </ul>

	<ul class="navbar-nav mr-auto d-block d-md-none">
	
      <li class="nav-item">
      
        <a href="home2.php">
        
          <i class="fas fa-dashboard mr-3"></i>Dashboard
        </a>
        </li>
        <li class="nav-item">
        <a href="Permissions">
          <i class="fas fa-shield-alt mr-3"></i>Permissions</a>
        </li>
        <li class="nav-item">
        <a href="Profile">
          <i class="fas fa-user mr-3"></i>Profile</a>
        </li>
        <li class="nav-item">
        <a href="Logout" class="nav-link waves-effect">
          <i class="fas fa-power-off mr-3"></i>Logout</a>
		</li>
      </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons d-none d-md-flex">
            <li class="nav-item">
              <a href="#" class="nav-link waves-effect">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link waves-effect">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="Profile.php" class="nav-link border border-light rounded waves-effect"
               >
                <i class="fa fa-user-circle mr-2"></i>
										<?php echo $_SESSION["name"]; ?>
              </a>
            </li>
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons d-flex d-md-none mt-4 border-top">
          
            <li class="nav-item mr-2">
              <a href="#" class="nav-link waves-effect">
                <i class="fa fa-home"></i>
              </a>
            </li>
            <li class="nav-item mr-2">
              <a href="About" class="nav-link waves-effect">
                <i class="fa fa-info-circle"></i>
              </a>
            </li>
            <li class="nav-item mr-2">
              <a href="#" class="nav-link waves-effect">
                <i class="fa fa-phone-alt"></i>
              </a>
            </li>
            <li class="nav-item mr-2">
              <a href="Help" class="nav-link waves-effect">
                <i class="fa fa-question-circle"></i>
              </a>
            </li>
            
            <li class="nav-item">
            
              <a href="Profile.php" class="nav-link border border-light rounded waves-effect">
                  <?php echo $_SESSION["name"]; ?>
              </a>
             
            </li>
          </ul>


        </div>

      </div>
    </nav>
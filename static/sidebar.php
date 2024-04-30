 <div class="sidebar-fixed position-fixed">
	
      <a class="d-block my-4 p-4  waves-effect">
        <img src="img/ops.png" class="img-fluid" alt="OPS">
      </a>
	
      <div class="list-group list-group-flush">
      
        <?php
          if(isset($_SESSION['id'])){
        ?>
        <a href="home.php" class="list-group-item waves-effect">
        
          <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
        </a>
        <a href="permissions.php" class="list-group-item waves-effect">
          <i class="fas fa-shield-alt mr-3"></i>Permissions</a>
        <a href="profile.php" class="list-group-item waves-effect">
          <i class="fas fa-user mr-3"></i>Profile</a>
        <a href="logout.php" class="list-group-item waves-effect">
          <i class="fas fa-power-off mr-3"></i>Logout</a>
            <?php
              }
          else if(isset($_SESSION['did'])){
            ?>
            <a href="home2.php" class="list-group-item waves-effect">
        
          <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
            </a>
            <a href="new.php" class="list-group-item waves-effect">
              <i class="fas fa-star mr-3"></i>New requests</a>
            <a href="accepted.php" class="list-group-item waves-effect">
              <i class="fas fa-check mr-3"></i>Approved</a>
            <a href="permissions2.php" class="list-group-item waves-effect">
              <i class="fas fa-list mr-3"></i>All permissions</a>
            <a href="profile.php" class="list-group-item waves-effect">
              <i class="fas fa-user mr-3"></i>Profile</a>
            <a href="logout.php" class="list-group-item waves-effect">
              <i class="fas fa-power-off mr-3"></i>Logout</a>
          <?php 
            }
          ?>
      </div>

    </div>
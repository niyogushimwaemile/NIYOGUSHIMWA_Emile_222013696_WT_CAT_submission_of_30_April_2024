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
   		include('./static/navbar2.php')
   	?>
    <!-- Navbar -->

    <!-- Sidebar -->
   	<?php
   		include('./static/sidebar.php')
   	?>
    <!-- Sidebar -->

  </header>

  <!--Main Navigation-->
  <main class="pt-5 mx-lg-3">
    <div class="container-fluid mt-5 mb-3">
    
      <div class="card">
        <div class="card-header">
          <h4 class='text-center d-inline'>Permissions</h4>
      
          </div>
               <div class="card-body">
                 <!-- Table  --> 
               <div class="table-responsive">
                 <table class="table table-hover"> 
                   <!-- Table head --> 
                   <thead class="blue-grey lighten-4"> 
                     <tr> 
                       <th><b>#</b></th> 
                       <th><b>Student Name</b></th> 
                       <th><b>RegNo</b></th> 
                       <th><b>Department</b></th>
                       <th><b>Reason</b></th>
                       <th><b>Leave Date</th>
                       <th><b>Returning Date</b></th>
                       <th><b>status</b></th> 
        
                     </tr> 
                   </thead> 
                   <!-- Table head --> 
         
                        <!-- Table body --> 
                        <tbody id='tableBody'> 
                          
                            <?php

                            $select = mysqli_query($con, "SELECT * FROM permissions INNER JOIN students ON permissions.RegNo=students.RegNo WHERE Status='Accepted'");
    $i=0;
    while($rs=mysqli_fetch_array($select)){
      
      $i+=1;
    ?>
      <tr>
          <td><?php echo $rs["PermissionID"]; ?></td>
          <td><?php echo $rs["FirstName"]." ".$rs["LastName"]; ?></td>
          <td><?php echo $rs["RegNo"]; ?></td>
          <td><?php echo $rs["Department"]; ?></td>
          <td><?php echo $rs["Reason"]; ?></td>
          <td><?php echo $rs["LeaveStartDate"]; ?></td>
          <td><?php echo $rs["LeaveEndDate"]; ?></td>
          <td><?php echo $rs["Status"]; ?></td>
          
              
          
          </tr>
          <?php
        }
        ?>
        
        
        
        
        </tbody></table></div>
         
            </div> 
         
        </div>
        
        
        
        
        

 
    </div>
   </main>

    <!--Main layout-->

    <?php
    if (isset($_GET['id'])) {
      $pid = $_GET['id'];
      mysqli_query($con, "UPDATE permissions SET Status='Denied' WHERE PermissionID=$pid");

    }
    if (isset($_GET['approve'])) {
      mysqli_query($con, "UPDATE permissions SET Status='Accepted' WHERE PermissionID=".$_GET['approve']);
    }


      include('./static/footer.php')
    ?>

  </body>

</html>
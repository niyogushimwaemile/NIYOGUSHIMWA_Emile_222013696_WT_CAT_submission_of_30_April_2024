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
                        <th><b>Options</b></th>
        
                     </tr> 
                   </thead> 
                   <!-- Table head --> 
         
                        <!-- Table body --> 
                        <tbody id='tableBody'> 
                          
                            <?php

                            $select = mysqli_query($con, "SELECT * FROM permissions INNER JOIN students ON permissions.RegNo=students.RegNo LIMIT 5");
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
          <td>
          <?php
            if($rs["Status"] == "Pending"){
          ?>
            <a href="?approve=<?php echo $rs["PermissionID"];?>" class="text-success" title="ACCEPT"><i class='fa fa-check'></i></a>&nbsp;&nbsp;
              
              <a href="?id=<?php echo $rs["PermissionID"];?>" class="text-danger"  title="DENY">
                  <i class='fas fa-times'></i></a>
                  <?php
                      }
                  ?>
                
        </td>
              
          
          </tr>
          <?php
        }
        ?>
        
        
        
        
        </tbody></table></div>
            
            <ul class='pagination'>
            <li class='page-item'>
            <a class='page-link' href='#' aria-label='Previous' style="pointer-events:none; color:#aaa;cursor:default; decoration:none" id='prev' onclick="getPermissions2('previous')">
            <span aria-hidden='true'>&laquo;</span>
            </a>
            </li>
            <?php
              $sel = mysqli_query($con, "SELECT COUNT(*) AS d FROM permissions");  
              
              $rs1 = mysqli_fetch_array($sel);

            ?>
              <li class='page-item'>
              <a class='page-link' href='#'style="pointer-events:auto" onclick="getPermissions2('pages')" id='link'>
              
            <input type='number' min="1" max='2' maxlength="2" size="2" id='input' size='1' style='display:none' onkeyup="getPermissions('typing')"> <span id='btn'> 1</span> of <span id='of'><?php echo ceil(($rs1["d"])/5) ?></span></a>
            </li>
            
            <li class='page-item'>
            <a class='page-link' aria-label='Next' id='next' onclick="getPermissions2('next')">
            <span aria-hidden='true'>&raquo;</span>
            </a>
            </li>
            </ul>
            </div> 
         
        </div>
        <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request a permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body px-4">

        <form action="CreatePermission.php" method='POST'>
        <div class="md-form ml-0 mr-0">
                      <input type="date" name='leave' id="form1" class="form-control" onchange='checkDate(this.id)' required>
                      <label for="form1" class="ml-0">Leave date</label>
        
                      <i id='form1Check'></i>
                   <span id='get'  style='display:none' ></span><br>
                    </div>
                   <div class="md-form ml-0 mr-0 mb-3">
                      <input type="date" name='return' id="form2" class="form-control" onchange='checkDate(this.id)' required>
                      <label for="form2" class="ml-0">Returning date</label>
                    <i id='form2Check'></i>
                    </div>
                   <div class="md-form ml-0 mr-0">
                      <br><textarea type="password" name='reason' id="form3" class="form-control" required rows="4"
                onfocus="focusdReason()"></textarea>
                      <label for="form3" id='lbl3' class="ml-2 px-2" style='z-index:1; background:grey; color:white; border-radius:4px;'>Reason</label>
                    <i id='form3Check'></i>
                    </div>
        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id='submit' class="btn btn-primary">Send request</button>
                  </div>
               </form>
                </div>
              </div>
            </div>
        
        
        
        
<div class="modal fade" id="deletePermission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Denying reason</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body px-4">

        <form action="" method='POST'>           
        
           <div class="md-form ml-0 mr-0">
              <br><textarea type="password" name='reason' id="edit3" class="px-3 form-control" required rows="4"
        onfocus="focusdReason()"></textarea>
              <label for="edit3" id='lbl3' class="ml-2 px-2" style='z-index:1; background:grey; color:white; border-radius:4px;'>Reason</label>
            <i id='form3Check1'></i>
            </div>

          </div>
          <div class="modal-footer">
          <input type='hidden' name='pid' id='pid'>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" id='submit2' class="btn btn-primary" name="send">Send</button>
          </div>
       </form>
        </div>
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
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
          <button type="button" class="btn btn-primary btn-sm d-inline float-right shadow " data-toggle="modal" data-target="#modalLRFormDemo"> 
            New
          </button>
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

                            $select = mysqli_query($con, "SELECT * FROM permissions INNER JOIN students ON permissions.RegNo=students.RegNo WHERE Status='Pending'");
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
        
            <a onmouseover="document.getElementById('edit1').value='<?php echo $rs['LeaveStartDate']; ?>'; 
                document.getElementById('edit2').value='<?php echo $rs['LeaveEndDate'];?>';
                document.getElementById('pid').value='<?php echo $rs['PermissionID']; ?>';
                document.getElementById('edit3').value='<?php echo $rs['Reason']?>' "
              
              type="button" class="text-success" data-toggle="modal" data-target="#editPermission"  title="ACCEPT"><i class='fa fa-check'></i></a>&nbsp;
              
              <a onmouseover="document.getElementById('del').value='<?php echo $rs['PermissionID']?>'" href="?id=<?php echo $rs['PermissionID']?>" type="button" class="text-danger" data-toggle="modal" data-target="#deletePermission" title="DENY">
                  <i class='fas fa-times'></i></a>
               
                
        </td>
              
          
          </tr>
          <?php
        }
        ?>
        
        
        
        
        </tbody></table></div>
            
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
        
        
        
        
<div class="modal fade" id="editPermission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit permissions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body px-4">

<form action="EditPermission.php" method='POST'>           
<div class="md-form ml-0 mr-0">
              <input type="date" name='leave' id="edit1" class="form-control" onchange='editPermission(this.id)' required>
              <label for="edit1" class="ml-0">Leave date</label>

              <i id='form1Check1'></i>
           <span id='get1'   style='display:none' ></span><br>
            </div>
           <div class="md-form ml-0 mr-0 mb-3">
              <input type="date" name='return' id="edit2" class="form-control" onchange='editPermission(this.id)' required>
              <label for="edit2" class="ml-0">Returning date</label>
            <i id='form2Check1'></i>
            </div>
           <div class="md-form ml-0 mr-0">
              <br><textarea type="password" name='reason' id="edit3" class="px-3 form-control" required rows="4"
        onfocus="focusdReason()"></textarea>
              <label for="edit3" id='lbl3' class="ml-2 px-2" style='z-index:1; background:grey; color:white; border-radius:4px;'>Reason</label>"
            <i id='form3Check1'></i>
            </div>

          </div>
          <div class="modal-footer">
          <input type='hidden' name='pid' id='pid'>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" id='submit2' class="btn btn-primary">Save changes</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Delete permission</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body px-4">
     Are you sure you want to delete this permission<br>
 <i class='fas fa-exclamation-triangle text-warning'></i>This operation cannot be undone.

        </div>
       <div class="modal-footer">
            <input type='hidden' id='del'>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" id='submit' class="btn btn-success" onclick="deletePermission()">Yes, delete</button>
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
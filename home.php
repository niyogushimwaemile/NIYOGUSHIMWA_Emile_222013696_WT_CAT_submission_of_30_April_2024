
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
   
  		<div class="card mb-4 wow fadeIn" onload='graph()'>  
				
				        <!--Card content-->  
				        <div class=card-body d-sm-flex justify-content-between>  
				
				          <h4 class=mb-2 mb-sm-0 pt-1>  
				            <a href=#>Home Page</a>  
				            <span>/</span>  
				            <span>Dashboard</span>  
				          </h4>  
				        </div>  
				
				      </div>  
				      <!-- Heading -->  
				
				      <!--Grid row-->  
				      <div class=row wow fadeIn>  
				
				        <!--Grid column-->  
				        <div class=col-md-9 mb-4>  
				
				          <!--Card-->  
				          <div class=card>  
				
				            <!--Card content-->  
				            <div class=card-body>  
				
				              <canvas id=myChart></canvas>  
				
				            </div>  
				
				          </div>  
				          <!--/.Card-->  
				
				        </div> 
				 		<div class="col-md-3 mb-4"> 

				          <!--Card-->  
				          <div class="card mb-4">  
				
				            <!--Card content-->  
				            <div class="card-body">

				            <?php

											$name = $_SESSION["name"];
											$role = $_SESSION["role"];
											$regno = $_SESSION["regno"];

											$userid = $_SESSION["id"];
											
													
									$stm1 = mysqli_query($con, "SELECT COUNT(*) AS pending FROM permissions WHERE Status='Pending' AND RegNo='".$regno."'");
									$stm2 = mysqli_query($con, "SELECT COUNT(*) AS approved FROM permissions WHERE Status='Accepted' AND RegNo='".$regno."'");
									$stm3 = mysqli_query($con, "SELECT COUNT(*) AS rejected FROM permissions WHERE Status='Denied' AND RegNo='".$regno."'");
									$stm4 = mysqli_query($con, "SELECT COUNT(*) AS terminate FROM permissions WHERE Status='Terminated' AND RegNo='".$regno."'");
									$stm5 = mysqli_query($con, "SELECT COUNT(*) AS perms FROM permissions WHERE RegNo='".$regno."'");

				            ?>


				            <!-- List group links --> 
				              <div class="list-group list-group-flush"> 
				                <a href='Permissions.php' class="list-group-item list-group-item-action waves-effect">Permissions 
				                  <span class="badge badge-primary badge-pill pull-right">
														<?php
															$data = mysqli_fetch_array($stm5);
															echo $data["perms"] ;
														?>
														
													<i class="fas fa-check-circle ml-1"></i> 
				                  </span> 
				                </a> 
				                <a href='Permissions.php' class="list-group-item list-group-item-action waves-effect">Accepted 
				                  <span class="badge badge-success badge-pill pull-right">
														<?php	
															$data = mysqli_fetch_array($stm2);
															echo $data["approved"] ;
														?>
							
													<i class="fas fa-arrow-up ml-1"></i> 
				                  </span> 
				                </a> 
				                <a href='Permissions.php' class="list-group-item list-group-item-action waves-effect">Denied 
				                  <span class="badge badge-danger badge-pill pull-right">
														<?php	
															$data = mysqli_fetch_array($stm3);
															echo $data["rejected"] ;
														?>

														<i class="fa fa-arrow-down ml-1"></i> 
													</span> 
				                </a> 
				                <a href='Permissions.php' class="list-group-item list-group-item-action waves-effect">Pending 
				                  <span class="badge badge-warning badge-pill pull-right">
													<?php	
															$data = mysqli_fetch_array($stm1);
															echo $data["pending"] ;
														?>
														<i class="fa fa-hourglass-half ml-1"></i> 
				 								</span> 
				                </a> 
				                <a href='Permissions.php' class="list-group-item list-group-item-action waves-effect">Terminated 
				                  <span class="badge badge-secondary badge-pill pull-right">
														<?php	
															$data = mysqli_fetch_array($stm4);
															echo $data["terminate"] ;
														?>
														<i class="fas fa-ban ml-1"></i> 
				 								</span> 
				                </a> 
				              </div> 
				              <!-- List group links --> 
				
				            </div> 
				
				          </div> 
				          <!--/.Card--> 
				
				        </div>
				
				
				
						</div> 
				      <!--Grid row--> 
				
				
				
				              </div> 
				              <!-- /.First row--> 
				
				            </div> 
				
				          </div> 
				          <!--/.Card--> 
				
				        </div> 
				        <!--Grid column--> 
				
				      </div> 
				      <!--Grid row--> 
				
				    </div>
				<script>
					document.addEventListener('DOMContentLoaded', function(){
					graph();
					})
				</script>
    
   </div>
  </main>
  <!--Main layout-->

  <?php
   		include('./static/footer.php')
   	?>

</body>

</html>

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
  <main class="pt-5 mx-lg-3">
    <div class="container-fluid mt-5 mb-3">
    

      <div class="container">
        <h2 class="text-center pt-2" id="services-title">Contact us</h2>
        
        <div class="row">
          <div class="col-md-4 px-md-5">
            <div class="card mb-4 p-2 shadow" id="contact-form">
              <div class="card-body" id="call">
              <h3 class="card-title">Contact <i class="fas fa-user-circle"></i></h3>
                <h6><a href="tel:0782203457"><i class="bi bi-telephone"></i> 0782203457</h6>
                <h6><a href="whame:0782203457"><i class="bi bi-whatsapp"></i> 0782203457</h6>
                <h6><a href="mailto:emile@gmail.com"><i class="bi bi-envelope-open"></i> emile@gmail.com</a></h6>
              </div>
            </div>

            <div class="card mt-4 mb-4 p-2 shadow" id="contact-form">
              <div class="card-body">
                <h3 class="card-title mb-4">Address <i class="bi bi-geo-alt-fill"></i></h3>
                <h5>Huye Rwanda</h5>
                <h6>UR-Huye</h6>
              </div>
            </div>

          </div>
          <div class="col-md-8">
                        
            <div class="card shadow mb-4" id="contact-form">
                    <div class="card-body">
                        <div class="card-title mb-4"><h3>Email us</h3></div>

                        <form action="login.php" method="post" id="form">
                            <label for="email">Email:</label>
                            <input type="email" name="email" required id="email" class="form-control mb-2 shadow" placeholder="Enter your email">
                            <label for="subject">Subject:</label>
                            <input type="text" name="subject" required id="subject" class="form-control shadow" placeholder="Enter subject">
                            
                            <label for="subject">Message:</label>
                            <textarea name="Message" rows="3" required id="Message" class="form-control shadow" placeholder="Enter Message"></textarea>
                            
                            <button type="submit" class="mt-3 btn btn-primary shadow" id="submit"><i class="bi bi-arrow-up-right-circle"></i> SEND </button>
     
                        </form>
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
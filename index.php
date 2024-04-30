
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OPS - Login</title>

    <!-- Scripts -->
    <script src="js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Styles -->
    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">

</head>
<body>
    
    
    <div class="container text-center">

             <div  class="card d-inline-block mt-5 shadow">
             <div class="card-header bg-primary text-white">
              <h3><b>Online Permission System</b></h3>
             </div>
               <div class="card-body">

               <p><span>Welcome!</span> Sign in with credentials</p>
               
               


            <div class="login-credential-wrapper">
            <form method="POST" action="index.php">
            
               		<div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="bi bi-person-circle"></i>
                            </span>
                        </div>
                        <input type="text" name="username" class="form-control" required placeholder="Username">
                        
                    </div>

               		<div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="bi bi-key"></i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control" required placeholder="Password">
                        
                    </div>

                    <a href="" class="mb-3">Forgot password?</a>

            <div class="btn-wrapper-sign">
               <input type="submit" class="btn sign-in-btn btn-primary" name="login" value="Login">
            </div>
           
		</form>
			</div>
			</div>
			</div>
        
    <?php
    	include 'db.php';
        if(!isset($_GET['page'])){
            header("location:index.html");
        }
    	if(isset($_POST['login'])){

    		$username = $_POST['username'];
    		$password = $_POST['password'];

    		$sel1 = mysqli_query($con, "SELECT * FROM studentaccounts WHERE Username = '$username' AND Password = '$password' ");
    		
			$sel2 = mysqli_query($con, "SELECT * from administrators WHERE Username='".$username."' AND Password='".$password."'");
			$sel3 = mysqli_query($con, "SELECT * from superadmins WHERE Username='".$username."' AND Password='".$password."'");

    		if(mysqli_num_rows($sel1) >=1 ) {
    			session_start();

    			$row = mysqli_fetch_array($sel1);

    			$_SESSION["name"] = $row["Username"];
				$_SESSION["id"] = $row["StudentAccountID"];
				$_SESSION["regno"] = $row["RegNo"];
				$_SESSION["role"] = $row["student"];

				header("location: home.php");
    			
    		}
    		else if(mysqli_num_rows($sel2) >=1 ) {
    			session_start();
    			$row = mysqli_fetch_array($sel2);

    			$_SESSION['name'] = $row["FirstName"]." ".$row["LastName"];
				$_SESSION["did"] = $row["AdminID"];
				$_SESSION["role"] = $row["dean"];

				header("location: home2.php");
    			
    		}
    		else if(mysqli_num_rows($sel3) >=1 ) {
    			session_start();
    			$row = mysqli_fetch_array($sel3);

    			$_SESSION["name"] = $row["FirstName"]." ".$row["LastName"];
				$_SESSION["id"] = $row["AdminID"];
				$_SESSION["role"] = $row["dean"];

				header("location: home3.php");
    			
    		}
    		else {
    			echo("<script>alert('INVALID CREDENTIALS');</script>");
    		}
    	}
    ?>

</body>
</html>
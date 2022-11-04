<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>

<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($con,$name);
	$tel = stripslashes($_REQUEST['tel']);
	$tel = mysqli_real_escape_string($con,$tel);	
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$status = stripslashes($_REQUEST['status']);
	$status = mysqli_real_escape_string($con,$status);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `acc` (username, password, name, tel, email, status, trn_date)
VALUES ('$username', '".md5($password)."', '$name', '$tel', '$email', '$status', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>

    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
						<ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="login.php" class="nav-link">
                                    <i class=""></i>
                                    <span class="d-lg-block">LOGIN</span>
                                </a>
                            </li>
							<li class="nav-item">
                                <a href="register.php" class="nav-link">
                                    <i class=""></i>
                                    <span class="d-lg-block">SIGN UP</span>
                                </a>
                            </li>
						</ul>
					</div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="section">
						<form id="register" name="registration" action="" method="post" accept-charset='UTF-8'>
							<?php include('errors.php'); ?>
                                 <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Username:</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                            </div>
                                        </div>                                    
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Password:</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                        </div>                                    
                                    </div>
							
							<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                                            </div>
                                        </div>                                    
                                    </div>
                                    
							<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Telephone No:</label>
                                                <input type="text" class="form-control" maxlength="11" name="tel" placeholder="Tel No" required>
                                            </div>
                                        </div>                                    
                                    </div>
							
							<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                            </div>
                                        </div>                                    
                                    </div>
							
							<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Privilege:</label>
												<select name="status" required>
													<option value="admin">Admin</option>
													<option value="user">User</option>
												</select>
                                            </div>
                                        </div>                                    
                                    </div>

                                    <button type="submit" name="register" value="register" class="btn btn-info btn-fill pull-left">Register</button>
                                    <div class="clearfix">&nbsp;
									<button type="reset" name="reset" class="btn btn-info btn-fill pull-center">Reset</button>
                                    <div class="clearfix">
							</div>
                                </form>
                    </div>
                </div>
            </div>
	<?php } ?>			
            <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-left">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.perak.gov.my/">PERAK</a>, Copyright Reserved
                </p>
            </div>
        </footer>
        </div>
    </div>

<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
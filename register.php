<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo.png">
    <link rel="icon" type="image/png" href="assets/img/logo.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>REGISTER</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <style>
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
.errmsg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #ff7f7f; 
    background: #ffe5e5; 
    border: 1px solid #ff0000;
    width: 50%;
    text-align: center;
}
</style>
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar3.jpg">
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
						<form id="register" name="registration" action="register.php" method="post" accept-charset='UTF-8'>
							<?php echo display_error(); ?>
                                 <div class="row">
                                     <?php echo display_error(); ?>
                                    
                                <div class="row">
                                    <?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Username:</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
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
                                                <label>Email:</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                                            </div>
                                        </div>                                    
                                    </div>
                                     <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Full Name:</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name; ?>" required>
                                            </div>
                                        </div>     
                                    </div>
                                     <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Telephone Number:</label>
                                                <input type="tel" class="form-control" name="tel" placeholder="Tel No." value="<?php echo $tel; ?>" required>
                                            </div>
                                        </div>     
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Unit atau Bahagian:</label> 
                                                
                                                <select class="form-control" name="unitbahagian" required>
                                                    <option value="" selected></option>
                                                    <option value="Majlis Sukan Negeri">Majlis Sukan Negeri</option>
                                                    <option value="Bahagian Audit Dalam">Bahagian Audit Dalam
                                                    </option>
                                                    <option value="Bahagian Korporat">Bahagian Korporat</option>
                                                    <option value="Bahagian Khidmat Pengurusan">Bahagian Khidmat Pengurusan
                                                    </option>
                                                    <option value="Bahagian Kerajaan Tempatan">Bahagian Kerajaan Tempatan</option>
                                                    <option value="Bahagian Pengurusan Maklumat">Bahagian Pengurusan Maklumat
                                                    </option>
                                                    <option value="Bahagian Dewan Negeri dan MMK">Bahagian Dewan Negeri dan MMK
                                                    </option>
                                                    <option value="Bahagian Pengurusan Sumber Manusia">Bahagian Pengurusan Sumber Manusia
                                                    </option>
                                                    <option value="Unit Perancang Ekonomi Negeri">Unit Perancang Ekonomi Negeri
                                                    </option>
                                                    <option value="Pejabat Setiausaha Kerajaan Negeri">Pejabat Setiausaha Kerajaan Negeri
                                                    </option>
                                                </select>
                                            </div>
                                        </div>     
                                    </div>
                                     <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Jawatan:</label>
                                                <input type="text" class="form-control" name="jawatan" placeholder="Jawatan" value="<?php echo $jawatan; ?>" required>
                                            </div>
                                        </div>     
                                    </div>

                                    <button type="submit" name="register_btn" value="register" class="btn btn-info btn-fill pull-left">Register</button>
                                    <div class="clearfix">&nbsp;
									<button type="reset" name="reset" class="btn btn-info btn-fill pull-center">Reset</button>
                                    <div class="clearfix">
							</div>
                                </form>
                    </div>
                </div>
            </div>		
            <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-left">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.perak.gov.my/">PERAK</a>, Copyright Reserved
                </p>
            </div>
        </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
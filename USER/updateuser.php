<?php 

	include('../functions.php');

if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
} 
$logged_in_user = mysqli_fetch_assoc($results);
			if ($_SESSION['user']['status'] == 'superadmin') {

			
				
				header('location: SUPERADMIN/superadmin.php');		  
			}
            else if ($_SESSION['user']['status'] == 'admin')
            {
           
				
				header('location: ADMIN/home.php');
            }
            else if ($_SESSION['user']['status'] == 'user'){
				
				

				
			}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/logo.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Update Profile</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
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
    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar2.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <center><img src="../assets/img/logo.png" alt="SUK PERAK" width="80" height="80"></center>
                <a class="simple-text">
                    SUK PERAK
                </a>
                <a class="simple-text">
                    <?php  if (isset($_SESSION['user'])) : ?>
                    <?php echo $_SESSION['user']['username']; ?> (<?php echo $_SESSION['user']['status']; ?>)<?php endif ?>
                </a>
            </div>

            <ul class="nav">
				
                <li >
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active" >
                    <a href="updateuser.php">
                        <i class="pe-7s-user"></i>
                        <p>My Account</p>
                    </a>
                </li>
                <li>
                    <a href="reqform.php">
                        <i class="pe-7s-note2"></i>
                        <p>Request Forms</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Update Profile</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">                      
                        <li>
                            <a href="updateuser.php?logout='1'">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-12">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Update Profile Details</h4>
                                <p class="category">Update your profile password or email here</p>
								
                            </div>
                            <div class="content">
                                <form id="updateuser" name="updateuser" action="updateuser.php" method="post" accept-charset='UTF-8'>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Username :</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $_SESSION['user']['username']; ?>" disabled required >
                                            </div>
                                        </div>                                    
                                    </div>
                                    
                                 <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Password :</label>
                                                <input type="password" class="form-control" name="password_1" placeholder="Password" value="<?php echo $password_1; ?>" required >
                                            </div>
                                        </div>                                    
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Confirm Password :</label>
                                                <input type="password" class="form-control" name="password_2" placeholder="Confirm Password" value="<?php echo $password_2; ?>" required >
                                            </div>
                                        </div>                                    
                                    </div>
									
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $_SESSION['user']['email']; ?>"  required >
                                            </div>
                                        </div>           
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Name :</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $_SESSION['user']['name']; ?>"  required >
                                            </div>
                                        </div>           
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Telephone Number :</label>
                                                <input type="tel" class="form-control" name="tel" placeholder="Tel No" value="0<?php echo $_SESSION['user']['tel']; ?>"  required >
                                            </div>
                                        </div>           
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Unit Atau Bahagian :</label>
                                                
                                                
                                                <select class="form-control" name="unitbahagian" required value="<?php echo $_SESSION['user']['unitbahagian']; ?>">
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
                                                <label>Jawatan :</label>
                                                <input type="text" class="form-control" name="jawatan" placeholder="Jawatan" value="<?php echo $_SESSION['user']['jawatan']; ?>"  required >
                                            </div>
                                        </div>           
                                    </div>

                                    <button type="submit" name="updateuser_btn" class="btn btn-info btn-fill pull-left">Update</button>
                                    <div class="clearfix">&nbsp;
									<button type="reset" name="reset" class="btn btn-info btn-fill pull-center">Reset</button>
                                    <div class="clearfix">
							</div>
                                </form>                        
                            </div>
                        </div>
                    </div>

                    
                </div>



                <div class="row">
                    <div class="col-md-6">
                        
                    </div>

                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-center">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.perak.gov.my/">PERAK</a>, Copyright Reserved
                </p>
            </div>
        </footer>

    </div>
</div>


</body>
    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

	<script type="text/javascript">
    	
	</script>

</html>

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

	<title>View Forms</title>

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

</style>
<?php 
//FORMS User
$usrname     =  $_SESSION['user']['username'];
$userid      =  $_SESSION['user']['id'];
$idtab       =  $_GET['id'];
$res = mysqli_query($db, "SELECT * FROM forms WHERE id='$idtab'");
$rows = mysqli_fetch_array($res);

?>
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
				
                <li class="active" >
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li  >
                    <a href="updateuser.php">
                        <i class="pe-7s-user"></i>
                        <p>My Account</p>
                    </a>
                </li>
                <li  >
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
                    <a class="navbar-brand">View Forms</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">                      
                        <li>
                            <a href="view.php?logout='1'">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div c  lass="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-12">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">FORM ID: #<?php echo $rows['id']; ?></h4>
                                <p class="category"></p>
								
                            </div>
                            <div class="content"> 
                                <form id="submitform" name="submitform" action="" method="post" accept-charset='UTF-8'>
                                
                                
                                 <div class="row">
                                    <div class="col-md-5">
                                            <div class="form-group" style="text-transform: uppercase;">
                                                <label>Status :</label><font color="CornflowerBlue"> <?php echo $rows['status']; ?></font>
                                            </div>
                                        </div>
                                    </div>
                                    
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
                                                <label>Name :</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $rows['name']; ?>" disabled required >
                                            </div>
                                        </div>           
                                    </div>
									
									<div class="row">
                                       <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Telephone Number :</label>
                                                <input type="tel" class="form-control" name="tel" placeholder="Tel No" value="0<?php echo $rows['tel']; ?>" disabled required >
                                            </div>
                                        </div>           
                                    </div>
									
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Jawatan :</label>
                                                <input type="text" class="form-control" name="jawatan" placeholder="Jawatan" value="<?php echo $rows['jawatan']; ?>" disabled required >
                                            </div>
                                        </div>           
                                    </div>
									
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $_SESSION['user']['email']; ?>" disabled required >
                                            </div>
                                        </div>           
                                    </div>
									
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Unit Atau Bahagian :</label>
                                                <input type="text" class="form-control" name="unitbahagian" placeholder="Unit atau Bahagian" value="<?php echo $rows['unitbahagian']; ?>" disabled required >
                                            </div>
                                        </div>           
                                    </div>
									
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Jenis Kenderaan :</label>
                                                <input type="text" class="form-control" name="jenkenderaan" value="<?php echo $rows['jenkenderaan']; ?>" disabled required >
                                            </div>
                                        </div>                                    
                                    </div>
									
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Tarikh :</label>
                                                <input type="text" class="form-control" name="tarikh" placeholder="Tarikh" value="<?php echo $rows['tarikh']; ?>" disabled >
                                            </div>
                                        </div>                                    
                                    </div>
									
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Masa :</label>
                                                <input type="text" class="form-control" name="masa" placeholder="Masa" value="<?php echo $rows['masa']; ?>" disabled >
                                            </div>
                                        </div>                                    
                                    </div>

							<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Butiran Perkhidmatan :</label>
                                                
												<textarea rows="5" class="form-control" name="butir" placeholder="Butiran Perkhidmatan"  disabled  required ><?php echo $rows['butir']; ?></textarea>
                                            </div>
                                        </div>                                    
                                    </div>

                                    <button onclick="myFunction()" name="print_btn" class="btn btn-info btn-fill pull-left">Print</button>
                                    <div class="clearfix"/>&nbsp;
									<input type="button" onclick="location.href='index.php';" name="back" class="btn btn-info btn-fill pull-center" value="Back"></input>
                                    <div class="clearfix" >
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
    
    <script>
        function myFunction() {
        window.print();
        }
    </script>
    <script>
        function backFunction() {
        window.location.href = "USER/index.php";
        }
    </script>

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

<!doctype html>
<html lang="en">
<?php
include('../functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
} 
$logged_in_user = mysqli_fetch_assoc($results);
			if ($_SESSION['user']['status'] == 'superadmin') {

		
				
					  
			}
            else if ($_SESSION['user']['status'] == 'admin')
            {
           
				
				header('location: ADMIN/home.php');
            }
            else if ($_SESSION['user']['status'] == 'user') {
			

				header('location: USER/index.php');
			}
    
$approved = mysqli_query ($db, "SELECT COUNT(*) AS totalapproved FROM forms WHERE status='approved'");
$app = mysqli_fetch_assoc($approved);
echo $app['totalapproved'];

$rejected = mysqli_query ($db, "SELECT COUNT(*) AS totalrejected FROM forms WHERE status='rejected'");
$rej = mysqli_fetch_assoc($rejected);
echo $rej['totalrejected'];

$pending = mysqli_query ($db, "SELECT COUNT(*) AS totalpending FROM forms WHERE status='pending'");
$p = mysqli_fetch_assoc($pending);
echo $p['totalpending'];
    
$approve =  $app['totalapproved'];
$reject  =  $rej['totalrejected'];
$pendings=  $p['totalpending'];
$totalforms = $app['totalapproved'] + $rej['totalrejected'] +$p['totalpending'];
    
$dataPoints = array( 
	array("label"=>"Pending", "y"=>$p['totalpending']),
    array("label"=>"Approve", "y"=>$app['totalapproved']),
    array("label"=>"Reject", "y"=>$rej['totalrejected']),
)
    ?>
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/logo.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Home</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    
    <script>
    window.onload = function() {
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "theme2",
        animationEnabled: true,
        title: {
            text: "SUK Car Booking Forms Statistic"
        },
        data: [{
		type: "pie",
		indexLabel: "{y}",
        yValueFormatString: "#,##",
		//yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
        });
        chart.render();}
    </script>
    
    
    
    
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
    

</head>
<body>
<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		
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
			
                <li class="active">
                    <a href="superadminpie.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="updateadmin.php">
                        <i class="pe-7s-user"></i>
                        <p>My Account</p>
                    </a>
                </li>
                <li>
                    <a href="forms.php">
                        <i class="pe-7s-note2"></i>
                        <p>Forms</p>
                    </a>
                </li>
                <li>
                    <a href="create_user.php">
                        <i class="pe-7s-science"></i>
                        <p>Add Admin</p>
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
                    <a class="navbar-brand">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">                      
                        <li>
                            <a href="superadminpie.php?logout='1'">
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
                    

                    <div class="col-md">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Pie Chart</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                <script src="../assets/js/canvasjs.min.js"></script>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    
                    
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

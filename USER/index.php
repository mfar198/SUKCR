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

	<title>Home</title>

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
		body {
    font-size: 13px;
}
table{
    width: 100%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 30px;
    padding: 15px;
}
tr:hover {
    background: #F5F5F5;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.approve_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}
.view_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: CornflowerBlue;
    color: white;
    border-radius: 3px;
}

.reject_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
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
<?php 
//FORMS User
$usrname     =  $_SESSION['user']['username'];
$userid      =  $_SESSION['user']['id'];
$resultuser = mysqli_query($db, "SELECT * FROM forms WHERE username='$usrname' ORDER BY id DESC");
?>
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
				
                <li class="active">
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
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
                    <a class="navbar-brand">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">                      
                        <li>
                            <a href="index.php?logout='1'">
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
                                <h4 class="title">MY FORMS</h4>
                                
                            </div>
                            <div class="content">
                                <?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
<form method="GET" action="view.php" >
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                               <table>
	<thead>
		<tr>
            <th>Name</th>
            <th>Unit atau Bahagian</th>
            <th>Jenis Kenderaan</th>
            <th>Tarikh</th>
            <th>Masa</th>
            <th>Butir</th>
            <th>Status</th>
            <th colspan="1">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($resultuser)) { ?>
		<tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['unitbahagian']; ?></td>
            <td><?php echo $row['jenkenderaan']; ?></td>
            <td><?php echo $row['tarikh']; ?></td>
            <td><?php echo $row['masa']; ?></td>
            <td><?php echo $row['butir']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
				<a href="../USER/view.php?id=<?php echo $row['id']; ?>" class="view_btn">View</a>
			</td>
		</tr>
	<?php } ?>
</table>
        </form>
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

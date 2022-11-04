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

				
				
				header('location: SUPERADMIN/superadmin.php');		  
			}
            else if ($_SESSION['user']['status'] == 'admin')
            {
               
				
				
            }
            else if ($_SESSION['user']['status'] == 'user'){
			
				

				header('location: USER/index.php');
			}
?>
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/logo.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Forms</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!--Seach Code --->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-select.min.css" rel="stylesheet" />
    <script src="assets/js/bootstrap-select.min.js"></script>
    
    
    
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

input[type=text] {
    width: 30%;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 13px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 9px 9px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
}
        #statussearch {
	height: 40px;
	width: 14%;
	padding: 5px 10px;
	background: white;
	font-size: 14px;
	border-radius: 5px;
	border: 1px solid gray;
}
    </style>
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
			
                <li >
                    <a href="homepie.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li >
                    <a href="updateadmin.php">
                        <i class="pe-7s-user"></i>
                        <p>My Account</p>
                    </a>
                </li>
                <li class="active">
                    <a href="forms.php">
                        <i class="pe-7s-note2"></i>
                        <p>Forms</p>
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
                    <a class="navbar-brand" >Forms</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">                      
                        <li>
                            <a href="forms.php?logout='1'">
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
                                <h4 class="title">Manage Forms</h4>
                                <p class="category">You can approve or reject forms here</p>
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
        
<form method="post" action="forms.php" >
        <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
        <div class="form-group">
        <input type="text" name="valueToSearch" placeholder="Search..." />
        <input type="submit" name="search" value="Search" class="btn btn-info btn-fill">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>User Type:</label>&nbsp;&nbsp;
        <select name="statussearch" id="statussearch">
        <option name="" value=""></option>
        <option name="approved" value="approved">Approved</option>
        <option name="rejected" value="rejected">Rejected</option>
        <option name="pending" value="pending">Pending</option>
        </select>
        <input type="submit" name="filter" value="Filter" class="btn btn-info btn-fill">
        <input type="submit" name="resets" value="Reset" class="btn btn-info btn-fill"><br>
        </div>
                               <table>
	<thead>
		<tr>
            <th>Name</th>
            <th>Unit atau Bahagian</th>
            <th>Jenis Kenderaan</th>
            <th>Tarikh</th>
            <th>Masa</th>
            <th>Status</th>
            <th colspan="1">View</th>
			<th colspan="1">Action</th>
            <th colspan="1"></th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['unitbahagian']; ?></td>
            <td><?php echo $row['jenkenderaan']; ?></td>
            <td><?php echo $row['tarikh']; ?></td>
            <td><?php echo $row['masa']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
				<a href="../ADMIN/viewadmin.php?id=<?php echo $row['id']; ?>" class="view_btn">View</a>
			</td>
			<td>
				<a href="../functions.php?approve=<?php echo $row['id']; ?>" class="approve_btn">Approve</a>
			</td>
			<td>
				<a href="../functions.php?reject=<?php echo $row['id']; ?>" class="reject_btn">Reject</a>
			</td>
            
		</tr>
	<?php } ?>
</table>
        </form>
                            </div>
                        </div>
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

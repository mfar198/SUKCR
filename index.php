<?php
include('functions.php');
$logged_in_user = mysqli_fetch_assoc($results);
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
} else if ($_SESSION['user']['status'] = "SUPERADMIN"){
    header('location: SUPERADMIN/superadminpie.php');
} else if ($_SESSION['user']['status'] = "ADMIN"){
    header('location: ADMIN/homepie.php');
} else if ($_SESSION['user']['status'] = "USER"){
    header('location: USER/user.php');
}
?>
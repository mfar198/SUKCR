<?php 

	$db = mysqli_connect('localhost', 'root', '', 'sukcr');

	// initialize variables
	$username = "";
	$password = "";
	$email = "";
	$update = false;


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$email = $_POST['email'];

		mysqli_query($db, "UPDATE acc SET username='$username', password='$password' email='$email' WHERE id=$id");
		$_SESSION['message'] = "Profile updated!"; 
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM acc WHERE id=$id");
	$_SESSION['message'] = "Account deleted!"; 
	header('location: login.php');
}


	$results = mysqli_query($db, "SELECT * FROM acc");


?>
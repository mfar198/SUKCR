<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'sukcr');

// variable declaration
$username = "";
$email    = "";
$name = "";
$tel = ""
$jawatan = "";
$unitbahagian = "";
$jenkenderaan = "";
$tarikh = "";
$masa = "";
$butir = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['submit_btn'])) {
	submitform();
}

// REGISTER USER
function submitform(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $name, $tel, $jawatan, $email, $unitbahagian, $jenkenderaan, $tarikh, $masa;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$name		 =  e($_POST['name']);
	$tel		 =  e($_POST['tel']);
	$jawatan	 =  e($_POST['jawatan']);
	$email       =  e($_POST['email']);
	$unitbahagian=  e($_POST['unitbahagian']);
	$jenkenderaan=  e($_POST['jenkenderaan']);
	$tarikh		 =  e($_POST['tarikh']);
	$masa		 =  e($_POST['masa']);
	$butir		 =  e($_POST['butir']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($name)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($tel)) { 
		array_push($errors, "Telephone number is required"); 
	}
	if (empty($jawatan)) { 
		array_push($errors, "Jawatan is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($unitbahagian)) { 
		array_push($errors, "Unit dan Bahagian is required"); 
	}
	if (empty($jenkenderaan)) { 
		array_push($errors, "Jenis Kenderaan is required"); 
	}
	if (empty($tarikh)) { 
		array_push($errors, "Tarikh is required"); 
	}
	if (empty($masa)) { 
		array_push($errors, "Masa is required"); 
	}
	if (empty($butir)) { 
		array_push($errors, "Butir Perkhidmatan is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {

			$query = "INSERT INTO forms (username, name, tel, jawatan, email, unitbahagian, jenkenderaan, tarikh, masa, butir) 
					  VALUES('$username', '$name', '$tel', '$jawatan', '$email', '$unitbahagian', '$jenkenderaan', '$tarikh', '$masa', '$butir')";
			mysqli_query($db, $query);		
			header('location: reqform.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM acc WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}


}

	
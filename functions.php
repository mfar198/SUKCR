<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'sukcr');

// variable declaration
$username = "";
$email    = "";
$errors   = array();

// variable declaration reqform

$email    = "";
$name = "";
$jawatan = "";
$tel = "";
$unitbahagian=  "";
$jenkenderaan=  "";
$tarikh		 =  "";
$masa		 =  "";
$butir = "";

Class dbObj{
	/* Database connection start */
	var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "sukcr";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}

$errors   = array();  

// call the register() function if register_btn is clicked
if (isset($_POST['submit_btn'])) {
	submitform();
}

// SUBMIT FOR
function submitform(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $tel, $jawatan, $email, $unitbahagian, $jenkenderaan, $tarikh, $masa;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $usrname     =  $_SESSION['user']['username'];
	$name		 =  $_SESSION['user']['name'];
	$tel		 =  $_SESSION['user']['tel'];
	$jawatan	 =  $_SESSION['user']['jawatan'];
	$email       =  $_SESSION['user']['email'];
	$unitbahagian=  $_SESSION['user']['unitbahagian'];
	$jenkenderaan=  e($_POST['jenkenderaan']);
	$tarikh		 =  e($_POST['tarikh']);
	$masa		 =  e($_POST['masa']);
	$butir		 =  e($_POST['butir']);
    $status      =  "Pending";

	// form validation: ensure that the form is correctly filled

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

	if (empty($butir)) { 
		array_push($errors, "Butir Perkhidmatan is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {

			$query = "INSERT INTO forms (username, name, tel, jawatan, email, unitbahagian, jenkenderaan, tarikh, masa, butir, status) 
					  VALUES('$usrname', '$name', '$tel', '$jawatan', '$email', '$unitbahagian', '$jenkenderaan', '$tarikh', '$masa', '$butir', '$status')";
			mysqli_query($db, $query);
            echo '<script language="javascript">';
            echo 'alert("Form has been submitted. Please wait for 3 working days for the respond!");';
            echo 'window.location.href = "reqform.php";';
            echo '</script>';
		}
	

}

//View Admin



//FORMS SUPERAdmin
$results = mysqli_query($db, "SELECT * FROM forms ORDER BY id DESC");

if (isset($_GET['superapprove'])) {
	$id = $_GET['superapprove'];
    $approve = "Approved";

		mysqli_query($db, "UPDATE forms SET status='$approve' WHERE id=$id");
		$_SESSION['message'] = "Form has been approved!"; 
		header('location: SUPERADMIN/forms.php');
	}

if (isset($_GET['supereject'])) {
	$id = $_GET['supereject'];
    $reject = "Rejected";
    
	mysqli_query($db, "UPDATE forms SET status='$reject' WHERE id=$id");
    $_SESSION['message'] = "Form has been rejected!"; 
    header('location: SUPERADMIN/forms.php');
}

if(isset($_POST['superesets']))
{
    $results = mysqli_query($db, "SELECT * FROM forms ORDER BY id DESC");
    header('location: forms.php');
}


//FORMS Admin
$results = mysqli_query($db, "SELECT * FROM forms ORDER BY id DESC");

if (isset($_GET['approve'])) {
	$id = $_GET['approve'];
    $approve = "Approved";

		mysqli_query($db, "UPDATE forms SET status='$approve' WHERE id=$id");
		$_SESSION['message'] = "Form has been approved!"; 
		header('location: ADMIN/forms.php');
	}

if (isset($_GET['reject'])) {
	$id = $_GET['reject'];
    $reject = "Rejected";
    
	mysqli_query($db, "UPDATE forms SET status='$reject' WHERE id=$id");
    $_SESSION['message'] = "Form has been rejected!"; 
    header('location: ADMIN/forms.php');
}

//Search Admin Forms
if(isset($_POST['search']))
{
    
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `forms` WHERE CONCAT(`username`, `id`, `name`, `tel`, `jawatan`, `email`, `unitbahagian`, `jenkenderaan`, `tarikh`, `masa`, `butir`, `status`) LIKE '%".$valueToSearch."%' ORDER BY id DESC";
    $results = filterTable($query);
    
}
else if (isset($_POST['filter'])) {
    $statussearch = $_POST['statussearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `forms` WHERE `status` = '$statussearch' ORDER BY id DESC";
    $results = filterTable($query);
}
 else {
    $query = "SELECT * FROM `forms` ORDER BY id DESC";
    $results = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "sukcr");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

if(isset($_POST['resets']))
{
    $results = mysqli_query($db, "SELECT * FROM forms ORDER BY id DESC");
    header('location: forms.php');
}


// variable declaration reqform
$email = "";
$password_1    = "";
$password_2 = "";

$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['updateadmin_btn'])) {
	updateadmin();
}

// UPDATE ADMIN PROFILE
function updateadmin(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $password, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $usrname     =  $_SESSION['user']['username'];
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	$name		 =  $_SESSION['user']['name'];
	$tel		 =  $_SESSION['user']['tel'];
	$jawatan	 =  $_SESSION['user']['jawatan'];
	$email       =  $_SESSION['user']['email'];
	$unitbahagian=  $_SESSION['user']['unitbahagian'];


	// form validation: ensure that the form is correctly filled
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}


	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
			$query = "UPDATE acc SET password='$password', email='$email' WHERE username='$usrname'"; 
			mysqli_query($db, $query);
            echo '<script language="javascript">';
            echo 'alert("Profile has been updated!");';
            echo 'window.location.href = "updateadmin.php";';
            echo '</script>';
		}
}


// variable declaration reqform
$email = "";
$password_1    = "";
$password_2 = "";

$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['updateuser_btn'])) {
	updateuser();
}

// UPDATE USER PROFILE
function updateuser(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $password, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $usrname     =  $_SESSION['user']['username'];
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	$name		 =  $_SESSION['user']['name'];
	$tel		 =  $_SESSION['user']['tel'];
	$jawatan	 =  $_SESSION['user']['jawatan'];
	$email       =  $_SESSION['user']['email'];
	$unitbahagian=  $_SESSION['user']['unitbahagian'];


	// form validation: ensure that the form is correctly filled
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}


	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
			$query = "UPDATE acc SET password='$password', email='$email' WHERE username='$usrname'"; 
			mysqli_query($db, $query);
            echo '<script language="javascript">';
            echo 'alert("Profile has been updated!");';
            echo 'window.location.href = "updateuser.php";';
            echo '</script>';
		}
	
	
}

if (isset($_POST['create_user_btn']))
{
    createuser();
}

function createuser(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $name, $tel, $unitbahagian, $jawatan;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password    =  e($_POST['password']);
    $name        =  e($_POST['name']);
    $tel         =  e($_POST['tel']);
    $unitbahagian=  e($_POST['unitbahagian']);
    $jawatan     =  e($_POST['jawatan']);
    $sql_u       =  "SELECT * FROM acc WHERE username='$username'";
    $res_u       =  mysqli_query($db, $sql_u);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	}
    if (empty($name)) { 
		array_push($errors, "Full name is required"); 
	}
    if (empty($tel)) { 
		array_push($errors, "Telephone number is required"); 
	}
    if (empty($unitbahagian)) { 
		array_push($errors, "Please choose unit atau bahagian"); 
	}
    if (empty($jawatan)) { 
		array_push($errors, "Jawatan is required"); 
	}
    

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database
        if (mysqli_num_rows($res_u) > 0) {
        $_SESSION['errmessage'] = "Sorry, username has been taken..";	
        }else if (isset($_POST['status'])) {
			$status = e($_POST['status']);
			$query = "INSERT INTO acc (username, password, email, name, tel, unitbahagian, jawatan, status) 
					  VALUES('$username', '$password', '$email', '$name', '$tel', '$unitbahagian', '$jawatan', '$status')";
			mysqli_query($db, $query);
            echo '<script language="javascript">';
            echo 'alert("Account has been created!");';
            echo 'window.location.href = "create_user.php";';
            echo '</script>';
		}
	}
}

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $name, $tel, $unitbahagian, $jawatan;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password    =  e($_POST['password']);
    $name        =  e($_POST['name']);
    $tel         =  e($_POST['tel']);
    $unitbahagian=  e($_POST['unitbahagian']);
    $jawatan     =  e($_POST['jawatan']);
    $status = "user";
    $sql_u = "SELECT * FROM acc WHERE username='$username'";
    $res_u = mysqli_query($db, $sql_u);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	}
    if (empty($name)) { 
		array_push($errors, "Full name is required"); 
	}
    if (empty($tel)) { 
		array_push($errors, "Telephone number is required"); 
	}
    if (empty($unitbahagian)) { 
		array_push($errors, "Please choose unit atau bahagian"); 
	}
    if (empty($jawatan)) { 
		array_push($errors, "Jawatan is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database
		//Check Username Exist
        
        if (mysqli_num_rows($res_u) > 0) {
            echo '<script language="javascript">';
            echo 'alert("Sorry, username has been taken..");';
            echo '</script>';
        }else{
           $query = "INSERT INTO acc (username, password, email, name, tel, unitbahagian, jawatan, status) 
					  VALUES('$username', '$password', '$email', '$name', '$tel', '$unitbahagian', '$jawatan', '$status')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			echo '<script language="javascript">';
            echo 'alert("Account has been created!");';
            echo 'alert("You may login now.");';
            echo 'window.location.href = "login.php";';
            echo '</script>';
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

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM acc WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['status'] == 'superadmin') {

				$_SESSION['user'] = $logged_in_user;
				
				header('location: SUPERADMIN/superadminpie.php');		  
			}
            else if ($logged_in_user['status'] == 'admin')
            {
                $_SESSION['user'] = $logged_in_user;
				
				header('location: ADMIN/homepie.php');
            }
            else{
				$_SESSION['user'] = $logged_in_user;
				

				header('location: USER/index.php');
			}
		}else {
            echo '<script language="javascript">';
            echo 'alert("Wrong username/password combination");';
            echo 'window.location.href = "login.php";';
            echo '</script>';
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

	
<?php 
session_start();
$db = mysqli_connect('localhost', 'id11185370_localhost', '123456', 'id11185370_moitinh');
$username = "";
$email    = "";
$errors   = array(); 

if (isset($_POST['register_btn'])) {
	register();
}

function register(){
	global $db, $errors, $username, $email;

	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password1  =  e($_POST['password1']);
	$password2  =  e($_POST['password2']);

	if (empty($username)) { 
		array_push($errors, "Phải nhập tên tài khoản"); 
	}
	if (empty($email)) { 
		array_push($errors, "Phải nhập email"); 
	}
	if (empty($password1)) { 
		array_push($errors, "Phải nhập mật khẩu"); 
	}
	if ($password1 != $password2) {
		array_push($errors, "Mật khẩu được nhập không trùng khớp");
	}

	if (count($errors) == 0) {
		$password = $password1;
		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			header('location: create-thanks.php');
        }
        else{
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);
			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);
			$_SESSION['user'] = getUserById($logged_in_user_id);
			header('location: register-thanks.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
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

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

if (isset($_POST['login_btn'])) {
	login();
}

function login(){
	global $db, $username, $errors;
	$username = e($_POST['username']);
	$password = e($_POST['password']);
	if (empty($username)) {
		array_push($errors, "Phải nhập tên tài khoản");
	}
	if (empty($password)) {
		array_push($errors, "Phải nhập mật khẩu");
	}

	if (count($errors) == 0) {
		$password = $password;
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { 
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {
				$_SESSION['user'] = $logged_in_user;
				header('location: admin-page.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				header('location: members-page.php');
			}
		}else {
			array_push($errors, "Bạn đã nhập sai tên tài khoản hoặc mật khẩu");
		}
	}
}

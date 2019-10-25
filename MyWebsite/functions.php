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
	$token = bin2hex(random_bytes(10));
	$password1  =  e($_POST['password1']);
	$password2  =  e($_POST['password2']);
        $dupe = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($db, $dupe);
	$user = mysqli_fetch_assoc($result);
	if ($user) {
		if ($user['username'] === $username) {
		array_push($errors, "Tên tài khoản đã tồn tại");
		}
		if ($user['email'] === $email) {
		array_push($errors, "Email đã tồn tại");
		}
	}

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
			$query = "INSERT INTO users (username, email, user_type, password, token, verified) 
					  VALUES('$username', '$email', '$user_type', '$password', '', true)";
			mysqli_query($db, $query);
			header('location: create-thanks.php');
        }
        else{
			$query = "INSERT INTO users (username, email, user_type, password, token, verified) 
					  VALUES('$username', '$email', 'user', '$password', '$token', false)";
			mysqli_query($db, $query);
			$logged_in_user_id = mysqli_insert_id($db);
			$_SESSION['user'] = getUserById($logged_in_user_id);
			$take = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $take);
			if (mysqli_num_rows($results) == 1) { 
				$logged_in_user = mysqli_fetch_assoc($results);
				$_SESSION['user'] = $logged_in_user;
				sendMail($email, $token);
				header('location: register-thanks.php');
			}
			else {
			array_push($errors, "Bạn đã nhập sai tên tài khoản hoặc mật khẩu");
		    }
		}
	}
}

function sendMail($email, $token){
	$to = "$email";
	$subject = "Email Activation";
	$headers = "From: batjoker845@gmail.com";
	$txt = "Xin chào. Đây là link kích hoạt của bạn: https://cse485-175a071561-175a072199.000webhostapp.com/verify-email.php?token=$token. Bấm vào đường link để kích hoạt tài khoản.";
	"CC: batjoker845@gmail.com";
	mail($to,$subject,$txt,$headers);
}

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

function isVerified()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['verified'] == '1' ) {
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

if (isset($_POST['forgot_btn'])) {
	forgot();
}

function forgot(){
	global $db, $email, $newpass, $name, $errors;
	$email = e($_POST['email']);
	if (empty($email)) { 
		array_push($errors, "Phải nhập email"); 
	}
	if (count($errors) == 0){
		$query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
		$results = mysqli_query($db, $query);
		$newpass = rand(100000, 999999);
		if (mysqli_num_rows($results) == 1) {
			$stray = "UPDATE users SET password=$newpass WHERE email='$email'";
        	if (mysqli_query($db, $stray)) {
				$logged_in_user = mysqli_fetch_assoc($results);
				$_SESSION['user'] = $logged_in_user;
				$name = $_SESSION['user']['username'];
				ForgotMail($email, $name, $newpass);
				header('location: notice2.php');
        	}
		}
		else{
		    array_push($errors, "Email này hiện không được sử dụng");
		}
	}
}

function ForgotMail($email, $name, $newpass){
	$to = "$email";
	$subject = "Password Reset";
	$headers = "From: batjoker845@gmail.com";
	$txt = "Xin chào $name. Mật khẩu của bạn đã được đặt lại thành: $newpass. Xin mời bạn đăng nhập lại bằng mật khẩu mới.";
	"CC: batjoker845@gmail.com";
	mail($to,$subject,$txt,$headers);
}

if (isset($_POST['info_btn'])) {
	info();
}

function info(){
    global $db, $errors, $username, $email, $id;
    $id = $_SESSION['user']['id'];
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password1  =  e($_POST['password1']);
	$password2  =  e($_POST['password2']);
	$dupe = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($db, $dupe);
	$user = mysqli_fetch_assoc($result);
	if ($user) {
		if ($user['username'] === $username) {
		array_push($errors, "Tên tài khoản đã tồn tại");
		}
		if ($user['email'] === $email) {
		array_push($errors, "Email đã tồn tại");
		}
	}

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
        $query = "SELECT * FROM users WHERE id = $id LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
			$layin = "UPDATE users SET username='$username', email='$email', password='$password'
			          WHERE id=$id";
        	if (mysqli_query($db, $layin)) {
				$logged_in_user = mysqli_fetch_assoc($results);
				$_SESSION['user'] = $logged_in_user;
				header('location: notice3.php');
        	}
		}
		else{
		    array_push($errors, "Đã có lỗi xảy ra, hãy thử lại");
		}
	}
}

if (isset($_POST['add_btn'])) {
	add();
}

function add(){
	global $db, $errors, $title, $content, $thumbnail, $id;

    $id = $_SESSION['user']['id'];
	$title    =  e($_POST['title']);
	$content       =  e($_POST['content']);
    $thumbnail = 	e($_POST['thumbnail']);
    $dupe = "SELECT * FROM news WHERE title='$title' OR content='$content' OR thumbnail='$thumbnail' LIMIT 1";
	$result = mysqli_query($db, $dupe);
	$user = mysqli_fetch_assoc($result);
	if ($user) {
		if ($user['title'] === $title) {
		array_push($errors, "Tiêu đề đã tồn tại");
		}
		if ($user['content'] === $content) {
		array_push($errors, "Nội dung đã tồn tại");
		}
		if ($user['thumbnail'] === $thumbnail) {
		array_push($errors, "Ảnh đã tồn tại");
		}
	}

	if (empty($title)) { 
		array_push($errors, "Phải nhập tiêu đề"); 
	}
	if (empty($thumbnail)) { 
		array_push($errors, "Phải nhập link ảnh"); 
	}
	if (empty($content)) { 
		array_push($errors, "Phải nhập nội dung"); 
	}
	if (count($errors) == 0) {
        $query = "INSERT INTO news (id, thumbnail, title, content) 
				VALUES('$id', '$thumbnail', '$title', '$content')";
		mysqli_query($db, $query);
		$get_news_id = mysqli_insert_id($db);
		$_SESSION['news'] = getNewsById($get_news_id);
		header('location: add-thanks.php');
	}
}

function getNewsById($N_id){
	global $db;
	$query = "SELECT * FROM news WHERE N_id=" . $N_id;
	$result = mysqli_query($db, $query);
	$news = mysqli_fetch_assoc($result);
	return $news;
}

<?php
session_start();
$first_name = "";
$last_name = "";
$email = "";
$conn = mysqli_connect('localhost', 'root', '', 'moitinh');
if (!$conn){
	die("Khong the ket noi. Xin nhap lai!");
}

if (isset($_POST['submit'])) {
  // receive all input values from the form
  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($first_name)) { array_push($errors, "Phải nhập tên"); }
  if (empty($last_name)) { array_push($errors, "Phải nhập họ"); }
  if (empty($email)) { array_push($errors, "Phải nhập email"); }
  if (empty($password1)) { array_push($errors, "Phải nhập mật khẩu"); }
  if ($password1 != $password2) {
	array_push($errors, "Hai mật khẩu không trùng nhau");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Email đã được đăng ký");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password1);//encrypt the password before saving in the database
	$query = "INSERT INTO users (userid, first_name, last_name, email, password, registration_date)
	VALUES('', '$first_name', '$last_name', '$email', '$password', NOW()) ";
  	mysqli_query($conn, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "Bạn đã đăng nhập";
  	header('location: index.php');
  }
}

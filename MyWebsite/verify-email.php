<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'moitinh');
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET verified=1 WHERE token='$token'";
        if (mysqli_query($db, $query)) {
            $_SESSION['user']['verified'] == true;
			header('location: register-thanks.php');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}
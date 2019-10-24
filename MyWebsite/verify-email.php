<?php
session_start();
$db = mysqli_connect('localhost', 'id11185370_localhost', '123456', 'id11185370_moitinh');
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $query = "UPDATE users SET verified=1 WHERE token='$token'";
        if (mysqli_query($db, $query)) {
            $_SESSION['user']['verified'] == true;
			header('location: login.php');
            exit(0);
        }
    } else {
        echo "Không tìm được tài khoản";
    }
} else {
    echo "Mã kích hoạt lỗi";
}
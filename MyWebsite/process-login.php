<?php
    // Nhiem vu: Tao phien
    // Chi tao khi kiem tra khop email va password
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = mysqli_connect('localhost', 'root', '', 'moitinh');
    if (!$conn){
        die("Khong the ket noi. Xin nhap lai!");
    }
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
          if (password_verify($password, $row[1])) {
            session_start();								
            $_SESSION['user_level'] = (int) $row[3];
            $url = ($_SESSION['user_level'] === 1) ? 'admin-page.php' : 'members-page.php'; 
            header('Location: ' . $url); 
          }
          else {
            $errors[] = 'Email hoặc Mật khẩu của bạn không khớp với dữ liệu hiện có';
            $errors[] = 'Nếu chưa có tài khoản, nhấn vào nút Đăng ký';
          }
        }
        else{
          $errors[] = 'Email hoặc Mật khẩu của bạn không khớp với dữ liệu hiện có';
          $errors[] = 'Nếu chưa có tài khoản, nhấn vào nút Đăng ký';
        }
?>

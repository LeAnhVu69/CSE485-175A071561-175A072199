<?php
try {
	$errors = array();                       
        $first_name = filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING);	
	if (empty($first_name)) {
		$errors[] = 'Bạn chưa nhập tên';
	}
	    $last_name = filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING);	
	if (empty($last_name)) {
		$errors[] = 'Bạn chưa nhập họ';
	}
	    $email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);	
	if  ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
		$errors[] = 'Bạn chưa nhập email';
		$errors[] = 'Hoặc email đã nhập sai';
	}
			$password1 = filter_var( $_POST['password1'], FILTER_SANITIZE_STRING);
			$password2 = filter_var( $_POST['password2'], FILTER_SANITIZE_STRING);
	if (!empty($password1)) {
		if ($password1 !== $password2) { 
			$errors[] = 'Mật khẩu không khớp';
		} 
	} else {
		$errors[] = 'Bạn chưa nhập mật khẩu';
	}
	if (empty($errors)) {
	    $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT); 
		require ('mysqli_connect.php'); 
		$query = "INSERT INTO users (userid, first_name, last_name, email, password, registration_date) ";
		$query .="VALUES(' ', ?, ?, ?, ?, NOW() )";		                
        $q = mysqli_stmt_init($dbcon);                                  
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, 'ssss', $first_name, $last_name, $email, $hashed_passcode);
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {			
		header ("location: register-thanks.php"); 
		exit();
		} else { 
		    $errorstring = "<p class='text-center col-sm-8' style='color:red'>";
			$errorstring .= "Hệ thống xảy ra lỗi <br> Bạn đã đăng ký không thành công";
			$errorstring .= "Chúng tôi xin lỗi vì sự bất tiện này</p>"; 
			echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
			// Debugging message below do not use in production
			//echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';
		    mysqli_close($dbcon); // Close the database connection.
			echo '<footer class="jumbotron text-center col-sm-12"
	        style="padding-bottom:1px; padding-top:8px;">
            include("footer.php"); 
            </footer>';
		exit();
		}
	} else {                            
		$errorstring = "Lỗi! <br> Các lỗi sau đã xảy ra:<br>";
		foreach ($errors as $msg) {
			$errorstring .= " - $msg<br>\n";
		}
		$errorstring .= "Xin thử lại sau<br>";
		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
		}// End of if (empty($errors)) IF.
}									
   catch(Exception $e)
   {
     print "Hệ thống bận xin thử lại sau";
   }
   catch(Error $e)
   {
      print "Hệ thống bận xin thử lại sau";
   }
?>
<?php 

    include('functions.php');
    if (!isLoggedIn()) {
      header('location: login.php');
    }
    if (!isVerified()) {
      header('location: notice.php');
    }

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <title>Thông tin</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <style>

    .error {

      width: 120%; 

      margin: 0px auto; 

      padding: 10px; 

      border: 1px solid #a94442; 

      color: #a94442; 

      background: #f2dede; 

      border-radius: 5px; 

      text-align: left;

    }

  </style>

</head>



<body>

  <div class="container" style="margin-top:30px">

    <header class="jumbotron text-center row col-sm-14" style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 

        <div class="col-sm-3">

          <img class="float-left" src="images/logo_ntt.png" alt="Logo"> 

        </div>

        <div class="col-sm-7">

          <h1 class="blue-text mb-4 font-bold">Thông tin</h1>

        </div>

        <nav class="col-sm-2">

        	<div class="btn-group-vertical btn-group-sm" role="group" aria-label="Button Group">

                <button type="button" class="btn btn-secondary" 

                 onclick="location.href = 'info-change.php'">Nhập lại</button>  

                <button type="button" class="btn btn-secondary" 

                 onclick="location.href = 'info.php'">Hủy bỏ</button>

            </div>

        </nav>

    </header>

  <div class="row" style="padding-left: 0px; margin-top: 20px">

  <div class="col-sm-8">

  <form action="info-change.php" method="post">

    <?php echo display_error(); ?>

    <div class="form-group row">

      <label for="username" class="col-sm-4 col-form-label">Nhập tên tài khoản mới:</label>

      <div class="col-sm-8">

        <input type="text" class="form-control" name="username" placeholder="Tên" value="<?php echo $username; ?>">

      </div>

    </div>

    <div class="form-group row">

      <label for="email" class="col-sm-4 col-form-label">Nhập địa chỉ Email mới:</label>

      <div class="col-sm-8">

        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">

      </div>

    </div>

    <div class="form-group row">

        <label for="password1" class="col-sm-4 col-form-label">Nhập mật khẩu mới:</label>

        <div class="col-sm-8">

          <input type="password" class="form-control" name="password1" placeholder="Mật khẩu">

        </div>

    </div>

    <div class="form-group row">

        <label for="password2" class="col-sm-4 col-form-label">Nhập lại mật khẩu:</label>

        <div class="col-sm-8">

          <input type="password" class="form-control" name="password2" placeholder="Nhập lại mật khẩu">

        </div>

    </div>

    <div class="form-group row">

      <div class="col-sm-12">

        <button type="submit" class="btn" name="info_btn">Thay đổi</button>

      </div>

    </div>

  </form>

  </div>

  </div>

      <footer style="margin-top: 50px; background:linear-gradient(white, #0073e6)">

        <?php

            include ('foot-bot.php');

        ?>

    </footer>

  </div>

</body>

</html>


<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng nhập</title>
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
      <?php
        include('login-header.php');
      ?>
    </header>
    <div class="row" style="padding-left: 0px;">
      <div class="col-sm-8">
        <form action="login.php" method="post">
          <?php echo display_error(); ?>
        <div class="form-group row">
          <label for="username" class="col-sm-4 col-form-label">Nhập tên tài khoản:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="username" placeholder="Tên">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-4 col-form-label">Nhập mật khẩu:</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
            <br><a href="forgotpass.php">Quên mật khẩu?</a>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <button type="submit" class="btn" name="login_btn">Đăng nhập</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

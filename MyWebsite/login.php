<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng nhập</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <script src="verify.js"></script> 
</head>

<body>
  <div class="container" style="margin-top:30px">
    <header class="jumbotron text-center row col-sm-14" style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
      <?php
        include('login-header.php');
      ?>
    </header>
    <div class="row" style="padding-left: 0px;">
      <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {                               
          require('process-login.php');
        }
      ?>
    <div class="col-sm-8">
      <form action="login.php" method="post" name="loginform" id="loginform">
      <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label">Nhập địa chỉ Email:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="email" name="email" 
          placeholder="Email" maxlength="30" required
          value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-4 col-form-label">Nhập mật khẩu:</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="password" name="password" 
        placeholder="Password" maxlength="40" required
        value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
        <span>Từ 8 đến 12 kí tự</span></p>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Đăng nhập">
        </div>
      </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>

<?php
  include('functions.php'); 
  if (!isAdmin()) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng ký</title>
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
      <?php include('create-header.php'); ?>
    </header>
    <div class="row" style="padding-left: 0px;">
  <div class="col-sm-8">
  <form action="create-admin.php" method="post">
    <?php echo display_error(); ?>
    <div class="form-group row">
      <label for="username" class="col-sm-4 col-form-label">Nhập tên tài khoản:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="username" placeholder="Tên" value="<?php echo $username; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-4 col-form-label">Nhập địa chỉ Email:</label>
      <div class="col-sm-8">
        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="user_type" class="col-sm-4 col-form-label">Chọn chức vụ:</label>
      <div class="col-sm-8">
        <select name="user_type">
            <option value=""></option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select> 
      </div>
    </div>
    <div class="form-group row">
        <label for="password1" class="col-sm-4 col-form-label">Nhập mật khẩu:</label>
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
        <button type="submit" class="btn" name="register_btn">Đăng ký</button>
      </div>
    </div>
  </form>
  </div>
  </div>
  </div>
</body>
</html>

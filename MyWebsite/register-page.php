<?php include('process-register-page') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng ký</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>

<body>
  <div class="container" style="margin-top:30px">
    <header class="jumbotron text-center row col-sm-14" style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
      <?php include('register-header.php'); ?>
    </header>
    <div class="row" style="padding-left: 0px;">
  <div class="col-sm-8">
  <form action="register-page.php" method="post">
    <div class="form-group row">
      <label for="last_name" class="col-sm-4 col-form-label">Nhập Họ:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Họ" required
        value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="first_name" class="col-sm-4 col-form-label">Nhập Tên:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Tên" required
        value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" >
      </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label">Nhập Địa chỉ Email:</label>
        <div class="col-sm-8">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required
          value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
        </div>
      </div>
    <div class="form-group row">
        <label for="password1" class="col-sm-4 col-form-label">Nhập Mật khẩu:</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="password1" name="password1" placeholder="Password" required
          value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>">
        </div>
      </div>
    <div class="form-group row">
        <label for="password2" class="col-sm-4 col-form-label">Nhập lại mật khẩu:</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" required
          value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
        </div>
      </div>
    <div class="form-group row">
        <div class="col-sm-12">
      <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Đăng ký">
        </div>
      </div>
  </form>
  </div> <!-- col -->
    </div> <!-- row -->
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

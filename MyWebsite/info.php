<?php 
    include('functions.php');
    if (!isLoggedIn()) {
      header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thông tin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>

<body>
  <div class="container" style="margin-top:30px">
    <header class="jumbotron text-center row col-sm-14" style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
      <?php include('info-header.php'); ?>
    </header>
<div class="row" style="padding-left: 0px; margin-top: 20px">
  <div class="col-sm-8">
    <div class="form-group row">
      <label for="id" class="col-sm-4 col-form-label">Id:</label>
      <div class="col-sm-8">
        <?php  if (isset($_SESSION['user'])) : ?>
            <p name="id"><?php echo $_SESSION['user']['id']; ?></p> 
        <?php endif ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="username" class="col-sm-4 col-form-label">Tên tài khoản:</label>
      <div class="col-sm-8">
        <?php  if (isset($_SESSION['user'])) : ?>
            <p name="username"><?php echo $_SESSION['user']['username']; ?></p> 
        <?php endif ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-4 col-form-label">Email:</label>
      <div class="col-sm-8">
        <?php  if (isset($_SESSION['user'])) : ?>
            <p name="email"><?php echo $_SESSION['user']['email']; ?></p> 
        <?php endif ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="user_type" class="col-sm-4 col-form-label">Chức vụ:</label>
      <div class="col-sm-8">
        <?php  if (isset($_SESSION['user'])) : ?>
            <p name="user_type"><?php echo $_SESSION['user']['user_type']; ?></p> 
        <?php endif ?>
      </div>
    </div>
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

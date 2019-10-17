<?php                                                                       
    include('functions.php');
    if (!isLoggedIn()) {
      header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thành công</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top:30px">
  <header class="jumbotron text-center row" style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
    <?php include('thanks-header.php'); ?>
  </header>
  <div class="row" style="padding-left: 0px;">
    <div class="col-sm-12 text-center">
      <h2>Chào mừng <?php echo $_SESSION['user']['username']; ?></h2>
      <?php if (!$_SESSION['user']['verified']): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              Bạn cần kích hoạt tài khoản của mình. Nhấp vào đường link chúng tôi đã gửi tới email: 
              <strong><?php echo $_SESSION['user']['email']; ?></strong>
            </div>
      <?php endif; ?>
      <a href="index.php">Trở về trang chủ</a>
    </div>
  </div>
</div>
</body>
</html>

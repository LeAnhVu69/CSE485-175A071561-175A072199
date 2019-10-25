<?php                                                                                     
    include('functions.php');
    if (!isAdmin()) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đăng tin</title>
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
  <header class="jumbotron text-center row" style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
    <div class="col-sm-3">
    <img class="float-left" src="images/logo_ntt.png" alt="Logo"> 
    </div>
    <div class="col-sm-7">
    <h1 class="blue-text mb-4 font-bold">Đăng tin</h1>
    </div>
    <nav class="col-sm-2">
        <div class="btn-group-vertical btn-group-sm" role="group" aria-label="Button Group">
            <button type="button" class="btn btn-secondary" 
            onclick="location.href = 'add-news.php'" >Nhập lại</button>
            <button type="button" class="btn btn-secondary" 
            onclick="location.href = 'admin-page.php'">Hủy bỏ</button>
        </div>
    </nav>
  </header>

  <div class="row" style="padding-left: 0px; margin-top: 20px;">
    <div class="col-sm-8">
      <form action="add-news.php" method="post">
      <?php echo display_error(); ?>
        <div class="form-group row">
          <label for="title" class="col-sm-4 col-form-label">Nhập tiêu đề:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="title" placeholder="Tiêu đề">
          </div>
        </div>
        <div class="form-group row">
          <label for="thumbnail" class="col-sm-4 col-form-label">Đường link ảnh tiêu đề:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="thumbnail" placeholder="Link"> 
          </div>
        </div>
        <div class="form-group row">
          <label for="content" class="col-sm-4 col-form-label">Nhập nội dung:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="content" placeholder="Nội dung">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <button type="submit" class="btn" name="add_btn">Đăng lên</button>
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

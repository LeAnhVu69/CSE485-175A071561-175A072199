<?php                                                                       
  session_start();
  if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1)){
    header("Location: login.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Danh sách thành viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>

<body>
  <div class="container" style="margin-top:30px">
    <div class="row" style="padding-left: 0px;">
      <div class="col-sm-8">
        <h2 class="text-center">Danh sách người dùng đã đăng ký:</h2>
        <?php 
        require ("process_admin_view_users.php");
        ?>
      </div>
    </div>
  </div>
</body>
</html>

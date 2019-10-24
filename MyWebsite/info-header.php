<?php  if (isset($_SESSION['user'])) : ?>
  <?php
    $url = ($_SESSION['user']['user_type'] === 'admin') ? 'admin-page.php' : 'members-page.php';  
  ?>   
<?php endif ?>
<div class="col-sm-3">
  <img class="float-left" src="images/logo_ntt.png" alt="Logo"> 
</div>
<div class="col-sm-7">
  <h1 class="blue-text mb-4 font-bold">Thông tin</h1>
</div>
<nav class="col-sm-2">
	<div class="btn-group-vertical btn-group-sm" role="group" aria-label="Button Group">
        <button type="button" class="btn btn-secondary" 
         onclick="location.href = 'info-change.php'">Đổi thông tin</button>  
        <button type="button" class="btn btn-secondary" 
         onclick="location.href = '<?php echo $url ?>'">Quay lại</button>
    </div>
</nav>

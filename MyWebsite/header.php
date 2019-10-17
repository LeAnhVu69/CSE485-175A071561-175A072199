<div class="container">
    <div class="h-wrapper">
        <button class="btn btn-thead hidden-lg-up" data-toggle="collapse" data-target="#thead">
                <i class="fa fa-bars"></i>
        </button>
        <div class="d-lg-flex justify-content-between" id="thead">
            <div class="hotline text-md-left">  
                <div class="h-title">Hotline:</div>
                <a href="#">0902.298.300</a> 
            </div>
            <nav class="hnav col-lg-6">
                <ul class="d-lg-flex justify-content-between">
                    <li><a href="#">Sinh viên</a></li>
                    <li><a href="#">Giảng viên</a></li>
                    <li><a href="#">Đào tạo quốc tế</a></li>
                </ul>
            </nav>
            <div class="col-lg-2">
                <?php  if (isset($_SESSION['user'])) : ?>
                    <div style="color: #fff">
                        Xin chào: <?php echo $_SESSION['user']['username']; ?>
                        <i style="color: red;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                    </div>
				<?php endif ?>
            </div>
        </div>
    </div>
    <div class="search-wrapper d-flex justify-content-between">
        <div class="search">
            <form action="#">
                <div class="input-group">
                    <input class="form-control" placeholder="Tìm kiếm thông tin">
                    <span class="input-group-btn">
                        <button class="btn btn-transparent">
                        <i class="fa fa-search"aria-hidden="true"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <nav class="col-sm-4">
            <div class="btn-group btn-group-sm" role="group" aria-label="Button Group">
                <button type="button" class="btn btn-secondary" onclick="location.href = 'login.php'" >Đăng nhập</button>
                <button type="button" class="btn btn-secondary" onclick="location.href = 'register-page.php'">Đăng ký</button>
            </div>
        </nav>
        <div class="language" style="margin-right: 50px; margin-top: 5px;">
            <a class="text-center" href="#">
                <img src="images/flag.jpg" alt=""></a>
        </div>
    </div>
</div>
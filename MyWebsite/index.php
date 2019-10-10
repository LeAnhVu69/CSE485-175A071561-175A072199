<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
    <title>Trường Đại Học Nguyễn Tất Thành - NTTU</title>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="slick-1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
</head>
<body>
    <header class="top-header">
        <?php
            include ('header.php');
        ?>
    </header>

    <?php
        include ('main-header.php');
    ?>

    <?php
        include ('menu.php');
    ?>

<main>
    <div class="container">
        <div class="row">
            <section id="content">
                <?php
                    include ('main-slideshow.php');
                ?>
            <div class="d-md-flex section">
                <?php
                    include ('news1-tintuc.php');
                ?>
                <?php
                    include ('news1-media.php');
                ?>
            </div>
                <?php
                    include ('sub-slideshow1.php');
                ?>

            <div class="section d-md-flex border-top">
                <div class="col-lg-8">
                    <div class="row">
                        <?php
                            include ('news2-hoptacquocte.php');
                        ?>
                        <?php
                            include ('news2-moitruonghoctap.php');
                        ?>
                    </div>
                </div>
                <?php
                    include ('news2-sukien.php');
                ?>
            </div>
            </section>

        <?php
            include ('sub-slideshow2.php');
        ?>
        </div> <!-- row -->
    </div> <!-- container -->
</main>

<footer>
    <?php
        include ('top-foot.php');
    ?>

    <?php
        include ('bot-foot.php');
    ?>
</footer>

<script type="text/javascript" src="code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick-1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.slick-track').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            infinite: true,
            autoplay:true,
            autoplaySpeed: 2000,
            pauseOnHover: false
        })
        // $('.multi-slide').slick({
        //     infinite: true,
        //     slidesToShow: 3,
        //     slidesToScroll: 1
        // })
    })
</script>

</body>
</html>

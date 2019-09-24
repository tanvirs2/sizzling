<?php
include './config/config.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us || <?php echo $config['SITE_NAME']; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- All css files are included here. -->
    <?php include "header_script.php"; ?>
    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Body main wrapper start -->
<div class="wrapper fixed__footer">
    <?php include "header.php"; ?>
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">About Us</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">About Us</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Our Store Area -->
    <section class="htc__store__area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section__title section__title--2 text-center">
                        <h2 class="title__line">Welcome To Sizzling</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                        </p>
                    </div>
                    <div class="store__btn">
                        <a href="contact-us">contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Store Area -->
    <!-- Start Choose Us Area -->
    <section class="htc__choose__us__ares bg__white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="htc__choose__wrap bg__cat--4">
                        <h2 class="choose__title">Why Choose Us?</h2>
                        <div class="choose__container">
                            <div class="single__chooose">
                                <div class="choose__us">
                                    <div class="choose__icon">
                                        <span class="ti-truck"></span>
                                    </div>
                                    <div class="choose__details">
                                        <h4>Cash On Delivery</h4>
                                        <p>We provide 'Cash On Delivery' service inside Cumilla & Dhaka.</p>
                                    </div>
                                </div>
                                <div class="choose__us">
                                    <div class="choose__icon">
                                        <span class="ti-hear">৳</span>
                                    </div>
                                    <div class="choose__details">
                                        <h4>Affordable Price </h4>
                                        <p>We try to keep the product price as cheap as possible with quality assurance.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single__chooose">
                                <div class="choose__us">
                                    <div class="choose__icon">
                                        <span class="ti-reload"></span>
                                    </div>
                                    <div class="choose__details">
                                        <h4>Money Back Guarantee</h4>
                                        <p>If any problem found while receiving you can demand full refund.</p>
                                    </div>
                                </div>
                                <div class="choose__us">
                                    <div class="choose__icon">
                                        <span class="ti-time"></span>
                                    </div>
                                    <div class="choose__details">
                                        <h4>Support 24/7</h4>
                                        <p>We try to be online throughout the day.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Choose Us Area -->
    <!-- Start Our Team Area -->
    <section class="htc__team__area bg__white ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section__title section__title--2 text-center">
                        <h2 class="title__line">Our creative team</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="team__wrap clearfix mt--60">
                    <!-- Start Single Team -->
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="team foo">
                            <div class="team__thumb">
                                <a href="#">
                                    <img src="images/team/1.jpg" alt="Team Member 01">
                                </a>
                            </div>
                            <div class="team__bg__color"></div>
                            <div class="team__hover__info">
                                <div class="team__hover__action">
                                    <h2><a href="#">Team Member 01</a></h2>
                                    <ul class="social__icon">
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="team foo">
                            <div class="team__thumb">
                                <a href="#">
                                    <img src="images/team/1.jpg" alt="Team Member 01">
                                </a>
                            </div>
                            <div class="team__bg__color"></div>
                            <div class="team__hover__info">
                                <div class="team__hover__action">
                                    <h2><a href="#">Team Member 02</a></h2>
                                    <ul class="social__icon">
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="team foo">
                            <div class="team__thumb">
                                <a href="#">
                                    <img src="images/team/1.jpg" alt="Team Member 01">
                                </a>
                            </div>
                            <div class="team__bg__color"></div>
                            <div class="team__hover__info">
                                <div class="team__hover__action">
                                    <h2><a href="#">Team Member 03</a></h2>
                                    <ul class="social__icon">
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Team Area -->
    <!-- Start brand Area -->
    <div class="htc__brand__area bg__white ptb--100" style="background-color: #f4f4f4;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="text-align: center">Brands we work with</h2>
                    <ul class="brand__list">
                        <li><a href="#">
                                <img src="images/brand/Brand-17-KM-Jewelry.jpg" alt="brand images">
                            </a></li>
                        <li><a href="#">
                                <img src="images/brand/Brand-Inalis.jpg" alt="brand images">
                            </a></li>
                        <li><a href="#">
                                <img src="images/brand/Brand-Naviforce.jpg" alt="brand images">
                            </a></li>
                        <li><a href="#">
                                <img src="images/brand/Brand-Curren.jpg" alt="brand images">
                            </a></li>
                        <li class="hidden-sm"><a href="#">
                                <img src="images/brand/Brand-Sinobi.jpg" alt="brand images">
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End brand Area -->
    <!-- Start Footer Area -->
    <?php include "footer.php"; ?>
    <!-- End Footer Area -->
</div>
<?php include "footer_script.php"; ?>
</body>

</html>
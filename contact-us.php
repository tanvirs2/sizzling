<?php
include './config/config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $config['SITE_NAME']; ?> | Contact US</title>
    <meta name="description" content="Eighteen provides best online shopping experience in Comilla. Huge collection of men's watches - Top brands, Trendy, stylish jewellery collection from Tk. 80 - Earrings, bracelet, pendant, bangle set, rings">
    <meta name="keywords" content="Online jewellery shopping in Comilla, necklace, bracelet, pendant, women's fashion jewelry, women's fashion jewelry online, necklaces for womens, bracelets for women, earrings jewelry, quartz watches in bd, mens watch, led watch,wrist watch online, pendant necklace sets, fashionable jewelry for cheap">
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="author" content="Nazrul Kabir">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "header_script.php"; ?>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Body main wrapper start -->
<div class="wrapper fixed__footer">
    <!-- Start Header Style -->
    <?php include "header.php"; ?>
    <!-- End Offset Wrapper -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Contact US</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Contact US</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Contact Area -->
    <section class="htc__contact__area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="htc__contact__container">
                        <div class="htc__contact__address">
                            <h2 class="contact__title">contact info</h2>
                            <div class="contact__address__inner">
                                <!-- Start Single Adress -->
                                <div class="single__contact__address">
                                    <div class="contact__icon">
                                        <span class="ti-location-pin"></span>
                                    </div>
                                    <div class="contact__details">
                                        <p>Location : <br> 71, Chadwell Health Lane,
                                            Romford, RM6 4NP</p>
                                    </div>
                                </div>
                                <!-- End Single Adress -->
                            </div>
                            <div class="contact__address__inner">
                                <!-- Start Single Adress -->
                                <div class="single__contact__address">
                                    <div class="contact__icon">
                                        <span class="ti-mobile"></span>
                                    </div>
                                    <div class="contact__details">
                                        <p> Phone : <br><a href="#"> 020 8590 4858</a></p>
                                    </div>
                                </div>
                                <!-- End Single Adress -->
                                <!-- Start Single Adress -->
                                <div class="single__contact__address">
                                    <div class="contact__icon">
                                        <span class="ti-email"></span>
                                    </div>
                                    <div class="contact__details">
                                        <p> Mail :<br><a href="mailto:71sizzling@gmail.com">71sizzling@gmail.com</a></p>
                                    </div>
                                </div>
                                <!-- End Single Adress -->
                            </div>
                        </div>
                        <div class="contact-form-wrap">
                            <div class="contact-title">
                                <h2 class="contact__title">Get In Touch</h2>
                            </div>
                            <form id="contact-form" action="mail.php" method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="name" placeholder="Your Nme*">
                                        <input type="email" name="email" placeholder="Mail*">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box subject">
                                        <input type="text" name="subject" placeholder="Subject*">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="message"  placeholder="Massage*"></textarea>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="fv-btn">SEND</button>
                                </div>
                            </form>
                        </div>
                        <div class="form-output">
                            <!--                                <p class="form-messege"></p>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                    <div class="map-contacts">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Footer Area -->
    <?php include "footer.php" ?>
    <!-- End Footer Area -->
</div>
<?php include "footer_script.php" ?>
</body>

</html>
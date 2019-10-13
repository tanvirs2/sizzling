<?php
include './config/config.php';
$reservation_name = '';
$reservation_email = '';
$reservation_phone = '';
$reservation_date = '';
$reservation_time = '';
$reservation_message = '';
if (isset($_POST['btnReservation'])) {
    extract($_POST);
    if ($reservation_name == '') {
        $error = "Please provide your name";
    } elseif ($reservation_email == '') {
        $error = "Please provide your email address";
    } elseif ($reservation_phone == '') {
        $error = "Please provide your phone number";
    }  elseif ($reservation_date == '') {
        $error = "Please provide your reservation date";
    } else {
        $customArray = '';
        $customArray .= 'reservation_name = "' . $reservation_name . '"';
        $customArray .= ',reservation_email = "' . $reservation_email . '"';
        $customArray .= ',reservation_phone = "' . $reservation_phone . '"';
        $customArray .= ',reservation_date = "' . $reservation_date . '"';
        $customArray .= ',reservation_time = "' . $reservation_time . '"';
        $customArray .= ',reservation_message = "' . $reservation_message . '"';
        $sqlInsertProduct = "INSERT INTO tbl_reservation SET $customArray";
        $resultinsertProduct = mysqli_query($con, $sqlInsertProduct);
        if ($resultinsertProduct) {
            $success = "Thanks for your reservation";
        } else {
            $error = "Something went wrong.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Best Restaurant in Romford, Chadwell heath lane | Sizzling</title>
    <meta name="description" content="Best Restaurant in Romford, Chadwell heath lane | Sizzling">
    <meta name="keywords" content="Best Restaurant in Romford, Chadwell heath lane | Sizzling">
    <meta name="author" content="Nazrul Kabir">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link rel='stylesheet' href='assets/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/meanmenu.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/default.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/vc.css' type='text/css' media='all' />
    <link rel='stylesheet' href="assets/home/bootstrap-touch-slider.css" media="all">
    <link rel='stylesheet' href='assets/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/jquery.datetimepicker.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/mp-restaurant-menu.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/js_composer.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-css'  href='assets/css/owl.carousel.min.css' type='text/css' media='all' />
    <style id='redchili-responsive-inline-css' type='text/css'>
    </style>
    <style type="text/css" data-type="vc_shortcodes-custom-css">
        .vc_custom_1523637964233{padding-top:50px!important;background-color:#fff!important}.vc_custom_1523638559263{background-color:#565656!important}.wpb_text_column{background-color:#e7272d!important}.vc_custom_1521232609262{padding-top:70px!important;padding-bottom:50px!important;background-color:#373954!important}.vc_custom_1520280449423{padding-top:53px!important;padding-bottom:26px!important;background-color:#232323!important}.vc_custom_1520146415982{margin-bottom:0!important;padding-top:50px!important;padding-bottom:65px!important;background-image:url(assets/home/img/testimonial-background-1.jpg)!important}
        .vc_custom_1491372824650{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-image: url(assets/img/about1-bottom-back.png?id=337) !important;}.vc_custom_1497343404300{padding-top: 70px !important;padding-bottom: 70px !important;background-position: 0 0;background-repeat:-repeat;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>
<style>
    .main-text {
        position: absolute;
        top: 50%;
        width: 96.66666666666666%;
        color: #FFF;
    }

    .carousel-btns {
        margin-top: 2em;
    }

    .carousel-btns .btn {
        width: 150px;
    }
    #themeSlider img{max-height: 500px;width: 100%;}
    /*CONTROL*/
    .carousel-control {
        width: auto;
    }

    .carousel-control .icon-prev,
    .carousel-control .icon-next,
    .carousel-control .fa-chevron-left,
    .carousel-control .fa-chevron-right {
        position: absolute;
        top: 47%;
        right: 0;
        z-index: 5;
        display: inline-block;
        background-color: #000;
        width: 38px;
        height: 38px;
        line-height: 40px;
        font-size: 14px;
    }

    .carousel-control .icon-prev,
    .carousel-control .fa-chevron-left {
        left: 0;
    }

    .carousel-indicators li {
        width: 12px;
        height: 12px;
        margin: 0 1px;
        border: 2px solid #fff;
        opacity: .8;
    }

    .carousel-indicators .active {
        background-color: #28ace2;
        border-color: #28ace2;
    }

    .carousel-control .icon-prev, .carousel-control .fa-chevron-left,
    .carousel-control .icon-right, .carousel-control .fa-chevron-right {
        border-radius: 50px;
    }

    .carousel-control .icon-prev, .carousel-control .fa-chevron-left {
        left: 30px;
    }

    .carousel-control .icon-right, .carousel-control .fa-chevron-right {
        right: 30px;
    }
</style>
<body class="page-template-default page page-id-320 wls_gecko wls_windows header-style-1 has-topbar topbar-style-1 no-sidebar product-grid-view mprm-checkout mprm-page mprm-success mprm-failed-transaction wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
<div class="wrapper">
    <?php include 'header.php' ?>
    <div id="meanmenu"></div>
    <div class="container-fluid" style="padding-right: 0px;padding-left: 0px">
        <div id="themeSlider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                //Get Banner
                $countDiv = 0;
                $arrayBanner = array();
                $sqlbanner = "SELECT * FROM tbl_banner WHERE banner_status='Active' ORDER BY banner_id DESC";
                $resultBanner = mysqli_query($con, $sqlbanner);
                if ($resultBanner) {
                    while ($objBanner = mysqli_fetch_object($resultBanner)) {
                        $arrayBanner[] = $objBanner;
                    }
                } else {
                    $success = "Something went wrong!";
                }
                ?>
                <?php foreach ($arrayBanner AS $banner): ?>
                <div class="item <?php if ($countDiv == 0): ?> active <?php endif; ?>"">
                    <div class="imgOverlay"></div>
                    <div class="carousel-caption" style="padding-bottom:14%;">
                        <h1><?php echo $banner->banner_title;?></h1>
                    </div>
                <img src="<?php echo $config['IMAGE_UPLOAD_URL'] . '/banner/' . $banner->banner_image; ?>" class="img-responsive" alt="<?php echo $banner->banner_title; ?>">
                </div>
            <?php $countDiv++; ?>
            <?php endforeach; ?>
            </div>
            <a class="left carousel-control" href="#themeSlider" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
            </a>
            <a class="right carousel-control"href="#themeSlider" data-slide="next">
                <span class="fa fa-chevron-right"></span>
            </a>
            <div class="main-text">
                <div class="col-md-12 text-center">
                    <div class="clearfix"></div>
                    <div class="carousel-btns">

                        <a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-danger" href="order-online.php" style="background-color: #E7272D;">Order Online</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="wpb_wrapper">
                        <h2 style="text-align: center; color: #000;">Excellence &amp; Expertise with a touch of Brilliance</h2>
                    </div>
                    <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                    </div>
                    <div class="wpb_content_element ">
                        <div class="wpb_wrapper">
                            <p style="text-align: justify;">We sell peri-peri chicken, hot wings, Taste burgers, and Fish and chips. Our Recipe is unique and the taste is different than others.
                                <br>Come and try our yummy food.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="vc_row wpb_row vc_row-fluid vc_custom_1523637964233 vc_row-has-fill">
                    <div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill">
                        <div class="vc_column-inner vc_custom_1523638559263">
                            <div class="wpb_wrapper">
                                <div class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_zoomIn zoomIn vc_custom_1523638436533 wpb_start_animation animated">
                                    <figure class="wpb_wrapper vc_figure">
                                        <div class="vc_single_image-wrapper   vc_box_border_grey">
                                            <img class="vc_single_image-img " src="assets/home/img/Discount-on-collection.jpg" alt="CRISPY GARLIC MUSHROOM" width="400" height="289"></div>
                                    </figure>
                                </div>
                                <div class="wpb_text_column wpb_content_element wpb_fadeIn fadeIn vc_custom_1523638559263">
                                    <div class="wpb_wrapper">
                                        <h2 style="text-align: center; color: #fff;">10% Discount</h2>
                                        <p style="text-align: center; color: #fff;">On Collection Orders Over £10<br>
                                            (Excluding All Set Meals)</p>

                                    </div>
                                </div>
                                <div class="vc_btn3-container vc_btn3-center">
                                    <a href="order-online.php" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-danger">Get Discount</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill">
                        <div class="vc_column-inner vc_custom_1523638559263">
                            <div class="wpb_wrapper">
                                <div class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_zoomIn zoomIn wpb_start_animation animated">
                                    <figure class="wpb_wrapper vc_figure">
                                        <div class="vc_single_image-wrapper vc_box_border_grey"><img class="vc_single_image-img " src="assets/home/img/wine3-2.jpg" alt="Best Peri Peri Chicken in town"  width="400" height="289"></div>
                                    </figure>
                                </div>
                                <div class="wpb_text_column wpb_content_element  vc_custom_1520282286032">
                                    <div class="wpb_wrapper">
                                        <h2 style="text-align: center; color: #fff;">Peri Peri Chicken</h2>
                                        <p style="text-align: center; color: #fff;">One of the Best<br>
                                            Peri Peri in town</p>
                                    </div>
                                </div>
                                <div class="vc_btn3-container vc_btn3-center">
                                    <a href="order-online.php" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-danger">Get Offer</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill">
                        <div class="vc_column-inner vc_custom_1523638559263">
                            <div class="wpb_wrapper">
                                <div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_zoomIn zoomIn wpb_start_animation animated">

                                    <figure class="wpb_wrapper vc_figure">
                                        <div class="vc_single_image-wrapper   vc_box_border_grey"><img class="vc_single_image-img " src="assets/home/img/reserve-table.jpg" alt="reserve-table" width="400" height="289"></div>
                                    </figure>
                                </div>

                                <div class="wpb_text_column wpb_content_element  vc_custom_1520279939707">
                                    <div class="wpb_wrapper">
                                        <h2 style="text-align: center; color: #fff;">Reserve A Table</h2>
                                        <p style="text-align: center; color: #fff;">For Dinner And Enjoy A Sumptuous<br>
                                            Culinary Experience</p>

                                    </div>
                                </div>
                                <div class="vc_btn3-container vc_btn3-center">
                                    <a href="#reservation" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-danger">Reservation</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="vc_row wpb_row vc_row-fluid vc_custom_1521232609262 vc_row-has-fill">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="wpb_wrapper">
                            <h2 style="color: #ffffff;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal; text-transform: uppercase" class="vc_custom_heading">Having A Night In? </h2>
                            <h2 style="color: #ffffff;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal; text-transform: uppercase;" class="vc_custom_heading">Now You Can Order Online</h2>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="wpb_wrapper">
                            <div class="vc_btn3-container vc_btn3-center">
                                <a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-danger" href="order-online.php" title="">Order Online</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="vc_row wpb_row vc_row-fluid vc_custom_1520280449423 vc_row-has-fill" id="reservation">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner" style="padding-top: 0px;">
                            <div class="wpb_wrapper"><div class="rt-title-1 " data-color="#e7272d">
                                    <h2 class="title" style="color:#ffffff; font-size:48px;padding-bottom: 0px;">Book A Table</h2>
                                    <div class="sub-title-holder">
                                        <span class="subtitle-line-lt" style="border-color:#e7272d;"></span>
                                        <span class="subtitle-color" style="font-size:18px;color:#e7272d;" "="">Reserve Your Table</span>
                                        <span class="subtitle-line-rt" style="border-color:#e7272d;"></span>
                                    </div>
                                </div>
                                <div role="form" class="wpcf7" id="wpcf7-f278-p413-o1" dir="ltr" lang="en-US">
                                    <div class="screen-reader-response"></div>
                                    <form method="post" class="wpcf7-form">
                                        <div class="table-reservation1-area">
                                            <h3>Opening Hours<br>
                                                12:00 pm - 2:00 pm / 5:30 pm - 11:00 pm</h3>
                                            <div class="reservation-form">
                                                <div class="row">
                                                    <?php include "message.php"; ?>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <div class="reservation-input-box">
                                                                        <span class="wpcf7-form-control-wrap name-89">
                                                                            <input name="reservation_name" value="<?php echo $reservation_name; ?>" size="40" class="wpcf7-form-control wpcf7-text form-control" id="reservation_name" placeholder="Name" type="text" required="required"></span></div></div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <div class="reservation-input-box">
                                                                        <span class="wpcf7-form-control-wrap email">
                                                                            <input name="reservation_email" value="<?php echo $reservation_email; ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" id="reservation_email"  placeholder="Email" type="email"></span></div></div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <div class="reservation-input-box"><span class="wpcf7-form-control-wrap tel"><input name="reservation_phone" value="<?php echo $reservation_phone; ?>" size="40" class="wpcf7-form-control form-control" id="$reservation_phone" placeholder="Phone" type="tel" required="required" ></span></div></div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <div class="reservation-input-box"><i class="fa fa-calendar" aria-hidden="true"></i>
                                                            <span class=""><input value="<?php echo $reservation_date; ?>" class="wpcf7-form-control form-control rt-date" id="reservation_date" name="reservation_date" type="text" required="required"></span></div>
                                                    </div></div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <div class="reservation-input-box"><i class="fa fa-clock-o" aria-hidden="true"></i><span class="wpcf7-form-control-wrap time"><input name="reservation_time" value="<?php echo $reservation_time; ?>" size="40" class="wpcf7-form-control wpcf7-text form-control rt-time" id="reservation_time" required="required" placeholder="Time" type="text"></span></div></div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="reservation-input-box"><span class="wpcf7-form-control-wrap textarea">
                                                                            <textarea name="reservation_message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" id="reservation_message" aria-required="true" aria-invalid="false" placeholder="Message">
                                                                                <?php echo $reservation_message;     ?>
                                                                            </textarea></span></div></div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                        <div class="reservation-input-box mb-tab-0">
                                                            <button class="btn-send-message disabled" type="submit" name="btnReservation" id="btnReservation" style="padding: 14px 71px;">Book A Table</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="vc_row wpb_row vc_row-fluid vc_custom_1520146415982 vc_row-has-fill">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner" style="padding-top: 0px;">
                            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
                                <div class="testimonial4_header">
                                    <h4>what our clients are saying</h4>
                                </div>
                                <?php
                                $arrayReview = array();
                                $sqlReview = "SELECT * FROM tbl_review WHERE review_status='Active' ORDER BY review_id DESC";
                                $resultReview = mysqli_query($con, $sqlReview);
                                if ($resultReview) {
                                    while ($objReview = mysqli_fetch_object($resultReview)) {
                                        $arrayReview[] = $objReview;
                                    }
                                } else {

                                }
                                ?>
                                <?php $countDiv = 0; ?>
                                <div class="carousel-inner" role="listbox">
                                    <?php foreach ($arrayReview AS $review): ?>
                                        <div class="item <?php if ($countDiv == 0): ?> active <?php endif; ?>">
                                            <div class="testimonial4_slide">
                                                <p><?php echo $review->review_text; ?></p>
                                                <h4><?php echo $review->review_name; ?></h4>
                                            </div>
                                        </div>
                                        <?php $countDiv++; ?>
                                    <?php endforeach; ?>
                                </div>
                                <a class="left carousel-control" href="#testimonial4" role="button" data-slide="prev">
                                    <span class="fa fa-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#testimonial4" role="button" data-slide="next">
                                    <span class="fa fa-chevron-right"></span>
                                </a>
                            </div>
                            <div class="vc_btn3-container vc_btn3-center">
                                <a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-danger" href="submit-review.php" title="">Submit review</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php include 'footer.php' ?>
        <a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
        <script>
            var baseUrl = '<?php echo baseUrl(); ?>';
        </script>
        <script type='text/javascript' src='assets/js/jquery-2.2.4.min.js'></script>
        <script type='text/javascript' src='assets/js/jquery-migrate.min.js'></script>
        <link rel='stylesheet' id='owl-theme-default-css'  href='assets/css/owl.theme.default.min.css' type='text/css' media='all' />
        <script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>
        <script src="assets/home/bootstrap-touch-slider.js"></script>
        <script type='text/javascript' src='assets/js/jquery.meanmenu.min.js?ver=2.3'></script>
        <script type='text/javascript' src='assets/js/jquery.nav.min.js?ver=2.3'></script>
        <script type='text/javascript' src='assets/js/isotope.pkgd.min.js?ver=2.3'></script>
        <script type='text/javascript' src='assets/js/jquery.counterup.min.js?ver=2.3'></script>
        <script type='text/javascript' src='assets/js/waypoints.min.js?ver=5.4.5'></script>
        <script type='text/javascript' src='assets/js/jquery.datetimepicker.full.min.js?ver=2.3'></script>
        <script type='text/javascript' src='assets/js/js_composer_front.min.js?ver=5.4.5'></script>
        <script type='text/javascript' src='assets/js/custom_script.js'></script>
        <script type="text/javascript">
            $('#bootstrap-touch-slider').bsTouchSlider();
        </script>
        <script type='text/javascript' src='assets/js/owl.carousel.min.js?ver=2.3'></script>
        <script type='text/javascript' src='assets/js/main.js?ver=2.3'></script>
        <?php include "footer_script.php"; ?>
</body>
</html>
<?php
include './config/config.php';
include './library/email/class.phpmailer.php';
$mail = new PHPMailer();
$subTotal = 0;
$discounted_total = 0;
$discount = 0;
$arrayTempCart = array();
$totalProduct = 0;
$totalPrice = 0;

// confirm order
if (getSession('user_id') > 0) {
    $user_id =  getSession('user_id');
    $sql1 = "SELECT * FROM tbl_user WHERE user_id = $user_id";
    $res_user = mysqli_query($con, $sql1);
    if ($res_user) {
        while ($obj_user = mysqli_fetch_object($res_user)) {
            $phoneNo = $obj_user->user_mobile;
            $email = $obj_user->user_email;
            $name = explode(' ',trim($obj_user->user_name));
            $firstname = $name[0];
            $lastname = $name[1];
            $order_ship_address = $obj_user->user_address;
            $order_phone = $obj_user->user_mobile;
            $order_name = $obj_user->user_name;
            $order_user_id = $user_id;
            $email = $obj_user->user_email;
        }
    }

} else{
    $firstname = '';
    $lastname = '';
    $phoneNo = '';
    $email = '';
    $order_ship_address = '';
    $order_phone = '';
    $order_zip = '';
    $order_name = '';
    $order_user_id = '';
}
$order_track_no = '';
$order_session_id = session_id();
$order_payment_method = '';
$order_created_on = date('Y-m-d H:i:s');
$order_total_quantity = '';
$order_delivery_charge = '';
$order_amount = '';
$order_notes = '';
$order_status = 'Received';
$checkboxes = '';
//
$sqlTempCart = "SELECT tbl_temp_order.*,tbl_product.*,SUM(temp_order_product_qty) AS totalProduct, SUM(temp_order_product_price) AS totalPrice"
    . " FROM tbl_temp_order"
    . " LEFT JOIN tbl_product ON tbl_temp_order.temp_order_product_id = tbl_product.product_id"
    . " WHERE temp_order_session_id='" . session_id() . "'";
$resultTempCart = mysqli_query($con, $sqlTempCart);

if ($resultTempCart) {
    while ($objTempCart = mysqli_fetch_object($resultTempCart)) {
        $arrayTempCart[] = $objTempCart;
        $subTotal += ($objTempCart->temp_order_product_price * $objTempCart->temp_order_product_qty);
        $totalProduct = $objTempCart->totalProduct;
        $totalPrice = $objTempCart->totalPrice;
    }
}
if (isset($_POST['btnConfirmOrderSubmit'])) {
    extract($_POST);
//    debug($_POST);
    $order_track_no = randCode(10);
    if ($order_phone == '') {
        $error = "Please provide your phone number";
    } elseif (empty($order_ship_address)) {
        $error = "Please provide your address";
    } elseif (empty($order_zip)) {
        $error = "Please provide your zip code";
    }else {

        $order_amount = str_replace(",", "", $order_amount);

        $insertOrder = '';
        if($discount != 0){
            $insertOrder .= 'order_amount = "' . $discounted_total . '"';
        } else {
            $insertOrder .= 'order_amount = "' . $order_amount . '"';
        }
        $insertOrder .= ',order_name = "' . $firstname . ' ' . $lastname . '"';
        $insertOrder .= ',order_delivery_charge = "' . $order_delivery_charge . '"';
        $insertOrder .= ',order_phone = "' . $order_phone . '"';
        $insertOrder .= ',order_total_quantity = "' . $order_total_quantity . '"';
        $insertOrder .= ',order_created_on = "' . $order_created_on . '"';
        $insertOrder .= ',order_status = "' . $order_status . '"';
        $insertOrder .= ',order_ship_address = "' . $order_ship_address . ' ' . $order_zip . '"';
        $insertOrder .= ',order_payment_method = "' . $_SESSION["order_delivery_method"] . '"';
        $insertOrder .= ',order_session_id = "' . $order_session_id . '"';
        $insertOrder .= ',order_track_no = "' . $order_track_no . '"';
        $insertOrder .= ',order_notes = "' . $order_notes . '"';

        if (getSession('user_id') > 0) {
            $order_user_id = getSession('user_id');
            $insertOrder .= ',order_user_id = "' . $order_user_id . '"';
        } else {
            $order_user_id = 0;
            $insertOrder .= ',order_user_id = "' . $order_user_id . '"';
        }

        $sqlInsertOrder = "INSERT INTO tbl_order SET $insertOrder";
        $resultInsertOrder = mysqli_query($con, $sqlInsertOrder);
        $id = mysqli_insert_id($con);
        if ($resultInsertOrder) {
            $lastID = mysqli_insert_id($con);
            $sql1 = "SELECT * FROM tbl_temp_order WHERE temp_order_session_id='$order_session_id'";
            $res1 = mysqli_query($con, $sql1);
            if ($res1) {
                while ($obj1 = mysqli_fetch_object($res1)) {
                    $array1[] = $obj1;
                }
            }
            foreach ($array1 AS $cart) {
                $insertOrderDetails = '';
                $insertOrderDetails .= 'order_details_order_id = "' . $lastID . '"';
                $insertOrderDetails .= ',order_details_product_id = "' . $cart->temp_order_product_id . '"';
                $insertOrderDetails .= ',order_details_product_quantity = "' . $cart->temp_order_product_qty . '"';
                $insertOrderDetails .= ',order_details_product_price = "' . $cart->temp_order_product_price . '"';
                $insertOrderDetails .= ',order_details_session_id = "' . $cart->temp_order_session_id . '"';
                $sqlInsertOrderDetails = "INSERT INTO tbl_order_details SET $insertOrderDetails";
                $resultInsertOrderDetails = mysqli_query($con, $sqlInsertOrderDetails);
                $flag = 0;
            }
            if ($flag === 0) {
                $sqlDel = "DELETE FROM tbl_temp_order WHERE temp_order_session_id='$order_session_id'";
                $resDel = mysqli_query($con, $sqlDel);
                if ($resDel) {
                    $user_email = "info@aangon.com";
                    $user_name = "ADMIN";
                    $EmailBody = file_get_contents(baseUrl('email/body/order_email.php?id=' . $id));
                    $mail->setFrom('order@aangon.com', 'Sizzling Online Ordering System');
                    $mail->addReplyTo('order@aangon.com', 'Sizzling Online Ordering System');
                    $mail->addAddress($user_email, $user_name);
                    $mail->Subject = 'Sizzling Online Ordering System Notification';
                    $mail->msgHTML($EmailBody);
                    $mail->AltBody = 'This is a plain text message body';
                    if ($mail->send()) {
                        $success = "Order Received Successfully. Order ID - " . $order_track_no;
                    } else {
                        $success = "Order Received Successfully. Order ID - " . $order_track_no;
                    }
                } else {
                    $error = "Alas! Something went wrong. Please try again.1";
                }
            } else {
                $error = "Something went wrong. Please try again.2";
            }
        } else {
            $error = "Something went wrong. Please try again.3";
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
    <title>Checkout &#8211; Sizzling</title>
    <link rel='stylesheet' href='assets/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/meanmenu.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/default.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/vc.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/mp-restaurant-menu.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/js_composer.min.css' type='text/css' media='all' />
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <style id='redchili-responsive-inline-css' type='text/css'>
        .mean-container .mean-nav ul li a,.site-header .main-navigation ul li ul li a{font-family:Oswald,sans-serif;line-height:21px;font-size:14px;font-weight:400;font-style:normal}ul{list-style:none;margin:0;padding:0}blockquote{border-color:#e7272d}#tophead .tophead-address .fa,#tophead .tophead-contact .fa,#tophead .tophead-social li a:hover{color:#e7272d}#tophead{background-color:#222}#respond form .btn-send:hover,.breadcrumb-area .entry-breadcrumb,.entry-header .entry-meta,.entry-summary a.read-more:active,.entry-summary a.read-more:hover,.error-page-area .error-page-message .home-page a,.header-icon-area .cart-icon-area .cart-icon-num,.header-style-5 .header-menu-btn,.rdtheme-button-1 a:hover,.rdtheme-primary-bgcolor,.redchili-primary-bgcolor,.search-form .custom-search-input button.btn,.sidebar-widget-area .widget h3:after,.site-header .main-navigation ul li ul li,.site-header .main-navigation ul li ul li:hover,.site-header .main-navigation ul li.mega-menu>ul.sub-menu,.vc-post-slider .date,.widget_redchili_about ul li a,.wpcf7 .submit-button,button,input[type=button],input[type=reset],input[type=submit]{background-color:#e7272d}.site-header .main-navigation ul li a.active{color:#ee2!important}.trheader.non-stick .additional-menu-area a.side-menu-trigger,.trheader.non-stick .header-icon-area .cart-icon-area>a,.trheader.non-stick .header-icon-seperator,.trheader.non-stick .site-header .main-navigation ul.menu>li>a,.trheader.non-stick .site-header .search-box .search-button i{color:#fff}.bottomBorder{border-bottom:2px solid #e7272d}.site-header .main-navigation ul li ul li a{color:#fff;letter-spacing:1px;text-transform:uppercase}.site-header .main-navigation ul li ul li:hover>a{color:#071041}.stick .site-header{border-color:#e7272d}.mean-container .mean-bar,.site-header .search-box .search-text{border-color:#ee2}.site-header .main-navigation ul li.mega-menu ul.sub-menu li a{color:#fff}.site-header .main-navigation ul li.mega-menu ul.sub-menu li a:hover{background-color:#e7272d;color:#071041}.mean-container .mean-nav ul li a{color:#000}.additional-menu-area a.side-menu-trigger:hover,.header-style-3 .header-contact .fa,.header-style-3 .header-social li a:hover,.header-style-3.trheader .header-social li a:hover,.mean-container .mean-nav ul li a:hover,.mean-container .mean-nav>ul>li.current-menu-item>a,.trheader.non-stick .additional-menu-area a.side-menu-trigger:hover{color:#ee2}.header-style-3.trheader .header-contact li a,.header-style-3.trheader .header-social li a{color:#fff}.header-style-4 .header-contact .fa,.header-style-4 .header-social li a:hover,.header-style-4.trheader .header-social li a:hover{color:#ee2}.header-style-4.trheader .header-contact li a,.header-style-4.trheader .header-social li a,.trheader.non-stick.header-style-5 .header-menu-btn{color:#fff}#respond form .btn-send,#tophead .tophead-contact .fa,#tophead .tophead-social li a:hover,.cart-icon-products .widget_shopping_cart .mini_cart_item a:hover,.class-footer ul li .fa,.comments-area .main-comments .comments-body .replay-area a i,.comments-area .main-comments .comments-body .replay-area a:hover,.entry-header-single .entry-meta ul li .fa,.entry-summary h3 a:active,.entry-summary h3 a:hover,.infobox-style2 i,.rdtheme-primary-color,.redchili-primary-color,.sidebar-widget-area .widget_redchili_address ul li a:active,.sidebar-widget-area .widget_redchili_address ul li a:hover,.sidebar-widget-area ul li a:hover,.widget_redchili_about ul li a:hover,.widget_redchili_address ul li a:active,.widget_redchili_address ul li a:hover,.widget_redchili_address ul li i,.wpcf7 label.control-label .fa,a:link,a:visited{color:#e7272d}.widget .tagcloud a:hover{border:1px solid #e7272d},#respond form .btn-send,.entry-summary a.read-more:link,.entry-summary a.read-more:visited,.scrollToTop,.site-header .search-box .search-text,.stick,blockquote{border-color:#e7272d}a:active,a:focus,a:hover{color:#d32f2f}.search-form .custom-search-input button.btn:hover,.widget .tagcloud a:hover{background-color:#d32f2f}.entry-banner .entry-banner-content h1,.inner-page-banner-area .pagination-area h1{color:#fff}.inner-page-banner-area .pagination-area .redchili-pagination span a{color:#efefef}.inner-page-banner-area .pagination-area .redchili-pagination span a:hover{color:#fff}.inner-page-banner-area .pagination-area .redchili-pagination{color:#efefef}.inner-page-banner-area .pagination-area .redchili-pagination>span:last-child{color:#e7272d}.fmp-load-more button{border:2px solid #e7272d!important;color:#e7272d!important}.fmp-utility .fmp-load-more button:hover{background-color:#e7272d!important;color:#fff!important;border:2px solid #e7272d!important}.pagination-area ul li .current,.pagination-area ul li a:hover,.pagination-area ul li.active a{background-color:#e7272d;border-color:#e7272d}.pagination-area ul li a,.pagination-area ul li span{border:1px solid #e7272d}.footer-area-top{background-color:#151515}.footer-area-bottom,.ls-bar-timer,.rt-wpls .wpls-carousel .slick-next,.rt-wpls .wpls-carousel .slick-prev{background-color:#e7272d}.footer-area-top,.footer-area-top .opening-schedule li,.footer-area-top .widget .tagcloud a,.footer-area-top .widget h4 a,.footer-area-top .widget li a{color:#d7d7d7}.footer-area-top .widget h3{color:#fff}.footer-area-bottom p a:hover,.footer-area-top .textwidget a:hover,.footer-area-top .widget a:hover,.footer-area-top .widget li a:hover{color:#e7272d}.footer-area-bottom p,.footer-area-bottom p a{color:#fff}.footer-area-top .footer-social li a{background:#e7272d}.archives ul li a:hover,.categories ul li a i,.categories ul li a:hover .archives ul li span span,.footer-area-top .footer-social li a:hover i,.rc-sidebar .opening-schedule li span.os-close,.rc-sidebar h4 a:hover,.recent-recipes .media-body h3 a:hover,.widget ul li a i,.widget ul li a:hover,.widget ul li::before,.widget_archive ul li a:hover,.widget_archive ul li span span,.widget_categories ul li a i,.widget_categories ul li a:hover{color:#e7272d}body{font-family:Roboto Slab,sans-serif;font-size:14px;line-height:24px;margin:0 auto}h1{font-family:Oswald;font-size:40px;line-height:44px}.fmp-layout-isotope-redchili-home button,.trheader .header-area h2,h2,h3,h4,h5,h6{font-family:Oswald,sans-serif}h2{font-size:28px;line-height:31px}h3{font-size:20px;line-height:26px}h4{font-size:16px;line-height:18px}h5{font-size:14px;line-height:16px}h6{font-size:12px;line-height:14px}.content-area{padding-top:80px;padding-bottom:50px}.ls-bar-timer{border-bottom-color:#e7272d}.fmp-layout-custom-grid-by-cat1 .card-menu-price .fmp-layout-custom-grid-by-cat2 .amount,.fmp-layout-custom-grid-by-cat2 .fmp-price,.fmp-layout-custom-grid-by-cat3 .card-menu-price,.fmp-layout-custom-grid-by-cat3 .card-menu-price .amount,.fmp-layout-custom-isotope-redchili-2 ul li a:hover,.food-menu-title span i:before,.food-menu2-area .food-menu2-box .food-menu2-img-holder .food-menu2-more-holder ul li a,.food-menu2-area .food-menu2-box .food-menu2-img-holder .food-menu2-more-holder ul li a:hover,.tasty-menu-inner ul li .media-body .amount,.tasty-menu-inner ul li .media-body .card-menu-price{color:#e7272d!important}.fmp-layout3 .fmp-info h3 a:hover,.single-menu-area .single-menu-inner .single-menu-inner-content .price,.wrapper .fmp-layout3 .fmp-box .fmp-title h3:hover{color:#e7272d}.fmp-layout-carousel3 .amount,.fmp-layout-carousel3 .fmp-price,.fmp-layout-custom-isotope-redchili .isotop-price,.food-menu-title span:before,.food-menu3-area .food-menu3-box .food-menu3-box-content .food-menu-price,.food-menu4-area .food-menu4-box span.amount,.single-menu-area .single-menu-inner .related-products .food-menu2-box .food-menu2-title-holder .fmp-price{background:#e7272d!important}.fmp-layout-custom-isotope-redchili .isotop-price,.food-menu2-area .food-menu2-box .food-menu2-title-holder .isotop-price-2,.food-menu4-area .food-menu4-box .fmp-price{background-color:#e7272d!important}.food-menu-title span:after,.food-menu3-area .food-menu3-box .food-menu3-box-content .food-menu-price,.food-menu3-area .food-menu3-box .food-menu3-box-img a:hover i{background:#e7272d}.food-menu3-area .food-menu3-box .food-menu3-box-content .food-menu-price:after{border-color:transparent #e7272d}.fmp-layout-custom-grid-by-cat2 h3.fmp-title a{color:#000}.fmp-layout-custom-grid-by-cat2 h3.fmp-title a:hover,.isotope-home h3 a:hover{color:#e7272d}.fmp-wrapper .fmp-title h3 a:hover,.food-menu1-area .food-menu1-box ul li .media-body h3 a:hover,.food-menu3-area .food-menu3-box .food-menu3-box-content h3 a:hover,.isotope-home h4 a:hover,.tasty-menu-inner ul li .media-body h3 a:hover{color:#e7272d!important}.other-menu .owl-custom-nav .owl-next,.other-menu .owl-custom-nav .owl-prev,.rt-owl-nav-3 .owl-custom-nav .owl-next,.rt-owl-nav-3 .owl-custom-nav .owl-prev{background-color:#e7272d}.fmp-pagination ul.pagination-list li a,.fmp-pagination ul.pagination-list li span{background:0 0;color:#e7272d!important;border:1px solid #e7272d!important}.fmp-pagination ul.pagination-list li a:hover,.fmp-pagination ul.pagination-list li span:hover,.fmp-pagination ul.pagination-list li.active span{background:#e7272d!important;color:#fff!important;border:1px solid #e7272d!important}.fmp-layout-carousel3 .fmp-title a.ghost-semi-color-btn{border:2px solid #e7272d!important}.fmp .title-bar-small-center::before{background-color:#e7272d!important}.fmp-layout-carousel3 .owl-controls .owl-dots .active span,.fmp-layout-carousel3 .owl-nav .owl-next,.fmp-layout-carousel3 .owl-nav .owl-prev{border:1px solid #e7272d!important}.content-box2 .content-box2-bottom-content-holder h3 a:hover,.recipe-serving i,.single-recipe-area .single-recipe-inner .tools-bar li a i,.single-recipe-area .single-recipe-inner .tools-bar li a:hover,.single-recipe-area .single-recipe-inner .tools-bar li span,.single-recipe-area .tools-bar li:last-child i{color:#e7272d}.single-recipe-area .single-recipe-inner .ingredients-box ul li i{background-color:#e7272d}.title-recipe:before{background:#e7272d},.owl-controls .owl-prev .owl-controls .owl-next{border:1px solid #e7272d},.owl-controls .owl-next:hover .owl-controls .owl-prev:hover{background:#e7272d!important}.scrollToTop,.woocommerce #respond input#submit,.woocommerce #respond input#submit.alt,.woocommerce #respond input#submit.disabled:hover,.woocommerce #respond input#submit:disabled:hover,.woocommerce #respond input#submit[disabled]:disabled:hover,.woocommerce a.added_to_cart,.woocommerce a.button,.woocommerce a.button.alt,.woocommerce a.button.disabled:hover,.woocommerce a.button:disabled:hover,.woocommerce a.button[disabled]:disabled:hover,.woocommerce button.button,.woocommerce button.button.alt,.woocommerce button.button.disabled:hover,.woocommerce button.button:disabled:hover,.woocommerce button.button[disabled]:disabled:hover,.woocommerce div.product form.cart .button,.woocommerce input.button,.woocommerce input.button.alt,.woocommerce input.button.disabled:hover,.woocommerce input.button:disabled:hover,.woocommerce input.button[disabled]:disabled:hover,.woocommerce span.onsale,.woocommerce ul.products li.product .onsale,.woocommerce-account .woocommerce-MyAccount-navigation ul li a,p.demo_store{background-color:#e7272d}.ghost-btn:hover{background:#e7272d;border:2px solid #e7272d}.ghost-color-btn,.ghost-color-btn-2{border:2px solid #e7272d;color:#e7272d}.ghost-color-btn i{color:#e7272d}.ghost-color-btn:hover{background:#e7272d}.ghost-text-color-btn{color:#e7272d}.ghost-text-color-btn:hover{border:2px solid #e7272d;background:#e7272d}.ghost-semi-color-btn:hover,.rc-sidebar .widget-title-bar:before,.title-bar-big-center:before,.title-bar-big-left-close:before,.title-bar-full-width:before,.title-bar-medium-left:before,.title-bar-small-center:before,.title-bar-small-left:before,.title-bar:after,.widget-title-bar:before{background:#e7272d}.subtitle-color,.title-small a:hover{color:#e7272d}#commentform #submit.ghost-on-hover-btn:hover,.contact-us-right .wpcf7-form-control.ghost-on-hover-btn:hover,.ghost-on-hover-btn:hover,.single-recipe-area .ghost-on-hover-btn,input.ghost-on-hover-btn,input.ghost-on-hover-btn:hover{border:2px solid #e7272d;color:#e7272d}.default-btn{background:#e7272d}.book-now-btn:hover,.table-reservation2-area input.book-now-btn:hover,.table-reservation3-area input.book-now-btn:hover{color:#e7272d}.table-reservation1-area .book-now-btn{border:1px solid #e7272d}#scrollUp:focus i,#scrollUp:hover i{color:#e7272d}.about-layout-two .about2-award-box .media a i:before,.about-layout-two .about2-top .about2-top-box h2 a:hover,.about-layout-two .about2-top .about2-top-box:hover i:before,.about-one-area .about-one-area-top h2 span,.about-page-left p span span{color:#e7272d}.about-page-right .owl-controls .owl-dots .active span{background:#e7272d}.rc-sidebar .opening-schedule li span.os-close,.stylish-input-group .input-group-addon button span{color:#e7272d}.about-one-area .title-bar-big-left:before{background:#e7272d}.blog-page-box ul li span,.content-area .entry-blog-post ul li span{color:#e7272d}.blog-page-box .rc-date,.content-area .entry-blog-post .rc-date,.content-area .single-blog-middle .single-blog-social li:hover{background:#e7272d}.content-area .single-blog-middle .single-blog-tag ul li a{color:#e7272d}.content-area .single-blog-middle .single-blog-tag ul li:hover{background:#e7272d;border:1px solid #e7272d}.content-area .single-blog-middle .single-blog-social li{border:1px solid #e7272d}.page-error-area .page-error-top{background:#e7272d}.contact-us-left ul>li>i{color:#e7272d}.contact-us-left ul>li .contact-social li:hover a{background:#e7272d;border:1px solid #e7272d}.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(1) .progress-bar,.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(2) .progress-bar,.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(3) .progress-bar,.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(4) .progress-bar,.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(5) .progress-bar{background:#e7272d}.single-chef-top-area .single-chef-top-content .single-chef-social li a{border:1px solid #e7272d}.event-social li:hover a,.single-chef-top-area .single-chef-top-content .single-chef-social li:hover a{border:1px solid #e7272d;background:#e7272d}.product-grid-view .woo-shop-top .view-mode ul li:first-child .fa,.product-list-view .woo-shop-top .view-mode ul li:last-child .fa,.table-reservation1-area .reservation-form .reservation-input-box i,.testimonial-style-4 .rc-icon-box::before,.woocommerce .product-thumb-area .product-info ul li a:hover .fa,.woocommerce a.woocommerce-review-link:hover,.woocommerce div.product .product-meta a:hover,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.woocommerce div.product p.price,.woocommerce div.product span.price,.woocommerce ul.products li.product .price,.woocommerce ul.products li.product h3 a:hover,.woocommerce-info::before,.woocommerce-message::before{color:#e7272d}.woocommerce-info,.woocommerce-message{border-color:#e7272d}.woocommerce .product-thumb-area .overlay{background-color:rgba(231,39,45,.8)}.rt-owl-dot-1 .owl-theme .owl-dots .owl-dot.active span,.rt-owl-dot-1 .owl-theme .owl-dots .owl-dot:hover span{background-color:#e7272d}.rt-title-1 .subtitle-color{color:#e7272d}.chef-area .owl-controls .owl-dots .active span,.chef-area .owl-nav .owl-next,.chef-area .owl-nav .owl-prev,.rt-owl-event-slider .owl-controls .owl-dots .active span,.rt-owl-event-slider .owl-nav .owl-next,.rt-owl-event-slider .owl-nav .owl-prev,.rt-owl-nav-2 .owl-nav .owl-next,.rt-owl-nav-2 .owl-nav .owl-prev{background-color:#e7272d!important}.chef-area .owl-nav .owl-next:hover,.chef-area .owl-nav .owl-prev:hover,.rt-owl-event-slider .owl-nav .owl-next:hover,.rt-owl-event-slider .owl-nav .owl-prev:hover,.rt-owl-nav-2 .owl-nav .owl-next:hover,.rt-owl-nav-2 .owl-nav .owl-prev:hover{border:1px solid #e7272d;background-color:transparent!important}.chef-box .chef-box-content,.chef-box .chef-box-content p:before,.chef-box .chef-box-content ul li:hover{background:#e7272d}.all-event-area .content-box2 .content-box2-bottom-content-holder ul li i,.chef-area .owl-nav .owl-next:hover i,.chef-area .owl-nav .owl-prev:hover i,.pagination-area ul li,.rt-owl-event-slider .content-box2 .content-box2-bottom-content-holder ul li i,.rt-owl-event-slider .owl-nav .owl-next:hover i,.rt-owl-event-slider .owl-nav .owl-prev:hover i,.rt-owl-nav-2 .owl-nav .owl-next:hover i,.rt-owl-nav-2 .owl-nav .owl-prev:hover i,.woocommerce nav.woocommerce-pagination ul li{color:#e7272d!important}.about2-award-box .icon-part i,.award1-area-box i,.chef-box .chef-box-content h3 a:hover,.client-reviews-area .client-reviews-right h2,.content-box2 .content-box2-bottom-content-holder ul li a i,.content-box2 .content-box2-bottom-content-holder ul li a:hover,.counter-right-1 i,.event-info ul li i,.fmp-layout-custom-grid-by-cat2 .menu-list li .food-menu-price table td:last-child,.fmp-layout-custom-grid-by-cat2 .menu-list li .food-menu-price table th:last-child,.fmp-layout-custom-grid-by-cat7 .menu-list li .food-menu-price table td:last-child,.fmp-layout-custom-grid-by-cat7 .menu-list li .food-menu-price table th:last-child,.recipe-of-the-day-area .owl-next i,.recipe-of-the-day-area .owl-prev i,.recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content .awards-box ul li a i,.recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content .time-needs li i,.recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content h2 a:hover{color:#e7272d}.recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content{border:5px solid #e7272d}.recipe-of-the-day-area .owl-controls .active span{background:#e7272d!important}.content-box2 .content-box2-img-holder:after{background-color:rgba(231,39,45,.8)}.chef-box .chef-sep,.owl-theme .owl-controls .owl-next,.owl-theme .owl-controls .owl-prev,.rt-owl-testimonial-2 .rt-vc-content{border-color:#e7272d}.event-social li a{border:1px solid #e7272d}.event-mark{border-bottom:35px solid #e7272d}.fmp-layout-carousel3 .owl-nav .owl-next:hover i,.fmp-layout-carousel3 .owl-nav .owl-prev:hover i,.infobox-style1-right h2 a:hover{color:#e7272d!important}.fmp-layout-carousel3 .owl-controls .owl-dots .active span,.fmp-layout-carousel3 .owl-nav .owl-next,.fmp-layout-carousel3 .owl-nav .owl-prev{background-color:#e7272d!important}.fmp-layout-carousel3 .owl-nav .owl-next:hover,.fmp-layout-carousel3 .owl-nav .owl-prev:hover{border:1px solid #e7272d;background-color:transparent!important}.fmp-isotope-buttons button.selected,.fmp-isotope-buttons button:hover{border:1px solid #e7272d;background-color:#e7272d}.info-box-1 i,.infobox-style2 i{color:#e7272d}.client-area .owl-controls .owl-dot:hover span{background:rgba(231,39,45,.5)!important}.client-area .owl-controls .active span,.wfmc-area .wfmc-layout-1 .fmp-price{background:#e7272d!important}#inner-isotope .ajax_add_to_cart.add_to_cart_button:hover,#inner-isotope .isotope-variable:hover,#inner-isotope .single_add_to_cart_button:hover,.wfmc-area .ajax_add_to_cart.add_to_cart_button:hover,.wfmc-area .isotope-variable:hover,.wfmc-area .owl-controls .owl-dots .active span,.wfmc-area .single_add_to_cart_button:hover,.wfmc-info-1 .button.add_to_cart_button:hover,.wfmc-info-1 .title-bar-small-center:before,.wfmc-layout-3 .rt-menu-price .woocommerce-Price-amount{background-color:#e7272d}.wfmc-info-1 .wfmc-title a:hover{color:#e7272d}.wfmc-info-1 .button.add_to_cart_button{border:2px solid #e7272d}.wfmc-area .owl-nav .owl-next,.wfmc-area .owl-nav .owl-prev{border:1px solid #e7272d}.wfmc-area .ajax_add_to_cart.add_to_cart_button,.wfmc-area .isotope-variable,.wfmc-area .single_add_to_cart_button{border:2px solid #e7272d}.wfmc-area .variations label{color:#e7272d}.wfmc-area .modal-dialog .single_add_to_cart_button.button.alt{border-color:#e7272d;color:#e7272d}#inner-isotope .fmp-iso-filter .current{background:#e7272d}#inner-isotope .ajax_add_to_cart.add_to_cart_button,#inner-isotope .isotope-variable,#inner-isotope .single_add_to_cart_button{border:2px solid #e7272d;color:#e7272d}#inner-isotope .variations label{color:#e7272d}.wfmc-layout-3 .ajax_add_to_cart.add_to_cart_button,.wfmc-layout-3 .isotope-variable,.wfmc-layout-3 .single_add_to_cart_button{border:2px solid #e7272d;color:#e7272d}.wfmc-layout-3 .ajax_add_to_cart.add_to_cart_button:hover,.wfmc-layout-3 .isotope-variable:hover,.wfmc-layout-3 .single_add_to_cart_button:hover{background-color:#e7272d;border:2px solid #e7272d}.wfmc-layout-3 .variations label{color:#e7272d}.wfmc-layout-3 .input-text.qty.text{border:2px solid #e7272d}.mean-container .mean-bar{width:100%;position:relative;background:#d22727;padding:4px 0;min-height:42px;z-index:999999;border-bottom:2px solid #fff}.mean-container .mean-nav ul li a.mean-expand,.mean-container a.meanmenu-reveal{color:#fff}.mean-container a.meanmenu-reveal span{background-color:#fff}.trheader.stickh .scrollToTop:after,.site-header .search-box .search-button i{color:#f7f7f7!important}.menu-main-menu-container .menu-main-menu ul li a{color:#fff!important}.trheader #tophead,.trheader #tophead .tophead-social li a,.trheader #tophead a{color:#fff;background-color:#000}.site-header .main-navigation ul.menu &gt; li &gt; a:hover,.site-header .main-navigation ul.menu &gt; li.current &gt; a,.site-header .main-navigation ul.menu &gt; li.current-menu-item &gt; a,.trheader.non-stick .site-header .main-navigation ul.menu &gt; li &gt; a:hover,.trheader.non-stick .site-header .main-navigation ul.menu &gt; li.current &gt; a .vc_custom_1496996398698,.trheader.non-stick .site-header .main-navigation ul.menu &gt; li.current-menu-item &gt; a{padding-top:53px!important}.trheader .header-area h2{font-size:28px;line-height:31px;color:#000}.wpb_single_image img:hover{-webkit-transform:scale(.9);-ms-transform:scale(.9);transform:scale(.9);transition:all ease-in .5s;border:3px solid #fff}.entry-banner{background:url(assets/img/banner.jpg) center center/cover no-repeat;height:120px}.inner-page-banner-area .pagination-area{position:relative;z-index:1;text-align:left;padding:5px}.cart-icon-num,.fa-shopping-cart,.header-icon-seperator{visibility:hidden}
    </style>
    <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1491372824650{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-image: url(assets/img/about1-bottom-back.png?id=337) !important;}.vc_custom_1497343404300{padding-top: 70px !important;padding-bottom: 70px !important;background-position: 0 0;background-repeat:-repeat;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>
<body class="page-template-default page page-id-320 wls_gecko wls_windows header-style-1 has-topbar topbar-style-1 no-sidebar product-grid-view mprm-checkout mprm-page mprm-success mprm-failed-transaction wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
<div class="wrapper">
    <?php include 'header.php' ?>
    <div id="meanmenu"></div>
    <div id="header-area-space"></div>
    <div class="inner-page-banner-area entry-banner">
        <div class="container">
            <div class="pagination-area">
                <h1>Checkout</h1>
                <div class="redchili-pagination"><!-- Breadcrumb NavXT 6.0.4 -->
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Sizzling." href="index.php" class="home"><span property="name">Sizzling</span></a><meta property="position" content="1"></span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name">Checkout</span><meta property="position" content="2"></span></div>							</div>
        </div>
    </div>
    <div class="content-area checkout-page-area">
        <div class="container">
            <?php include "message.php"; ?>
            <?php if (getSession('user_id') < 0): ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="checkout-page-top">
                            <p><i class="fa fa-check" aria-hidden="true"></i><a href="#" data-toggle="modal" data-target="#login-modal"> Returning customer? Click here to login</a></p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="checkout-page-top">
                            <p><i class="fa fa-check" aria-hidden="true"></i><a href="registration.php"> New customer? Click here to register</a></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <form class="reservation-form-select2" method="post" id="checkout">
                <?php
                $subTotal = 0;
                $arrayTempCart = array();
                $sqlTempCart = "SELECT tbl_temp_order.*,tbl_product.*"
                    . " FROM tbl_temp_order"
                    . " LEFT JOIN tbl_product ON tbl_temp_order.temp_order_product_id = tbl_product.product_id"
                    . " WHERE temp_order_session_id='" . session_id() . "'";
                $resultTempCart = mysqli_query($con, $sqlTempCart);

                if ($resultTempCart) {
                    while ($objTempCart = mysqli_fetch_object($resultTempCart)) {
                        $arrayTempCart[] = $objTempCart;
                        $subTotal += ($objTempCart->temp_order_product_price * $objTempCart->temp_order_product_qty);
                    }
                }
                ?>
                <input type="hidden" id="order_delivery_charge" name="order_delivery_charge" value="" />
                <input type="hidden" id="order_total_quantity" name="order_total_quantity" value="<?php echo $totalProduct; ?>" />
                <input type="hidden" id="order_location_id" name="order_location_id" value="" />
                <input type="hidden" id="order_amount" name="order_amount" value="<?php echo number_format($subTotal, 2); ?>" />
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="order-sheet">
                            <h2>Your Order <?php echo count($arrayTempCart) ?></h2>
                            <ul>
                                <?php if (count($arrayTempCart) > 0): ?>
                                    <?php foreach ($arrayTempCart AS $TempCart): ?>
                                        <li><?php echo $TempCart->product_title; ?><span>£<?php echo $TempCart->temp_order_product_price; ?></span></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <h3>Subtotal<span>£<?php echo number_format($subTotal, 2); ?></span></h3>
                            <?php if($discount != 0): ?>
                                <h3>Discount(10%)<span>-£<?php echo number_format($discount, 2); ?></span></h3>                            <h3>Total<span>£<?php echo number_format($discounted_total, 2); ?></span></h3>
                            <?php else: ?>
                                <h3>Total<span>£<?php echo number_format($subTotal, 2); ?></span></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--                    --><?php //include './message.php'; ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="billing-details-area">
                            <h2 class="cart-area-title">BILLING DETAILS</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="first-name">First Name <span style="color: red">*</span></label>
                                        <input id="firstname" name="firstname" class="form-control" type="text" required value="<?php echo $firstname; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="last-name">Last Name</label>
                                        <input id="lastname" name="lastname" class="form-control" type="text" value="<?php echo $lastname; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="email">E-mail Address</label>
                                        <input id="email" name="email" class="form-control" type="email" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="phone">Phone <span style="color: red">*</span></label>
                                        <input id="order_phone" name="order_phone" class="form-control" type="text" required value="<?php echo $phoneNo; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Address <span style="color: red">*</span></label>
                                        <textarea class="form-control" id="order_ship_address" name="order_ship_address" style="min-width: 100%" required><?php echo $order_ship_address; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label" for="town-city">Town / City</label>
                                        <input id="town-city" class="form-control" type="text">

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="postcode">Postcode / ZIP<span style="color: red">*</span></label>
                                        <input id="order_zip" name="order_zip" class="form-control" type="text" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ship-to-another-area">
                            <label class="control-label">Order Notes</label>
                            <textarea class="form-control" style="min-width: 100%" id="order_notes" name="order_notes"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pLace-order">
                            <button class="btn-send-message disabled" type="submit" name="btnConfirmOrderSubmit">PLace Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.php' ?>
</div>
<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
<script type='text/javascript' src='assets/js/jquery-2.2.4.min.js'></script>
<script>
    //    var baseUrl = '<?php //echo baseUrl(); ?>//';
</script>
<script type='text/javascript' src='assets/js/jquery-migrate.min.js'></script>
<link rel='stylesheet' id='owl-theme-default-css'  href='assets/css/owl.theme.default.min.css' type='text/css' media='all' />
<script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
<script type='text/javascript' src='assets/js/jquery.meanmenu.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/jquery.nav.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/isotope.pkgd.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/jquery.counterup.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/waypoints.min.js?ver=5.4.5'></script>
<script type='text/javascript' src='assets/js/jquery.datetimepicker.full.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/main.js?ver=2.3'></script>
<!--<script type='text/javascript' src='assets/js/chosen.jquery.min.js?ver=4.9.5'></script>-->
<script type='text/javascript' src='assets/js/js_composer_front.min.js?ver=5.4.5'></script>
<script type='text/javascript' src='assets/js/owl.carousel.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/custom_script.js'></script>
<?php include "footer_script.php"; ?>
</body>
</html>
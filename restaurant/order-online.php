<?php
include './config/config.php';
$order_delivery_method = '';
if (isset($_POST['btn_full'])) {
    extract($_POST);
    $_SESSION["order_delivery_method"] = $order_delivery_method;
    $link = "checkout.php";
    redirect($link);
}

$sql2 = "SELECT product_category_id,product_category_name FROM tbl_product_category WHERE product_category_status = 'Active'";
$array = array();
$result = mysqli_query($con, $sql2);
while ($categoryList = mysqli_fetch_object($result)) {
    $array[] = $categoryList;
}
//get category
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order Online &#8211; Sizzling</title>
    <!--    <link rel='dns-prefetch' href='//fonts.googleapis.com' />-->
    <link rel='dns-prefetch' href='//s.w.org' />
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
        .dish-img {max-height: 68px;}
        .product_option{width: 100%;background: #E7272D;color: white; margin-top: 2px;}
        .modal {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            display: none;
            overflow: hidden;
            -webkit-overflow-scrolling: touch;
            outline: 0;
        }
        .option_price {
            float: right;
            color: #e03c23;
            font-weight: 500;}
        .nav-sidebar{width:100%;padding:8px 0;border-right:1px solid #ddd;background: #f9f9f9;}.nav-sidebar a{color:#333;border-bottom:1px solid #ededed;-webkit-transition:all 80ms linear;-moz-transition:all 80ms linear;-o-transition:all 80ms linear;transition:all 80ms linear;-webkit-border-radius:4px 0 0 4px;-moz-border-radius:4px 0 0 4px;border-radius:4px 0 0 4px}.nav>li>a{padding:8px 15px}.nav-sidebar .active a{cursor:default;background-color:#eee;text-shadow:1px 1px 1px #666}.nav-sidebar .active a:hover{background-color:#eee}.nav-sidebar .text-overflow .media-body,.nav-sidebar .text-overflow a{white-space:nowrap;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis}.xtarget:target{margin-top:-12px;padding-top:160px}.xtarget:target:before{background:#ccc;border-radius:3px;background-clip:padding-box;color:#fff;padding:0 5px;position:absolute;top:24px}
        .fa-plus-circle{color:#d32f2f;}.fa-remove{color:#d32f2f;} ul#cat_nav li a.active, ul#cat_nav li a:hover {color:#e7272d;}
        .addToCartButton,.addToCartButton:hover,.restaurant-offer{background-color:#fff}.addToCartButton{border:1px solid #d32f2f;border-radius:50%;padding:0 4px}.fa-minus-circle,.fa-plus{color:#d32f2f}.restaurant-offer{margin-top:0;color:#888;padding:10px;font-weight:100}.restaurant-offer li{margin-bottom:15px;border-bottom:1px solid #efefef;padding-bottom:15px}.restaurant-offer-info i{font-size:24px;color:#E64A64}.restaurant-offer-description{float:left;max-width:88%}.restaurant-offer li:last-child{border-bottom:0}.restaurant-offer p{margin-bottom:0;color:#333}#offer-modal-box .restaurant-offer-description h6{font-size:20px;font-weight:400;color:#333;margin-top:5px;line-height:22px;margin-bottom:0}.mean-container .mean-nav ul li a,.site-header .main-navigation ul li ul li a{font-family:Oswald,sans-serif;line-height:21px;font-size:14px;font-weight:400;font-style:normal}ul#cat_nav,ul.additional_links,ul.list_ok,ul.opening_list{list-style:none}blockquote{border-color:#e7272d}#tophead .tophead-address .fa,#tophead .tophead-contact .fa,#tophead .tophead-social li a:hover{color:#e7272d}#tophead{background-color:#222}#respond form .btn-send:hover,.breadcrumb-area .entry-breadcrumb,.entry-header .entry-meta,.entry-summary a.read-more:active,.entry-summary a.read-more:hover,.error-page-area .error-page-message .home-page a,.header-icon-area .cart-icon-area .cart-icon-num,.header-style-5 .header-menu-btn,.rdtheme-button-1 a:hover,.rdtheme-primary-bgcolor,.redchili-primary-bgcolor,.search-form .custom-search-input button.btn,.sidebar-widget-area .widget h3:after,.site-header .main-navigation ul li ul li,.site-header .main-navigation ul li ul li:hover,.site-header .main-navigation ul li.mega-menu>ul.sub-menu,.vc-post-slider .date,.widget_redchili_about ul li a,.wpcf7 .submit-button,button,input[type=button],input[type=reset],input[type=submit]{background-color:#e7272d}#tophead,#tophead .tophead-social li a,#tophead a{color:#a6b1b7}.site-header .main-navigation ul.menu>li.current-menu-item>a,.site-header .main-navigation ul.menu>li.current>a,.site-header .main-navigation ul.menu>li>a:hover,.trheader.non-stick .site-header .main-navigation ul.menu>li.current-menu-item>a,.trheader.non-stick .site-header .main-navigation ul.menu>li.current>a,.trheader.non-stick .site-header .main-navigation ul.menu>li>a:hover{color:#ee2}.site-header .main-navigation ul li a.active{color:#ee2!important}.trheader.non-stick .additional-menu-area a.side-menu-trigger,.trheader.non-stick .header-icon-area .cart-icon-area>a,.trheader.non-stick .header-icon-seperator,.trheader.non-stick .site-header .main-navigation ul.menu>li>a,.trheader.non-stick .site-header .search-box .search-button i{color:#fff}.bottomBorder{border-bottom:2px solid #e7272d}.site-header .main-navigation ul li ul li a{color:#fff;letter-spacing:1px;text-transform:uppercase}.site-header .main-navigation ul li ul li:hover>a{color:#071041}.stick .site-header{border-color:#e7272d}.mean-container .mean-bar,.site-header .search-box .search-text{border-color:#ee2}.site-header .main-navigation ul li.mega-menu ul.sub-menu li a{color:#fff}.site-header .main-navigation ul li.mega-menu ul.sub-menu li a:hover{background-color:#e7272d;color:#071041}.mean-container .mean-nav ul li a{color:#000}.additional-menu-area a.side-menu-trigger:hover,.mean-container .mean-nav ul li a:hover,.mean-container .mean-nav>ul>li.current-menu-item>a,.trheader.non-stick .additional-menu-area a.side-menu-trigger:hover{color:#ee2}.header-style-3 .header-contact .fa,.header-style-3 .header-social li a:hover,.header-style-3.trheader .header-contact li a,.header-style-3.trheader .header-social li a,.header-style-3.trheader .header-social li a:hover{color:#fff}.header-style-4 .header-contact .fa,.header-style-4 .header-social li a:hover,.header-style-4.trheader .header-social li a:hover{color:#ee2}.header-style-4.trheader .header-contact li a,.header-style-4.trheader .header-social li a,.trheader.non-stick.header-style-5 .header-menu-btn{color:#fff}.widget .tagcloud a:hover{border:1px solid #e7272d},#respond form .btn-send,.entry-summary a.read-more:link,.entry-summary a.read-more:visited,.scrollToTop,.site-header .search-box .search-text,.stick,blockquote{border-color:#e7272d}.infobox-style2 i{color:#e7272d}a:active,a:focus,a:hover{color:#d32f2f}.search-form .custom-search-input button.btn:hover,.widget .tagcloud a:hover{background-color:#d32f2f}.entry-banner .entry-banner-content h1,.inner-page-banner-area .pagination-area h1{color:#fff}.inner-page-banner-area .pagination-area .redchili-pagination span a{color:#efefef}.inner-page-banner-area .pagination-area .redchili-pagination span a:hover{color:#fff}.inner-page-banner-area .pagination-area .redchili-pagination{color:#efefef}.inner-page-banner-area .pagination-area .redchili-pagination>span:last-child{color:#e7272d}.fmp-load-more button{border:2px solid #e7272d!important;color:#e7272d!important}.fmp-utility .fmp-load-more button:hover{background-color:#e7272d!important;color:#fff!important;border:2px solid #e7272d!important}.pagination-area ul li .current,.pagination-area ul li a:hover,.pagination-area ul li.active a{background-color:#e7272d;border-color:#e7272d}.pagination-area ul li a,.pagination-area ul li span{border:1px solid #e7272d}.footer-area-top{background-color:#151515}.footer-area-bottom,.ls-bar-timer,.rt-wpls .wpls-carousel .slick-next,.rt-wpls .wpls-carousel .slick-prev{background-color:#e7272d}.footer-area-top,.footer-area-top .opening-schedule li,.footer-area-top .widget .tagcloud a,.footer-area-top .widget h4 a,.footer-area-top .widget li a{color:#d7d7d7}.footer-area-top .widget h3{color:#fff}.footer-area-bottom p a:hover,.footer-area-top .textwidget a:hover,.footer-area-top .widget a:hover,.footer-area-top .widget li a:hover{color:#e7272d}.footer-area-bottom p,.footer-area-bottom p a{color:#fff}.footer-area-top .footer-social li a{background:#e7272d}.archives ul li a:hover,.categories ul li a i,.categories ul li a:hover .archives ul li span span,.footer-area-top .footer-social li a:hover i,.rc-sidebar .opening-schedule li span.os-close,.rc-sidebar h4 a:hover,.recent-recipes .media-body h3 a:hover,.widget ul li a i,.widget ul li a:hover,.widget ul li::before,.widget_archive ul li a:hover,.widget_archive ul li span span,.widget_categories ul li a i,.widget_categories ul li a:hover{color:#e7272d}body{font-family:Roboto Slab,sans-serif;font-size:14px;line-height:24px;margin:0 auto}h1{font-family:Oswald;font-size:40px;line-height:44px}.fmp-layout-isotope-redchili-home button,.trheader .header-area h2,h2,h3,h4,h5,h6{font-family:Oswald,sans-serif}h2{font-size:28px;line-height:31px}h3{font-size:20px;line-height:26px}h4{font-size:16px;line-height:18px}h5{font-size:14px;line-height:16px}h6{font-size:12px;line-height:14px}.content-area{padding-top:80px;padding-bottom:50px}.ls-bar-timer{border-bottom-color:#e7272d}.fmp-layout-custom-grid-by-cat1 .card-menu-price .fmp-layout-custom-grid-by-cat2 .amount,.fmp-layout-custom-grid-by-cat2 .fmp-price,.fmp-layout-custom-grid-by-cat3 .card-menu-price,.fmp-layout-custom-grid-by-cat3 .card-menu-price .amount,.fmp-layout-custom-isotope-redchili-2 ul li a:hover,.food-menu-title span i:before,.food-menu2-area .food-menu2-box .food-menu2-img-holder .food-menu2-more-holder ul li a,.food-menu2-area .food-menu2-box .food-menu2-img-holder .food-menu2-more-holder ul li a:hover,.tasty-menu-inner ul li .media-body .amount,.tasty-menu-inner ul li .media-body .card-menu-price{color:#e7272d!important}.fmp-layout3 .fmp-info h3 a:hover,.single-menu-area .single-menu-inner .single-menu-inner-content .price,.wrapper .fmp-layout3 .fmp-box .fmp-title h3:hover{color:#e7272d}.fmp-layout-carousel3 .amount,.fmp-layout-carousel3 .fmp-price,.fmp-layout-custom-isotope-redchili .isotop-price,.food-menu-title span:before,.food-menu3-area .food-menu3-box .food-menu3-box-content .food-menu-price,.food-menu4-area .food-menu4-box span.amount,.single-menu-area .single-menu-inner .related-products .food-menu2-box .food-menu2-title-holder .fmp-price{background:#e7272d!important}.fmp-layout-custom-isotope-redchili .isotop-price,.food-menu2-area .food-menu2-box .food-menu2-title-holder .isotop-price-2,.food-menu4-area .food-menu4-box .fmp-price{background-color:#e7272d!important}.food-menu-title span:after,.food-menu3-area .food-menu3-box .food-menu3-box-content .food-menu-price,.food-menu3-area .food-menu3-box .food-menu3-box-img a:hover i{background:#e7272d}.food-menu3-area .food-menu3-box .food-menu3-box-content .food-menu-price:after{border-color:transparent #e7272d}.fmp-layout-custom-grid-by-cat2 h3.fmp-title a{color:#000}.fmp-layout-custom-grid-by-cat2 h3.fmp-title a:hover,.isotope-home h3 a:hover{color:#e7272d}.fmp-wrapper .fmp-title h3 a:hover,.food-menu1-area .food-menu1-box ul li .media-body h3 a:hover,.food-menu3-area .food-menu3-box .food-menu3-box-content h3 a:hover,.isotope-home h4 a:hover,.tasty-menu-inner ul li .media-body h3 a:hover{color:#e7272d!important}.other-menu .owl-custom-nav .owl-next,.other-menu .owl-custom-nav .owl-prev,.rt-owl-nav-3 .owl-custom-nav .owl-next,.rt-owl-nav-3 .owl-custom-nav .owl-prev{background-color:#e7272d}.fmp-pagination ul.pagination-list li a,.fmp-pagination ul.pagination-list li span{background:0 0;color:#e7272d!important;border:1px solid #e7272d!important}.fmp-pagination ul.pagination-list li a:hover,.fmp-pagination ul.pagination-list li span:hover,.fmp-pagination ul.pagination-list li.active span{background:#e7272d!important;color:#fff!important;border:1px solid #e7272d!important}.fmp-layout-carousel3 .fmp-title a.ghost-semi-color-btn{border:2px solid #e7272d!important}.fmp .title-bar-small-center::before{background-color:#e7272d!important}.fmp-layout-carousel3 .owl-controls .owl-dots .active span,.fmp-layout-carousel3 .owl-nav .owl-next,.fmp-layout-carousel3 .owl-nav .owl-prev{border:1px solid #e7272d!important}.content-box2 .content-box2-bottom-content-holder h3 a:hover,.recipe-serving i,.single-recipe-area .single-recipe-inner .tools-bar li a i,.single-recipe-area .single-recipe-inner .tools-bar li a:hover,.single-recipe-area .single-recipe-inner .tools-bar li span,.single-recipe-area .tools-bar li:last-child i{color:#e7272d}.single-recipe-area .single-recipe-inner .ingredients-box ul li i{background-color:#e7272d}.title-recipe:before{background:#e7272d},.owl-controls .owl-prev .owl-controls .owl-next{border:1px solid #e7272d},.owl-controls .owl-next:hover .owl-controls .owl-prev:hover{background:#e7272d!important}.scrollToTop,.woocommerce #respond input#submit,.woocommerce #respond input#submit.alt,.woocommerce #respond input#submit.disabled:hover,.woocommerce #respond input#submit:disabled:hover,.woocommerce #respond input#submit[disabled]:disabled:hover,.woocommerce a.added_to_cart,.woocommerce a.button,.woocommerce a.button.alt,.woocommerce a.button.disabled:hover,.woocommerce a.button:disabled:hover,.woocommerce a.button[disabled]:disabled:hover,.woocommerce button.button,.woocommerce button.button.alt,.woocommerce button.button.disabled:hover,.woocommerce button.button:disabled:hover,.woocommerce button.button[disabled]:disabled:hover,.woocommerce div.product form.cart .button,.woocommerce input.button,.woocommerce input.button.alt,.woocommerce input.button.disabled:hover,.woocommerce input.button:disabled:hover,.woocommerce input.button[disabled]:disabled:hover,.woocommerce span.onsale,.woocommerce ul.products li.product .onsale,.woocommerce-account .woocommerce-MyAccount-navigation ul li a,p.demo_store{background-color:#e7272d}.ghost-btn:hover{background:#e7272d;border:2px solid #e7272d}.ghost-color-btn,.ghost-color-btn-2{border:2px solid #e7272d;color:#e7272d}.ghost-color-btn i{color:#e7272d}.ghost-color-btn:hover{background:#e7272d}.ghost-text-color-btn{color:#e7272d}.ghost-text-color-btn:hover{border:2px solid #e7272d;background:#e7272d}.ghost-semi-color-btn:hover,.rc-sidebar .widget-title-bar:before,.title-bar-big-center:before,.title-bar-big-left-close:before,.title-bar-full-width:before,.title-bar-medium-left:before,.title-bar-small-center:before,.title-bar-small-left:before,.title-bar:after,.widget-title-bar:before{background:#e7272d}.subtitle-color,.title-small a:hover{color:#e7272d}#commentform #submit.ghost-on-hover-btn:hover,.contact-us-right .wpcf7-form-control.ghost-on-hover-btn:hover,.ghost-on-hover-btn:hover,.single-recipe-area .ghost-on-hover-btn,input.ghost-on-hover-btn,input.ghost-on-hover-btn:hover{border:2px solid #e7272d;color:#e7272d}.default-btn{background:#e7272d}.book-now-btn:hover,.table-reservation2-area input.book-now-btn:hover,.table-reservation3-area input.book-now-btn:hover{color:#e7272d}.table-reservation1-area .book-now-btn{border:1px solid #e7272d}#scrollUp:focus i,#scrollUp:hover i{color:#e7272d}.about-layout-two .about2-award-box .media a i:before,.about-layout-two .about2-top .about2-top-box h2 a:hover,.about-layout-two .about2-top .about2-top-box:hover i:before,.about-one-area .about-one-area-top h2 span,.about-page-left p span span{color:#e7272d}.about-page-right .owl-controls .owl-dots .active span{background:#e7272d}.rc-sidebar .opening-schedule li span.os-close,.stylish-input-group .input-group-addon button span{color:#e7272d}.about-one-area .title-bar-big-left:before{background:#e7272d}.blog-page-box ul li span,.content-area .entry-blog-post ul li span{color:#e7272d}.blog-page-box .rc-date,.content-area .entry-blog-post .rc-date,.content-area .single-blog-middle .single-blog-social li:hover{background:#e7272d}.content-area .single-blog-middle .single-blog-tag ul li a{color:#e7272d}.content-area .single-blog-middle .single-blog-tag ul li:hover{background:#e7272d;border:1px solid #e7272d}.content-area .single-blog-middle .single-blog-social li{border:1px solid #e7272d}.page-error-area .page-error-top{background:#e7272d}.contact-us-left ul>li>i{color:#e7272d}.contact-us-left ul>li .contact-social li:hover a{background:#e7272d;border:1px solid #e7272d}.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(1) .progress-bar,.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(2) .progress-bar,.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(3) .progress-bar,.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(4) .progress-bar,.single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(5) .progress-bar{background:#e7272d}.single-chef-top-area .single-chef-top-content .single-chef-social li a{border:1px solid #e7272d}.event-social li:hover a,.single-chef-top-area .single-chef-top-content .single-chef-social li:hover a{border:1px solid #e7272d;background:#e7272d}.product-grid-view .woo-shop-top .view-mode ul li:first-child .fa,.product-list-view .woo-shop-top .view-mode ul li:last-child .fa,.table-reservation1-area .reservation-form .reservation-input-box i,.testimonial-style-4 .rc-icon-box::before,.woocommerce .product-thumb-area .product-info ul li a:hover .fa,.woocommerce a.woocommerce-review-link:hover,.woocommerce div.product .product-meta a:hover,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.woocommerce div.product p.price,.woocommerce div.product span.price,.woocommerce ul.products li.product .price,.woocommerce ul.products li.product h3 a:hover,.woocommerce-info::before,.woocommerce-message::before{color:#e7272d}.woocommerce-info,.woocommerce-message{border-color:#e7272d}.woocommerce .product-thumb-area .overlay{background-color:rgba(231,39,45,.8)}.rt-owl-dot-1 .owl-theme .owl-dots .owl-dot.active span,.rt-owl-dot-1 .owl-theme .owl-dots .owl-dot:hover span{background-color:#e7272d}.rt-title-1 .subtitle-color{color:#e7272d}.chef-area .owl-controls .owl-dots .active span,.chef-area .owl-nav .owl-next,.chef-area .owl-nav .owl-prev,.rt-owl-event-slider .owl-controls .owl-dots .active span,.rt-owl-event-slider .owl-nav .owl-next,.rt-owl-event-slider .owl-nav .owl-prev,.rt-owl-nav-2 .owl-nav .owl-next,.rt-owl-nav-2 .owl-nav .owl-prev{background-color:#e7272d!important}.chef-area .owl-nav .owl-next:hover,.chef-area .owl-nav .owl-prev:hover,.rt-owl-event-slider .owl-nav .owl-next:hover,.rt-owl-event-slider .owl-nav .owl-prev:hover,.rt-owl-nav-2 .owl-nav .owl-next:hover,.rt-owl-nav-2 .owl-nav .owl-prev:hover{border:1px solid #e7272d;background-color:transparent!important}.chef-box .chef-box-content,.chef-box .chef-box-content p:before,.chef-box .chef-box-content ul li:hover{background:#e7272d}.all-event-area .content-box2 .content-box2-bottom-content-holder ul li i,.chef-area .owl-nav .owl-next:hover i,.chef-area .owl-nav .owl-prev:hover i,.pagination-area ul li,.rt-owl-event-slider .content-box2 .content-box2-bottom-content-holder ul li i,.rt-owl-event-slider .owl-nav .owl-next:hover i,.rt-owl-event-slider .owl-nav .owl-prev:hover i,.rt-owl-nav-2 .owl-nav .owl-next:hover i,.rt-owl-nav-2 .owl-nav .owl-prev:hover i,.woocommerce nav.woocommerce-pagination ul li{color:#e7272d!important}.about2-award-box .icon-part i,.award1-area-box i,.chef-box .chef-box-content h3 a:hover,.client-reviews-area .client-reviews-right h2,.content-box2 .content-box2-bottom-content-holder ul li a i,.content-box2 .content-box2-bottom-content-holder ul li a:hover,.counter-right-1 i,.event-info ul li i,.fmp-layout-custom-grid-by-cat2 .menu-list li .food-menu-price table td:last-child,.fmp-layout-custom-grid-by-cat2 .menu-list li .food-menu-price table th:last-child,.fmp-layout-custom-grid-by-cat7 .menu-list li .food-menu-price table td:last-child,.fmp-layout-custom-grid-by-cat7 .menu-list li .food-menu-price table th:last-child,.recipe-of-the-day-area .owl-next i,.recipe-of-the-day-area .owl-prev i,.recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content .awards-box ul li a i,.recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content .time-needs li i,.recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content h2 a:hover{color:#e7272d}.recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content{border:5px solid #e7272d}.recipe-of-the-day-area .owl-controls .active span{background:#e7272d!important}.content-box2 .content-box2-img-holder:after{background-color:rgba(231,39,45,.8)}.chef-box .chef-sep,.owl-theme .owl-controls .owl-next,.owl-theme .owl-controls .owl-prev,.rt-owl-testimonial-2 .rt-vc-content{border-color:#e7272d}.event-social li a{border:1px solid #e7272d}.event-mark{border-bottom:35px solid #e7272d}.fmp-layout-carousel3 .owl-nav .owl-next:hover i,.fmp-layout-carousel3 .owl-nav .owl-prev:hover i,.infobox-style1-right h2 a:hover{color:#e7272d!important}.fmp-layout-carousel3 .owl-controls .owl-dots .active span,.fmp-layout-carousel3 .owl-nav .owl-next,.fmp-layout-carousel3 .owl-nav .owl-prev{background-color:#e7272d!important}.fmp-layout-carousel3 .owl-nav .owl-next:hover,.fmp-layout-carousel3 .owl-nav .owl-prev:hover{border:1px solid #e7272d;background-color:transparent!important}.fmp-isotope-buttons button.selected,.fmp-isotope-buttons button:hover{border:1px solid #e7272d;background-color:#e7272d}.info-box-1 i,.infobox-style2 i{color:#e7272d}.client-area .owl-controls .owl-dot:hover span{background:rgba(231,39,45,.5)!important}.client-area .owl-controls .active span,.wfmc-area .wfmc-layout-1 .fmp-price{background:#e7272d!important}#inner-isotope .ajax_add_to_cart.add_to_cart_button:hover,#inner-isotope .isotope-variable:hover,#inner-isotope .single_add_to_cart_button:hover,.wfmc-area .ajax_add_to_cart.add_to_cart_button:hover,.wfmc-area .isotope-variable:hover,.wfmc-area .owl-controls .owl-dots .active span,.wfmc-area .single_add_to_cart_button:hover,.wfmc-info-1 .button.add_to_cart_button:hover,.wfmc-info-1 .title-bar-small-center:before,.wfmc-layout-3 .rt-menu-price .woocommerce-Price-amount{background-color:#e7272d}.wfmc-info-1 .wfmc-title a:hover{color:#e7272d}.wfmc-info-1 .button.add_to_cart_button{border:2px solid #e7272d}.wfmc-area .owl-nav .owl-next,.wfmc-area .owl-nav .owl-prev{border:1px solid #e7272d}.wfmc-area .ajax_add_to_cart.add_to_cart_button,.wfmc-area .isotope-variable,.wfmc-area .single_add_to_cart_button{border:2px solid #e7272d}.wfmc-area .variations label{color:#e7272d}.wfmc-area .modal-dialog .single_add_to_cart_button.button.alt{border-color:#e7272d;color:#e7272d}#inner-isotope .fmp-iso-filter .current{background:#e7272d}#inner-isotope .ajax_add_to_cart.add_to_cart_button,#inner-isotope .isotope-variable,#inner-isotope .single_add_to_cart_button{border:2px solid #e7272d;color:#e7272d}#inner-isotope .variations label{color:#e7272d}.wfmc-layout-3 .ajax_add_to_cart.add_to_cart_button,.wfmc-layout-3 .isotope-variable,.wfmc-layout-3 .single_add_to_cart_button{border:2px solid #e7272d;color:#e7272d}.wfmc-layout-3 .ajax_add_to_cart.add_to_cart_button:hover,.wfmc-layout-3 .isotope-variable:hover,.wfmc-layout-3 .single_add_to_cart_button:hover{background-color:#e7272d;border:2px solid #e7272d}.wfmc-layout-3 .variations label{color:#e7272d}.wfmc-layout-3 .input-text.qty.text{border:2px solid #e7272d}.trheader.stickh .scrollToTop:after,.site-header .search-box .search-button i{color:#f7f7f7!important}.menu-main-menu-container .menu-main-menu ul li a{color:#fff!important}.trheader #tophead,.trheader #tophead .tophead-social li a,.trheader #tophead a{color:#fff;background-color:#000}.site-header .main-navigation ul.menu &gt; li &gt; a:hover,.site-header .main-navigation ul.menu &gt; li.current &gt; a,.site-header .main-navigation ul.menu &gt; li.current-menu-item &gt; a,.trheader.non-stick .site-header .main-navigation ul.menu &gt; li &gt; a:hover,.trheader.non-stick .site-header .main-navigation ul.menu &gt; li.current &gt; a .vc_custom_1496996398698,.trheader.non-stick .site-header .main-navigation ul.menu &gt; li.current-menu-item &gt; a{padding-top:53px!important}.trheader .header-area h2{font-size:28px;line-height:31px;color:#000}.wpb_single_image img:hover{-webkit-transform:scale(.9);-ms-transform:scale(.9);transform:scale(.9);transition:all ease-in .5s;border:3px solid #fff}.entry-banner{background:url(assets/img/banner.jpg) center center/cover no-repeat;height:120px}.inner-page-banner-area .pagination-area{position:relative;z-index:1;text-align:left;padding:5px}.cart-icon-num,.fa-shopping-cart,.header-icon-seperator{visibility:hidden}
    </style>
    <style type="text/css" data-type="vc_shortcodes-custom-css">
        .cat_nav_fixed {overflow: scroll;overflow-x: hidden;height: 500px; }
        .vc_custom_1491372824650{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-image: url(assets/img/about1-bottom-back.png?id=337) !important;}.vc_custom_1497343404300{padding-top: 70px !important;padding-bottom: 70px !important;background-position: 0 0;background-repeat:-repeat;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>
<body class="page-template-default page page-id-320 wls_gecko wls_windows header-style-1 has-topbar topbar-style-1 no-sidebar product-grid-view mprm-checkout mprm-page mprm-success mprm-failed-transaction wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
<div class="wrapper">
    <?php include 'header.php' ?>
    <div id="meanmenu"></div>
    <div id="header-area-space"></div>
    <div class="inner-page-banner-area entry-banner">
        <div class="container">
            <div class="pagination-area">
                <h1>Order Online</h1>
                <div class="redchili-pagination"><!-- Breadcrumb NavXT 6.0.4 -->
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Sizzling." href="index.php" class="home"><span property="name">Sizzling</span></a><meta property="position" content="1"></span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name">Checkout</span><meta property="position" content="2"></span></div>							</div>
        </div>
    </div>
    <div class="content-area checkout-page-area">
        <div class="container">
            <div class="row hidden-sm hidden-xs">
                <div class="col-md-3" id="test">
                    <div class="box_style_1 theiaStickySidebar">
                        <nav class="nav-sidebar">
                            <ul class="nav">
                                <?php foreach ($array AS $categoryList): ?>
                                    <li><a href="#category<?php echo $categoryList->product_category_id; ?>" style="text-transform: capitalize;"><?php echo $categoryList->product_category_name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb40">
                    <?php foreach ($array AS $categoryList): ?>
                        <div class="menu-block xtarget" id="category<?php echo $categoryList->product_category_id; ?>">
                            <h3 class="menu-title"><?php echo $categoryList->product_category_name; ?></h3>
                            <?php $product_category = $categoryList->product_category_id; ?>
                            <?php
                            $array_product = array();
                            //INNER JOIN product_options ON tbl_product.id = product_options.product_id
                            //$sql_product = "SELECT * FROM tbl_product INNER JOIN product_options ON product_options.product_id = tbl_product.product_id WHERE tbl_product.product_status='Active' AND tbl_product.product_category_id = $product_category ORDER BY tbl_product.product_id ASC";
                            $sql_product = "SELECT * FROM tbl_product WHERE product_status='Active' AND product_category_id = $product_category ORDER BY product_id ASC";
                            $sql_query_product = mysqli_query($con, $sql_product);
                            while ($productList = mysqli_fetch_object($sql_query_product)) {
                                $array_product[] = $productList;
                            }
                            //                            debug($productList);
                            ?>
                            <div class="menu-content">
                                <div class="row">
                                    <?php if ($array_product > 0): ?>
                                        <?php foreach ($array_product AS $productList): ?>
                                            <?php
                                            $arrayProductOption = array();
                                            $sqlGetProductOption = "SELECT tbl_product_price,tbl_product_option_name,tbl_product_id FROM tbl_product_option WHERE tbl_product_id= $productList->product_id";
                                            $resultGetProductOption = mysqli_query($con, $sqlGetProductOption);
                                            if ($resultGetProductOption) {
                                                while ($objOption = mysqli_fetch_object($resultGetProductOption)) {
                                                    $arrayProductOption[] = $objOption;
                                                }
                                            }
                                            ?>
                                            <div class="col-md-2">
                                                <?php if($productList->product_image != ''): ?>
                                                    <div class="dish-img"><img src="upload/menu_image/<?php echo $productList->product_image; ?>" alt="<?php echo $productList->product_title; ?>" class="img-responsive"></div>
                                                <?php else: ?>
                                                    <div class="dish-img"><img src="assets/img/food-icon.png" class="img-responsive"></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="dish-content">
                                                    <h5 class="dish-title"><?php echo $productList->product_title; ?></h5><p class="dish-meta"><?php echo $productList->product_details; ?></p>
                                                    <div class="dish-price">
                                                        <?php if (count($arrayProductOption) == '0'): ?>
                                                            <p>£<?php echo $productList->product_new_price; ?></p>
                                                        <?php else: ?>
                                                            <?php $sqlGetProductOptionLowestVal = "SELECT MIN(tbl_product_price) AS lowestVal FROM tbl_product_option WHERE tbl_product_id= $productList->product_id";
                                                            $resultProductOptionLowestVal = mysqli_query($con, $sqlGetProductOptionLowestVal);
                                                            if ($resultProductOptionLowestVal) {

                                                                $objProductOptionLowestVal = mysqli_fetch_object($resultProductOptionLowestVal);
                                                                $lowestVal = $objProductOptionLowestVal->lowestVal;
                                                            }
//                                                            debug($resultProductOptionLowestVal); ?>
                                                            <p>£<?php echo $lowestVal; ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (count($arrayProductOption) == '0'): ?>
                                                <div class="col-md-1" style="margin-top: 5px;">
                                                    <?php $productNewPrice = $productList->product_new_price;

                                                    $sql_product_options = "SELECT * FROM product_options WHERE product_id = $productList->product_id";
                                                    $sql_product_options_result1 = mysqli_query($con, $sql_product_options);
                                                    $sql_product_options_result = mysqli_query($con, $sql_product_options);
                                                    $product_options_row = mysqli_fetch_assoc($sql_product_options_result);

                                                    //dd($product_options_row);
                                                    if (mysqli_num_rows($sql_product_options_result1) > 0) { ?>

                                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#product_option_select_modal_<?php echo $product_options_row['product_id'];?>">Options</button>

                                                        <!-- Modal -->
                                                        <div id="product_option_select_modal_<?php echo $product_options_row['product_id'];?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog modal-sm">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Select Options</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                             <?php
                                                                             while($rows = mysqli_fetch_assoc($sql_product_options_result1)) {
                                                                                 echo '<input type="checkbox"> '.$rows['name'].'<br>';
                                                                             }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button onclick="javascript:addToCart(<?php echo $productList->product_id; ?>,<?php echo $productNewPrice; ?>);"
                                                                                 style="color: #E7272D; border: 1px solid red; border-radius: 50%;padding: 0px 2px;" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-plus"></i>Add</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <?php } else { ?>
                                                        <a onclick="javascript:addToCart(<?php echo $productList->product_id; ?>,<?php echo $productNewPrice; ?>);"
                                                           style="color: #E7272D; border: 1px solid red; border-radius: 50%;padding: 0px 2px;">
                                                            <i class="fa fa-plus"></i> <!--this is add to cart btn-->
                                                        </a>

                                                        <?php } // ending select product option ?>
                                                </div>

                                                <?php else: ?>
                                                <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top: 5px;">
                                                    <a data-toggle="modal" type="button" data-target="#deleteModal<?php echo $productList->product_id; ?>" style="color: #E7272D; border: 1px solid red; border-radius: 50%;padding: 0px 2px;">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <div id="deleteModal<?php echo $productList->product_id; ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header"><h4 class="modal-title" style="color: #000000 !important;"><?php echo $productList->product_title; ?> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4></div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <?php if (count($arrayProductOption) > 0): ?>
                                                                                <?php foreach ($arrayProductOption AS $productOption): ?>
                                                                                    <div class="col-md-6">
                                                                                        <a class="btn product_option" onclick="javascript:addToCart(<?php echo $productList->product_id; ?>,<?php echo $productOption->tbl_product_price; ?>,'<?php echo $productOption->tbl_product_option_name; ?>');">
                                                                                            <span class="pull-left"><?php echo $productOption->tbl_product_option_name; ?></span>
                                                                                            <span class="pull-right"><?php echo $productOption->tbl_product_price; ?></span>
                                                                                        </a>
                                                                                    </div>
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <h3>Oops! Still no product's updated in this Category. Product will be updated soon <i class="fa fa-smile-o"></i> </h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
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
                <div class="col-md-3" id="sidebar">
                    <div class="theiaStickySidebar ">
                        <div id="cart_box" class="ibox" style="clear: both;margin-bottom: 25px;margin-top: 0;padding: 0;border-radius: 3px;border: 1px solid #ededed;">
                            <div class="ibox-title" style="-moz-border-bottom-colors: none; -moz-border-left-colors: none;-moz-border-right-colors: none;-moz-border-top-colors: none;background-color: #ffffff;border-color: #e7eaec;border-image: none;border-style: solid solid none;border-width: 3px 0 0;color: inherit;margin-bottom: 0;padding: 14px 15px 0px;min-height: 48px;background: #f8f8f8;">
                                <h5>Cart Summary</h5>
                            </div>
                            <div class="cartMenu ">
                                <table class="table_summary">
                                    <tbody class="wholeCart">
                                    <?php if (count($arrayTempCart) > 0): ?>
                                        <?php foreach ($arrayTempCart AS $TempCart): ?>
                                            <tr>
                                                <td>
                                                    <a onclick="javascript:qntyDecrease(<?php echo $TempCart->temp_order_id; ?>)"  class="remove_item miniCartQuantity"><i class="fa fa-minus-circle"></i></a> <strong id="product_cart_qty_<?php echo $TempCart->temp_order_id; ?>"><?php echo $TempCart->temp_order_product_qty; ?>x</strong> <a onclick="javascript:increaseItem(<?php echo $TempCart->temp_order_id; ?>)" class=" miniCartQuantity"><i class="fa fa-plus-circle"></i></a> <span><?php echo $TempCart->product_title; ?></span>
                                                </td>
                                                <td>
                                                    <strong class="pull-right">£<?php echo $TempCart->temp_order_product_price; ?></strong>
                                                </td>
                                                <td><a onclick="javascript:deleteItem(<?php echo $TempCart->temp_order_id; ?>)"><i class="fa fa-remove"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div id="emptyCart">
                                            <p style="text-align: center"><i class="fa fa-cart-plus fa-4x" aria-hidden="true"></i></p>
                                            <p style="text-align: center">Add some items into your basket</p>
                                        </div>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <form method="post">
                                <table class="table table_summary">
                                    <tbody>
                                    <tr>
                                        <td style="border: none;font-size: 13px;text-transform: capitalize;">
                                            <input type="radio" name="order_delivery_method" value="Delivery"<?php
                                            if ($order_delivery_method === 'Delivery') {
                                                echo "checked";
                                            }
                                            ?> required> &nbsp; Delivery &nbsp;&nbsp;
                                            <input type="radio" name="order_delivery_method" value="Take Away"<?php
                                            if ($order_delivery_method === 'Take Away') {
                                                echo "checked";
                                            }
                                            ?> required> Take Away
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="subtotal">
                                            Subtotal <span class="pull-right">£<?php echo number_format($subTotal, 2); ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Delivery fee <span class="pull-right">FREE</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="total">
                                            TOTAL <span class="pull-right">£<?php echo number_format($subTotal, 2); ?></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="ibox-content">
                                    <button type="submit" name="btn_full" class="btn_full"><i class="fa fa-shopping-cart"></i> Checkout</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row hidden-lg hidden-md">
                <div class="col-sm-12" id="test">
                    <div class="box_style_1 theiaStickySidebar">
                        <nav class="nav-sidebar">
                            <ul class="nav">
                                <?php $sql2 = "SELECT product_category_id,product_category_name FROM tbl_product_category WHERE product_category_status = 'Active'";
                                $array = array();
                                $result = mysqli_query($con, $sql2);
                                while ($categoryList = mysqli_fetch_object($result)) {
                                    $array[] = $categoryList;
                                }
                                ?>
                                <?php foreach ($array AS $categoryList): ?>
                                    <li><a href="#category<?php echo $categoryList->product_category_id; ?>" style="text-transform: capitalize;"><?php echo $categoryList->product_category_name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-12">
                    <?php foreach ($array AS $categoryList): ?>
                        <div class="menu-block xtarget" id="category<?php echo $categoryList->product_category_id; ?>">
                            <h3 class="menu-title"><?php echo $categoryList->product_category_name; ?></h3>
                            <?php $product_category = $categoryList->product_category_id; ?>
                            <table>
                                <thead></thead>
                                <tbody>
                                <?php
                                $array = array();
                                $sql2 = "SELECT * FROM tbl_product WHERE product_status='Active' AND product_category_id = $product_category ORDER BY product_id ASC";
                                $sql_query = mysqli_query($con, $sql2);
                                while ($productList = mysqli_fetch_object($sql_query)) {
                                    $array[] = $productList;
                                }
                                //                            debug($productList);
                                ?>
                                <?php if ($array > 0): ?>
                                    <?php foreach ($array AS $productList): ?>
                                        <tr style="width: 30%;">
                                            <td style="width: 30%;">
                                                       <span>
                                                            <?php if($productList->product_image != ''): ?>
                                                                <div class="dish-img"><img src="upload/menu_image/<?php echo $productList->product_image; ?>" alt="<?php echo $productList->product_title; ?>" class="img-responsive"></div>
                                                            <?php else: ?>
                                                                <div class="dish-img"><img src="assets/img/food-icon.png" class="img-responsive"></div>
                                                            <?php endif; ?>
                                                       </span>
                                            </td>
                                            <td style="width: 50%">
                                                       <span>
                                                           <div class="dish-content">
                                                               <h6 class="dish-title"><?php echo $productList->product_title; ?></h6><p class="dish-meta"><?php echo $productList->product_details; ?></p>
                                                               <h4 style="color: #e03c23;"><i>£<?php echo $productList->product_new_price; ?></i></h4>
                                                           </div>
                                                       </span>
                                            </td>
                                            <td style="width: 20%">
                                               <span>
                                                   <a onclick="javascript:addToCart(<?php echo $productList->product_id; ?>,<?php echo $productList->product_new_price; ?>);" style="color: #E7272D; border: 1px solid red; border-radius: 50%;padding: 0px 4px;">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                               </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <h3>Oops! Still no product's updated in this Category. Product will be updated soon <i class="fa fa-smile-o"></i> </h3>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-sm-12" id="sidebar">
                    <div class="theiaStickySidebar ">
                        <div id="cart_box" class="ibox" style="clear: both;margin-bottom: 25px;margin-top: 0;padding: 0;border-radius: 3px;border: 1px solid #ededed;">
                            <div class="ibox-title" style="-moz-border-bottom-colors: none; -moz-border-left-colors: none;-moz-border-right-colors: none;-moz-border-top-colors: none;background-color: #ffffff;border-color: #e7eaec;border-image: none;border-style: solid solid none;border-width: 3px 0 0;color: inherit;margin-bottom: 0;padding: 14px 15px 0px;min-height: 48px;background: #f8f8f8;">
                                <h5>Cart Summary</h5>
                            </div>
                            <div class="cartMenu ">
                                <table class="table_summary">
                                    <tbody class="wholeCart">
                                    <?php if (count($arrayTempCart) > 0): ?>
                                        <?php foreach ($arrayTempCart AS $TempCart): ?>
                                            <tr>
                                                <td>
                                                    <a onclick="javascript:qntyDecrease(<?php echo $TempCart->temp_order_id; ?>)"  class="remove_item miniCartQuantity"><i class="fa fa-minus-circle"></i></a> <strong><?php echo $TempCart->temp_order_product_qty; ?>x</strong> <a onclick="javascript:increaseItem(<?php echo $TempCart->temp_order_id; ?>)" class=" miniCartQuantity"><i class="fa fa-plus-circle"></i></a> <span><?php echo $TempCart->product_title; ?></span>
                                                </td>
                                                <td>
                                                    <strong class="pull-right">£<?php echo $TempCart->temp_order_product_price; ?></strong>
                                                </td>
                                                <td><a onclick="javascript:deleteItem(<?php echo $TempCart->temp_order_id; ?>)"><i class="fa fa-remove"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div id="emptyCart">
                                            <p style="text-align: center"><i class="fa fa-cart-plus fa-4x" aria-hidden="true"></i></p>
                                            <p style="text-align: center">Add some items into your basket</p>
                                        </div>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <form method="post">
                                <table class="table table_summary">
                                    <tbody>
                                    <tr>
                                        <td style="border: none;font-size: 13px;text-transform: capitalize;">
                                            <input type="radio" name="order_delivery_method" value="Delivery"<?php
                                            if ($order_delivery_method === 'Delivery') {
                                                echo "checked";
                                            }
                                            ?> required> &nbsp; Delivery &nbsp;&nbsp;
                                            <input type="radio" name="order_delivery_method" value="Take Away"<?php
                                            if ($order_delivery_method === 'Take Away') {
                                                echo "checked";
                                            }
                                            ?> required> Take Away
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="subtotal">
                                            Subtotal <span class="pull-right">£<?php echo number_format($subTotal, 2); ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Delivery fee <span class="pull-right">FREE</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="total">
                                            TOTAL <span class="pull-right">£<?php echo number_format($subTotal, 2); ?></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="ibox-content">
                                    <button type="submit" name="btn_full" class="btn_full"><i class="fa fa-shopping-cart"></i> Checkout</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="snackbar" class="hidden-lg hidden-md"><i class="fa fa-check-circle-o"></i>&nbsp;Cart Updated</div>
    <?php include 'footer.php' ?>
</div>



<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
<script type='text/javascript' src='assets/js/jquery-2.2.4.min.js'></script>
<script type='text/javascript'>
    var baseUrl = '<?php echo baseUrl(); ?>';
</script>
<!--<script type='text/javascript' src='assets/js/jquery-migrate.min.js'></script>-->
<script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
<script type='text/javascript' src='assets/js/jquery.meanmenu.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/jquery.nav.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/isotope.pkgd.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/jquery.counterup.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/waypoints.min.js?ver=5.4.5'></script>
<script type='text/javascript' src='assets/js/jquery.datetimepicker.full.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/main.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/js_composer_front.min.js?ver=5.4.5'></script>
<script type='text/javascript' src='assets/js/owl.carousel.min.js?ver=2.3'></script>
<script type='text/javascript' src='assets/js/custom_script.js'></script>
<script src="assets/js/theia-sticky-sidebar.js"></script>
<script>
    $("ul#cat_nav li a").click(function(){
        var navItem = $(this);
        var category = this.id;
        $('#'+category).css({"color": "#e7272d", "background-color": "#f9f9f9"});
    });
    jQuery('#sidebar').theiaStickySidebar({
        additionalMarginTop: 80
    });
    jQuery('#test').theiaStickySidebar({
        additionalMarginTop: 200
    });
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 500) {
            $("#test").addClass("cat_nav_fixed");
        }
    });
    function deleteItem(id) {
        var id = id;
        $.ajax({
            type: "POST",
            url: baseUrl + "ajax/delItem.php",
            dataType: "json",
            data: {
                id: id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
                    var cartAmount = obj.totalCartAmount;
                    var TmpCart = obj.arrTmpCart;
//                    console.log(TmpCart);
                    $('.product'+id).remove();
                    $('.subtotal').html('Subtotal <span class="pull-right">£' + cartAmount);
                    $('.total').html('TOTAL <span class="pull-right">£' + cartAmount);
                    $('.cartRespons').html('৳' + cartAmount);
                    if (cartAmount !== '') {
//                        console.log('OK');
                        $("#cartHas").css('display', 'block');
                        $("#cartNo").css('display', 'none');

                    } else {
//                        console.log('IN');
                        $("#cartNo").css('display', 'block');
                        $("#cartHas").css('display', 'none');
                    }
//                     console.log(TmpCart);
                    generateMiniCart2(TmpCart);
                    $("#cartAmount").text(cartAmount);

                } else {
                    alert(obj.msg);
                }
            }
        });
    }

    //    Increase Quantity
    function increaseItem(id) {
        var id = id;
//        console.log(id);
        $.ajax({
            type: "POST",
            url: baseUrl + "ajax/ajaxUpdateCartQnty.php",
            dataType: "json",
            data: {
                id: id
            },
            success: function (response) {
                var obj = response;
                if (obj.output === "success") {
//                        console.log('Success Func')
                    var cartAmount = obj.totalCartAmount;
                    var TmpCart = obj.arrTmpCart;
//                        console.log(TmpCart);
                    $('.subtotal').html('Subtotal <span class="pull-right">£' + cartAmount);
                    $('.total').html('TOTAL <span class="pull-right">£' + cartAmount);
                    $('.cartRespons').html('৳' + cartAmount);
                    if (cartAmount !== '') {
//                        console.log('OK');
                        $("#cartHas").css('display', 'block');
                        $("#cartNo").css('display', 'none');

                    } else {
//                        console.log('IN');
                        $("#cartNo").css('display', 'block');
                        $("#cartHas").css('display', 'none');
                    }
//                     console.log(TmpCart);
                    generateMiniCart(TmpCart);
                    $("#cartAmount").text(cartAmount);

                } else {
                    alert(obj.msg);
                }
            }
        });
    }
    function generateMiniCart(TmpCart) {
        //Show mobile notification
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        console.log("Generate Mini Cart Order Page");
        var cartHtml = '';
        var count = TmpCart.length;
        if (count > 0) {
            $.each(TmpCart, function (key, Event) {
                cartHtml += '<tr class="product'+  Event.temp_order_id +'">';
                cartHtml += '<td>';
                cartHtml += '<a onclick="qntyDecrease(' + Event.temp_order_id + ')" class="remove_item miniCartQuantity"><i class="fa fa-minus-circle"></i></a> <strong>' + Event.temp_order_product_qty + 'x</strong> <a onclick="increaseItem(' + Event.temp_order_id + ')" class=" miniCartQuantity"><i class="fa fa-plus-circle"></i></a>' ;
                cartHtml += '<span> ' + Event.product_title + '</span> </td>';
                cartHtml += '<td>';
                cartHtml += '<strong class="pull-right">£';
                cartHtml += '' + Event.temp_order_product_price + '</strong>';
                cartHtml += '</td>';
                cartHtml += '<td><a onclick="deleteItem(' + Event.temp_order_id + ')"><i class="fa fa-remove"></i></a></td>' ;
                cartHtml += '</tr>';
            });
            cartHtml += '';
            $('.wholeCart').html(cartHtml);
        } else {
            console.log("Empty Cart");
            cartHtml += '<div id="emptyCart"><p style="text-align: center"><i class="fa fa-cart-plus fa-4x" aria-hidden="true"></i></p><p style="text-align: center">Add some items into your basket</p></div>';
            cartHtml += '';
            $('.wholeCart').html(cartHtml);
        }
    }
</script>
<?php include "footer_script.php"; ?>
</body>
</html>
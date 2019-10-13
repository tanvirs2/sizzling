<?php
include './config/config.php';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About &#8211; Sizzling</title>
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel='stylesheet' href='assets/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/meanmenu.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/default.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/vc.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/layerslider.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/mp-restaurant-menu.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/js_composer.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='assets/css/jquery.datetimepicker.min.css' type='text/css' media='all' />
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link rel='stylesheet' id='owl-carousel-css'  href='assets/css/owl.carousel.min.css' type='text/css' media='all' />
    <style id='redchili-responsive-inline-css' type='text/css'>
        blockquote {
            border-color: #e7272d;
        }

        #tophead .tophead-contact .fa,
        #tophead .tophead-address .fa,
        #tophead .tophead-social li a:hover {
            color: #e7272d;
        }
        #tophead {
            background-color: #222222;
        }
        #tophead,
        #tophead a,
        #tophead .tophead-social li a {
            color: #a6b1b7;
        }
        .trheader #tophead,
        .trheader #tophead a,
        .trheader #tophead .tophead-social li a {
            color: #efefef;
        }

        .site-header .main-navigation ul li a {
            font-family: Oswald, sans-serif;
            font-size : 15px;
            font-weight : 400;
            line-height : 24px;
            color: #000000;
            font-style: normal;
            letter-spacing : 1px;
            text-transform : uppercase;
        }
        .site-header .main-navigation ul.menu > li > a:hover,
        .site-header .main-navigation ul.menu > li.current-menu-item > a,
        .site-header .main-navigation ul.menu > li.current > a,
        .trheader.non-stick .site-header .main-navigation ul.menu > li > a:hover,
        .trheader.non-stick .site-header .main-navigation ul.menu > li.current-menu-item > a,
        .trheader.non-stick .site-header .main-navigation ul.menu > li.current > a {
            color: #eeee22;
        }
        .site-header .main-navigation ul li a.active {
            color: #eeee22 !important;
        }
        .trheader.non-stick .site-header .main-navigation ul.menu > li > a,
        .trheader.non-stick .site-header .search-box .search-button i,
        .trheader.non-stick .header-icon-seperator,
        .trheader.non-stick .header-icon-area .cart-icon-area > a,
        .trheader.non-stick .additional-menu-area a.side-menu-trigger {
            color: #ffffff;
        }
        .bottomBorder {
            border-bottom: 2px solid #e7272d;
        }
        .site-header .main-navigation ul li ul li {
            background-color: #e7272d;
        }
        .site-header .main-navigation ul li ul li:hover {
            background-color: #e7272d;
        }
        .site-header .main-navigation ul li ul li a {
            font-family: Oswald, sans-serif;
            font-size : 14px;
            font-weight : 400;
            line-height : 21px;
            color: #ffffff;
            font-style: normal;
            letter-spacing : 1px;
            text-transform : uppercase;
        }
        .site-header .main-navigation ul li ul li:hover > a {
            color: #071041;
        }
        .stick .site-header {
            border-color: #e7272d}
        .site-header .main-navigation ul li.mega-menu > ul.sub-menu {
            background-color: #e7272d}
        .site-header .main-navigation ul li.mega-menu ul.sub-menu li a {
            color: #ffffff}
        .site-header .main-navigation ul li.mega-menu ul.sub-menu li a:hover {
            background-color: #e7272d;
            color: #071041;
        }
        .mean-container a.meanmenu-reveal,
        .mean-container .mean-nav ul li a.mean-expand {
            color: #eeee22;
        }
        .mean-container a.meanmenu-reveal span {
            background-color: #eeee22;
        }
        .mean-container .mean-bar {
            border-color: #eeee22;
        }
        .mean-container .mean-nav ul li a {
            font-family: Oswald, sans-serif;
            font-size : 14px;
            font-weight : 400;
            line-height : 21px;
            color: #000000;
            font-style: normal;
        }
        .mean-container .mean-nav ul li a:hover,
        .mean-container .mean-nav > ul > li.current-menu-item > a {
            color: #eeee22;
        }

        .header-icon-area .cart-icon-area .cart-icon-num {
            background-color: #eeee22;
        }
        .additional-menu-area a.side-menu-trigger:hover,
        .trheader.non-stick .additional-menu-area a.side-menu-trigger:hover {
            color: #eeee22;
        }
        .site-header .search-box .search-text {
            border-color: #eeee22;
        }

        .header-style-3 .header-contact .fa,
        .header-style-3 .header-social li a:hover,
        .header-style-3.trheader .header-social li a:hover {
            color: #eeee22;
        }
        .header-style-3.trheader .header-contact li a,
        .header-style-3.trheader .header-social li a {
            color: #ffffff;
        }

        .header-style-4 .header-contact .fa,
        .header-style-4 .header-social li a:hover,
        .header-style-4.trheader .header-social li a:hover {
            color: #eeee22;
        }
        .header-style-4.trheader .header-contact li a,
        .header-style-4.trheader .header-social li a {
            color: #ffffff;
        }

        .header-style-5 .header-menu-btn {
            background-color: #e7272d;
        }
        .trheader.non-stick.header-style-5 .header-menu-btn {
            color: #ffffff;
        }

        a:link,
        a:visited,
        #tophead .tophead-contact .fa,
        #tophead .tophead-social li a:hover,
        .cart-icon-products .widget_shopping_cart .mini_cart_item a:hover,
        .entry-summary h3 a:hover,
        .entry-summary h3 a:active,
        .entry-header-single .entry-meta ul li .fa,
        .class-footer ul li .fa,
        .comments-area .main-comments .comments-body .replay-area a:hover,
        .comments-area .main-comments .comments-body .replay-area a i,
        #respond form .btn-send,
        .widget_redchili_about ul li a:hover,
        .widget_redchili_address ul li i,
        .widget_redchili_address ul li a:hover,
        .widget_redchili_address ul li a:active,
        .sidebar-widget-area ul li a:hover,
        .sidebar-widget-area .widget_redchili_address ul li a:hover,
        .sidebar-widget-area .widget_redchili_address ul li a:active,
        .wpcf7 label.control-label .fa,
        .rdtheme-primary-color,
        .redchili-primary-color{
            color: #e7272d;
        }
        .site-header .search-box .search-button i,
        .scrollToTop:after {
            color: #e7272d !important;
        }
        .header-icon-area .cart-icon-area .cart-icon-num,
        button,
        input[type="button"],
        input[type="reset"],
        input[type="submit"],
        .breadcrumb-area .entry-breadcrumb,
        .entry-header .entry-meta,
        .vc-post-slider .date,
        .entry-summary a.read-more:hover,
        .entry-summary a.read-more:active,
        #respond form .btn-send:hover,
        .widget_redchili_about ul li a,
        .search-form .custom-search-input button.btn,
        .sidebar-widget-area .widget h3:after,
        .error-page-area .error-page-message .home-page a,
        .rdtheme-button-1 a:hover,
        .wpcf7 .submit-button,
        .rdtheme-primary-bgcolor,
        .redchili-primary-bgcolor{
            background-color: #e7272d;
        }
        .widget .tagcloud a:hover {
            border: 1px solid #e7272d;
            background-color: #e7272d;
        }
        blockquote,
        .stick,
        .site-header .search-box .search-text,
        .scrollToTop,
        .entry-summary a.read-more:link,
        .entry-summary a.read-more:visited,
        #respond form .btn-send, {
            border-color: #e7272d;
        }
        .infobox-style2 i{
            color: #e7272d;
        }

        a:hover,
        a:focus,
        a:active {
            color: #d32f2f;
        }
        .search-form .custom-search-input button.btn:hover,
        .widget .tagcloud a:hover {
            background-color: #d32f2f;
        }
        .inner-page-banner-area .pagination-area h1{
            color: #ffffff;
        }
        .entry-banner .entry-banner-content h1 {
            color: #ffffff;
        }
        .inner-page-banner-area .pagination-area .redchili-pagination span a {
            color: #efefef;
        }
        .inner-page-banner-area .pagination-area .redchili-pagination span a:hover {
            color: #ffffff;
        }
        .inner-page-banner-area .pagination-area .redchili-pagination{
            color: #efefef;
        }
        .inner-page-banner-area .pagination-area .redchili-pagination > span:last-child {
            color: #e7272d;
        }
        .fmp-load-more button{
            border: 2px solid #e7272d !important;
            color: #e7272d !important;
        }
        .fmp-utility .fmp-load-more button:hover{
            background-color:#e7272d !important;
            color: #ffffff !important;
            border: 2px solid #e7272d !important;
        }
        .pagination-area ul li.active a,
        .pagination-area ul li a:hover,
        .pagination-area ul li .current {
            background-color: #e7272d;
            border-color: #e7272d;
        }
        .pagination-area ul li a,
        .pagination-area ul li span {
            border: 1px solid #e7272d;
        }
        .footer-area-top {
            background-color: #151515;
        }
        .footer-area-top,
        .footer-area-top .widget h4 a,
        .footer-area-top .opening-schedule li,
        .footer-area-top .widget li a,
        .footer-area-top .widget .tagcloud a{
            color: #d7d7d7;
        }
        .footer-area-top .widget h3 {
            color: #ffffff;
        }
        .footer-area-top .textwidget a:hover,
        .footer-area-top .widget a:hover,
        .footer-area-bottom p a:hover,
        .footer-area-top .widget li a:hover{
            color: #e7272d;
        }
        .footer-area-bottom{
            background-color: #e7272d;
        }
        .footer-area-bottom p,
        .footer-area-bottom p a{
            color: #ffffff;
        }
        .footer-area-top .footer-social li a {
            background: #e7272d;
        }
        .footer-area-top .footer-social li a:hover i{
            color: #e7272d;
        }

        .rc-sidebar h4 a:hover{
            color: #e7272d;
        }
        .widget ul li a i,
        .widget_categories ul li a i,
        .categories ul li a i,
        .widget ul li::before,
        .widget ul li a:hover,
        .widget_categories ul li a:hover,
        .archives ul li a:hover,
        .widget_archive ul li a:hover,
        .categories ul li a:hover
        .archives ul li span span,
        .widget_archive ul li span span,
        .recent-recipes .media-body h3 a:hover,
        .rc-sidebar .opening-schedule li span.os-close{
            color: #e7272d;
        }

        body {
            font-family: Roboto Slab, sans-serif;
            font-size: 14px;
            line-height: 24px;
        }
        h1 {
            font-family: Oswald;
            font-size: 40px;
            line-height: 44px;
        }
        h2 {
            font-family: Oswald, sans-serif;
            font-size: 28px;
            line-height: 31px;
        }
        h3 {
            font-family: Oswald, sans-serif;
            font-size: 20px;
            line-height: 26px;
        }
        h4 {
            font-family: Oswald, sans-serif;
            font-size: 16px;
            line-height: 18px;
        }
        h5 {
            font-family: Oswald, sans-serif;
            font-size: 14px;
            line-height: 16px;
        }
        h6 {
            font-family: Oswald, sans-serif;
            font-size: 12px;
            line-height: 14px;
        }

        .content-area {
            padding-top: 80px;
        }
        .ls-bar-timer {
            background-color: #e7272d;
            border-bottom-color: #e7272d;
        }
        .rt-wpls .wpls-carousel .slick-prev,
        .rt-wpls .wpls-carousel .slick-next {
            background-color: #e7272d;
        }
        .food-menu-title span i:before,
        .fmp-layout-custom-grid-by-cat1 .card-menu-price
        .fmp-layout-custom-grid-by-cat2 .amount,
        .fmp-layout-custom-grid-by-cat2 .fmp-price,
        .fmp-layout-custom-grid-by-cat3 .card-menu-price .amount,
        .fmp-layout-custom-grid-by-cat3 .card-menu-price,
        .tasty-menu-inner ul li .media-body .amount,
        .tasty-menu-inner ul li .media-body .card-menu-price,
        .food-menu2-area .food-menu2-box .food-menu2-img-holder .food-menu2-more-holder ul li a,
        .food-menu2-area .food-menu2-box .food-menu2-img-holder .food-menu2-more-holder ul li a:hover {
            color: #e7272d !important ;
        }
        .fmp-layout-custom-isotope-redchili-2 ul li a:hover{
            color: #e7272d !important ;
        }
        .food-menu-title span:before,
        .fmp-layout-carousel3 .amount,
        .food-menu4-area .food-menu4-box span.amount,
        .single-menu-area .single-menu-inner .related-products .food-menu2-box .food-menu2-title-holder .fmp-price,
        .fmp-layout-custom-isotope-redchili .isotop-price,
        .food-menu3-area .food-menu3-box .food-menu3-box-content .food-menu-price,
        .fmp-layout-carousel3 .fmp-price{
            background: #e7272d !important;
        }
        .food-menu2-area .food-menu2-box .food-menu2-title-holder .isotop-price-2,
        .fmp-layout-custom-isotope-redchili .isotop-price,
        .food-menu4-area .food-menu4-box .fmp-price {
            background-color: #e7272d !important;
        }
        .single-menu-area .single-menu-inner .single-menu-inner-content .price{
            color: #e7272d;
        }
        .food-menu-title span:after ,
        .food-menu3-area .food-menu3-box .food-menu3-box-img a:hover i ,
        .food-menu3-area .food-menu3-box .food-menu3-box-content .food-menu-price  {
            background: #e7272d;
        }
        .fmp-layout-isotope-redchili-home button {
            font-family: Oswald, sans-serif;
        }
        .food-menu3-area .food-menu3-box .food-menu3-box-content .food-menu-price:after {
            border-color: transparent #e7272d;
        }
        .wrapper .fmp-layout3 .fmp-box .fmp-title h3:hover{
            color: #e7272d;
        }
        .fmp-layout3 .fmp-info h3 a:hover{
            color: #e7272d;
        }
        .fmp-layout-custom-grid-by-cat2 h3.fmp-title a {
            color: #000000;
        }
        .fmp-layout-custom-grid-by-cat2 h3.fmp-title a:hover,
        .isotope-home h3 a:hover {
            color: #e7272d;
        }
        .fmp-wrapper .fmp-title h3 a:hover{
            color: #e7272d !important;
        }
        .food-menu1-area .food-menu1-box ul li .media-body h3 a:hover,
        .tasty-menu-inner ul li .media-body h3 a:hover{
            color: #e7272d !important;
        }
        .other-menu .owl-custom-nav .owl-prev,
        .other-menu .owl-custom-nav .owl-next,
        .rt-owl-nav-3 .owl-custom-nav .owl-prev,
        .rt-owl-nav-3 .owl-custom-nav .owl-next{
            background-color: #e7272d;
        }
        .isotope-home h4 a:hover,
        .food-menu3-area .food-menu3-box .food-menu3-box-content h3 a:hover {
            color: #e7272d !important;
        }
        .fmp-pagination ul.pagination-list li span,
        .fmp-pagination ul.pagination-list li a{
            background: transparent;
            color:#e7272d !important;
            border: 1px solid #e7272d !important;
        }
        .fmp-pagination ul.pagination-list li.active span,
        .fmp-pagination ul.pagination-list li span:hover,
        .fmp-pagination ul.pagination-list li a:hover{
            background: #e7272d !important;
            color: #ffffff  !important;
            border: 1px solid #e7272d !important;
        }
        .fmp-layout-carousel3 .fmp-title a.ghost-semi-color-btn{
            border: 2px solid #e7272d !important;
        }
        .fmp .title-bar-small-center::before {
            background-color: #e7272d !important;
        }
        .fmp-layout-carousel3 .owl-nav .owl-prev, .fmp-layout-carousel3 .owl-nav .owl-next, .fmp-layout-carousel3 .owl-controls .owl-dots .active span {
            border: 1px solid #e7272d !important;
        }
        .single-recipe-area .tools-bar li:last-child i,
        .single-recipe-area .single-recipe-inner .tools-bar li a i,
        .single-recipe-area .single-recipe-inner .tools-bar li a:hover,
        .single-recipe-area .single-recipe-inner .tools-bar li span,
        .single-recipe-area .single-recipe-inner .tools-bar li span,
        .content-box2 .content-box2-bottom-content-holder h3 a:hover,
        .recipe-serving i {
            color: #e7272d;
        }
        .single-recipe-area .single-recipe-inner .ingredients-box ul li i{
            background-color: #e7272d;
        }
        .title-recipe:before {
            background: #e7272d;
        }

        .owl-controls .owl-prev
        .owl-controls .owl-next,
        {
            border: 1px solid #e7272d;
        }
        .owl-controls .owl-next:hover
        .owl-controls .owl-prev:hover, {
            background: #e7272d !important;
        }

        .ghost-btn:hover {
            background: #e7272d;
            border: 2px solid #e7272d;
        }
        .ghost-color-btn {
            border: 2px solid #e7272d;
            color: #e7272d;
        }
        .ghost-color-btn-2 {
            border: 2px solid #e7272d;
            color: #e7272d;
        }
        .ghost-color-btn i {
            color: #e7272d;
        }
        .ghost-color-btn:hover {
            background: #e7272d;
        }
        .ghost-text-color-btn {
            color: #e7272d;
        }
        .ghost-text-color-btn:hover {
            border: 2px solid #e7272d;
            background: #e7272d;
        }
        .ghost-semi-color-btn:hover {
            background: #e7272d;
        }

        .title-bar-small-center:before,
        .title-bar-big-left-close:before,
        .title-bar-medium-left:before,
        .title-bar-small-left:before,
        .widget-title-bar:before,
        .rc-sidebar .widget-title-bar:before,
        .title-bar:after,
        .title-bar-big-center:before,
        .title-bar-full-width:before{
            background: #e7272d;
        }
        .title-small a:hover,
        .subtitle-color {
            color: #e7272d;
        }
        #commentform #submit.ghost-on-hover-btn:hover,
        .ghost-on-hover-btn:hover,
        input.ghost-on-hover-btn:hover,
        .single-recipe-area .ghost-on-hover-btn,
        .contact-us-right .wpcf7-form-control.ghost-on-hover-btn:hover,
        input.ghost-on-hover-btn{
            border: 2px solid #e7272d;
            color: #e7272d;
        }
        .default-btn {
            background: #e7272d;
        }

        .table-reservation2-area input.book-now-btn:hover,
        .book-now-btn:hover {
            color: #e7272d;
        }
        .table-reservation3-area input.book-now-btn:hover,
        .book-now-btn:hover {
            color: #e7272d;
        }
        .table-reservation1-area .book-now-btn{
            border: 1px solid #e7272d;
        }

        #scrollUp:hover i,
        #scrollUp:focus i {
            color: #e7272d;
        }
        .scrollToTop {
            background-color: #e7272d;
        }


        .about-one-area .about-one-area-top h2 span {
            color: #e7272d;
        }
        .about-layout-two .about2-top .about2-top-box h2 a:hover,
        .about-layout-two .about2-top .about2-top-box:hover i:before,
        .about-layout-two .about2-top .about2-top-box h2 a:hover,
        .about-layout-two .about2-top .about2-top-box:hover i:before,
        .about-layout-two .about2-award-box .media a i:before,
        .about-page-left p span span
        {
            color:#e7272d;
        }
        .about-page-right .owl-controls .owl-dots .active span{
            background:#e7272d;
        }
        .stylish-input-group .input-group-addon button span,
        .rc-sidebar .opening-schedule li span.os-close {
            color:#e7272d;
        }
        .about-one-area .title-bar-big-left:before {
            background: #e7272d;
        }

        .blog-page-box ul li span,
        .content-area .entry-blog-post ul li span{
            color:#e7272d;
        }
        .blog-page-box .rc-date,
        .content-area .entry-blog-post .rc-date,
        .content-area .single-blog-middle .single-blog-social li:hover {
            background: #e7272d;
        }
        .content-area .single-blog-middle .single-blog-tag ul li a {
            color: #e7272d;
        }
        .content-area .single-blog-middle .single-blog-tag ul li:hover {
            background: #e7272d;
            border: 1px solid #e7272d;
        }
        .content-area .single-blog-middle .single-blog-social li{
            border: 1px solid #e7272d;
        }

        .page-error-area .page-error-top {
            background: #e7272d;
        }

        .contact-us-left ul > li > i {
            color: #e7272d;
        }
        .contact-us-left ul > li .contact-social li:hover a {
            background: #e7272d;
            border: 1px solid #e7272d;
        }
        .single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(1) .progress-bar ,
        .single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(2) .progress-bar ,
        .single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(3) .progress-bar ,
        .single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(4) .progress-bar ,
        .single-chef-top-area .single-chef-top-content .skill-area .progress:nth-child(5) .progress-bar {
            background: #e7272d;
        }
        .single-chef-top-area .single-chef-top-content .single-chef-social li a {
            border: 1px solid #e7272d;
        }
        .event-social li:hover a,
        .single-chef-top-area .single-chef-top-content .single-chef-social li:hover a {
            border: 1px solid #e7272d;
            background: #e7272d;
        }
        .table-reservation1-area .reservation-form .reservation-input-box i{
            color: #e7272d;
        }
        .testimonial-style-4 .rc-icon-box::before{
            color: #e7272d;
        }

        .product-grid-view .woo-shop-top .view-mode ul li:first-child .fa,
        .product-list-view .woo-shop-top .view-mode ul li:last-child .fa,
        .woocommerce ul.products li.product h3 a:hover,
        .woocommerce ul.products li.product .price,
        .woocommerce .product-thumb-area .product-info ul li a:hover .fa,
        .woocommerce a.woocommerce-review-link:hover,
        .woocommerce div.product p.price, .woocommerce div.product span.price,
        .woocommerce div.product .product-meta a:hover,
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
        .woocommerce-message::before,
        .woocommerce-info::before {
            color: #e7272d;
        }

        .woocommerce ul.products li.product .onsale,
        .woocommerce span.onsale,
        .woocommerce a.added_to_cart,
        .woocommerce div.product form.cart .button,
        .woocommerce #respond input#submit,
        .woocommerce a.button,
        .woocommerce button.button,
        .woocommerce input.button,
        p.demo_store,
        .woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit[disabled]:disabled:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button[disabled]:disabled:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button[disabled]:disabled:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button[disabled]:disabled:hover,
        .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
        .woocommerce-account .woocommerce-MyAccount-navigation ul li a {
            background-color: #e7272d;
        }

        .woocommerce-message,
        .woocommerce-info {
            border-color: #e7272d;
        }

        .woocommerce .product-thumb-area .overlay {
            background-color: rgba(231, 39, 45, 0.8);
        }.rt-owl-dot-1 .owl-theme .owl-dots .owl-dot.active span,
         .rt-owl-dot-1 .owl-theme .owl-dots .owl-dot:hover span {
             background-color: #e7272d;
         }
        .rt-title-1 .subtitle-color {
            color: #e7272d;
        }
        .chef-area .owl-nav .owl-prev,
        .chef-area .owl-nav .owl-next,
        .rt-owl-event-slider .owl-nav .owl-prev,
        .rt-owl-event-slider .owl-nav .owl-next,
        .chef-area .owl-controls .owl-dots .active span,
        .rt-owl-event-slider .owl-controls .owl-dots .active span,
        .rt-owl-nav-2 .owl-nav .owl-prev,
        .rt-owl-nav-2 .owl-nav .owl-next{
            background-color: #e7272d !important;
        }
        .chef-area .owl-nav .owl-prev:hover,
        .chef-area .owl-nav .owl-next:hover,
        .rt-owl-event-slider .owl-nav .owl-prev:hover,
        .rt-owl-event-slider .owl-nav .owl-next:hover,
        .rt-owl-nav-2 .owl-nav .owl-prev:hover,
        .rt-owl-nav-2 .owl-nav .owl-next:hover{
            border: 1px solid #e7272d;
            background-color: transparent !important;
        }
        .chef-area .owl-nav .owl-prev:hover i,
        .chef-area .owl-nav .owl-next:hover i,
        .rt-owl-nav-2 .owl-nav .owl-prev:hover i,
        .rt-owl-nav-2 .owl-nav .owl-next:hover i,
        .rt-owl-event-slider .owl-nav .owl-prev:hover i,
        .rt-owl-event-slider .owl-nav .owl-next:hover i,
        .rt-owl-event-slider .content-box2 .content-box2-bottom-content-holder ul li i,
        .all-event-area .content-box2 .content-box2-bottom-content-holder ul li i,
        .pagination-area ul li, .woocommerce nav.woocommerce-pagination ul li {
            color: #e7272d !important;
        }
        .chef-box .chef-box-content,
        .chef-box .chef-box-content ul li:hover {
            background: #e7272d;
        }
        .chef-box .chef-box-content h3 a:hover {
            color: #e7272d;
        }
        .chef-box .chef-box-content p:before {
            background: #e7272d;
        }

        .recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content {
            border: 5px solid #e7272d;
        }
        .recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content .time-needs li i{
            color: #e7272d;
        }
        .recipe-of-the-day-area .owl-controls .active span {
            background: #e7272d !important;
        }
        .recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content .awards-box ul li a i {
            color: #e7272d;
        }
        .recipe-of-the-day-area .owl-prev i,
        .recipe-of-the-day-area .owl-next i{
            color:#e7272d;
        }
        .recipe-of-the-day-area .recipe-of-the-day-box .recipe-of-the-day-content h2 a:hover {
            color: #e7272d;
        }
        .fmp-layout-custom-grid-by-cat7 .menu-list li .food-menu-price table th:last-child ,
        .fmp-layout-custom-grid-by-cat7 .menu-list li .food-menu-price table td:last-child ,
        .fmp-layout-custom-grid-by-cat2 .menu-list li .food-menu-price table th:last-child ,
        .fmp-layout-custom-grid-by-cat2 .menu-list li .food-menu-price table td:last-child {
            color: #e7272d;
        }
        .content-box2 .content-box2-img-holder:after{
            background-color: rgba(231, 39, 45, 0.8);
        }
        .content-box2 .content-box2-bottom-content-holder ul li a:hover,
        .content-box2 .content-box2-bottom-content-holder ul li a i {
            color: #e7272d;
        }
        .rt-owl-testimonial-2 .rt-vc-content,
        .owl-theme .owl-controls .owl-prev,
        .owl-theme .owl-controls .owl-next,
        .chef-box .chef-sep {
            border-color: #e7272d;
        }
        .event-social li a{
            border: 1px solid #e7272d;
        }
        .event-mark {
            border-bottom: 35px solid #e7272d;
        }
        .client-reviews-area .client-reviews-right h2,
        .event-info ul li i{
            color: #e7272d;
        }

        .counter-right-1 i,
        .award1-area-box i,
        .about2-award-box .icon-part i{
            color: #e7272d;
        }

        .fmp-layout-carousel3 .owl-nav .owl-prev,
        .fmp-layout-carousel3 .owl-nav .owl-next,
        .fmp-layout-carousel3 .owl-controls .owl-dots .active span {
            background-color: #e7272d !important;
        }
        .fmp-layout-carousel3 .owl-nav .owl-prev:hover,
        .fmp-layout-carousel3 .owl-nav .owl-next:hover{
            border: 1px solid #e7272d;
            background-color: transparent !important;
        }
        .fmp-layout-carousel3 .owl-nav .owl-prev:hover i,
        .fmp-layout-carousel3 .owl-nav .owl-next:hover i {
            color: #e7272d !important;
        }
        .fmp-isotope-buttons button:hover ,
        .fmp-isotope-buttons button.selected {
            border: 1px solid #e7272d;
            background-color: #e7272d;
        }
        .infobox-style1-right h2 a:hover{
            color: #e7272d !important;
        }
        .info-box-1 i ,
        .infobox-style2 i {
            color: #e7272d;
        }
        .client-area .owl-controls .owl-dot:hover span {
            background: rgba(231, 39, 45, 0.5) !important;
        }
        .wfmc-area .wfmc-layout-1 .fmp-price,
        .client-area .owl-controls .active span {
            background: #e7272d !important;
        }
        .wfmc-info-1 .wfmc-title a:hover {
            color: #e7272d;
        }
        .wfmc-info-1 .title-bar-small-center:before {
            background-color: #e7272d;
        }
        .wfmc-info-1 .button.add_to_cart_button {
            border: 2px solid #e7272d;
        }
        .wfmc-info-1 .button.add_to_cart_button:hover {
            background-color: #e7272d;
        }
        .wfmc-area .owl-controls .owl-dots .active span {
            background-color: #e7272d;
        }
        .wfmc-area .owl-nav .owl-prev {
            border: 1px solid #e7272d;
        }
        .wfmc-area .owl-nav .owl-next {
            border: 1px solid #e7272d;
        }
        .wfmc-area .single_add_to_cart_button ,
        .wfmc-area .isotope-variable ,
        .wfmc-area .ajax_add_to_cart.add_to_cart_button {
            border: 2px solid #e7272d;
        }
        .wfmc-area .single_add_to_cart_button:hover,
        .wfmc-area .isotope-variable:hover,
        .wfmc-area .ajax_add_to_cart.add_to_cart_button:hover {
            background-color: #e7272d;
        }
        .wfmc-area .variations label {
            color: #e7272d;
        }
        .wfmc-area .modal-dialog .single_add_to_cart_button.button.alt {
            border-color: #e7272d;
            color: #e7272d;
        }
        #inner-isotope .fmp-iso-filter  .current {
            background: #e7272d;
        }
        #inner-isotope .single_add_to_cart_button ,
        #inner-isotope .isotope-variable ,
        #inner-isotope .ajax_add_to_cart.add_to_cart_button {
            border: 2px solid #e7272d;
            color: #e7272d;
        }
        #inner-isotope .single_add_to_cart_button:hover,
        #inner-isotope .isotope-variable:hover,
        #inner-isotope .ajax_add_to_cart.add_to_cart_button:hover {
            background-color: #e7272d;
        }
        #inner-isotope .variations label {
            color: #e7272d;
        }
        .wfmc-layout-3 .single_add_to_cart_button ,
        .wfmc-layout-3 .isotope-variable,
        .wfmc-layout-3 .ajax_add_to_cart.add_to_cart_button {
            border: 2px solid #e7272d;
            color: #e7272d;
        }
        .wfmc-layout-3 .single_add_to_cart_button:hover,
        .wfmc-layout-3 .isotope-variable:hover,
        .wfmc-layout-3 .ajax_add_to_cart.add_to_cart_button:hover {
            background-color: #e7272d;
            border: 2px solid #e7272d;
        }
        .wfmc-layout-3 .variations label {
            color: #e7272d;
        }
        .wfmc-layout-3 .rt-menu-price .woocommerce-Price-amount {
            background-color: #e7272d;
        }
        .wfmc-layout-3 .input-text.qty.text {
            border: 2px solid #e7272d;
        }body{
             margin: 0 auto;
         }
        .mean-container .mean-bar {
            width: 100%;
            position: relative;
            background: #d22727;
            padding: 4px 0;
            min-height: 42px;
            z-index: 999999;
            border-bottom: 2px solid #fff;
        }

        .mean-container a.meanmenu-reveal, .mean-container .mean-nav ul li a.mean-expand {
            color: #fff;
        }
        .mean-container a.meanmenu-reveal span {
            background-color: #fff;
        }
        .trheader.stickh .header-area {
            background: #E7272D;
        }
        .site-header .search-box .search-button i, .scrollToTop:after {
            color: #f7f7f7 !important;
        }
        .menu-main-menu-container .menu-main-menu ul li a {
            color: #fff !important;
        }
        .trheader #tophead, .trheader #tophead a, .trheader #tophead .tophead-social li a {
            color: #fff;
            background-color: #000;
        }
        .header-area {
            background: #E7272D;

        }
        .site-header .main-navigation ul li a {
            font-family: Oswald, sans-serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 24px;
            color: #fff;
            font-style: normal;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .site-header .main-navigation ul.menu &gt; li &gt; a:hover, .site-header .main-navigation ul.menu &gt; li.current-menu-item &gt; a, .site-header .main-navigation ul.menu &gt; li.current &gt; a, .trheader.non-stick .site-header .main-navigation ul.menu &gt; li &gt; a:hover, .trheader.non-stick .site-header .main-navigation ul.menu &gt; li.current-menu-item &gt; a, .trheader.non-stick .site-header .main-navigation ul.menu &gt; li.current &gt; a
                                                                                                                                                                                                                                                                                                                                                                                                                                                                     .vc_custom_1496996398698 {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                         padding-top: 53px !important;

                                                                                                                                                                                                                                                                                                                                                                                                                                                                     }



        }

        .trheader .header-area
        h2 {
            font-family: Oswald, sans-serif;
            font-size: 28px;
            line-height: 31px;
            color: #000;
        }
        .wpb_single_image img:hover {
            -webkit-transform: scale(.9);
            -ms-transform: scale(.9);
            transform: scale(.9);
            transition: all ease-in .5s;
            border: 3px solid #fff;
        }
        .entry-banner {
            background: url(assets/img/banner.jpg) no-repeat scroll center center / cover;
            height: 120px;}
        .inner-page-banner-area .pagination-area {
            position: relative;
            z-index: 1;
            text-align: left;
            padding: 5px;
        }
        .header-icon-seperator{
            visibility:hidden;
        }
        .fa-shopping-cart{
            visibility:hidden;
        }
        .cart-icon-num{
            visibility:hidden;
        }
    </style>
    <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1497517954323{padding-top: 60px !important;background-image: url(assets/img/award1-back.jpg) !important;}.vc_custom_1519832336379{padding-right: 100px !important;}.vc_custom_1519832608798{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}</style>
    <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1491372824650{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-image: url(assets/img/about1-bottom-back.png?id=337) !important;}.vc_custom_1497343404300{padding-top: 70px !important;padding-bottom: 70px !important;background-position: 0 0;background-repeat:-repeat;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>
<body class="page-template-default page page-id-320 wls_gecko wls_windows header-style-1 has-topbar topbar-style-1 no-sidebar product-grid-view mprm-checkout mprm-page mprm-success mprm-failed-transaction wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
<div class="wrapper">
    <?php include 'header.php' ?>
    <div id="meanmenu"></div>
    <div id="header-area-space"></div>
    <div class="inner-page-banner-area entry-banner">
        <div class="container">
            <div class="pagination-area">
                <h1>Reservation</h1>
                <div class="redchili-pagination"><!-- Breadcrumb NavXT 6.0.4 -->
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="Go to Aangon." href="index.php" class="home">
                            <span property="name">Aangon</span></a><meta property="position" content="1"></span> &gt; <span property="itemListElement" typeof="ListItem">
                        <span property="name">Reservation</span><meta property="position" content="2"></span></div>							</div>
        </div>
    </div>
    <div class="content-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <article id="post-431" class="post-431 page type-page status-publish hentry">
                        <div class="entry-content">
                            <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-o-full-height vc_row-o-columns-middle vc_row-flex" style="position: relative; left: -89.5px; box-sizing: border-box; width: 1349px; min-height: 33.6927vh;"><div class="wpb_column vc_column_container vc_col-sm-6"><div class="vc_column-inner "><div class="wpb_wrapper"><div role="form" class="wpcf7" id="wpcf7-f281-p431-o1" dir="ltr" lang="en-US">
                                                <div class="screen-reader-response"></div>
                                                <form action="#" method="post" class="wpcf7-form" novalidate="novalidate">
                                                    <div class="table-reservation2-area">
                                                        <div class="reservation-form2">
                                                            <span>Take A</span><br>
                                                            <h2>RESERVATION</h2>
                                                            <div class="reservation-input-box"><span class="wpcf7-form-control-wrap name-2"><input name="name-2" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="form-name" aria-required="true" aria-invalid="false" placeholder="Name" type="text"></span></div>
                                                            <div class="reservation-input-box"><span class="wpcf7-form-control-wrap email-2"><input name="email-2" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" id="form-subject" aria-required="true" aria-invalid="false" placeholder="Email" type="email"></span></div>
                                                            <div class="reservation-input-box"><span class="wpcf7-form-control-wrap tel-2"><input name="tel-2" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel form-control" id="form-phone" aria-required="true" aria-invalid="false" placeholder="Phone" type="tel"></span></div>
                                                            <div class="reservation-input-box"><i class="fa fa-calendar" aria-hidden="true"></i><span class="wpcf7-form-control-wrap date-2"><input name="date-2" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date form-control rt-date" id="form-date" aria-required="true" aria-invalid="false" type="date"></span></div>
                                                            <div class="reservation-input-box"><i class="fa fa-clock-o" aria-hidden="true"></i><span class="wpcf7-form-control-wrap time-2"><input name="time-2" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control rt-time" id="form-time" aria-required="true" aria-invalid="false" placeholder="Time" type="text"></span></div>
                                                            <div class="reservation-input-box"><span class="wpcf7-form-control-wrap textarea-2"><textarea name="textarea-2" cols="40" rows="2" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" id="form-message" aria-required="true" aria-invalid="false" placeholder="Message"></textarea></span></div>
                                                            <p><input value="Book A Table" class="wpcf7-form-control wpcf7-submit book-now-btn" type="button"><span class="ajax-loader"></span></p>
                                                            <div class="wpcf7-response-output wpcf7-display-none"></div></div>
                                                    </div>
                                                </form></div><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"></div></div></div></div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-6"><div class="vc_column-inner vc_custom_1519832336379"><div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_left  vc_custom_1519832608798">

                                                <figure class="wpb_wrapper vc_figure">
                                                    <div class="vc_single_image-wrapper   vc_box_border_grey"><img class="vc_single_image-img " src="assets/img/reservation.jpg" alt="reservation" title="reservation" width="400" height="406"></div>
                                                </figure>
                                            </div>
                                        </div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid vc_custom_1497517954323 vc_row-has-fill" style="position: relative; left: -89.5px; box-sizing: border-box; width: 1349px; padding-left: 89.5px; padding-right: 89.5px;"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="client-area ">
                                                <div class="owl-wrap rt-owl-nav-2 rt-owl-testi-1 rt-owl-dot-1  slider-nav-enabled">
                                                    <div class="row">
                                                        <div class="owl-theme owl-carousel rt-owl-carousel owl-loaded" data-carousel-options="{&quot;nav&quot;:false,&quot;navText&quot;:[&quot;<i class='fa fa-angle-left'><\/i>&quot;,&quot;<i class='fa fa-angle-right'><\/i>&quot;],&quot;dots&quot;:true,&quot;autoplay&quot;:true,&quot;autoplayTimeout&quot;:&quot;5000&quot;,&quot;autoplaySpeed&quot;:&quot;200&quot;,&quot;autoplayHoverPause&quot;:true,&quot;loop&quot;:true,&quot;margin&quot;:20,&quot;responsive&quot;:[{&quot;items&quot;:1}]}">






                                                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-5950px, 0px, 0px); transition: all 0.2s ease 0s; width: 8330px;"><div class="owl-item cloned" style="width: 1170px; margin-right: 20px;"><div class="client-box">
                                                                            <p style="color:#ffffff">We have eaten here on several occasions - the food has always been really good and the staff friendly.</p>
                                                                            <h3 class="title-bar-big-center" style="color:#ffffff">Julie W</h3>
                                                                            <p style="padding-top:15px; color:#ffffff">Direct, Ocean Group</p>				</div></div><div class="owl-item cloned" style="width: 1170px; margin-right: 20px;"><div class="client-box">
                                                                            <p style="color:#ffffff">Went there for my birthday meal with friends and got to say that I was impressed with the menu and staff were very helpful full</p>
                                                                            <h3 class="title-bar-big-center" style="color:#ffffff">Peter H</h3>
                                                                            <p style="padding-top:15px; color:#ffffff">CEO, Ocean Brand</p>				</div></div><div class="owl-item" style="width: 1170px; margin-right: 20px;"><div class="client-box">
                                                                            <p style="color:#ffffff">&nbsp;Came to restaurant for a meal with friends and could not have asked for a better experience. Food was spot on and service was fantastic. Would highly recommend</p>
                                                                            <h3 class="title-bar-big-center" style="color:#ffffff">Step2810</h3>
                                                                            <p style="padding-top:15px; color:#ffffff">CEO, Forest Brand</p>				</div></div><div class="owl-item" style="width: 1170px; margin-right: 20px;"><div class="client-box">
                                                                            <p style="color:#ffffff">We have eaten here on several occasions - the food has always been really good and the staff friendly.</p>
                                                                            <h3 class="title-bar-big-center" style="color:#ffffff">Julie W</h3>
                                                                            <p style="padding-top:15px; color:#ffffff">Direct, Ocean Group</p>				</div></div><div class="owl-item" style="width: 1170px; margin-right: 20px;"><div class="client-box">
                                                                            <p style="color:#ffffff">Went there for my birthday meal with friends and got to say that I was impressed with the menu and staff were very helpful full</p>
                                                                            <h3 class="title-bar-big-center" style="color:#ffffff">Peter H</h3>
                                                                            <p style="padding-top:15px; color:#ffffff">CEO, Ocean Brand</p>				</div></div><div class="owl-item cloned active" style="width: 1170px; margin-right: 20px;"><div class="client-box">
                                                                            <p style="color:#ffffff">&nbsp;Came to restaurant for a meal with friends and could not have asked for a better experience. Food was spot on and service was fantastic. Would highly recommend</p>
                                                                            <h3 class="title-bar-big-center" style="color:#ffffff">Step2810</h3>
                                                                            <p style="padding-top:15px; color:#ffffff">CEO, Forest Brand</p>				</div></div><div class="owl-item cloned" style="width: 1170px; margin-right: 20px;"><div class="client-box">
                                                                            <p style="color:#ffffff">We have eaten here on several occasions - the food has always been really good and the staff friendly.</p>
                                                                            <h3 class="title-bar-big-center" style="color:#ffffff">Julie W</h3>
                                                                            <p style="padding-top:15px; color:#ffffff">Direct, Ocean Group</p>				</div></div></div></div><div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style="display: none;"><i class="fa fa-angle-left"></i></div><div class="owl-next" style="display: none;"><i class="fa fa-angle-right"></i></div></div><div style="" class="owl-dots"><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div></div></div></div>
                                                    </div>
                                                </div>
                                            </div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div>
                        </div>
                    </article>									            </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</div>
<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
<script type='text/javascript' src='assets/js/jquery-2.2.4.min.js'></script>
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
<script type='text/javascript' src='assets/js/js_composer_front.min.js?ver=5.4.5'></script>
<script type='text/javascript' src='assets/js/owl.carousel.min.js?ver=2.3'></script>
<script>
    var baseUrl = '<?php echo baseUrl(); ?>';
</script>
<script type='text/javascript' src='assets/js/custom_script.js'></script>
</body>
</html>
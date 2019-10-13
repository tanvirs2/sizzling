<?php
include './config/config.php';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallery &#8211; Sizzling</title>
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
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link rel='stylesheet' id='owl-carousel-css'  href='assets/css/owl.carousel.min.css' type='text/css' media='all' />

    <style>
        .filter-button,.gallery-title{color:#42B32F;text-align:center}.gallery-title{font-size:36px;font-weight:500;margin-bottom:70px}.filter-button,.gallery_product{margin-bottom:30px}.gallery-title:after{content:"";position:absolute;width:7.5%;left:46.5%;height:45px;border-bottom:1px solid #5e5e5e}.filter-button{font-size:18px;border:1px solid #42B32F;border-radius:5px}.btn-default:active .filter-button:active,.filter-button:hover{background-color:#42B32F;color:#fff}.filter-button:hover{font-size:18px;border:1px solid #42B32F;border-radius:5px;text-align:center}.port-image{width:100%}
    </style>
   <noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>
<body class="page-template-default page page-id-320 wls_gecko wls_windows header-style-1 has-topbar topbar-style-1 no-sidebar product-grid-view mprm-checkout mprm-page mprm-success mprm-failed-transaction wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
<div class="wrapper">
    <?php include 'header.php' ?>
    <div id="meanmenu"></div>
    <div id="header-area-space"></div>
    <div class="inner-page-banner-area entry-banner">
        <div class="container">
            <div class="pagination-area">
                <h1>Gallery</h1>
                <div class="redchili-pagination"><!-- Breadcrumb NavXT 6.0.4 -->
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Sizzling." href="index.php" class="home"><span property="name">Sizzling</span></a><meta property="position" content="1"></span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name">Gallery</span><meta property="position" content="2"></span></div>							</div>
        </div>
    </div>
    <div class="content-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="container">
                        <?php
                        //Get Data
                        $arrayBanner = array();
                        $sqlbanner = "SELECT * FROM tbl_gallery WHERE banner_status='Active' ORDER BY banner_id DESC";
                        $resultBanner = mysqli_query($con, $sqlbanner);
                        if ($resultBanner) {
                            while ($objBanner = mysqli_fetch_object($resultBanner)) {
                                $arrayBanner[] = $objBanner;
                            }
                        } else {
                            $success = "Something went wrong!";
                        }
                        ?>
                        <div class="row">
                            <?php foreach ($arrayBanner AS $banner): ?>
                            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                                <img src="<?php echo $config['IMAGE_UPLOAD_URL'] . '/gallery_image/' . $banner->banner_image; ?>" class="img-responsive">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</div>
<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
<script>
    var baseUrl = '<?php echo baseUrl(); ?>';
</script>
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
<script type='text/javascript' src='assets/js/custom_script.js'></script>
<?php include "footer_script.php"; ?>
</body>
</html>
<?php
include './config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $config['SITE_NAME']; ?> | Home</title>
    <meta name="description" content="Best online shop in Comilla. Online shop in Comilla, Comilla Online shopping, Eshop Comilla">
    <meta name="keywords" content="Online shopping in Comilla, necklace, bracelet, pendant, women's fashion jewelry, women's fashion jewelry online, necklaces for womens, bracelets for women, earrings jewelry, quartz watches in bd, mens watch, led watch,wrist watch online, pendant necklace sets, fashionable jewelry for cheap">
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="author" content="Nazrul Kabir">
    <!--    For Facebook-->
    <meta property="og:title" content="Eighteen Lifestyle Store" />
    <meta property=”og:type” content=”website” />
    <meta property="og:description" content="Huge collection of men's watches & women's fashion jewelry" />
    <meta property="og:url" content="https://www.eighteenstore.com/" />
    <meta property="og:image" content="https://eighteenstore.com/images/FB-Meta-Image.jpg" />
    <meta property="og:image:width" content="450"/>
    <meta property="og:image:height" content="298"/>
    <!--    For Twitter-->
    <meta name="twitter:title" content="Eighteen | Superior shopping experience" />
    <meta name="twitter:description" content="Huge collection of men's watches & women's fashion jewelry" />
    <meta name="twitter:card" content="profile" />
    <meta name="twitter:site" content="@18lifestylebd" />
    <meta name="twitter:image" content="https://eighteenstore.com/assests/images/Twitter-Meta-Image.jpg" />
    <meta name="twitter:creator" content="@18lifestylebd" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- All css files are included here. -->
    <?php include 'header_script.php'; ?>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>
<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="1873624272853889"
     logged_in_greeting="Hello! How can we help you?"
     logged_out_greeting="Hello! How can we help you?">
</div>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Body main wrapper start -->
<div class="wrapper fixed__footer">
    <!-- Start Header Style -->
    <?php include "header.php"; ?>
    <!-- End Offset Wrapper -->
    <div class="slider__container slider--one">
        <div class="slider__activation__wrap owl-carousel owl-theme">
            <?php
            //Get Product Category
            $arrayProductCategory = array();
            $sqlGetProductCategory = "SELECT product_category_id,product_category_name FROM tbl_product_category WHERE product_category_status='Active'";
            $resultGetProductCategory = mysqli_query($con, $sqlGetProductCategory);
            if ($resultGetProductCategory) {
                while ($objCategory = mysqli_fetch_object($resultGetProductCategory)) {
                    $arrayProductCategory[] = $objCategory;
                }
            }
            //Get Banner
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
            <?php if (count($arrayBanner) > 0): ?>
                <?php foreach ($arrayBanner AS $banner): ?>
                    <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url(<?php echo $config['IMAGE_UPLOAD_URL'] . '/banner/' . $banner->banner_image; ?>) no-repeat scroll center center / cover ;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                    <div class="slider__inner">
                                        <?php $banner->banner_title;
                                        $textWithoutLastWord = preg_replace('/\W\w+\s*(\W*)$/', '$1', $banner->banner_title);
                                        preg_match('/[^ ]*$/', $banner->banner_title, $results);
                                        $last_word = $results[0];
                                        ?>
                                        <h1><?php echo $textWithoutLastWord; ?> <span class="text--theme"><?php echo $last_word; ?></span></h1>
                                        <?php if (count($arrayProductCategory) > 0): ?>
                                            <?php foreach ($arrayProductCategory AS $productCategory): ?>
                                                <?php
                                                if ($productCategory->product_category_id == $banner->banner_link): ?>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn" href="category?name=<?php echo $productCategory->product_category_name; ?>">shop now</a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url(images/slider/Fashion-Jewellery-Collection.jpg) no-repeat scroll center center / cover ;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                <div class="slider__inner">
                                    <h1>Fashion Jewellery <span class="text--theme">Collection</span></h1>
                                    <div class="slider__btn">
                                        <a class="htc__btn" href="collection?id=2">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- End Single Slide -->
        </div>
    </div>
    <!-- Start Slider Area -->
    <!-- Start Our Product Area -->
    <section class="htc__product__area ptb--130 bg__white">
        <div class="container">
            <div class="htc__product__container">
                <!-- Start Product MEnu -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__menu">
                            <?php
                            /*
                             * getting product category
                             */
                            $sqlGetProductCategory = "SELECT product_category_id,product_category_name FROM tbl_product_category WHERE product_category_status='Active'";
                            $resultGetProductCategory = mysqli_query($con, $sqlGetProductCategory);
                            ?>
                            <button data-filter="*"  class="is-checked">All</button>
                            <?php if (count($resultGetProductCategory) > 0): ?>
                                <?php while ($objProductCategory = mysqli_fetch_object($resultGetProductCategory)): ?>
                                    <button data-filter=".cat--<?php echo $objProductCategory->product_category_id; ?>"><?php echo $objProductCategory->product_category_name; ?></button>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- End Product MEnu -->
                <div class="row">
                    <div class="product__list">
                        <?php
                        $categories = "SELECT * FROM tbl_product_category WHERE product_category_status='Active' ";
                        $cats = mysqli_query($con, $categories);
                        ?>
                        <?php while($objCategory = mysqli_fetch_object($cats)): ?>
                            <?php $articles = "SELECT * FROM tbl_product WHERE product_category_id='$objCategory->product_category_id' LIMIT 9";
                            $resAtr = mysqli_query($con, $articles);
                            $objP = mysqli_fetch_object($resAtr);
                            ?>
                            <?php while($objP = mysqli_fetch_object($resAtr)):?>
                                <!--                                --><?php //debug($objP); ?>
                                <div class="col-md-3 single__pro col-lg-3 cat--<?php echo $objP->product_category_id; ?> col-sm-4 col-xs-12">
                                    <div class="product foo">
                                        <div class="product__inner">
                                            <div class="pro__thumb">
                                                <a href="products?name=<?php echo $objP->product_title; ?>">
                                                    <img src="upload/product_image/<?php echo $objP->product_image; ?>" alt="<?php echo $objP->product_title; ?>" onerror="this.src='images/no-image-available.jpg';">
                                                </a>
                                            </div>
                                            <div class="product__hover__info">
                                                <ul class="product__action">
                                                    <a title="View" href="products?name=<?php echo $objP->product_title; ?>" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a>
                                                </ul>
                                            </div>
                                            <div class="add__to__wishlist">
                                                <a data-toggle="tooltip" title="Add To Wishlist" class="add-to-cart" href="#"><span class="ti-heart"></span></a>
                                            </div>
                                        </div>
                                        <div class="product__details">
                                            <h2><a href="products?name=<?php echo $objP->product_title; ?>"><?php echo $objP->product_title; ?></a></h2>
                                            <ul class="product__price">
                                                <?php if($objP->product_old_price != '0.00') : ?>
                                                    <li class="old__price">৳<?php echo $objP->product_new_price; ?></li>
                                                    <li class="new__price">৳<?php echo $objP->product_old_price; ?></li>
                                                <?php else: ?>
                                                    <li class="new__price">৳<?php echo $objP->product_new_price; ?></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endwhile; ?>
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
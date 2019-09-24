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
//debug($arrayTempCart);
?>
<header id="header" class="htc-header">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    <div class="logo">
                        <a href="index">
                            <img src="images/s3.png" alt="<?php echo $config['SITE_NAME']; ?>">
                        </a>
                    </div>
                </div>
                <!-- Start Mainmenu Ares -->
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">
                            <li><a href="index">Home</a></li>
                            <li class="drop"><a href="#">Products</a>
                                <ul class="dropdown">
                                    <?php foreach ($arrayCategory AS $category): ?>
                                        <?php $cat_name = $category->product_category_name;
                                        $name = str_replace(' ', '-', $cat_name);
                                        ?>
                                        <li><a href="category?name=<?php echo $name; ?>"><?php echo $category->product_category_name; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="drop"><a href="#">Collections</a>
                                <ul class="dropdown">
                                    <?php foreach ($arrayCollection AS $collection): ?>
                                        <li><a href="collection?id=<?php echo $collection->product_category_id; ?>"><?php echo $collection->product_category_name; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li><a href="about-us">About Us</a></li>
                            <li><a href="contact-us">Contact Us</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu clearfix visible-xs visible-sm">
                        <nav id="mobile_dropdown">
                            <ul>
                                <li><a href="index">Home</a></li>
                                <li><a href="#">Products</a>
                                    <ul>
                                        <?php foreach ($arrayCategory AS $category): ?>
                                            <li><a href="category?name=<?php echo $category->product_category_id; ?>"><?php echo $category->product_category_name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li><a href="#">Collections</a>
                                    <ul>
                                        <?php foreach ($arrayCollection AS $collection): ?>
                                            <li><a href="collection?id=<?php echo $collection->product_category_id; ?>"><?php echo $collection->product_category_name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li><a href="about-us">About Us</a></li>
                                <li><a href="contact-us">Reach Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End MAinmenu Ares -->
                <div class="col-md-4 col-sm-4 col-xs-3">
                    <ul class="menu-extra">
                        <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                        <?php if (getSession("user_name") != ''): ?>
                            <li><a href="dashboard"><span class="ti-user"></span><?php echo getSession("user_name"); ?></a></li>
                        <?php else: ?>
                            <li><a href="login-register"><span class="ti-user"></span><?php echo getSession("user_name"); ?></a></li>
                        <?php endif; ?>
                        <li class="cart__menu"><span class="ti-shopping-cart"></span><sup><b><?php echo count($arrayTempCart);?></b></sup></li>
                    </ul>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container" >
            <div class="row" >
                <div class="col-md-12" >
                    <div class="search__inner">
                        <form action="#">
                            <input placeholder="Search here... " type="text">
                            <button type="button"></button>
                        </form>
                        <div class="search__close__btn">
                            <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <?php if (count($arrayTempCart) > 0): ?>
                <div class="shp__cart__wrap">
                    <?php foreach ($arrayTempCart AS $TempCart): ?>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="<?php echo baseUrl(); ?>upload/product_image/<?php echo $TempCart->product_image; ?>" alt="<?php echo $TempCart->product_title; ?>" onerror="this.src='images/no-image-available.jpg';">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details?id=<?php echo $TempCart->product_id; ?>"><?php echo $TempCart->product_title; ?></a></h2>
                                <span class="quantity">QTY: <?php echo $TempCart->temp_order_product_qty; ?></span>
                                <span class="shp__price">৳<?php echo $TempCart->temp_order_product_price; ?></span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="shp__cart__wrap">
                    <div class="shp__single__product">
                        <p>Your cart is empty. Start shopping now!</p>
                    </div>
                </div>
            <?php endif; ?>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal:</li>
                <li class="total__price">৳ <?php echo number_format($subTotal, 2); ?></li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="cart">View Cart</a></li>
                <li class="shp__checkout"><a href="checkout">Checkout</a></li>
            </ul>
        </div>
    </div>
</div>
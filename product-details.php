<?php
include './config/config.php';
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
}
$sqlProduct = "SELECT * FROM tbl_product WHERE product_id='$product_id' ";
$resultProduct = mysqli_query($con, $sqlProduct);
$objProduct = mysqli_fetch_object($resultProduct);
//Add to cart
$temp_order_session_id = session_id();
$product_quantity = 1;
$product_price = '';
if (isset($_POST['add_to_cart'])) {
    extract($_POST);
    $product_quantity = validateInput($product_quantity);
    $product_id = validateInput($product_id);
    if ($product_quantity === '') {
        $error = "Please fill up required fields.";
    } elseif ($product_id === '0') {
        $error = "Please fill up required fields.";
    } else {
        $insertItemTmpCart = '';
        $insertItemTmpCart .=' temp_order_product_id = "' . validateInput($product_id) . '"';
        $insertItemTmpCart .=', temp_order_product_qty = "' . validateInput($product_quantity) . '"';
        $insertItemTmpCart .=', temp_order_product_price = "' . validateInput($product_price) . '"';
        $insertItemTmpCart .=', temp_order_session_id = "' . validateInput($temp_order_session_id) . '"';

        $sqlInsertItemTempCart = "INSERT INTO tbl_temp_order SET $insertItemTmpCart";
        $resultInsertITempCart = mysqli_query($con, $sqlInsertItemTempCart);
        if ($resultInsertITempCart) {
            $success = "Product has been added to your cart";
//            $sqlGetStock = "SELECT product_stock_quantity FROM tbl_product WHERE product_id = '$product_id' ";
//            $resultGetStock = mysqli_query($con, $sqlGetStock);
//            $objGetStock = mysqli_fetch_object($resultGetStock);
//            $product_stock_quantity = $objGetStock->product_stock_quantity;
//            $updateStock = '';
//            $updateStock .=' product_stock_quantity = "' . --$product_stock_quantity . '"';
//            $sqlUpdateStock = "UPDATE tbl_product SET $updateStock WHERE product_id=$product_id";
//            $resultUpdateStock = mysqli_query($con, $sqlUpdateStock);
//            if ($resultUpdateStock) {
//                $success = "Product has been added to your cart";
//            } else {
//                $error = "Error. Stock update failed";
//            }
        } else {
            $error = "Something went wrong.";
        }
    }
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $config['SITE_NAME']; ?> | <?php echo $objProduct->product_title; ?></title>
    <meta name="description" content="Eighteen provides best online shopping experience in Comilla. Huge collection of men's watches - Top brands, Trendy, stylish jewellery collection from Tk. 80 - Earrings, bracelet, pendant, bangle set, rings">
    <meta name="keywords" content="Online jewellery shopping in Comilla, necklace, bracelet, pendant, women's fashion jewelry, women's fashion jewelry online, necklaces for womens, bracelets for women, earrings jewelry, quartz watches in bd, mens watch, led watch,wrist watch online, pendant necklace sets, fashionable jewelry for cheap">
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="author" content="Nazrul Kabir">
    <meta name="description" content="Eighteen provides best online shopping experience in Comilla. Huge collection of men's watches - Top brands, Trendy, stylish jewellery collection from Tk. 80 - Earrings, bracelet, pendant, bangle set, rings">
    <meta name="keywords" content="Online jewellery shopping in Comilla, necklace, bracelet, pendant, women's fashion jewelry, women's fashion jewelry online, necklaces for womens, bracelets for women, earrings jewelry, quartz watches in bd, mens watch, led watch,wrist watch online, pendant necklace sets, fashionable jewelry for cheap">
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="author" content="Nazrul Kabir">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "header_script.php"; ?>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
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
                            <h2 class="bradcaump-title">Product Details</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Products</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Our Product Area -->
    <section class="htc__product__details pt--110 pb--100 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include 'message.php'?>
                </div>
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="product__details__container">
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <?php if($objProduct->product_status !== 'Active') : ?>
                                        <div class="ribbon red" style="right: 10px;"><span>SOLD OUT</span></div>
                                    <?php endif; ?>
                                    <img src="upload/product_image/<?php echo $objProduct->product_image; ?>" alt="<?php echo $objProduct->product_title; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-30 xmt-30">
                    <!--                    --><?php //debug($objProduct); ?>
                    <div class="htc__product__details__inner">
                        <div class="pro__detl__title">
                            <h2><?php echo $objProduct->product_title; ?>-<?php echo $objProduct->product_sku; ?></h2>
                        </div>
                        <hr>
                        <div class="pro__details">
                            <p><?php echo html_entity_decode($objProduct->product_details, ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></p>
                        </div>
                        <ul class="pro__dtl__prize">
                            <?php if($objProduct->product_old_price != '0.00') : ?>
                                <li class="old__price">৳<?php echo $objProduct->product_new_price; ?></li>
                            <?php endif; ?>
                            <li>৳<?php echo $objProduct->product_new_price; ?></li>
                        </ul>
                        <form method='POST' action='#'>
                            <input type="hidden" name="product_id" value="<?php echo $objProduct->product_id; ?>">
                            <?php if($objProduct->product_old_price != '0.00') : ?>
                                <input type="hidden" name="product_price" value="<?php echo $objProduct->product_old_price; ?>">
                            <?php endif; ?>
                            <input type="hidden" name="product_price" value="<?php echo $objProduct->product_new_price; ?>">
                            <?php if($objProduct->product_stock_quantity <= '1') : ?>
                                <span class="label label-warning">Last item in stock</span>
                            <?php endif; ?>
                            <div class="product-action-wrap">
                                <div class="prodict-statas"><span>Quantity :</span></div>
                                <div class="product-quantity">
                                    <div class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="product_quantity" id="product_quantity" value="<?php echo $product_quantity; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="pro__dtl__btn">
                                <li class="buy__now__btn">
                                    <?php if($objProduct->product_status == 'Active') : ?>
                                        <button type="submit" class="" name="add_to_cart" id="add_to_cart">Add to Cart</button>
                                    <?php else: ?>
                                        <button type="button" class="disabled" name="add_to_cart" id="add_to_cart">SOLD OUT!</button>
                                    <?php endif; ?>
                                    <!--                                    <button type="submit" class="btn" name="add_to_cart" id="add_to_cart">Add to Cart</button>-->
                                    <!--                                    <a href="#" >Add to Cart</a>-->
                                </li>
                                <li><a href="#"><span class="ti-heart"></span></a></li>
                                <li><a href="http://m.me/18lifestyle" target="_blank"><span class="ti-email"></span></a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Product Area -->
    <!-- Start Footer Area -->
    <?php include "footer.php" ?>
    <!-- End Footer Area -->
</div>
<?php include "footer_script.php" ?>
</body>

</html>
<?php
include './config/config.php';
$subTotal = 0;
$arrayTempCart = array();
$totalProduct = 0;
$array1 = array();
$sqlTempCart = "SELECT tbl_temp_order.*,tbl_product.*,SUM(temp_order_product_qty) AS totalProduct"
    . " FROM tbl_temp_order"
    . " LEFT JOIN tbl_product ON tbl_temp_order.temp_order_product_id = tbl_product.product_id"
    . " WHERE temp_order_session_id='" . session_id() . "'";
$resultTempCart = mysqli_query($con, $sqlTempCart);

if ($resultTempCart) {
    while ($objTempCart = mysqli_fetch_object($resultTempCart)) {
        $arrayTempCart[] = $objTempCart;
        $subTotal += $objTempCart->temp_order_product_price;
        $totalProduct = $objTempCart->totalProduct;
    }
}
// confirm order
$phoneNo = getSession('user_mobile');
$order_name = getSession('user_name');
$order_track_no = '';
$order_session_id = session_id();
$order_payment_method = '';
$order_ship_address = '';
$order_created_on = date('Y-m-d H:i:s');
$order_total_quantity = '';
$order_phone = '';
$order_delivery_charge = '';
$order_amount = '';
$order_user_id = '';
$order_status = 'Received';
$checkboxes = '';
$code_no = '';
if (isset($_POST['btnConfirmOrderSubmit'])) {
    extract($_POST);
    $len = strlen($phone);
    $phone = validateInput($_POST['phone']);
    if(getSession('user_name') != ''){
        $order_name = validateInput($order_name);
    } else {
        $order_name = validateInput($_POST['order_name']);
    }
    $order_track_no = randCode(10);
    if ($phone === '') {
        $error = "Please provide your 11 digit mobile number";
    } elseif (is_numeric($phone) && $len !== 11) {
        $error = "Please provide valid 11 digit mobile number";
    } else {
        $order_amount = str_replace(",", "", $order_amount);
        $insertOrder = '';
        $insertOrder .= 'order_amount = "' . $order_amount . '"';
        $insertOrder .= ',order_phone = "' . $phone . '"';
        $insertOrder .= ',order_name = "' . $order_name . '"';
        $insertOrder .= ',order_total_quantity = "' . $order_total_quantity . '"';
        $insertOrder .= ',order_created_on = "' . $order_created_on . '"';
        $insertOrder .= ',order_status = "' . $order_status . '"';
        $insertOrder .= ',order_ship_address = "' . $order_ship_address . '"';
        $insertOrder .= ',order_session_id = "' . $order_session_id . '"';
        $insertOrder .= ',order_track_no = "' . $order_track_no . '"';

        if (getSession('user_id') > 0) {
            $order_user_id = getSession('user_id');
            $insertOrder .= ',order_user_id = "' . $order_user_id . '"';
        } else {
            $order_user_id = 0;
            $insertOrder .= ',order_user_id = "' . $order_user_id . '"';
            $sqlInsertOrder = "INSERT INTO tbl_order SET $insertOrder";
            $resultInsertOrder = mysqli_query($con, $sqlInsertOrder);
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
                }
                if ($resultInsertOrderDetails) {
                    $sqlDel = "DELETE FROM tbl_temp_order WHERE temp_order_session_id='$order_session_id'";
                    $resDel = mysqli_query($con, $sqlDel);
                    if ($resDel) {
                        $sqlDel1 = "DELETE FROM tbl_code WHERE code_no='$code_no' AND session_id='$order_session_id'";
                        $resultDel1 = mysqli_query($con, $sqlDel1);
                        if ($resultDel1) {
                            $success = "Order Received Successfully. Order ID - " . $order_track_no . ". Our processing team will call you soon :)";
//                                $mobile = '88' . $order_phone;
//                                $smsText = rawurlencode("Thank you for your order at Boidokan.com. Your Order Id is " . $order_track_no . "Happy Reading!");
//                                $url = "http://msms.techcloudltd.com/msms/clientRequest/receiveClientRequest.jsp?sms_text=" . $smsText . "&numbers=" . $mobile . "&custom_param=0&user_name=boidokan&user_pass=boidokan@123&brand_name=Boidokan";
//                                $ch = curl_init();
//                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                                curl_setopt($ch, CURLOPT_URL, $url);
//                                $data = curl_exec($ch);
                        } else {
                            $error = "Something went wrong. Please try again.";
                        }
                    } else {
                        $error = "Something went wrong. Please try again.";
                    }
                } else {
                    $error = "Something went wrong. Please try again.";
                }
            } else {
                $error = "Something went wrong. Please try again.";
            }
        }
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout || <?php echo $config['SITE_NAME']; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "header_script.php"; ?>
</head>
<body>
<script>
    fbq('track', 'Purchase');
</script>
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
                            <h2 class="bradcaump-title">Checkout</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Checkout</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Our Main Area -->
    <section class="our-checkout-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="ckeckout-left-sidebar">
                        <!-- Start Checkbox Area -->
                        <div class="checkout-form">
                            <h2 class="section-title-3">Your details</h2>
                            <div class="mt--40">
                                <?php include 'message.php'; ?>
                            </div>
                            <div class="checkout-form-inner">
                                <form method="POST" action="">
                                    <input type="hidden" id="order_amount" name="order_amount" value="<?php echo number_format($subTotal, 2); ?>" />
                                    <input type="hidden" id="order_total_quantity" name="order_total_quantity" value="<?php echo $totalProduct; ?>" />
                                    <div class="single-checkout-box">
                                        <input type="text" placeholder="Name*" style="width:100%" name="order_name" value="<?php echo $order_name;?>" required>
                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="email" placeholder="Email" name="email">
                                        <input type="text" name="phone" placeholder="Phone* e.g.01615800642" minlength="11" maxlength="11" required value="<?php echo $phoneNo; ?>">
                                    </div>
                                    <div class="single-checkout-box">
                                        <textarea name="order_ship_address" placeholder="Delivery Address*" required><?php echo $order_ship_address;?></textarea>
                                    </div>
                                    <div class="single-checkout-box mt--40">
                                        <div class="form-group">
                                            <label>
                                                <div class="">
                                                    <input name="checkboxes" type="checkbox" required id="checkboxes-1" value="1" style="width: auto;" <?php
                                                    if ($checkboxes === '1') {
                                                        echo "checked";
                                                    }
                                                    ?> >  I have read and agree to the <a href="terms-and-conditions.php" style="color: #337ab7;">Terms &amp; Conditions</a>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="single-checkout-box checkbox">
                                        <input id="remind-me" type="checkbox">
                                        <label for="remind-me"><span></span>Create a Account ?</label>
                                    </div>
                                    <div class="checkout-btn">
                                        <button class="btn ts-btn btn-light btn-large hover-theme" type="submit" name="btnConfirmOrderSubmit">CONFIRM &amp; BUY NOW</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Checkbox Area -->
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="checkout-right-sidebar">
                        <div class="our-important-note">
                            <h2 class="section-title-3">Note :</h2>
                            <p class="note-desc">Your delivery will be confirmed over phone.</p>
                            <ul class="important-note">
                                <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Next day delivery inside Comilla</a></li>
                                <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Delivery within 2-3 days inside Dhaka</a></li>
                                <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>On condition delivery whole Bangladesh</a></li>
                            </ul>
                        </div>
                        <div class="puick-contact-area mt--60">
                            <h2 class="section-title-3">Quick Contact</h2>
                            <a href="tel:+8801671121200">+88 01671 121200</a>
                        </div>
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
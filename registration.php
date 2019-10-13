<?php
include './config/config.php';
$user_name = '';
$user_mobile = '';
$user_address = '';
$user_email = '';
$user_password = '';
$retype_password = '';
$user_town = '';
$user_zip = '';
$user_last_name = '';
$user_created_on = date('Y-m-d H:i:s');

if (isset($_POST['btn_user_save'])) {
    extract($_POST);
    $user_name = validateInput($user_name);
    $user_mobile = validateInput($user_mobile);
    $user_address = validateInput($user_address);
    $user_email = validateInput($user_email);
    $user_password = validateInput($user_password);
    $retype_password = validateInput($retype_password);

    if ($user_mobile == '') {
        $error = "Please provide mobile number";
    } elseif ($user_email == '') {
        $error = "Please provide email address";
    } elseif ($user_password == '') {
        $error = "Please provide password";
    } elseif ($user_password !== $retype_password) {
        $error = "Password not matched";
    } else {
        $user_secure_password = securedPass($user_password);
        $insertarray = '';
        $insertarray .= 'user_name = "' . $user_name . ' ' . $user_last_name . '"';
        $insertarray .= ',user_mobile = "' . $user_mobile . '"';
        $insertarray .= ',user_address = "' . $user_address . ' ' . $user_town . ' ' . $user_zip . '"';
        $insertarray .= ',user_email = "' . $user_email . '"';
        $insertarray .= ',user_password = "' . $user_secure_password . '"';
        $insertarray .= ',user_password_text = "' . $user_password . '"';
        $insertarray .= ',user_created_on = "' . $user_created_on . '"';

        $sql_check_user = "SELECT * FROM tbl_user WHERE user_email = '$user_email'";
        $result_check_user = mysqli_query($con, $sql_check_user);
        $count_user = mysqli_num_rows($result_check_user);
        if ($count_user >= 1) {
            $error = "A member already exists with same email address! Forgot your password?";
        } else {
            $sqlinsert = "INSERT INTO tbl_user SET $insertarray";
            $user_name = $user_last_name = $retype_password = $user_mobile = $user_address = $user_email = $user_password = '';
//            debug($sqlinsert);
//            exit();
            $resultinsert = mysqli_query($con, $sqlinsert);
            if ($resultinsert) {
                $success = "Your registration completed successfully.";
            } else {
                $error = "Something went wrong! Alas!";
            }
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
    <title>Get Registered &#8211; Sizzling</title>
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
    <style type="text/css">#red{color:red;}</style>
    <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1491372824650{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;background-image: url(assets/img/about1-bottom-back.png?id=337) !important;}.vc_custom_1497343404300{padding-top: 70px !important;padding-bottom: 70px !important;background-position: 0 0;background-repeat:-repeat;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>
<body class="page-template-default page page-id-320 wls_gecko wls_windows header-style-1 has-topbar topbar-style-1 no-sidebar product-grid-view mprm-checkout mprm-page mprm-success mprm-failed-transaction wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
<div class="wrapper">
    <?php include 'header.php' ?>
    <div id="meanmenu"></div>
    <div id="header-area-space"></div>
    <div class="inner-page-banner-area entry-banner">
        <div class="container">
            <div class="pagination-area">
                <h1>Registration</h1>
                <div class="redchili-pagination"><!-- Breadcrumb NavXT 6.0.4 -->
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Aangon." href="index.php" class="home"><span property="name">Aangon</span></a><meta property="position" content="1"></span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name">Registration</span><meta property="position" content="2"></span></div>							</div>
        </div>
    </div>
    <div class="content-area checkout-page-area">
        <div class="container">
            <form class="reservation-form-select2" method="post">
                <div class="row">
                    <?php include './message.php'; ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="billing-details-area">
                            <h2 class="cart-area-title"> Create an account </h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="first-name">First Name <span id="red">*</span></label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" required="required" value="<?php echo $user_name; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="last-name">Last Name</label>
                                        <input type="text" class="form-control" id="user_last_name" name="user_last_name" value="<?php echo $user_last_name; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="email">E-mail Address <span id="red">*</span></label>
                                        <input name="user_email" type="email" id="user_email" class="form-control" value="<?php echo $user_email; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="phone">Phone <span id="red">*</span></label>
                                        <input type="text" maxlength="11" class="form-control" id="user_mobile" name="user_mobile" required="required" value="<?php echo $user_mobile; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Address<span id="red">*</span></label>
                                        <textarea class="form-control" id="user_address" name="user_address" style="min-width: 100%;white-space: nowrap;resize:vertical" required><?php echo $user_address; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="town-city">Town / City</label>
                                        <input id="town-city" class="form-control" type="text" value="<?php echo $user_town; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="postcode">Postcode / ZIP</label>
                                        <input id="order_zip" name="order_zip" class="form-control" type="text" value="<?php echo $user_zip; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="user_password">Password <span id="red">*</span></label>
                                        <input  type="password" class="form-control" id="user_password" name="user_password" required="required" value="<?php echo $user_password; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="retype_password">Retype Password <span id="red">*</span></label>
                                        <input type="password" class="form-control" id="retype_password" name="retype_password" required="required" value="<?php echo $retype_password; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pLace-order">
                            <button class="btn-send-message disabled" type="submit" id="btn_user_save" name="btn_user_save">Create Account</button>
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
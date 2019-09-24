<?php
include './config/config.php';
$user_id = getSession("user_id");
$countOrder = '';
$sqlOrder = "SELECT COUNT(*) AS totalOrder FROM tbl_order WHERE order_user_id='$user_id'";
$resultOrder = mysqli_query($con, $sqlOrder);
if ($resultOrder) {
    $objOrder = mysqli_fetch_object($resultOrder);
    $countOrder = $objOrder->totalOrder;
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard || Eighteen Lifestyle Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "header_script.php"; ?>
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
                            <h2 class="bradcaump-title">Dashboard</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Login</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Our Product Area -->
    <section class="htc__product__area shop__page bg__white">
        <div class="container">
            <!-- Header -->
            <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-toggle"></span>
                    </button>
                    <a class="navbar-brand" href="#">My Account</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
                                <strong><?php echo getSession("user_name"); ?></strong> <span class="caret"></span></a>
                            <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                <li><a href="#">My Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="logout">Log out</a></li>
                    </ul>
                </div>
            </div>
            <!-- /Header -->
            <div class="row">
                <div class="col-md-3">
                    <!-- Left -->
                    <strong>Shortcuts</strong>
                    <hr>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="nav-header"></li>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="my-orders">My Orders</a></li>
                    </ul>
                </div><!-- /span-3 -->
                <div class="col-md-9">
                    <!-- Right -->
                    <a href="#"><strong><i class="zmdi zmdi-view-dashboard"></i>
                            My Dashboard</strong></a>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well">Total Orders <span class="badge pull-right"><?php echo $countOrder; ?></span></div>
                        </div>
                    </div><!--/row-->
                </div><!--/col-span-9-->
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
<?php
include "../../config/config.php";
//session_start();
$countCategory = '';
$sqlCategory = "SELECT COUNT(*) AS totalCategory FROM tbl_product_category WHERE product_category_status='Active'";
$resulCategory = mysqli_query($con, $sqlCategory);
if ($resulCategory) {
    $objCategory = mysqli_fetch_object($resulCategory);
    $countCategory = $objCategory->totalCategory;
}
$countProduct = '';
$sqlProduct = "SELECT COUNT(*) AS totalProduct FROM tbl_product WHERE product_status='Active'";
$resulProduct = mysqli_query($con, $sqlProduct);
if ($resulProduct) {
    $objProduct = mysqli_fetch_object($resulProduct);
    $countProduct = $objProduct->totalProduct;
}
$countUser = '';
$sqlUser = "SELECT COUNT(*) AS totalUser FROM tbl_user WHERE user_status='Active'";
$resultUser = mysqli_query($con, $sqlUser);
if ($resultUser) {
    $objUser = mysqli_fetch_object($resultUser);
    $countUser = $objUser->totalUser;
}
$countOrder = '';
$sqlOrder = "SELECT COUNT(*) AS totalOrder FROM tbl_order WHERE order_status='Received'";
$resultOrder = mysqli_query($con, $sqlOrder);
if ($resultOrder) {
    $objOrder = mysqli_fetch_object($resultOrder);
    $countOrder = $objOrder->totalOrder;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | AANGON</title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Dashboard</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <a href="<?php echo baseUrl('admin/view/menu/list.php'); ?>">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Total Online Order Menu</span>
                                                    <span class="info-box-number"><?php echo $countProduct; ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <a href="<?php echo baseUrl('admin/view/menu_category/index.php'); ?>">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-aqua"><i class="fa fa-cube"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Total Online Order Menu Category</span>
                                                    <span class="info-box-number"><?php echo $countCategory; ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <a href="<?php echo baseUrl('admin/view/order/index.php'); ?>">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-light-blue-active"><i class="fa fa-cart-arrow-down"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Total Order</span>
                                                    <span class="info-box-number"><?php echo $countOrder; ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <a href="<?php echo baseUrl('admin/view/user/index.php'); ?>">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-teal"><i class="fa fa-user"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Total User</span>
                                                    <span class="info-box-number"><?php echo $countUser; ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include basePath('admin/footer.php'); ?>
</div>
<?php include basePath('admin/footer_script.php'); ?>
<script type="text/javascript">
    $("#dashboardActive").addClass("active");
    $("#dashboardActive").parent().parent().addClass("treeview active");
    $("#dashboardActive").parent().addClass("in");
</script>
</body>
</html>

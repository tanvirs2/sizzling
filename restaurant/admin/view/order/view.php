<?php
include '../../../config/config.php';
$order_id = '';
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
}
//getting data
$sqlData = "SELECT tbl_order.*,tbl_order_details.* "
    . " FROM tbl_order "
    . "LEFT JOIN tbl_order_details ON tbl_order_details.order_details_order_id=tbl_order.order_id WHERE tbl_order.order_id = $order_id";
$resultData = mysqli_query($con, $sqlData);
if ($resultData) {
    $obj = mysqli_fetch_object($resultData);
//    debug($obj);
    $order_track_no = $obj->order_track_no;
    $order_details_product_id = $obj->order_details_product_id;
    $order_details_product_quantity = $obj->order_details_product_quantity;
    $order_details_product_price = $obj->order_details_product_price;
    $order_amount = $obj->order_amount;
    $order_delivery_charge = $obj->order_delivery_charge;
    $order_phone = $obj->order_phone;
    $order_total_quantity = $obj->order_details_product_quantity;
    $order_ship_address = $obj->order_ship_address;
    $order_payment_method = $obj->order_payment_method;
    $order_user_id = $obj->order_user_id;
    $order_phone = $obj->order_phone;
    $order_status = $obj->order_status;
    $order_created_on = $obj->order_created_on;
    $order_total_quantity = $obj->order_total_quantity;
    $order_notes = $obj->order_notes;
} else {
    $error = "Data not found";
}
$countQuantity = '';
$sqlQuantity = "SELECT SUM(order_details_product_quantity) AS totalQuantity FROM tbl_order_details WHERE order_details_order_id='$order_id'";
$resulQuantity = mysqli_query($con, $sqlQuantity);
if ($resulQuantity) {
    $objQuantity = mysqli_fetch_object($resulQuantity);
    $countQuantity = $objQuantity->totalQuantity;
}
$countOrderAmount = '';
$sqlOrderAmount = "SELECT SUM(order_details_product_price) AS countOrderAmount FROM tbl_order_details WHERE order_details_order_id='$order_id'";
$resulOrderAmount = mysqli_query($con, $sqlOrderAmount);
if ($resulOrderAmount) {
    $objOrderAmount = mysqli_fetch_object($resulOrderAmount);
    $countOrderAmount = $objOrderAmount->countOrderAmount;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AANGON | View Order Details</title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="skin-blue">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Order Details Of "#<?php echo $order_track_no; ?>"</h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-cart-plus"></i>&nbsp;Order Settings</li>
                <li class="active">View Order Details</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <table class="table ">
                            <tr>
                                <th>Ordered By</th>
                                <?php if ($order_user_id == '0'): ?>
                                    <td><?php echo $order_phone; ?></td>
                                <?php else: ?>
                                    <?php
                                    $sqlGetUser = "SELECT user_id,user_name,user_mobile FROM tbl_user WHERE user_id= $order_user_id";
                                    $resultGetUser = mysqli_query($con, $sqlGetUser);
                                    if ($resultGetUser) {
                                        $objUser = mysqli_fetch_object($resultGetUser);
                                    }
                                    ?>
                                    <td><?php echo $objUser->user_name; ?> (<?php echo $objUser->user_mobile; ?>)</td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <th>Ordered On</th>
                                <td><?php echo $order_created_on; ?></td>
                            </tr>
                            <tr>
                                <th>Ordered Status</th>
                                <td>
                                    <?php if ($order_status == 'Received'): ?>
                                        <label class="label label-info"><?php echo $order_status; ?></label>
                                    <?php else: ?>
                                        <label class="label label-primary"><?php echo $order_status; ?></label>
                                    <?php endif; ?></td>
                                </td>
                            </tr>
                            <tr>
                                <th>Order Amount</th>
                                <td>£.<?php echo $obj->order_amount; ?></td>
                            </tr>
<!--                            <tr>-->
<!--                                <th>Product Quantity</th>-->
<!--                                <td>--><?php //echo $countQuantity; ?><!--</td>-->
<!--                            </tr>-->
                            <tr>
                                <th>Product Details</th>
                                <?php
                                $arrayDetails = array();
                                $sqlProduct = "SELECT tbl_order_details.*,tbl_product.*,tbl_product_category.*"
                                    . " FROM tbl_order_details "
                                    . "LEFT JOIN tbl_product ON tbl_order_details.order_details_product_id = tbl_product.product_id"
                                    . " LEFT JOIN tbl_product_category ON tbl_product.product_category_id=tbl_product_category.product_category_id "
                                    . " WHERE order_details_order_id=$order_id";
                                $resultProduct = mysqli_query($con, $sqlProduct);
                                if ($resultProduct) {
                                    while ($objProduct = mysqli_fetch_object($resultProduct)) {
                                        $arrayDetails[] = $objProduct;
                                    }
                                }
                                ?>
                                <td>
                                    <div class="table-responsive">
                                        <?php foreach ($arrayDetails AS $objProduct): ?>
<!--                                            --><?php //debug($objProduct); ?>
                                            <table class="table table-bordered table-striped" style="border: 2px solid #dbdbdb;margin-bottom: 5px;">
                                                <tr>
                                                    <th style="width: 20%;">Category</th>
                                                    <td><?php echo $objProduct->product_category_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 20%;">Item</th>
                                                    <td><?php echo $objProduct->product_title; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Price</th>
                                                    <td>£<?php echo $objProduct->order_details_product_price; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Quantity</th>
                                                    <td><?php echo $objProduct->order_details_product_quantity; ?></td>
                                                </tr>
                                            </table>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Shipping Details</th>
                                <td>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Delivery Method</th>
                                                <td><?php echo $order_payment_method ?></td>
                                            </tr>
                                            <tr>
                                                <th>Delivery Address</th>
                                                <td><?php echo $order_ship_address ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Order Note</th>
                                <td><?php echo $order_notes; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include basePath('admin/footer.php'); ?>
</div>
<?php include basePath('admin/footer_script.php'); ?>
<script type="text/javascript">
    $("#orderActive").addClass("active");
    $("#orderActive").parent().parent().addClass("treeview active");
    $("#orderActive").parent().addClass("in");
</script>
</body>
</html>
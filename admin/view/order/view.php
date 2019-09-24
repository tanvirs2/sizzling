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
    $order_details_product_flag = $obj->order_details_product_flag;
    $order_amount = $obj->order_amount;
    $order_delivery_charge = $obj->order_delivery_charge;
    $order_phone = $obj->order_phone;
    $order_total_quantity = $obj->order_total_quantity;
    $order_ship_address = $obj->order_ship_address;
    $order_payment_method = $obj->order_payment_method;
    $order_user_id = $obj->order_user_id;
    $order_phone = $obj->order_phone;
    $order_status = $obj->order_status;
    $order_created_on = $obj->order_created_on;
    $order_total_quantity = $obj->order_total_quantity;
} else {
    $error = "Data not found";
}
//Update Product Stock
if (isset($_POST['btnAcceptOrder'])) {
    extract($_POST);
    $product_id = validateInput($_POST['product_id']);
    $sqlGetStock = "SELECT product_stock_quantity FROM tbl_product WHERE product_id = '$product_id' ";
    $resultGetStock = mysqli_query($con, $sqlGetStock);
    $objGetStock = mysqli_fetch_object($resultGetStock);
    $product_stock_quantity = $objGetStock->product_stock_quantity;
    if($product_stock_quantity > 1){
        $updateStock = '';
        $updateStock .=' product_stock_quantity = "' . --$product_stock_quantity . '"';
    }
    else {
        $updateStock = '';
        $updateStock .=' product_status = "Sold"';
    }
    $sqlUpdateStock = "UPDATE tbl_product SET $updateStock WHERE product_id=$product_id";
    $resultUpdateStock = mysqli_query($con, $sqlUpdateStock);
    if ($resultUpdateStock) {
        $success = "Product order has been received and stock updated";
//        $link = "index.php?success=" . base64_encode($success);
//        redirect($link);
    } else {
        $error = "Error. Stock update failed";
    }
}
//Update Order Status
if (isset($_POST['btnUpdateStatus'])) {
    extract($_POST);
    $product_id = validateInput($_POST['order_id']);
    $updateStatus = '';
    $updateStatus .=' order_status = "Processing"';
    $sqlUpdateStatus = "UPDATE tbl_order SET $updateStatus WHERE order_id=$order_id";
    $resultUpdateStatus = mysqli_query($con, $sqlUpdateStatus);
    if ($resultUpdateStatus) {
        $success = "Order has been accepted and marked as PROCESSING";
//        $link = "index.php?success=" . base64_encode($success);
//        redirect($link);
    } else {
        $error = "Error. Status update failed";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EIGHTEEN ADMIN | View Product Details</title>
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
                    <?php include basePath('admin/message.php'); ?>
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
                                <td>Tk.<?php echo $order_amount; ?></td>
                            </tr>
                            <tr>
                                <th>Product Quantity</th>
                                <td><?php echo $order_total_quantity; ?></td>
                            </tr>
                            <tr>
                                <th>Product Details</th>
                                <?php
                                $arrayDetails = array();
                                $sqlProduct = "SELECT tbl_order_details.*,tbl_product.*"
                                    . " FROM tbl_order_details "
                                    . "LEFT JOIN tbl_product ON tbl_order_details.order_details_product_id = tbl_product.product_id"
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
                                                    <th style="width: 20%;">Title</th>
                                                    <td><a href="<?php echo baseUrl('admin/view/product/view.php?id=') ?><?php echo $objProduct->order_details_product_id; ?>"><?php echo $objProduct->product_title; ?></a> </td>
                                                </tr>
                                                <tr>
                                                    <th>Price</th>
                                                    <td>৳<?php echo $objProduct->order_details_product_price; ?></td>
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
                                                <th>Shipping Cost</th>
                                                <td><?php echo $order_delivery_charge ?></td>
                                            </tr>
                                            <tr>
                                                <th>Shipping Address</th>
                                                <td><?php echo $order_ship_address ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Accept Product Order</th>
                                <td>
                                    <?php foreach ($arrayDetails AS $objProduct): ?>
                                        <!--                                        --><?php //debug($objProduct); ?>
                                        <form class="form-inline" method="POST" action="">
                                            <input type="hidden" class="form-control" id="order_id" name="order_id" value="<?php echo $order_id; ?>" required>
                                            <input type="hidden" class="form-control" id="product_id" name="product_id" value="<?php echo $objProduct->product_id; ?>" required>
                                            <button type="submit" name="btnAcceptOrder" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                        </form>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Update Order Status</th>
                                <td>
                                    <form class="form-inline" method="POST" action="">
                                        <input type="hidden" class="form-control" id="order_id" name="order_id" value="<?php echo $order_id; ?>" required>
                                        <button type="submit" name="btnUpdateStatus" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Processing</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <a style="float: right;" href="<?php echo baseUrl(); ?>admin/view/order/index.php">
                            <button type="button" class="btn btn-default">Go Back</button>
                        </a>
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
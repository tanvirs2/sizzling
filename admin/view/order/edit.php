<?php
include '../../../config/config.php';
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
}
$order_name = '';
$order_email = '';
$order_phone = '';
$order_amount = '';
$order_ship_address = '';
$order_status = '';

$product_updated_by = getSession('admin_id');
if (isset($_POST['btnEditOrder'])) {
    extract($_POST);
    $order_name = validateInput($order_name);
    $order_email = validateInput($order_email);
    $order_amount = validateInput($order_amount);
    $order_phone = validateInput($order_phone);
    $order_ship_address = validateInput($order_ship_address);
    $order_status = validateInput($order_status);
    if ($order_name === '') {
        $error = "Please fill up name.";
    } elseif ($order_phone === '') {
        $error = "Please fill up phone.";
    } elseif ($order_status === '') {
        $error = "Please fill up status.";
    } else {
        $customArray = '';
        $customArray .= 'order_name = "' . $order_name . '"';
        $customArray .= ',order_email = "' . $order_email . '"';
        $customArray .= ',order_phone = "' . $order_phone . '"';
        $customArray .= ',order_amount = "' . $order_amount . '"';
        $customArray .= ',order_ship_address = "' . $order_ship_address . '"';
        $customArray .= ',order_status = "' . $order_status . '"';
        $sqlInsertProduct = "UPDATE tbl_order SET $customArray WHERE order_id= $order_id";
        $resultinsertProduct = mysqli_query($con, $sqlInsertProduct);
        if ($resultinsertProduct) {
            $success = "Information updated.";
            $link = "index.php?success=" . base64_encode($success);
            redirect($link);
        } else {
            $error = "Something went wrong.";
        }
    }
}
//getting data
$sqlData = "SELECT tbl_order.*,tbl_order_details.* "
    . " FROM tbl_order "
    . "LEFT JOIN tbl_order_details ON tbl_order_details.order_details_order_id=tbl_order.order_id WHERE tbl_order.order_id = $order_id";
$resultData = mysqli_query($con, $sqlData);
if ($resultData) {
    $obj = mysqli_fetch_object($resultData);
//    debug($obj);
} else {
    $error = "Data not found";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order Edit | <?php echo  $config['ADMIN_SITE_NAME']; ?></title>
    <?php include basePath('admin/header_script.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo baseUrl('admin/resources/kendo/css/kendo.common.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo baseUrl('admin/resources/kendo/css/kendo.metro.min.css'); ?>" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Order Edit
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Order</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Edit Order</div>
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="order_name">Name &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="order_name" required name="order_name" value="<?php echo $obj->order_name; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="order_email">Email</label>
                                                <input type="text" class="form-control" id="order_email" name="order_email" value="<?php echo $obj->order_email; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="order_phone">Phone</label>
                                                <input type="text" class="form-control" id="order_phone" name="order_phone" value="<?php echo $obj->order_phone; ?>" maxlength="11" />
                                            </div>
                                            <div class="form-group">
                                                <label for="order_ship_address">Address</label>
                                                <input type="text" class="form-control" id="order_ship_address" name="order_ship_address" value="<?php echo $obj->order_ship_address; ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label for="product_new_price">Amount&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control" id="order_amount" name="order_amount" value="<?php echo $obj->order_amount; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="order_status">Status&nbsp;&nbsp;<span style="color:red;">*</label>
                                                <select id="order_status" name="order_status" class="form-control" required>
                                                    <option value="">--</option>
                                                    <option value="Processing"<?php
                                                    if ($obj->order_status === 'Processing') {
                                                        echo "selected";
                                                    }
                                                    ?>>Processing</option>
                                                    <option value="Received"<?php
                                                    if ($obj->order_status === 'Received') {
                                                        echo "selected";
                                                    }
                                                    ?>>Received</option>
                                                    <option value="Shipped"<?php
                                                    if ($obj->order_status === 'Shipped') {
                                                        echo "selected";
                                                    }
                                                    ?>>Shipped</option>
                                                    <option value="Delivered"<?php
                                                    if ($obj->order_status === 'Delivered') {
                                                        echo "selected";
                                                    }
                                                    ?>>Delivered</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEditOrder" name="btnEditOrder" class="btn btn-primary"><i class="fa fa-check-circle"></i> Update</button>
                                        </div>
                                    </form>
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
    $("#orderActive").addClass("active");
    $("#orderActive").parent().parent().addClass("treeview active");
    $("#orderActive").parent().addClass("in");
</script>
</body>
</html>

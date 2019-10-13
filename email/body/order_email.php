<?php
include '../../config/config.php';
$order_id = '';
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $sqlData = "SELECT tbl_order.*,tbl_order_details.* "
        . " FROM tbl_order "
        . "LEFT JOIN tbl_order_details ON tbl_order_details.order_details_order_id=tbl_order.order_id WHERE tbl_order.order_id = $order_id";
    $resultData = mysqli_query($con, $sqlData);
    if ($resultData) {
        $obj = mysqli_fetch_object($resultData);
        $order_track_no = $obj->order_track_no;
        $order_name = $obj->order_name;
        $order_details_product_id = $obj->order_details_product_id;
        $order_details_product_quantity = $obj->order_details_product_quantity;
        $order_details_product_price = $obj->order_details_product_price;
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
        $wine_color = $obj->wine_color;
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
//    debug($obj);
    ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
        <title>Order Notification</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
        <style type="text/css">
            body{width:100%;background-color:#4c4e4e;margin:0;padding:0;-webkit-font-smoothing:antialiased}html{width:100%}table{font-size:14px;border:0}@media only screen and (max-width: 640px){.header-bg{width:440px !important;height:10px !important}.main-header{line-height:28px !important}.main-subheader{line-height:28px !important}.container{width:440px !important}.container-middle{width:420px !important}.mainContent{width:400px !important}.main-image{width:400px !important;height:auto !important}.banner{width:400px !important;height:auto !important}.section-item{width:400px !important}.section-img{width:400px !important;height:auto !important}.prefooter-header{padding:0 10px !important;line-height:24px !important}.prefooter-subheader{padding:0 10px !important;line-height:24px !important}.top-bottom-bg{width:420px !important;height:auto !important}}@media only screen and (max-width: 479px){.header-bg{width:280px !important;height:10px !important}.top-header-left{width:260px !important;text-align:center !important}.top-header-right{width:260px !important}.main-header{line-height:28px !important;text-align:center !important}.main-subheader{line-height:28px !important;text-align:center !important}.logo{width:260px !important}.nav{width:260px !important}.container{width:280px !important}.container-middle{width:260px !important}.mainContent{width:240px !important}.main-image{width:240px !important;height:auto !important}.banner{width:240px !important;height:auto !important}.section-item{width:240px !important}.section-img{width:240px !important;height:auto !important}.prefooter-header{padding:0 10px !important;line-height:28px !important}.prefooter-subheader{padding:0 10px !important;line-height:28px !important}.top-bottom-bg{width:260px !important;height:auto !important}}
            .table-bordered th {
                background-color: #ECECEC80;
                color: black;
                padding: 15px;
                text-align: left;
            }
        </style>
    </head>
    <?php include '../header/header.php'; ?>
    <tr bgcolor="ececec"><td height="40"></td></tr>
    <tr>
        <td>
            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                <tbody>
                <tr bgcolor="ffffff"><td height="7"></td></tr>
                <tr bgcolor="ffffff">
                    <td>
                        <table width="528" border="0" align="center" cellpadding="0" cellspacing="0" class="mainContent">
                            <tbody><tr><td height="20"></td></tr>
                            <tr>
                                <td mc:edit="subtitle1" class="main-subheader" style="color: #a4a4a4; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                    <p style="color: black;font-size: 14px;padding-bottom: 10px;">
                                        A order has been placed. The details are given below:
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table table-bordered" style="border: 1px solid #ddd;width: 100%">
                                        <tbody>
                                        <tr>
                                            <th style="width: 30%">Ordered By</th>
                                            <?php if ($order_user_id == '0'): ?>
                                                <td><?php echo $order_name; ?></td>
                                            <?php else: ?>
                                                <?php
                                                $sqlGetUser = "SELECT user_id,user_name,user_mobile FROM tbl_user WHERE user_id= $order_user_id";
                                                $resultGetUser = mysqli_query($con, $sqlGetUser);
                                                if ($resultGetUser) {
                                                    $objUser = mysqli_fetch_object($resultGetUser);

                                                }
                                                ?>
                                                <td><?php echo $objUser->user_name; ?> (<?php echo $objUser->order_phone; ?>)</td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th>Contact Number</th>
                                            <td><?php echo $order_phone; ?></td>
                                        </tr>
<!--                                        <tr>-->
<!--                                            <th>Order Quantity</th>-->
<!--                                            <td>--><?php //echo $countQuantity; ?><!--</td>-->
<!--                                        </tr>-->
                                        <tr>
                                            <th>Order Amount</th>
                                            <td><?php echo $order_amount; ?></td>
                                        </tr>
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
                                                                <th style="width: 20%;">Title</th>
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
                                        <?php if ($wine_color != ''): ?>
                                            <tr>
                                                <th>Choice of Wine</th>
                                                <td><?php echo $wine_color; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr bgcolor="ffffff"><td height="25"></td></tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td>
            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                </tbody>

            </table>
        </td>
    </tr>
    <?php include '../footer/footer.php'; ?>
    </tbody>
    </table>
    </body>
    </html>
    <?php
} else {
    echo "Incorrect parameter";
}
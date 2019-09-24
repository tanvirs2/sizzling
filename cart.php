<?php
include './config/config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cart || <?php echo $config['SITE_NAME']; ?></title>
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
                            <h2 class="bradcaump-title">Cart</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="/index">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- cart-main-area start -->
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($arrayTempCart AS $TempCart): ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="product-details?id=<?php echo $TempCart->product_id; ?>">
                                            <img src="<?php echo baseUrl(); ?>upload/product_image/<?php echo $TempCart->product_image; ?>" alt="<?php echo $TempCart->product_title; ?>" onerror="this.src='images/no-image-available.jpg';">
                                        </a>
                                    </td>
                                    <td class="product-name"><a href="product-details?id=<?php echo $TempCart->product_id; ?>"><?php echo $TempCart->product_title; ?></a></td>
                                    <td class="product-price"><span class="amount">৳<?php echo $TempCart->temp_order_product_price; ?></span></td>
                                    <td class="product-quantity"><input type="number" value="<?php echo $TempCart->temp_order_product_qty; ?>" /></td>
                                    <td class="product-subtotal">৳<?php echo $TempCart->temp_order_product_price; ?></td>
                                    <td class="product-remove"><a href="#" onclick="javascript:deleteItem(<?php echo $TempCart->temp_order_id; ?>)">X</a></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="buttons-cart">
                                    <input type="submit" value="Update Cart" />
                                    <a href="#">Continue Shopping</a>
                                </div>
                                <div class="coupon">
                                    <h3>Coupon</h3>
                                    <p>Enter your coupon code if you have one.</p>
                                    <input type="text" placeholder="Coupon code" />
                                    <input type="submit" value="Apply Coupon" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <h2>Cart Total</h2>
                                    <br>
                                    <table>
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">৳ <?php echo $subTotal; ?></span></td>
                                        </tr><?php
                                        $sql1 = "SELECT SUM(temp_order_product_qty * temp_order_product_price) AS total,"
                                            . " SUM(temp_order_product_qty) AS totalProduct"
                                            . " FROM tbl_temp_order WHERE temp_order_session_id='" . session_id() . "'";
                                        $res1 = mysqli_query($con, $sql1);
                                        if ($res1) {
                                            $obj = mysqli_fetch_object($res1);
                                            $subTotal = $obj->total;
                                            $tt = $obj->totalProduct;
                                        }
                                        ?>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">৳<?php echo $subTotal; ?></span></strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="checkout">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our Product Area -->
    <!-- Start Footer Area -->
    <?php include "footer.php" ?>
    <!-- End Footer Area -->
</div>
<?php include "footer_script.php" ?>
<script type="text/javascript">
    function deleteItem(id) {
        var id = id;
        var del = confirm('Are you sure you want to delete this record?');
        if (del === true) {
            $.ajax({
                type: "POST",
                url: baseUrl + "ajax/delItem.php",
                dataType: "json",
                data: {
                    id: id
                },
                success: function (response) {
                    var obj = response;
                    if (obj.output === "success") {
                        setTimeout(function () {
                            window.location.href = "cart.php";
                        });
                    } else {
                        alert(obj.msg);
                    }
                }
            });
        }
    }
</script>
</body>

</html>
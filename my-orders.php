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
    <title>Dashboard || <?php echo $config['SITE_NAME']; ?></title>
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
                        <li><a href="dashboard">Home</a></li>
                        <li class="active"><a href="#">My Orders</a></li>
                    </ul>
                </div><!-- /span-3 -->
                <div class="col-md-9">
                    <!-- Right -->
                    <a href="#"><strong><i class="zmdi zmdi-view-dashboard"></i>
                            My Orders</strong></a>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">My Orders</div>
                                <table class="table table-bordered table-striped table-responsive">
                                    <thead style="background-color: #E4E3E2;">
                                    <tr>
                                        <th style="width: 25%">Title</th>
                                        <th style="width: 10%">Order Date</th>
                                        <th style="width: 10%">Price</th>
                                        <th style="width: 10%">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $array = array();
                                    $sql = "SELECT * FROM tbl_product ORDER BY product_id DESC";
                                    $result = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($result);
                                    $adjacents = 6;
                                    $targetpage = "list.php";
                                    $limit = $config['PAGE_LIMIT'];
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 0;
                                    }
                                    if ($page) {
                                        $start = ($page - 1) * $limit;
                                    } else {
                                        $start = 0;
                                    }
                                    if ($page == 0) {
                                        $page = 1;
                                    }

                                    $prev = $page - 1;
                                    $next = $page + 1;
                                    $lastpage = ceil($total / $limit);
                                    $lpm1 = $lastpage - 1;
                                    $sqlList = "SELECT tbl_order.*,tbl_order_details.*, tbl_product.* "
                                        . "FROM tbl_order "
                                        . "LEFT JOIN tbl_order_details ON tbl_order_details.order_details_order_id=tbl_order.order_id "
                                        . "LEFT JOIN tbl_product ON tbl_order_details.order_details_product_id = tbl_product.product_id "
                                        . "WHERE tbl_order.order_user_id='$user_id' GROUP BY tbl_order.order_id DESC LIMIT $start, $limit";
                                    $resultList = mysqli_query($con, $sqlList);
                                    /* CREATE THE PAGINATION */
                                    $counter = 0;
                                    $pagination = "";
                                    if ($lastpage > 1) {
                                        $pagination .= "<ul class='pagination pagination-sm'>";
                                        if ($page > $counter + 1) {
                                            $pagination .= "<li><a href=\"$targetpage?page=$prev\">Prev</a></li>";
                                        }
                                        if ($lastpage < 7 + ($adjacents * 2)) {
                                            for ($counter = 1; $counter <= $lastpage; $counter++) {
                                                if ($counter == $page) {
                                                    $pagination .= "<li class='active'><a href='#'>$counter</a></li>";
                                                } else {
                                                    $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                                }
                                            }
                                        } elseif ($lastpage > 5 + ($adjacents * 2)) {
                                            if ($page < 1 + ($adjacents * 2)) {
                                                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                                                    if ($counter == $page)
                                                        $pagination .= "<li class='active'><a href='#' >$counter</a></li>";
                                                    else
                                                        $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                                }
                                                $pagination .= "<li></li>";
                                                $pagination .= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                                                $pagination .= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
                                            }
                                            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                                                $pagination .= "<li><a href=\"$targetpage?page=1\">1</a></li>";
                                                $pagination .= "<li><a href=\"$targetpage?page=2\">2</a></li>";
                                                $pagination .= "<li></li>";
                                                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                                                    if ($counter == $page) {
                                                        $pagination .= "<li class='active'><a href='#'>$counter</a></li>";
                                                    } else {
                                                        $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                                    }
                                                }
                                                $pagination .= "<li></li>";
                                                $pagination .= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                                                $pagination .= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
                                            } else {
                                                $pagination .= "<li><a href=\"$targetpage?page=1\">1</a></li>";
                                                $pagination .= "<li><a href=\"$targetpage?page=2\">2</a></li>";
                                                $pagination .= "<li></li>";
                                                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                                                    if ($counter == $page) {
                                                        $pagination .= "<li class='active'><a href='#'>$counter</a></li>";
                                                    } else {
                                                        $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                                    }
                                                }
                                            }
                                        }
                                        if ($page < $counter - 1) {
                                            $pagination .= "<li><a href=\"$targetpage?page=$next\">Next</a></li>";
                                        } else {
                                            $pagination .= "";
                                            $pagination .= "</ul>\n";
                                        }
                                    }
                                    ?>
                                    <?php if ($total > 0): ?>
                                        <?php while ($obj = mysqli_fetch_object($resultList)): ?>
<!--                                            --><?php // debug($obj); ?>
                                            <tr>
                                                <td style="width: 25%;"><?php echo $obj->product_title; ?></td>
                                                <td style="width: 10%;">
                                                    <?php
                                                    $order_date = strtotime($obj->order_created_on);
                                                    echo $formated_date = date("d-M-y g:i:A", $order_date)
                                                    ?>
                                                </td>
                                                <td style="width: 10%;"><?php echo $obj->order_amount; ?></td>
                                                <td style="width: 10%;">
                                                    <?php if ($obj->order_status == 'Received'): ?>
                                                        <label class="label label-warning"><?php echo $obj->order_status; ?></label>
                                                    <?php elseif ($obj->order_status == 'Shipped'): ?>
                                                        <label class="label label-primary"><?php echo $obj->order_status; ?></label>
                                                    <?php else: ?>
                                                        <label class="label label-success"><?php echo $obj->order_status; ?></label>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" style="text-align: center;">No data found in record</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
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
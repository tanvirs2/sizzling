<?php
include '../../../config/config.php';
//Delete Product 
$order_id = '';
if (isset($_POST['DeleteOrder'])) {
    extract($_POST);
    $order_id = validateInput($order_id);
    $sql = "DELETE tbl_order.* FROM tbl_order "
        . "LEFT JOIN tbl_order_details ON tbl_order_details.order_details_order_id=tbl_order.order_id "
        . "WHERE tbl_order.order_id=$order_id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = "Information deleted.";
    } else {
        $error = "Something went wrong. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $config['ADMIN_SITE_NAME']; ?> | View Order List</title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="skin-blue">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content">
            <?php include basePath('admin/message.php'); ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style" style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Order List </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-responsive">
                                        <thead style="background-color: #E4E3E2;">
                                        <tr>
                                            <th style="width: 10%">Ordered by</th>
                                            <th style="width: 5%">Quantity</th>
                                            <th style="width: 10%">Amount</th>
                                            <th style="width: 10%">Tracking No</th>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 10%">Status</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $array = array();
                                        $sql = "SELECT * FROM tbl_order ORDER BY order_id DESC";
                                        $result = mysqli_query($con, $sql);
                                        $total = mysqli_num_rows($result);
                                        $adjacents = 6;
                                        $targetpage = "index.php";
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
                                        $sqlList = "SELECT tbl_order.*,tbl_order_details.* "
                                            . "FROM tbl_order "
                                            . "LEFT JOIN tbl_order_details ON tbl_order_details.order_details_order_id=tbl_order.order_id "
                                            . "GROUP BY tbl_order.order_id ORDER BY tbl_order.order_id DESC LIMIT $start, $limit";
                                        $resultList = mysqli_query($con, $sqlList);
                                        /* CREATE THE PAGINATION */
                                        $counter = '';
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
                                                <tr>
                                                    <?php if ($obj->order_user_id == '0'): ?>
                                                        <td style="width: 10%;"><?php echo $obj->order_phone; ?></td>
                                                    <?php else: ?>
                                                        <?php
                                                        $sqlGetUser = "SELECT user_id,user_name,user_mobile FROM tbl_user WHERE user_id= $obj->order_user_id";
                                                        $resultGetUser = mysqli_query($con, $sqlGetUser);
                                                        if ($resultGetUser) {
                                                            $objUser = mysqli_fetch_object($resultGetUser);
                                                        }
                                                        ?>
                                                        <td style="width: 10%;"><?php echo $objUser->user_name; ?> (<?php echo $objUser->user_mobile; ?>)</td>
                                                    <?php endif; ?>
                                                    <?php $countQuantity = '';
                                                    $sqlQuantity = "SELECT SUM(order_details_product_quantity) AS totalQuantity FROM tbl_order_details WHERE order_details_order_id='$obj->order_id'";
                                                    $resulQuantity = mysqli_query($con, $sqlQuantity);
                                                    if ($resulQuantity) {
                                                        $objQuantity = mysqli_fetch_object($resulQuantity);
                                                        $countQuantity = $objQuantity->totalQuantity;
                                                    }
                                                    ?>
                                                    <td style="width: 5%;"><?php echo $countQuantity; ?></td>
                                                    <td style="width: 10%;">£<?php echo $obj->order_amount; ?></td>
                                                    <td style="width: 10%;"><?php echo $obj->order_track_no; ?></td>
                                                    <?php
                                                    $time = strtotime($obj->order_created_on);
                                                    $myFormatForView = date("d-M-y g:i A", $time);
                                                    ?>
                                                    <td style="width: 15%;"><?php echo $myFormatForView; ?></td>
                                                    <td style="width: 10%;">
                                                        <?php if ($obj->order_status == 'Received'): ?>
                                                            <label class="label label-warning"><?php echo $obj->order_status; ?></label>
                                                        <?php else: ?>
                                                            <label class="label label-danger"><?php echo $obj->order_status; ?></label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="width: 20%;">
                                                        <a href="<?php echo baseUrl('admin/view/order/view.php?id='); ?><?php echo $obj->order_id; ?>">
                                                            <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp;View</button>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <button class="btn btn-danger btn-sm" data-toggle="modal" type="button" data-target="#deleteModal<?php echo $obj->order_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div id="deleteModal<?php echo $obj->order_id; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <form method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Are you sure you want to delete?</h4>
                                                                    <input type="hidden" name="order_id" id="order_id" value="<?php echo $obj->order_id; ?>" />
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                    <button type="submit" id="DeleteOrder" name="DeleteOrder" class="btn btn-danger">Yes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" style="text-align: center;">No data found in record</td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php echo $pagination; ?>
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
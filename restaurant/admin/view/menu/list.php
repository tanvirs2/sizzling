<?php
include '../../../config/config.php';
//Delete Product
$product_id = '';
if (isset($_POST['DeleteProduct'])) {
    extract($_POST);
    $product_id = validateInput($product_id);
    $sqlImage = "SELECT * FROM tbl_product WHERE product_id=$product_id";
    $resultImage = mysqli_query($con, $sqlImage);
    $dataImage = mysqli_fetch_array($resultImage);
    @unlink($config['IMAGE_UPLOAD_PATH'] . '/product_image/' . $dataImage["product_image"]);
    $sql = "DELETE FROM tbl_product WHERE product_id=$product_id";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Menu | <?php echo $config['ADMIN_SITE_NAME']; ?></title>
    <?php include basePath('admin/header_script.php'); ?>
    <link rel="stylesheet" href="<?php echo baseUrl('admin/resources/css/dataTables.bootstrap.min.css') ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Menu List
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Menu</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style" style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Menu List <a href="<?php echo baseUrl('admin/view/menu/add.php'); ?>" class="label label-success" style="float: right;background-color: black !important;"><i class="fa fa-plus"></i>&nbsp;Add Menu</a></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-responsive" id="productTable">
                                        <thead style="background-color: #E4E3E2;">
                                        <tr>
                                            <th style="width: 25%">Title</th>
                                            <th style="width: 15%">Category</th>
                                            <th style="width: 5%">Price</th>
                                            <th style="width: 5%">Status</th>
                                            <th style="width: 15%">Action</th>
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
                                        $sqlList = "SELECT tbl_product.*,tbl_product_category.* "
                                            . "FROM tbl_product "
                                            . "LEFT JOIN tbl_product_category ON tbl_product.product_category_id=tbl_product_category.product_category_id "
                                            . "ORDER BY tbl_product.product_id DESC";
                                        $resultList = mysqli_query($con, $sqlList);
                                        /* CREATE THE PAGINATION */
                                        $counter = 0;
                                        $pagination = "";
                                        if ($lastpage > 1) {
                                            $pagination .= "<ul class='pagination pagination-sm'>";
                                            if ($page > is_numeric($counter + 1)) {
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
                                                    <td style="width: 25%;"><?php echo $obj->product_title; ?></td>
                                                    <td style="width: 15%;"><?php echo $obj->product_category_name; ?></td>
                                                    <td style="width: 5%;">£ <?php echo $obj->product_new_price; ?></td>
                                                    <td style="width: 5%;">
                                                        <?php if ($obj->product_category_status == 'Active'): ?>
                                                            <label class="label label-success"><?php echo $obj->product_category_status; ?></label>
                                                        <?php else: ?>
                                                            <label class="label label-danger"><?php echo $obj->product_category_status; ?></label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        <a href="<?php echo baseUrl('admin/view/menu/view.php?id='); ?><?php echo $obj->product_id; ?>">
                                                            <button class="btn btn-warning btn-sm"><i class="fa fa-eye"></i>&nbsp;View</button>
                                                        </a>
                                                        <a href="<?php echo baseUrl('admin/view/menu/edit.php?id='); ?><?php echo $obj->product_id; ?>">
                                                            <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <button class="btn btn-danger btn-sm" data-toggle="modal" type="button" data-target="#deleteModal<?php echo $obj->product_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div id="deleteModal<?php echo $obj->product_id; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <form method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Are you sure you want to delete?</h4>
                                                                    <input type="hidden" name="product_id" id="product_id" value="<?php echo $obj->product_id; ?>" />
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                    <button type="submit" id="DeleteProduct" name="DeleteProduct" class="btn btn-danger">Yes</button>
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
                                <?php // echo $pagination; ?>
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
<script src="<?php echo baseUrl('admin/resources/js/jquery.dataTables.js') ?>"></script>
<script src="<?php echo baseUrl('admin/resources/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#productTable').DataTable();
    } );
    $("#productActive").addClass("active");
    $("#productActive").parent().parent().addClass("treeview active");
    $("#productActive").parent().addClass("in");
</script>
</body>
</html>

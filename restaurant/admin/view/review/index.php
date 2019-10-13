<?php
include '../../../config/config.php';
//Delete Product
$review_id = '';
if (isset($_POST['DeleteProduct'])) {
    extract($_POST);
    $review_id = validateInput($review_id);
    $sql = "DELETE FROM tbl_review WHERE review_id=$review_id";
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
    <title>Review | <?php echo $config['ADMIN_SITE_NAME']; ?></title>
    <?php include basePath('admin/header_script.php'); ?>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Review List
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Review</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style" style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Review List <a href="<?php echo baseUrl('admin/view/review/add.php'); ?>" class="label label-success" style="float: right;background-color: black !important;"><i class="fa fa-plus"></i>&nbsp;Add review</a></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-responsive" id="productTable">
                                        <thead style="background-color: #E4E3E2;">
                                        <tr>
                                            <th style="width: 10%">Client Name</th>
                                            <th style="width: 15%">Email</th>
                                            <th style="width: 55%">Review</th>
                                            <th style="width: 5%">Status</th>
                                            <th style="width: 15%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $array = array();
                                        $sql = "SELECT * FROM tbl_review ORDER BY review_id DESC";
                                        $result = mysqli_query($con, $sql);
                                        $total = mysqli_num_rows($result);
                                        ?>
                                        <?php if ($total > 0): ?>
                                            <?php while ($obj = mysqli_fetch_object($result)): ?>
                                                <tr>
                                                    <td style="width: 25%;"><?php echo $obj->review_name; ?></td>
                                                    <td style="width: 15%;"><?php echo $obj->review_email; ?></td>
                                                    <td style="width: 55%;"><?php echo $obj->review_text; ?></td>
                                                    <td style="width: 5%;">
                                                        <?php if ($obj->review_status == 'Active'): ?>
                                                            <label class="label label-success"><?php echo $obj->review_status; ?></label>
                                                        <?php else: ?>
                                                            <label class="label label-danger"><?php echo $obj->review_status; ?></label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        <a href="javascript:void(0);">
                                                            <button class="btn btn-danger btn-sm" data-toggle="modal" type="button" data-target="#deleteModal<?php echo $obj->review_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div id="deleteModal<?php echo $obj->review_id; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <form method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Are you sure you want to delete?</h4>
                                                                    <input type="hidden" name="review_id" id="review_id" value="<?php echo $obj->review_id; ?>" />
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
<script type="text/javascript">
    $("#reviewActive").addClass("active");
    $("#reviewActive").parent().parent().addClass("treeview active");
    $("#reviewActive").parent().addClass("in");
</script>
</body>
</html>

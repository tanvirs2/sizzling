<?php
include '../../../config/config.php';
$review_name = '';
$review_email = '';
$review_text = '';
$review_status = '';
$product_created_by = $_SESSION['admin_id'];
if (isset($_POST['btnAddProduct'])) {
    extract($_POST);
    $review_name = validateInput($review_name);
    $review_status = validateInput($review_status);
    if ($review_name === '') {
        $error = "Please fill up name.";
    } elseif ($review_status === '') {
        $error = "Please fill up status.";
    } else {
        $customArray = '';
        $customArray .= 'review_name = "' . $review_name . '"';
        $customArray .= ',review_email = "' . $review_email . '"';
        $customArray .= ',review_text = "' . $review_text . '"';
        $customArray .= ',review_status = "' . $review_status . '"';
        $sqlInsertProduct = "INSERT INTO tbl_review SET $customArray";
        $resultinsertProduct = mysqli_query($con, $sqlInsertProduct);
        if ($resultinsertProduct) {
            $success = "Information saved.";
            $link = "index.php?success=" . base64_encode($success);
            redirect($link);
        } else {
            $error = "Something went wrong.";
        }

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Review | AANGON Admin</title>
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
                Add Review
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
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Add Review</div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="review_name">Client Name&nbsp;<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="review_name" required name="review_name" value="<?php echo $review_name; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="review_email">Email</label>
                                                <input class="form-control" type="text" name="review_email" id="review_email" value="<?php echo $review_email; ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="review_text">Review&nbsp;<span style="color:red;">*</span></label>
                                                <textarea class="form-control" style="resize: vertical" name="review_text" id="review_text" rows="2"><?php echo html_entity_decode($review_text, ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="review_status">Status&nbsp;&nbsp;<span style="color:red;">*</label>
                                                <select id="review_status" name="review_status" class="form-control" required>
                                                    <option value="Active"<?php
                                                    if ($review_status === 'Active') {
                                                        echo "selected";
                                                    }
                                                    ?>>Active</option>
                                                    <option value="Inactive"<?php
                                                    if ($review_status === 'Inactive') {
                                                        echo "selected";
                                                    }
                                                    ?>>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnAddProduct" name="btnAddProduct" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
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
    $("#reviewActive").addClass("active");
    $("#reviewActive").parent().parent().addClass("treeview active");
    $("#reviewActive").parent().addClass("in");
</script>
</body>
</html>

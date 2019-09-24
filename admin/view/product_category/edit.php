<?php
include '../../../config/config.php';
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
}
$product_category_name = '';
$product_category_status = '';
$product_category_keywords  = '';
$product_category_description = '';
$product_updated_by = $_SESSION['admin_id'];
if (isset($_POST['btnEditProduct'])) {
    extract($_POST);
    $product_category_name = validateInput($product_category_name);
    $product_category_status = validateInput($product_category_status);
    if ($product_category_name === '') {
        $error = "Please fill up title.";
    } elseif ($product_category_status === '') {
        $error = "Please fill up status.";
    } else {
        $customArray = '';
        $customArray .= 'product_category_name = "' . $product_category_name . '"';
        $customArray .= ',product_category_description = "' . $product_category_description . '"';
        $customArray .= ',product_category_keywords = "' . $product_category_keywords . '"';
        $customArray .= ',product_category_status = "' . $product_category_status . '"';
        $customArray .= ',product_category_updated_by = "' . $product_updated_by . '"';
        $sqlInsertProduct = "UPDATE tbl_product_category SET $customArray WHERE product_category_id= $product_id";
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
$sql_data = "SELECT * FROM tbl_product_category WHERE product_category_id = $product_id";
$result_data = mysqli_query($con, $sql_data);
if ($result_data) {
    $obj = mysqli_fetch_object($result_data);
    $product_category_name = $obj->product_category_name;
    $product_category_description = $obj->product_category_description;
    $product_category_keywords = $obj->product_category_keywords;
    $product_category_status = $obj->product_category_status;
} else {
    $error = "Data not found";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Collection Edit | <?php echo  $config['ADMIN_SITE_NAME']; ?></title>
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
                Product Edit
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Product</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Edit Product</div>
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="product_category_name">Title &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="product_category_name" required name="product_category_name" value="<?php echo $product_category_name; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="product_category_description">Description</label>
                                                <textarea class="form-control" style="resize: vertical" name="product_category_description" id="product_category_description" rows="3"><?php echo $product_category_description; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_category_keywords">Keywords</label>
                                                <textarea class="form-control" style="resize: vertical" name="product_category_keywords" id="product_category_keywords" rows="3"><?php echo $product_category_keywords; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_category_status">Status&nbsp;&nbsp;<span style="color:red;">*</label>
                                                <select id="product_category_status" name="product_category_status" class="form-control" required>
                                                    <option value="">--</option>
                                                    <option value="Active"<?php
                                                    if ($product_category_status === 'Active') {
                                                        echo "selected";
                                                    }
                                                    ?>>Active</option>
                                                    <option value="Inactive"<?php
                                                    if ($product_category_status === 'Inactive') {
                                                        echo "selected";
                                                    }
                                                    ?>>Inactive</option>
                                                    <option value="Sold"<?php
                                                    if ($product_category_status === 'Sold') {
                                                        echo "selected";
                                                    }
                                                    ?>>Sold</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEditProduct" name="btnEditProduct" class="btn btn-primary"><i class="fa fa-check-circle"></i> Update</button>
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
    $("#proCategoryActive").addClass("active");
    $("#proCategoryActive").parent().parent().addClass("treeview active");
    $("#proCategoryActive").parent().addClass("in");
</script>
</body>
</html>

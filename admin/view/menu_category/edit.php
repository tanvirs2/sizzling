<?php
include '../../../config/config.php';
$product_category_name = '';
$product_category_parent_id = '';
$product_category_status = '';
$product_category_updated_by = getSession('admin_id');

if (isset($_GET['id'])) {
    $product_category_id = $_GET['id'];
}
/*
 * save product cateoory
 */
if (isset($_POST['btnEditCategory'])) {
    extract($_POST);
    $product_category_name = validateInput($product_category_name);
    $product_category_parent_id = validateInput($product_category_parent_id);
    $product_category_status = validateInput($product_category_status);
    if ($product_category_name === '') {
        $error = "Please fill up required fields.";
    } elseif ($product_category_parent_id === '') {
        $error = "Please fill up required fields.";
    } elseif ($product_category_status === '') {
        $error = "Please fill up required fields.";
    } else {
        $customArray = '';
        $customArray .= 'product_category_name = "' . $product_category_name . '"';
        $customArray .= ',product_category_parent_id = "' . $product_category_parent_id . '"';
        $customArray .= ',product_category_status = "' . $product_category_status . '"';
        $customArray .= ',product_category_updated_by = "' . $product_category_updated_by . '"';
        $sqlInsertCategory = "UPDATE tbl_product_category SET $customArray WHERE product_category_id = $product_category_id";
        $resultinsertCategory = mysqli_query($con, $sqlInsertCategory);
        if ($resultinsertCategory) {
            $success = "Information updated.";
            $link = "index.php?success=" . base64_encode($success);
            redirect($link);
        } else {
            $error = "Something went wrong.";
        }
    }
}
//getting data
$sql_data = "SELECT * FROM tbl_product_category WHERE product_category_id = $product_category_id";
$result_data = mysqli_query($con, $sql_data);
if ($result_data) {
    $obj = mysqli_fetch_object($result_data);
    $product_category_name = $obj->product_category_name;
    $product_category_parent_id = $obj->product_category_parent_id;
} else {
    $error = "Data not found";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu Category | AANGON Admin</title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="skin-blue">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <aside class="main-sidebar">
        <?php include basePath('admin/side_menu.php'); ?>
    </aside>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Edit Product Category</div>
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <form class="" method="POST" action="">
                                        <div class="form-group">
                                            <label for="product_category_name">Category Name <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="product_category_name" name="product_category_name" value="<?php echo $product_category_name; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_category_parent_id">Parent Category <span style="color: red;">*</span></label>
                                            <select class="form-control" name="product_category_parent_id" id="product_category_parent_id" required>
                                                <option value="0">Root</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_category_status">Status <span style="color: red;">*</span></label>
                                            <select class="form-control" name="product_category_status" id="product_category_status" required>
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
                                            </select>
                                        </div>
                                        <button type="submit" name="btnEditCategory" class="btn btn-success">Submit</button>
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

<script type="text/javascript">
    $("#proCategoryActive").addClass("active");
    $("#proCategoryActive").parent().parent().addClass("treeview active");
    $("#proCategoryActive").parent().addClass("in");
</script>
<?php include basePath('admin/footer_script.php'); ?>
</body>
</html>
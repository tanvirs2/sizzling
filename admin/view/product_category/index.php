<?php
include '../../../config/config.php';
$product_category_name = '';
$product_category_parent_id = '';
$product_category_status = '';
$product_category_created_by = getSession('admin_id');
$product_category_created_on = date('Y-m-d H:i:s');
/*
 * save product cateoory
 */
if (isset($_POST['btnAddCategory'])) {
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
        $checkCategorySql = "SELECT * FROM tbl_product_category WHERE product_category_name = '$product_category_name'";
        $resultCategory = mysqli_query($con, $checkCategorySql);
        $countCategory = mysqli_num_rows($resultCategory);
        if ($countCategory >= 1) {
            $error = "Information already exists";
        } else {
            $customArray = '';
            $customArray .= 'product_category_name = "' . $product_category_name . '"';
            $customArray .= ',product_category_parent_id = "' . $product_category_parent_id . '"';
            $customArray .= ',product_category_status = "' . $product_category_status . '"';
            $customArray .= ',product_category_created_by = "' . $product_category_created_by . '"';
            $customArray .= ',product_category_created_on = "' . $product_category_created_on . '"';
            $sqlInsertCategory = "INSERT INTO tbl_product_category SET $customArray";
            $resultinsertCategory = mysqli_query($con, $sqlInsertCategory);
            if ($resultinsertCategory) {
                $success = "Information saved.";
                $product_category_name = "";
            } else {
                $error = "Something went wrong.";
            }
        }
    }
}
//Delete Product Category
if (isset($_POST['DeleteCategory'])) {
    extract($_POST);
    $sql = "DELETE FROM tbl_product_category WHERE product_category_id=$product_category_id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = "Information deleted successfully";
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
    <title>Product Category | EIGHTEEN ADMIN</title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Product Category
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
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Add Product Category</div>
                            <div class="panel-body">
                                <form class="form-inline" method="POST" action="">
                                    <div class="form-group">
                                        <label for="product_category_name">Category Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="product_category_name" name="product_category_name" value="<?php echo $product_category_name; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_category_parent_id">Parent Category <span style="color: red;">*</span></label>
                                        <select class="form-control" name="product_category_parent_id" id="product_category_parent_id" required>
                                            <option value="0">Root</option>
                                            <?php
                                            /*
                                             * getting product category
                                             */
                                            $sqlGetProductCategory = "SELECT product_category_id,product_category_name FROM tbl_product_category WHERE product_category_status='Active'";
                                            $resultGetProductCategory = mysqli_query($con, $sqlGetProductCategory);
                                            ?>
                                            <?php if (count($resultGetProductCategory) > 0): ?>
                                                <?php while ($objProductCategory = mysqli_fetch_object($resultGetProductCategory)): ?>
                                                    <option value="<?php echo $objProductCategory->product_category_id; ?>"><?php echo $objProductCategory->product_category_name; ?></option>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
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
                                    <button type="submit" name="btnAddCategory" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Product Category List</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="categoryTable">
                                        <thead style="background-color: #E4E3E2;">
                                        <tr>
                                            <th style="width: 10%;">Collection Name</th>
                                            <th style="width: 10%;">SEO Desc</th>
                                            <th style="width: 10%;">SEO Keyword</th>
                                            <th style="width: 5%;">Status</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $array = array();
                                        $sql = "SELECT * FROM tbl_product_category ORDER BY product_category_id DESC";
                                        $result = mysqli_query($con, $sql);
                                        $total = mysqli_num_rows($result);
                                        ?>
                                        <?php while ($obj = mysqli_fetch_object($result)): ?>
                                            <tr>
                                                <td style="width: 20%;"><?php echo $obj->product_category_name; ?></td>
                                                <td style="width: 30%;"><?php echo $obj->product_category_description; ?></td>
                                                <td style="width: 30%;"><?php echo $obj->product_category_keywords; ?></td>
                                                <td style="width: 5%;">
                                                    <?php if ($obj->product_category_status == 'Active'): ?>
                                                        <label class="label label-success"><?php echo $obj->product_category_status; ?></label>
                                                    <?php else: ?>
                                                        <label class="label label-danger"><?php echo $obj->product_category_status; ?></label>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="width: 20%;">
                                                    <a href="<?php echo baseUrl('admin/view/product_category/edit.php?id='); ?><?php echo $obj->product_category_id; ?>">
                                                        <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                                    </a>
                                                    <a href="javascript:void(0);">
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" type="button" data-target="#deleteModal<?php echo $obj->product_category_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div id="deleteModal<?php echo $obj->product_category_id; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <form method="POST">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Are you sure you want to delete?</h4>
                                                                <input type="hidden" name="product_category_id" id="product_category_id" value="<?php echo $obj->product_category_id; ?>" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <button type="submit" id="DeleteCategory" name="DeleteCategory" class="btn btn-danger">Yes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
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

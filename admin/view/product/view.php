<?php
include '../../../config/config.php';
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
}
//getting data
$sql_data = "SELECT * FROM tbl_product WHERE product_id = $product_id";
$result_data = mysqli_query($con, $sql_data);
if ($result_data) {
    $obj = mysqli_fetch_object($result_data);
    $product_title = $obj->product_title;
    $product_category_id = $obj->product_category_id;
    $product_image = $obj->product_image;
    $product_details = $obj->product_details;
    $product_new_price = $obj->product_new_price;
    $product_old_price = $obj->product_old_price;
    $product_status = $obj->product_status;
} else {
    $error = "Data not found";
}
$arrayProductCategory = array();
$sqlGetProductCategory = "SELECT product_category_id,product_category_name FROM tbl_product_category WHERE product_category_id= $product_category_id";
$resultGetProductCategory = mysqli_query($con, $sqlGetProductCategory);
if ($resultGetProductCategory) {
    while ($objCategory = mysqli_fetch_object($resultGetProductCategory)) {
        $arrayProductCategory[] = $objCategory;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Product | <?php echo $config['ADMIN_SITE_NAME']; ?></title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Product List
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
                    <div class="box box-primary">
                        <table class="table ">
                            <tr>
                                <th>Product Title</th>
                                <td><?php echo $product_title; ?>- <?php echo $obj->product_sku; ?></td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>
                                    <?php if (count($arrayProductCategory) > 0): ?>
                                        <?php foreach ($arrayProductCategory AS $productCategory): ?>
                                            <option value="<?php echo $productCategory->product_category_id; ?>"
                                                <?php
                                                if ($productCategory->product_category_id == $product_category_id) {
                                                    echo "selected=selected";
                                                }
                                                ?>><?php echo $productCategory->product_category_name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Product Image</th>
                                <td>
                                    <img class="img-responsive" src="../../../upload/product_image/<?php echo $product_image; ?>" style="width: 10%;">
                                </td>
                            </tr>
                            <tr>
                                <th>Product Details</th>
                                <td><?php echo html_entity_decode($product_details, ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><?php echo $product_new_price; ?></td>
                            </tr>
                            <tr>
                                <th>Stock</th>
                                <td><?php echo $obj->product_stock_quantity; ?></td>
                            </tr>
                            <tr>
                                <th>Discount Price</th>
                                <td><?php echo $product_old_price; ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if ($obj->product_status == 'Active'): ?>
                                        <label class="label label-success"><?php echo $obj->product_status; ?></label>
                                    <?php else: ?>
                                        <label class="label label-danger"><?php echo $obj->product_status; ?></label>
                                    <?php endif; ?></td>
                            </tr>
                        </table>
                        <a style="float: left;" href="<?php echo baseUrl(); ?>admin/view/product/edit.php?id=<?php echo $product_id; ?>">
                            <button type="button" class="btn btn-default">Edit</button>
                        </a>
                        <a style="float: right;" href="<?php echo baseUrl(); ?>admin/view/product/list.php">
                            <button type="button" class="btn btn-default">Go Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include basePath('admin/footer.php'); ?>
</div>
<?php include basePath('admin/footer_script.php'); ?>
<script type="text/javascript">
    $("#productActive").addClass("active");
    $("#productActive").parent().parent().addClass("treeview active");
    $("#productActive").parent().addClass("in");
</script>
</body>
</html>

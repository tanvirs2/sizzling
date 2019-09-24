<?php
include '../../../config/config.php';
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
}
$product_category_id = '';
$product_collection_id = '';
$product_stock_quantity = '';
$product_title = '';
$product_sku = '';
$product_image = '';
$product_details = '';
$product_new_price = '';
$product_old_price = '';
$product_status = '';
$product_description = '';
$product_keywords = '';
$product_updated_by = getSession('admin_id');
$flag = 0;
if (isset($_POST['btnEditProduct'])) {
    extract($_POST);
    $product_title = validateInput($product_title);
    $product_sku = validateInput($product_sku);
    $product_new_price = validateInput($product_new_price);
    $product_status = validateInput($product_status);
    $product_details = validateInput($product_details);
    if ($product_title === '') {
        $error = "Please fill up title.";
    } elseif ($product_new_price === '') {
        $error = "Please fill up price.";
    } elseif ($product_status === '') {
        $error = "Please fill up status.";
    } else {
        if ($_FILES['product_image']['name']) { // Check if image file posted or not
            $targetDirectory = $config['IMAGE_UPLOAD_PATH'] . '/product_image/'; // Target directory where image will save or store
            $targetFile = '';
            $fileType = pathinfo(basename($_FILES['product_image']['name']), PATHINFO_EXTENSION);
            // File type such as .jpg, .png, .jpeg, .gif
            if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'GIF' && $fileType != 'gif' && $fileType != 'JPG') { // Check file is in mentioned format or not
                $flag++;
                $error = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
            } else {
                if ($_FILES['product_image']['size'] > (1024000)) { // Check file size. File size must be less than 1MB
                    $flag++;
                    $error = 'Image size is too large. Must be less than 1MB';
                } else {
                    $renameFile = "PI" . date('YmdHis') . '.' . $fileType; // Rename the file name
                    $targetFile = $targetDirectory . $renameFile; // Target image file
                    move_uploaded_file($_FILES['product_image']['tmp_name'], $targetFile);
                    $flag = 0;
                }
            }
        }
        // Image upload code end
        if ($flag === 0) {
            $customArray = '';
            $customArray .= 'product_category_id = "' . $product_category_id . '"';
            $customArray .= ',product_collection_id = "' . $product_collection_id . '"';
            $customArray .= ',product_title = "' . $product_title . '"';
            $customArray .= ',product_sku = "' . $product_sku . '"';
            if ($_FILES["product_image"]["tmp_name"] != '') {
                $customArray .= ', product_image = "' . $renameFile . '"';
            }
            $customArray .= ',product_details = "' . $product_details . '"';
            $customArray .= ',product_stock_quantity = "' . $product_stock_quantity . '"';
            $customArray .= ',product_buying_price = "' . $product_buying_price . '"';
            $customArray .= ',product_new_price = "' . $product_new_price . '"';
            $customArray .= ',product_old_price = "' . $product_old_price . '"';
            $customArray .= ',product_status = "' . $product_status . '"';
            $customArray .= ',product_updated_by = "' . $product_updated_by . '"';
            $sqlInsertProduct = "UPDATE tbl_product SET $customArray WHERE product_id= $product_id";
            $resultinsertProduct = mysqli_query($con, $sqlInsertProduct);
            if ($resultinsertProduct) {
                $success = "Information updated.";
                $link = "list.php?success=" . base64_encode($success);
                redirect($link);
            } else {
                $error = "Something went wrong.";
            }
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}
//getting data
$sql_data = "SELECT * FROM tbl_product WHERE product_id = $product_id";
$result_data = mysqli_query($con, $sql_data);
if ($result_data) {
    $obj = mysqli_fetch_object($result_data);
    $product_title = $obj->product_title;
    $product_sku = $obj->product_sku;
    $product_category_id = $obj->product_category_id;
    $product_collection_id = $obj->product_collection_id;
    $product_image = $obj->product_image;
    $product_stock_quantity = $obj->product_stock_quantity;
    $product_buying_price = $obj->product_buying_price;
    $product_details = $obj->product_details;
    $product_new_price = $obj->product_new_price;
    $product_old_price = $obj->product_old_price;
    $product_description = $obj->product_description;
    $product_keywords = $obj->product_keywords;
    $product_status = $obj->product_status;
} else {
    $error = "Data not found";
}
$arrayProductCategory = array();
$sqlGetProductCategory = "SELECT product_category_id,product_category_name FROM tbl_product_category WHERE product_category_status='Active'";
$resultGetProductCategory = mysqli_query($con, $sqlGetProductCategory);
if ($resultGetProductCategory) {
    while ($objCategory = mysqli_fetch_object($resultGetProductCategory)) {
        $arrayProductCategory[] = $objCategory;
    }
}
$arrayProductCollection = array();
$sqlGetProductCollection = "SELECT product_category_id,product_category_name FROM tbl_product_collection WHERE product_category_status='Active'";
$resultGetProductCollection = mysqli_query($con, $sqlGetProductCollection);
if ($resultGetProductCollection) {
    while ($objCollection = mysqli_fetch_object($resultGetProductCollection)) {
        $arrayProductCollection[] = $objCollection;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Edit | <?php echo  $config['ADMIN_SITE_NAME']; ?></title>
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
                                                <label for="product_category_id">Collection&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <select id="product_category_id" name="product_category_id" class="form-control">
                                                    <option value="">--</option>
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
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_collection_id">Collection&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <select id="product_collection_id" name="product_collection_id" class="form-control">
                                                    <option value="">--</option>
                                                    <?php if (count($resultGetProductCollection) > 0): ?>
                                                        <?php foreach ($arrayProductCollection AS $productCollection): ?>
                                                            <option value="<?php echo $productCollection->product_category_id; ?>"
                                                                <?php
                                                                if ($productCollection->product_category_id == $product_collection_id) {
                                                                    echo "selected=selected";
                                                                }
                                                                ?>><?php echo $productCollection->product_category_name; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                        <?php while ($objProductCollection = mysqli_fetch_object($resultGetProductCollection)): ?>
                                                            <option value="<?php echo $objProductCollection->product_category_id; ?>"><?php echo $objProductCollection->product_category_name; ?></option>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_title">Title &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="product_title" required name="product_title" value="<?php echo $product_title; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="product_sku">SKU (Product ID) &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="product_sku" required name="product_sku" value="<?php echo $product_sku; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <img src="<?php echo $config['BASE_URL']; ?>upload/product_image/<?php echo $product_image; ?>" class="img-responsive" style="max-width: 150px;">
                                                <label for="product_image">Image&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="file" name="product_image" id="product_image" />
                                            </div>
                                            <div class="form-group">
                                                <label for="product_details">Details</label>
                                                <textarea class="form-control" style="resize: vertical" name="product_details" id="product_details" rows="5"><?php echo html_entity_decode($product_details, ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_new_price">Stock Quantity&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control" id="product_stock_quantity" name="product_stock_quantity" value="<?php echo $product_stock_quantity; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="product_new_price">Buying Price&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="product_buying_price" name="product_buying_price" value="<?php echo $product_buying_price; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="product_new_price">Price&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="number" class="form-control" id="product_new_price" name="product_new_price" value="<?php echo $product_new_price; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="product_old_price">Discount Price</label>
                                                <input type="number" class="form-control" id="product_old_price" name="product_old_price" value="<?php echo $product_old_price; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="product_keywords">SEO Description</label>
                                                <textarea class="form-control" style="resize: vertical" name="product_description" id="product_description" rows="3"><?php echo html_entity_decode($product_description, ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_keywords">SEO Keyword</label>
                                                <textarea class="form-control" style="resize: vertical" name="product_keywords" id="product_keywords" rows="3"><?php echo html_entity_decode($product_keywords, ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_status">Status&nbsp;&nbsp;<span style="color:red;">*</label>
                                                <select id="product_status" name="product_status" class="form-control" required>
                                                    <option value="">--</option>
                                                    <option value="Active"<?php
                                                    if ($product_status === 'Active') {
                                                        echo "selected";
                                                    }
                                                    ?>>Active</option>
                                                    <option value="Inactive"<?php
                                                    if ($product_status === 'Inactive') {
                                                        echo "selected";
                                                    }
                                                    ?>>Inactive</option>
                                                    <option value="Sold"<?php
                                                    if ($product_status === 'Sold') {
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
<script type="text/javascript" src="<?php echo baseUrl('admin/resources/kendo/js/kendo.web.min.js') ?>"></script>
<script>
    $(document).ready(function () {
        $("#product_details").kendoEditor({
            tools: [
                "bold", "italic", "underline", "strikethrough", "justifyLeft", "justifyCenter", "justifyRight", "justifyFull",
                "insertUnorderedList", "insertOrderedList", "indent", "outdent", "createLink", "unlink", "insertImage",
                "insertFile", "subscript", "superscript", "createTable", "addRowAbove", "addRowBelow", "addColumnLeft",
                "addColumnRight", "deleteRow", "deleteColumn", "viewHtml", "formatting", "cleanFormatting",
                "fontName", "fontSize", "foreColor", "backColor"
            ]
        });
    });
</script>
<script type="text/javascript">
    $("#productActive").addClass("active");
    $("#productActive").parent().parent().addClass("treeview active");
    $("#productActive").parent().addClass("in");
</script>
</body>
</html>

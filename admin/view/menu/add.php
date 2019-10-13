<?php
include '../../../config/config.php';
$product_category_id = '';
$product_title = '';
$product_image = '';
$product_author = '';
$product_details = '';
$product_new_price = '';
$product_old_price = '';
$product_status = '';
$product_created_on = date('Y-m-d H:i:s');
$product_created_by = $_SESSION['admin_id'];
$flag = 0;
if (isset($_POST['btnAddProduct'])) {
    extract($_POST);
    /*if (isset($option_check)) {
        dd($option_name);
    }
    dd('fff');
//    debug($_POST);*/
    $product_title = validateInput($product_title);
    $product_new_price = validateInput($product_new_price);
    $product_status = validateInput($product_status);
    $product_details = validateInput($product_details);
    if ($product_title === '') {
        $error = "Please fill up title.";
    } elseif ($product_status === '') {
        $error = "Please fill up status.";
    } else {
        if ($_FILES['product_image']['name']) { // Check if image file posted or not
            $targetDirectory = $config['IMAGE_UPLOAD_PATH'] . '/menu_image/'; // Target directory where image will save or store
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
                    $renameFile = "MI" . date('YmdHis') . '.' . $fileType; // Rename the file name
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
            $customArray .= ',product_title = "' . $product_title . '"';
            if ($_FILES["product_image"]["tmp_name"] != '') {
                $customArray .= ', product_image = "' . $renameFile . '"';
            }
            $customArray .= ',product_details = "' . $product_details . '"';
            $customArray .= ',product_new_price = "' . $product_new_price . '"';
            $customArray .= ',product_status = "' . $product_status . '"';
            $customArray .= ',product_created_on = "' . $product_created_on . '"';
            $customArray .= ',product_created_by = "' . $product_created_by . '"';
            $sqlInsertProduct = "INSERT INTO tbl_product SET $customArray";
//            exit();
            $resultinsertProduct = mysqli_query($con, $sqlInsertProduct);

            if (isset($option_check)) {
                if ($resultinsertProduct) {
                    //Item option part start
                    $last_id = mysqli_insert_id($con);

                    $optionSql = '';

                    foreach ($option_name AS $key => $value) {
                        $optionSql .= "INSERT INTO product_options (product_id, name, price) VALUES ('$last_id', '$value', $option_price[$key]);";
                    }

                    //dd($optionSql);

                    $result_company = mysqli_multi_query($con, $optionSql);
                    if (!$result_company) {
                        $error = 'result_company query failed';
                    } else {
                        $success = "Information saved.";
                        $link = "list.php?success=" . base64_encode($success);
                        redirect($link);
                    }
                    //Item option part end
                } else {
                    $error = "Something went wrong.";
                }
            }

            /*if ($resultinsertProduct) {
                //Item option part start
                $last_id = mysqli_insert_id($con);

                // company and designation part start
                $company_name = $_POST["company_name"];
                $company_designation = $_POST["company_designation"];
                $total_company_item = count($company_name);
                foreach ($company_name AS $key => $value) {
                    $insert_company_array = '';
                    $insert_company_array .= 'tbl_product_id = "' . $last_id . '"';
                    $insert_company_array .= ',tbl_product_price = "' . $company_designation[$key] . '"';
                    $insert_company_array .= ',tbl_product_option_name = "' . $company_name[$key] . '"';

                    $sql_company = "INSERT INTO tbl_product_option SET $insert_company_array";
                    $result_company = mysqli_query($con, $sql_company);
                    if (!$result_company) {
                        $error = 'result_company query failed';
                    } else {
                        $success = "Information saved.";
                        $link = "list.php?success=" . base64_encode($success);
                        redirect($link);
                    }
                }
                //Item option part end
            } else {
                $error = "Something went wrong.";
            }*/
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Menu | AANGON Admin</title>
    <?php include basePath('admin/header_script.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo baseUrl('admin/resources/kendo/css/kendo.common.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo baseUrl('admin/resources/kendo/css/kendo.metro.min.css'); ?>" />
    <style>
        .col-md-1 {padding-top: 2.7%;}
        #company_div .col-md-12 {padding-left: 0px;}
        #company_div .col-md-6 {padding-left: 0px;}
        #company_div .col-md-5 {padding-left: 0px;}
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Menu
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
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Add Menu</div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="product_category_id">Category&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <select id="product_category_id" name="product_category_id" class="form-control" required>
                                                    <option value="">--</option>
                                                    <?php
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
                                                <label for="product_title">Title &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="product_title" required name="product_title" value="<?php echo $product_title; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="product_image">Image</label>
                                                <input type="file" name="product_image" id="product_image" />
                                            </div>
                                            <div class="form-group">
                                                <label for="product_details">Details</label>
                                                <textarea class="form-control" style="resize: vertical" name="product_details" id="product_details" rows="2"><?php echo html_entity_decode($product_details, ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_new_price">Price&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="number" step="0.01" class="form-control" id="product_new_price" name="product_new_price" value="<?php echo $product_new_price; ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label for="product_new_price">Options <input type="checkbox" name="option_check" onclick="(function(elm) {
                                                    if (elm.checked){
                                                        $('#company_div').show();
                                                    } else {
                                                        $('#company_div').hide();
                                                    }

                                                })(this)"></label>
                                                <br>

                                                <div id="company_div" style="display: none">
                                                    <button type="button" id="add_more" return="false" onclick="javascript:generateOption();"><i class="fa fa-plus"></i></button>
                                                    <div class="col-md-12">
                                                        <div id="total_div">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="company_name_0">Option Title&nbsp;&nbsp;<strong><span style="color:red;">*</span></strong></label>
                                                                    <input type="text" name="option_name[]" value="" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="company_designation_0">Price&nbsp;&nbsp;<strong><span style="color:red;">*</span></strong></label>
                                                                    <input type="number" step="0.01" name="option_price[]" value="" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="total_div_cloned"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12" style="padding-left: 0px;">
                                                <label for="product_status">Status&nbsp;&nbsp;<span style="color:red;">*</label>
                                                <select id="product_status" name="product_status" class="form-control" required>
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
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
    function generateOption() {
        $('#total_div').clone().appendTo('#total_div_cloned');
    }

    function GenerateCompanyDesignation() { // this function is deprecated by Tanvir

        var count = $('div.total_div').length;
        var fieldHTML = '';

        fieldHTML += '<div class="total_div">';
        fieldHTML += '<div class="col-md-6">';
        fieldHTML += '<div class="form-group">';
        fieldHTML += '<label>Option Title</label>';
        fieldHTML += '<input type="text" id="company_name_' + count + '" name="company_name[]" value="" class="form-control" />';
        fieldHTML += '</div>';
        fieldHTML += '</div>';
        fieldHTML += '<div class="col-md-5">';
        fieldHTML += '<div class="form-group">';
        fieldHTML += '<label>Price</label>';
        fieldHTML += '<input type="number" step="0.01" id="company_designation_' + count + '" name="company_designation[]" value="" class="form-control" />';
        fieldHTML += '</div>';
        fieldHTML += '</div>';
        fieldHTML += '<div id="field_close' + (count + 1) + '" class="">';
        fieldHTML += '<div class="col-md-1">';
        fieldHTML += '<button onclick="javascript:closeCompanyDiv(' + (count + 1) + ');" type="button"><i class="fa fa-close"></i></button>';
        fieldHTML += '</div>';
        fieldHTML += '</div>';

        $("#company_div").append(fieldHTML);
    }
    function closeCompanyDiv(id) {
        $("#field_close" + id).remove();
    }
</script>
<script type="text/javascript">
    $("#productActive").addClass("active");
    $("#productActive").parent().parent().addClass("treeview active");
    $("#productActive").parent().addClass("in");
</script>
</body>
</html>

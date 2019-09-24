<?php
include '../../../config/config.php';
require_once("lib/Tinify/Exception.php");
require_once("lib/Tinify/ResultMeta.php");
require_once("lib/Tinify/Result.php");
require_once("lib/Tinify/Source.php");
require_once("lib/Tinify/Client.php");
require_once("lib/Tinify.php");
\Tinify\setKey("qnh2UfHTNdSFYtR5y5330uuR0KovIrpl");

$product_image = '';
$flag = 0;
if (isset($_POST['btnAddProduct'])) {
    extract($_POST);

    if ($_FILES['product_image']['name']) { // Check if image file posted or not
        $targetDirectory = $config['IMAGE_UPLOAD_PATH'] . '/test/'; // Target directory where image will save or store
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
                //optimize image using TinyPNG
                $source = \Tinify\fromFile($targetFile);
                $source->toFile($config['IMAGE_UPLOAD_PATH'] . '/test-compressed/'.$renameFile);
                $flag = 0;
            }
        }
    }
    // Image upload code end
    if ($flag === 0) {
        $success = "Success!";
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
    <title>Add Product | <?php echo $config['ADMIN_SITE_NAME']; ?></title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Product Add</h1>
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
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Add Product</div>
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="product_image">Image&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                <input type="file" name="product_image" id="product_image" required />
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
    $("#productActive").addClass("active");
    $("#productActive").parent().parent().addClass("treeview active");
    $("#productActive").parent().addClass("in");
</script>
</body>
</html>
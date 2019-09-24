<?php
include '../../../config/config.php';
$banner_title = '';
$banner_status = '';
$banner_link = '';
$banner_image = '';
$banner_created_on = date('Y-m-d H:i:s');
$banner_created_by = $_SESSION['admin_id'];
//print_r($_SESSION);
$flag = 0;
if (isset($_POST['btnAddBanner'])) {
    extract($_POST);
    $banner_image = validateInput($banner_image);
    $banner_status = validateInput($banner_status);


    if ($banner_status === '0') {
        $error = "Please select status";
    } else {
        // Image upload code
        if ($_FILES['banner_image']['name']) { // Check if image file posted or not
            $targetDirectory = $config['IMAGE_UPLOAD_PATH'] . '/banner/'; // Target directory where image will save or store
            $targetFile = '';
            $fileType = pathinfo(basename($_FILES['banner_image']['name']), PATHINFO_EXTENSION); // File type such as .jpg, .png, .jpeg, .gif
            if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'gif') { // Check file is in mentioned format or not
                $flag++;
                $error = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
            } else {
                if ($_FILES['banner_image']['size'] > (1024000)) { // Check file size. File size must be less than 1MB
                    $flag++;
                    $error = 'Banner image size is too large. Must be less than 1MB';
                } else {
                    $renameFile = str_replace(" ", "-", $banner_title). '.' . $fileType; // Rename the file name
                    $targetFile = $targetDirectory . $renameFile; // Target image file
                    move_uploaded_file($_FILES['banner_image']['tmp_name'], $targetFile);
                    $flag = 0;
                }
            }
        }
        // Image upload code end
        if ($flag == 0) {
            $custom_array = '';
            $custom_array .= 'banner_title = "' . $banner_title . '"';
            $custom_array .= ',banner_image = "' . $renameFile . '"';
            $custom_array .= ',banner_link = "' . $banner_link . '"';
            $custom_array .= ',banner_status = "Active"';
            $custom_array .= ',banner_created_on = "' . $banner_created_on . '"';
            $custom_array .= ',banner_created_by = "' . $banner_created_by . '"';

            $sql = "INSERT INTO tbl_banner SET $custom_array";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $success = 'Banner information saved successfully';
                $link = baseUrl() . "admin/view/banner/index.php?success=" . base64_encode($success);
                redirect($link);
            } else {
                if (DEBUG) {
                    $error = 'result query failed for ' . mysqli_error($con);
                } else {
                    $error = 'Something went wrong';
                }
            }
        } else {
            $error = 'Something went wrong';
        }
    }
}

//Delete Banner
if (isset($_POST['DeleteBanner'])) {
    extract($_POST);
    $banner_id = validateInput($banner_id);
    $sqlImage = "SELECT * FROM tbl_banner WHERE banner_id=$banner_id";
    $resultImage = mysqli_query($con, $sqlImage);
    $dataImage = mysqli_fetch_array($resultImage);
    @unlink($config['IMAGE_UPLOAD_PATH'] . '/banner/' . $dataImage["banner_image"]);
    $sql = "DELETE FROM tbl_banner WHERE banner_id=$banner_id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = "Information deleted successfully";
    } else {
        $error = "Something went wrong. Please try again.";
    }
}
//Get Product Category
$arrayProductCategory = array();
$sqlGetProductCategory = "SELECT product_category_id,product_category_name FROM tbl_product_category WHERE product_category_status='Active'";
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $config['ADMIN_SITE_NAME']; ?> | Banner</title>
    <?php include basePath('admin/header_script.php'); ?>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
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
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Add Banner</div>
                            <div class="panel-body">
                                <form class="form-inline" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="banner_title">Banner Title &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" id="banner_title" name="banner_title" value="<?php echo $banner_title; ?>" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="banner_image">Banner Image&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                        <input type="file" name="banner_image" id="banner_image" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="banner_link">Banner Link &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                        <select id="banner_link" name="banner_link" class="form-control">
                                            <option value="">Select Category</option>
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
                                    <button type="submit" name="btnAddBanner" class="btn btn-success">Submit</button>
                                </form>
                                <p>N.B.: Use 1920*800 dimension for best banner showcase</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Banner List</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="categoryTable">
                                        <thead style="background-color: #E4E3E2;">
                                        <tr>
                                            <th style="width: 30%;">Banner Title</th>
                                            <th style="width: 30%;">Image</th>
                                            <th style="width: 30%;">Link</th>
                                            <th style="width: 20%;">Status</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $array = array();
                                        $sql = "SELECT * FROM tbl_banner ORDER BY banner_id DESC";
                                        $result = mysqli_query($con, $sql);
                                        $total = mysqli_num_rows($result);
                                        $sqlList = "SELECT * FROM tbl_banner ORDER BY banner_id DESC";
                                        $resultList = mysqli_query($con, $sqlList);
                                        ?>
                                        <?php while ($obj = mysqli_fetch_object($resultList)): ?>
                                            <tr>
                                                <td style="width: 30%;"><?php echo $obj->banner_title; ?></td>
                                                <td style="width: 30%;">
                                                    <img class="img-responsive" src="<?php echo baseUrl('upload/banner/'); ?><?php echo $obj->banner_image; ?>" style="width: 50%;">
                                                </td>
                                                <td>
                                                    <?php if (count($arrayProductCategory) > 0): ?>
                                                        <?php foreach ($arrayProductCategory AS $productCategory): ?>
                                                            <?php
                                                            if ($productCategory->product_category_id == $obj->banner_link) {
                                                                echo $productCategory->product_category_name;
                                                            }
                                                            ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="width: 20%;">
                                                    <?php if ($obj->banner_status == 'Active'): ?>
                                                        <label class="label label-success"><?php echo $obj->banner_status; ?></label>
                                                    <?php else: ?>
                                                        <label class="label label-danger"><?php echo $obj->banner_status; ?></label>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="width: 20%;">
                                                    <a href="#">
                                                        <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                                    </a>
                                                    <a href="javascript:void(0);">
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" type="button" data-target="#deleteModal<?php echo $obj->banner_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div id="deleteModal<?php echo $obj->banner_id; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <form method="POST">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Are you sure you want to delete?</h4>
                                                                <input type="hidden" name="banner_id" id="banner_id" value="<?php echo $obj->banner_id; ?>" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <button type="submit" id="DeleteBanner" name="DeleteBanner" class="btn btn-danger">Yes</button>
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
    $("#bannerActive").addClass("active");
    $("#bannerActive").parent().parent().addClass("treeview active");
    $("#bannerActive").parent().addClass("in");
</script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
    $(function () {
        $("#categoryTable").dataTable();
    })
</script>
</body>
</html>
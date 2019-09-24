<?php
include '../../../config/config.php';
$client_id = '';
$client_name = '';
$client_image = '';
$client_country = '';
$client_status = '';
$client_created_by = getSession('admin_id');
$client_created_on = date('Y-m-d H:i:s');
$flag = 0;
/*
 * save product cateoory
 */
if (isset($_POST['btnAddClient'])) {
    extract($_POST);
//    debug($_POST);
//    exit();
    $client_name = validateInput($client_name);
    $client_country = validateInput($client_country);
    $client_status = validateInput($client_status);
    if ($client_name === '') {
        $error = "Please fill up required fields.";
    } elseif ($client_status === '0') {
        $error = "Please fill up required fields.";
    } else {
        $checkClientSql = "SELECT * FROM tbl_brand WHERE client_name = '$client_name'";
        $resultClient = mysqli_query($con, $checkClientSql);
        $countClient = mysqli_num_rows($resultClient);
        if ($countClient >= 1) {
            $error = "Information already exists";
        } else {
            if ($_FILES['client_image']['name']) { // Check if image file posted or not
                $targetDirectory = $config['IMAGE_UPLOAD_PATH'] . '/brand_image/'; // Target directory where image will save or store
                $targetFile = '';
                $fileType = pathinfo(basename($_FILES['client_image']['name']), PATHINFO_EXTENSION);
                // File type such as .jpg, .png, .jpeg, .gif
                if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'GIF' && $fileType != 'gif' && $fileType != 'JPG') { // Check file is in mentioned format or not
                    $flag++;
                    $error = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
                } else {
                    if ($_FILES['client_image']['size'] > (1024000)) { // Check file size. File size must be less than 1MB
                        $flag++;
                        $error = 'Image size is too large. Must be less than 1MB';
                    } else {
                        $renameFile = "Brand-" . $client_name . '.' . $fileType; // Rename the file name
                        $targetFile = $targetDirectory . $renameFile; // Target image file
                        move_uploaded_file($_FILES['client_image']['tmp_name'], $targetFile);
                        $flag = 0;
                    }
                }
            }
            // Image upload code end
            if ($flag === 0) {
                $customArray = '';
                $customArray .= 'client_name = "' . $client_name . '"';
                $customArray .= ',client_image = "' . $renameFile . '"';
                $customArray .= ',client_status = "' . $client_status . '"';
                $customArray .= ',client_created_on = "' . $client_created_on . '"';
                $customArray .= ',client_created_by = "' . $client_created_by . '"';
                $sqlInsertClient = "INSERT INTO tbl_brand SET $customArray";
//                exit();
                $resultinsertClient = mysqli_query($con, $sqlInsertClient);
                if ($resultinsertClient) {
                    $success = "Information saved.";
                    $link = "index.php?success=" . base64_encode($success);
                    redirect($link);
                } else {
                    $error = "Something went wrong.";
                }
            } else {
                $error = "Something went wrong. Please try again.";
            }
        }
    }
}
//Delete Client Client
if (isset($_POST['DeleteClient'])) {
    extract($_POST);

    $client_id = validateInput($client_id);
    $sqlImage = "SELECT * FROM tbl_brand WHERE client_id=$client_id";
    $resultImage = mysqli_query($con, $sqlImage);
    $dataImage = mysqli_fetch_array($resultImage);
    @unlink($config['IMAGE_UPLOAD_PATH'] . '/brand_image/' . $dataImage["client_image"]);
    $sql = "DELETE FROM tbl_brand WHERE client_id=$client_id";
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
    <title>Brands | Eighteen</title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Brands
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Brand</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Add Clients</div>
                            <div class="panel-body">
                                <form class="form-inline" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="client_name">Brand Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="client_name" name="client_name" value="<?php echo $client_name; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="client_image">Logo <span style="color: red;">*</span></label>
                                        <input type="file" name="client_image" id="client_image" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="client_status">Status <span style="color: red;">*</span></label>
                                        <select class="form-control" name="client_status" id="client_status" required>
                                            <option value="Active"<?php
                                            if ($client_status === 'Active') {
                                                echo "selected";
                                            }
                                            ?>>Active</option>
                                            <option value="Inactive"<?php
                                            if ($client_status === 'Inactive') {
                                                echo "selected";
                                            }
                                            ?>>Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="btnAddClient" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Clients List</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead style="background-color: #E4E3E2;">
                                        <tr>
                                            <th style="width: 20%;">Brand Name</th>
                                            <th style="width: 20%;">Brand Logo</th>
                                            <th style="width: 10%;">Status</th>
                                            <th style="width: 40%;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $array = array();
                                        $sql = "SELECT * FROM tbl_brand ORDER BY client_id DESC";
                                        $result = mysqli_query($con, $sql);
                                        $total = mysqli_num_rows($result);
                                        $adjacents = 6;
                                        $targetpage = "index.php";
                                        $limit = $config['PAGE_LIMIT'];
                                        if (isset($_GET['page'])) {
                                            $page = $_GET['page'];
                                        } else {
                                            $page = 0;
                                        }
                                        if ($page) {
                                            $start = ($page - 1) * $limit;
                                        } else {
                                            $start = 0;
                                        }
                                        if ($page == 0) {
                                            $page = 1;
                                        }

                                        $prev = $page - 1;
                                        $next = $page + 1;
                                        $lastpage = ceil($total / $limit);
                                        $lpm1 = $lastpage - 1;
                                        $sqlList = "SELECT * FROM tbl_brand ORDER BY client_id DESC LIMIT $start, $limit";
                                        $resultList = mysqli_query($con, $sqlList);
                                        /* CREATE THE PAGINATION */
                                        $counter = '';
                                        $pagination = "";
                                        if ($lastpage > 1) {
                                            $pagination .= "<ul class='pagination pagination-sm'>";
                                            if ($page > $counter + 1) {
                                                $pagination .= "<li><a href=\"$targetpage?page=$prev\">Prev</a></li>";
                                            }
                                            if ($lastpage < 7 + ($adjacents * 2)) {
                                                for ($counter = 1; $counter <= $lastpage; $counter++) {
                                                    if ($counter == $page) {
                                                        $pagination .= "<li class='active'><a href='#'>$counter</a></li>";
                                                    } else {
                                                        $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                                    }
                                                }
                                            } elseif ($lastpage > 5 + ($adjacents * 2)) {
                                                if ($page < 1 + ($adjacents * 2)) {
                                                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                                                        if ($counter == $page)
                                                            $pagination .= "<li class='active'><a href='#' >$counter</a></li>";
                                                        else
                                                            $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                                    }
                                                    $pagination .= "<li></li>";
                                                    $pagination .= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                                                    $pagination .= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
                                                }
                                                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                                                    $pagination .= "<li><a href=\"$targetpage?page=1\">1</a></li>";
                                                    $pagination .= "<li><a href=\"$targetpage?page=2\">2</a></li>";
                                                    $pagination .= "<li></li>";
                                                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                                                        if ($counter == $page) {
                                                            $pagination .= "<li class='active'><a href='#'>$counter</a></li>";
                                                        } else {
                                                            $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                                        }
                                                    }
                                                    $pagination .= "<li></li>";
                                                    $pagination .= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                                                    $pagination .= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
                                                } else {
                                                    $pagination .= "<li><a href=\"$targetpage?page=1\">1</a></li>";
                                                    $pagination .= "<li><a href=\"$targetpage?page=2\">2</a></li>";
                                                    $pagination .= "<li></li>";
                                                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                                                        if ($counter == $page) {
                                                            $pagination .= "<li class='active'><a href='#'>$counter</a></li>";
                                                        } else {
                                                            $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                                        }
                                                    }
                                                }
                                            }
                                            if ($page < $counter - 1) {
                                                $pagination .= "<li><a href=\"$targetpage?page=$next\">Next</a></li>";
                                            } else {
                                                $pagination .= "";
                                                $pagination .= "</ul>\n";
                                            }
                                        }
                                        ?>
                                        <?php while ($obj = mysqli_fetch_object($resultList)): ?>
                                            <tr>
                                                <td style="width: 20%;"><?php echo $obj->client_name; ?></td>
                                                <td style="width: 30%;">
                                                    <img class="img-responsive" src="<?php echo baseUrl('upload/brand_image/'); ?><?php echo $obj->client_image; ?>">
                                                </td>
                                                <td style="width: 10%;">
                                                    <?php if ($obj->client_status == 'Active'): ?>
                                                        <label class="label label-success"><?php echo $obj->client_status; ?></label>
                                                    <?php else: ?>
                                                        <label class="label label-danger"><?php echo $obj->client_status; ?></label>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="width: 40%;">
                                                    <a href="javascript:void(0);">
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" type="button" data-target="#deleteModal<?php echo $obj->client_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div id="deleteModal<?php echo $obj->client_id; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <form method="POST">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Are you sure you want to delete?</h4>
                                                                <input type="hidden" name="client_id" id="client_id" value="<?php echo $obj->client_id; ?>" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <button type="submit" id="DeleteClient" name="DeleteClient" class="btn btn-danger">Yes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php echo $pagination; ?>
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
    $("#brandActive").addClass("active");
    $("#brandActive").parent().parent().addClass("treeview active");
    $("#brandActive").parent().addClass("in");
</script>
</body>
</html>

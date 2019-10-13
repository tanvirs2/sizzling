<?php
include '../../../config/config.php';
//Delete Product 
$user_id = '';
if (isset($_POST['DeleteUser'])) {
    extract($_POST);
    $user_id = validateInput($user_id);
    $sql = "DELETE tbl_user FROM tbl_user WHERE user_id=$user_id ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = "User deleted.";
    } else {
        $error = "Something went wrong. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $config['ADMIN_SITE_NAME']; ?> | View User List</title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="skin-blue">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content">
            <?php include basePath('admin/message.php'); ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style" style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">User List </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-responsive">
                                        <thead style="background-color: #E4E3E2;">
                                        <tr>
                                            <th style="width: 15%">Name</th>
                                            <th style="width: 10%">Mobile</th>
                                            <th style="width: 10%">Email</th>
                                            <th style="width: 10%">Address</th>
                                            <th style="width: 15%">Registered On</th>
                                            <th style="width: 10%">Status</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $array = array();
                                        $sql = "SELECT * FROM tbl_user ORDER BY user_id DESC";
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
                                        $sqlList = "SELECT * FROM tbl_user ";
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
                                        <?php if ($total > 0): ?>
                                            <?php while ($obj = mysqli_fetch_object($resultList)): ?>
                                                <tr>
                                                    <td style="width: 15%;"><?php echo $obj->user_name; ?></td>
                                                    <td style="width: 10%;"><?php echo $obj->user_mobile; ?></td>
                                                    <td style="width: 10%;"><?php echo $obj->user_email; ?></td>
                                                    <td style="width: 25%;"><?php echo $obj->user_address; ?></td>
                                                    <?php
                                                    $time = strtotime($obj->user_created_on);
                                                    $myFormatForView = date("d-M-y g:i A", $time);
                                                    ?>
                                                    <td style="width: 15%;"><?php echo $myFormatForView; ?></td>
                                                    <td style="width: 10%;">
                                                        <?php if ($obj->user_status == 'Active'): ?>
                                                            <label class="label label-success"><?php echo $obj->user_status; ?></label>
                                                        <?php else: ?>
                                                            <label class="label label-danger"><?php echo $obj->user_status; ?></label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="width: 10%;">
                                                        <a href="javascript:void(0);">
                                                            <button class="btn btn-danger btn-sm" data-toggle="modal" type="button" data-target="#deleteModal<?php echo $obj->user_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div id="deleteModal<?php echo $obj->user_id; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <form method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Are you sure you want to delete this user?</h4>
                                                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $obj->user_id; ?>" />
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                    <button type="submit" id="DeleteUser" name="DeleteUser" class="btn btn-danger">Yes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" style="text-align: center;">No data found in record</td>
                                            </tr>
                                        <?php endif; ?>
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
    $("#userActive").addClass("active");
    $("#userActive").parent().parent().addClass("treeview active");
    $("#userActive").parent().addClass("in");
</script>
</body>
</html>
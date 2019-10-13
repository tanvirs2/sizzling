<?php
include '../../../config/config.php';

//Delete Delivery charge 
$contact_id = '';
if (isset($_POST['DeleteContact'])) {
    extract($_POST);
    $contact_id = validateInput($contact_id);
    $sql = "DELETE FROM tbl_contact WHERE contact_id=$contact_id";
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact List | <?php echo $config['ADMIN_SITE_NAME']; ?></title>
    <?php include basePath('admin/header_script.php'); ?>
</head>
<body class="skin-blue">
<div class="wrapper">
    <?php include basePath('admin/header.php'); ?>
    <?php include basePath('admin/side_menu.php'); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="panel-group">
                        <div class="panel panel-primary" style="border-color: #6BA756;">
                            <div class="panel-heading panel-style"  style="background-color: #6BA756;text-transform: uppercase;font-weight: bold">Contact List</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead style="background-color: #E4E3E2;">
                                        <tr>
                                            <th style="width: 15%;">Name</th>
                                            <th style="width: 20%;">Email</th>
                                            <th style="width: 20%;">Subject</th>
                                            <th style="width: 20%;">Message</th>
                                            <th style="width: 15%;">Date</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tbl_contact";
                                        $result = mysqli_query($con, $sql);
                                        $totalRows = mysqli_num_rows($result);
                                        ?>
                                        <?php if ($totalRows > 0): ?>
                                            <?php while ($row = mysqli_fetch_object($result)): ?>
                                                <tr>
                                                    <td style="width: 15%;"><?php echo $row->contact_name; ?></td>
                                                    <td style="width: 20%;"><?php echo $row->contact_email; ?></td>
                                                    <td style="width: 20%;"><?php echo $row->contact_subject; ?></td>
                                                    <td style="width: 20%;"><?php echo $row->contact_message; ?></td>
                                                    <td style="width: 15%;">
                                                        <?php
                                                        $time = strtotime($row->contact_created_on);
                                                        $myFormatForView = date("d-M-y g:i A", $time);
                                                        echo $myFormatForView;
                                                        ?>
                                                    </td>
                                                    <td style="width: 10%;">
                                                        <a href="javascript:void(0);">
                                                            <button class="btn btn-danger btn-sm" data-toggle="modal" type="button" data-target="#deleteModal<?php echo $row->contact_id; ?>"><i class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div id="deleteModal<?php echo $row->contact_id; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <form method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Are you sure you want to delete?</h4>
                                                                    <input type="hidden" name="contact_id" id="contact_id" value="<?php echo $row->contact_id; ?>" />
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                    <button type="submit" id="DeleteContact" name="DeleteContact" class="btn btn-danger">Yes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" style="text-align: center;">No data found in record</td>
                                            </tr>
                                        <?php endif; ?>
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
    $("#contactActive").addClass("active");
    $("#contactActive").parent().parent().addClass("treeview active");
    $("#contactActive").parent().addClass("in");
</script>
</body>
</html>
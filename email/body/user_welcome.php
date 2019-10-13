<?php
include '../../config/config.php';
$contact_name = '';
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $sqlGetData = "SELECT user_id, user_name, user_email FROM tbl_user WHERE user_id='$ID'";
    $resultGetData = mysqli_query($con, $sqlGetData);
    if ($resultGetData) {
        $obj = mysqli_fetch_object($resultGetData);
    } else {
        $error = "Something went wrong";
    }
    ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
                    <title>Sample Requisition Portal Login Approval Notification</title>
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
                        <style type="text/css">
                            body{width:100%;background-color:#4c4e4e;margin:0;padding:0;-webkit-font-smoothing:antialiased}html{width:100%}table{font-size:14px;border:0}@media only screen and (max-width: 640px){.header-bg{width:440px !important;height:10px !important}.main-header{line-height:28px !important}.main-subheader{line-height:28px !important}.container{width:440px !important}.container-middle{width:420px !important}.mainContent{width:400px !important}.main-image{width:400px !important;height:auto !important}.banner{width:400px !important;height:auto !important}.section-item{width:400px !important}.section-img{width:400px !important;height:auto !important}.prefooter-header{padding:0 10px !important;line-height:24px !important}.prefooter-subheader{padding:0 10px !important;line-height:24px !important}.top-bottom-bg{width:420px !important;height:auto !important}}@media only screen and (max-width: 479px){.header-bg{width:280px !important;height:10px !important}.top-header-left{width:260px !important;text-align:center !important}.top-header-right{width:260px !important}.main-header{line-height:28px !important;text-align:center !important}.main-subheader{line-height:28px !important;text-align:center !important}.logo{width:260px !important}.nav{width:260px !important}.container{width:280px !important}.container-middle{width:260px !important}.mainContent{width:240px !important}.main-image{width:240px !important;height:auto !important}.banner{width:240px !important;height:auto !important}.section-item{width:240px !important}.section-img{width:240px !important;height:auto !important}.prefooter-header{padding:0 10px !important;line-height:28px !important}.prefooter-subheader{padding:0 10px !important;line-height:28px !important}.top-bottom-bg{width:260px !important;height:auto !important}}
                        </style>
                        </head>
                        <?php include '../header/header.php'; ?>
                        <tr bgcolor="ececec"><td height="40"></td></tr>
                        <tr>
                            <td>
                                <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                                    <tbody>
                                        <tr bgcolor="ffffff"><td height="7"></td></tr>
                                        <tr bgcolor="ffffff">
                                            <td>
                                                <table width="528" border="0" align="center" cellpadding="0" cellspacing="0" class="mainContent">
                                                    <tbody>
                                                        <tr><td height="20"></td></tr>
                                                        <tr>
                                                            <td mc:edit="subtitle1" class="main-subheader" style="color: #a4a4a4; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                                <p style="color: black;font-size: 14px;">
                                                                    <span>Hello <?php echo $obj->user_name; ?>,<br></span>
                                                                    An Admin has approved your request to join 
                                                                    "Zaber & Zubair Fabrics Ltd Sample Requisition Portal".<br> <br>
                                                                            Now you can login to the system. Here are the login details: <br>
                                                                                <b>URL: </b><a href="http://snsapl.com/sample" target="_blank">www.snsapl.com/sample</a> <br>
                                                                                    <b>User Name:</b> <?php echo $obj->user_email; ?><br>
                                                                                        <br>
                                                                                            Have a great day ahead!
                                                                                            </p>
                                                                                            </td>
                                                                                            </tr>			
                                                                                            </tbody></table>
                                                                                            </td>
                                                                                            </tr>
                                                                                            <tr bgcolor="ffffff"><td height="25"></td></tr>
                                                                                            </tbody></table>
                                                                                            </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>                                                        
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">                                                               
                                                                                                        </tbody>

                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <?php include '../footer/footer.php'; ?>
                                                                                            </tbody>
                                                                                            </table>
                                                                                            </body>
                                                                                            </html>
                                                                                            <?php
                                                                                        } else {
                                                                                            echo "Incorrect parameter";
                                                                                        }
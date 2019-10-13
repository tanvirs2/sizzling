<?php
include "../config/config.php";
//session_start();
$user_name =  "";
$password =  "";
$link = '';
if (isset($_POST['btnLogin'])) {
    extract($_POST);
    $user_name = trim($user_name);
    $password = trim($password);
    $password = '21232f297a57a5a74#sizzling#3894a0e4a801fc3'; //securedPass($password);
    if (empty($user_name)) {
        $error = " Enter email address";
    } elseif (empty($password)) {
        $error = " Enter password";
    } else {
        $sql = "SELECT * FROM tbl_admin WHERE admin_email ='$user_name'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                $result_row = mysqli_fetch_object($result);
                 $checkedPwd = $result_row->admin_password;
                if ($checkedPwd == $password) {
                    $_SESSION['admin_id'] = $result_row->admin_id;
                    $_SESSION['name'] = $result_row->admin_name;
                    $success = "Logged in successfully";
                    $link = baseUrl() . "admin/view/dashboard.php?success=" . base64_encode($success);
                    redirect($link);
                } else {
                    $error = '  Incorrect password';
                }
            } else {
                $error = ' Incorrect username';
            }
        } else {
            if (DEBUG) {
                $error = "result error: " . mysqli_error($con);
            } else {
                $error = "result query failed";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN Login | SIZZLING</title>
    <?php include 'header_script.php' ?>
</head>
<body class="hold-transition login-page">
<div class="container" style="margin-top: 5%;">
    <div class="login-box">
        <div class="login-box-body">
            <h4 class="text-center">SIZZLING | ADMIN LOGIN</h4>
            <hr>
                <?php include 'message.php'; ?>
                <form method="POST" action="#">
                    <div class="form-group has-feedback">
                        <input class="form-control" placeholder="Email" type="email" id="user_name" name="user_name">
                        <span class="fa fa-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input class="form-control" placeholder="Password" type="password" id="password" name="password">
                        <span class="fa fa-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <div class="social-auth-links text-center">
                            <button type="submit" name="btnLogin" class="btn btn-block btn-social btn-facebook btn-flatflat"><i class="fa fa-check"></i>Sign In</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</body>
<?php include 'footer_script.php' ?>
</html>
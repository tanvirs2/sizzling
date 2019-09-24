<?php
include './config/config.php';
//LOGIN
$username = '';
$password = '';
$countUserLogin = 0;
if (isset($_POST['btn_login'])) {
    extract($_POST);
    $username = validateInput($username);
    $password = validateInput($password);
    if ($username !== '' && $password !== '') {
        $password = securedPass($password);
        $checkUserSql = "SELECT * FROM tbl_user WHERE user_mobile = '$username' OR user_email = '$username' AND user_password = '$password'";
        $checkUserResult = mysqli_query($con, $checkUserSql);
        $countUserLogin = mysqli_num_rows($checkUserResult);
        if ($countUserLogin > 0) {
            $row = mysqli_fetch_object($checkUserResult);
            $userID = $row->user_id;
            $user_name = $row->user_name;
            $user_mobile = $row->user_mobile;

            setSession('user_id', $userID);
            setSession('user_name', $user_name);
            setSession('user_mobile', $user_mobile);
            $success = "Logged in successfully.";
            $username = $password == '';
            $link = "dashboard.php?success=" . base64_encode($success);
            redirect($link);
        } else {
            $error = "Alas! Wrong credentials given.";
        }
    }
}
//LOGIN
//REGISTER
$user_name = '';
$user_mobile = '';
$user_address = '';
$user_email = '';
$user_password = '';
$retype_password = '';
$user_created_on = date('Y-m-d H:i:s');
if (isset($_POST['btn_user_save'])) {
    extract($_POST);
//    debug($_POST);
//    exit();
    $user_name = validateInput($user_name);
    $user_mobile = validateInput($user_mobile);
    $user_address = validateInput($user_address);
    $user_email = validateInput($user_email);
    $user_password = validateInput($user_password);
    $retype_password = validateInput($retype_password);


    if (strlen($user_mobile) < 11) {
        $error = "Invalid mobile number";
    } elseif ($user_password !== $retype_password) {
        $error = "Password not matched";
    } else {
        $user_secure_password = securedPass($user_password);
        $insertarray = '';
        $insertarray .= 'user_name = "' . $user_name . '"';
        $insertarray .= ',user_mobile = "' . $user_mobile . '"';
        $insertarray .= ',user_address = "' . $user_address . '"';
        $insertarray .= ',user_email = "' . $user_email . '"';
        $insertarray .= ',user_password = "' . $user_secure_password . '"';
        $insertarray .= ',user_password_text = "' . $user_password . '"';
        $insertarray .= ',user_created_on = "' . $user_created_on . '"';


        $sql_check_user = "SELECT * FROM tbl_user WHERE user_mobile = '$user_mobile'";
        $result_check_user = mysqli_query($con, $sql_check_user);
        $count_user = mysqli_num_rows($result_check_user);
        if ($count_user >= 1) {
            $error = "A member already exists with same Mobile Number";
        } else {
            $sqlinsert = "INSERT INTO tbl_user SET $insertarray";
            $user_name = $user_mobile = $user_address = $user_email = $user_password = '';
//            debug($sqlinsert);
//            exit();
            $resultinsert = mysqli_query($con, $sqlinsert);
            if ($resultinsert) {
                $success = "Your registration completed successfully.";
            } else {
                $error = "Something went wrong! Alas!";
            }
        }
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login/Register || <?php echo $config['SITE_NAME']; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "header_script.php"; ?>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Body main wrapper start -->
<div class="wrapper fixed__footer">
    <!-- Start Header Style -->
    <?php include "header.php"; ?>
    <!-- End Offset Wrapper -->
    <!-- Start Bradcaump area -->
    <!-- End Bradcaump area -->
    <!-- Start Our Product Area -->
    <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/6.jpg) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="login__register__menu" role="tablist">
                        <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                        <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">/Register</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="htc__login__register__wrap">
                        <?php include "message.php"; ?>
                        <!-- Start Single Content -->
                        <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                            <form class="login" method="post" action="#">
                                <input type="text" name="username" placeholder="Mobile Name/ Email Address*" required value="<?php $username; ?>">
                                <input type="password" placeholder="Password*" required name="password" value="<?php echo $password;?>">
                                <div class="tabs__checkbox">
                                    <span class="forget"><a href="#">Forget Password?</a></span>
                                </div>
                                <div class="htc__login__btn mt--30">
                                    <button type="submit" id="btn_login" name="btn_login">Login</button>
                                </div>
                            </form>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                            <form role="form" method="POST" class="login" action="#">
                                <input type="text" placeholder="Name*" name="user_name" value="<?php echo $user_name; ?>" required>
                                <input type="text" maxlength="11" placeholder="Mobile*" name="user_mobile" required value="<?php echo $user_mobile; ?>">
                                <input type="email" name="user_email" placeholder="Email" value="<?php echo $user_email; ?>">
                                <input type="password" placeholder="Password*" name="user_password" value="<?php echo $user_password; ?>" required>
                                <input type="password" placeholder="Re-type Password*" name="retype_password" value="<?php echo $retype_password; ?>" required>
                                <div class="htc__login__btn">
                                    <button type="submit" value="submit" id="btn_user_save" name="btn_user_save"> Register</button>
                                    <!--                               <a href="#">register</a>-->
                                </div>
                            </form>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
            <!-- End Login Register Content -->
        </div>
    </div>

    <!-- End Our Product Area -->
    <!-- Start Footer Area -->
    <?php include "footer.php" ?>
    <!-- End Footer Area -->
</div>
<?php include "footer_script.php" ?>
</body>
</html>
<?php

header("Access-Control-Allow-Origin: *");
include '../config/config.php';
$return_array = array();
$login_user_mobile = '';
$login_user_password = '';
$countUserLogin = 0;
extract($_POST);

$login_user_mobile = validateInput($login_user_mobile);
$login_user_password = validateInput($login_user_password);

if ($login_user_mobile !== '' && $login_user_password !== '') {
    $login_user_password = securedPass($login_user_password);

    $checkUserSql = "SELECT * FROM tbl_user WHERE user_mobile = '$login_user_mobile' AND user_password = '$login_user_password'";
    $checkUserResult = mysqli_query($con, $checkUserSql);
    $countUserLogin = mysqli_num_rows($checkUserResult);
    if ($countUserLogin > 0) {
        $row = mysqli_fetch_object($checkUserResult);
        $userID = $row->user_id;
        $user_name = $row->user_name;

        setSession('user_id', $userID);
        setSession('user_name', $user_name);
        setSession('user_mobile', $login_user_mobile);

        $return_array = array("output" => "success", "user_name" => $user_name, "msg" => "Successfully logged in");
        echo json_encode($return_array);
        exit();
    } else {
        $return_array = array("output" => "error", "msg" => "Invalid email or password");
        echo json_encode($return_array);
        exit();
    }
}
?>
<?php
if (!session_id()) {
    session_start();
}
define('DEBUG', true);
if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
}
$config = array();
$success = '';
$error = '';
if (isset($_GET['success']) AND $_GET['success'] != '') {
    $success = base64_decode(trim($_GET['success']));
}
if (isset($_GET['error']) AND $_GET['error'] != '') {
    $error = base64_decode(trim($_GET['error']));
}
$config['BASE_DIR'] = dirname(dirname(__FILE__));
include ($config['BASE_DIR'] . '/config/local_config.php');
$con = mysqli_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME']);
@mysqli_query($con, 'SET CHARACTER SET utf8');
@mysqli_query($con, "SET SESSION collation_connection ='utf8_general_ci'");
if (!$con) {
    die('Databse Connect Error: ' . mysqli_connect_error());
}
include ($config['BASE_DIR'] . '/config/helper_functions.php');
/*
 * Image upload file
 */
//include ($config['BASE_DIR'] . '/config/zebra_image.php');
include ($config['BASE_DIR'] . '/config/sql.php');

?>
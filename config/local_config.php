<?php

$host = $_SERVER['HTTP_HOST'];
$domain = str_replace('www.', '', str_replace('http://', '', $host));
if ($domain == 'beautypointbd.com') {
    $config['SITE_NAME'] = 'SIZZLING';
    $config['ADMIN_SITE_NAME'] = 'SIZZLING | ADMIN PANEL';
    $config['BASE_URL'] = 'https://beautypointbd.com/sizzling';
    $config['ROOT_DIR'] = '/public_html/sizzling';
    $config['DB_TYPE'] = 'mysql';
    $config['DB_HOST'] = 'localhost';
    $config['DB_NAME'] = 'beautypointbd_sizzling';
    $config['DB_USER'] = 'beautypointbd_sizzling';
    $config['DB_PASSWORD'] = 'nHv?@(al0l1&';
} else {
    $config['SITE_NAME'] = 'SIZZLING';
    $config['ADMIN_SITE_NAME'] = 'SIZZLING | ADMIN PANEL';
    $config['BASE_URL'] = 'http://localhost/sizzling/';
    $config['ROOT_DIR'] = '/sizzling/';
    $config['DB_TYPE'] = 'mysql';
    $config['DB_HOST'] = 'localhost';
    $config['DB_NAME'] = 'sizzling';
    $config['DB_USER'] = 'root';
    $config['DB_PASSWORD'] = '';
}
date_default_timezone_set('Asia/Dhaka');
$config['PASSWORD_KEY'] = "#sizzling#";
$config['ADMIN_PASSWORD_LENGTH_MAX'] = 15;
$config['ADMIN_PASSWORD_LENGTH_MIN'] = 5;
$config['PAGE_LIMIT'] = 8;
$config['ADMIN_COOKIE_EXPIRE_DURATION'] = (60 * 60 * 24 * 30);
$config['IMAGE_UPLOAD_PATH'] = $config['BASE_DIR'] . '/upload';
$config['IMAGE_UPLOAD_URL'] = $config['BASE_URL'] . 'upload';
?>
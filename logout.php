<?php
include './config/config.php';
session_destroy();
$link = baseUrl();
redirect($link);
?>
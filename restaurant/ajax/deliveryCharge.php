<?php

header("Access-Control-Allow-Origin: *");
include '../config/config.php';
$return_array = array();
$deliveryId = '';
$subtotal = '';
extract($_POST);

$deliveryId = validateInput($deliveryId);
$subtotal = validateInput($subtotal);

if ($deliveryId > 0 && $subtotal > 0) {
    $sql = "SELECT * FROM tbl_location WHERE location_id=$deliveryId";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $obj = mysqli_fetch_object($result);
        $delcharge = $obj->location_charge;

        $subtotal = str_replace(",", "", $subtotal);
        $totalAmount = floatval($subtotal + $delcharge);
        $totalAmount = number_format($totalAmount, 2);
        $return_array = array("output" => "success", "msg" => "Delivery cost added","locationId"=> $deliveryId, "delcharge" => $delcharge, "totalAmount" => $totalAmount);
        echo json_encode($return_array);
        exit();
    }
} else {
    $return_array = array("output" => "error", "msg" => "Choose shipping method");
    echo json_encode($return_array);
    exit();
}
?>
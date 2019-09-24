<?php

header("Access-Control-Allow-Origin: *");
include '../../config/config.php';
$return_array = array();
$newQuantity = '';
$itemID = '';
extract($_POST);
$itemID = validateInput($itemID);
$newQuantity = validateInput($newQuantity);

if ($itemID > 0 && $itemID != '') {
    
    $updateArray = '';
    $updateArray .= 'temp_order_product_qty = "' . $newQuantity . '"';

    $sql = "UPDATE tbl_temp_order SET $updateArray WHERE temp_order_id=$itemID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $return_array = array("output" => "success", "msg" => "Item Updated");
        echo json_encode($return_array);
        exit();
    }
} else {
    $return_array = array("output" => "error", "msg" => "Item not updated.");
    echo json_encode($return_array);
    exit();
}
?>
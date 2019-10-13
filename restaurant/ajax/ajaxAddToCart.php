<?php

header("Access-Control-Allow-Origin: *");
include '../config/config.php';
$temp_order_product_id = 0;
$temp_order_product_qty = 1;
$temp_order_sesstion_id = session_id();
$temp_order_product_price = 0;
$cartStatus = 0;
$totalCartAmount = 0;

extract($_POST);

// check data exists 
$sqlCheckTempOrder = "SELECT * FROM tbl_temp_order "
        . "WHERE temp_order_session_id='$temp_order_sesstion_id' AND "
        . "temp_order_product_id=$temp_order_product_id ";
$resultCheckTempOrder = mysqli_query($con, $sqlCheckTempOrder);
$countTempOrder = mysqli_num_rows($resultCheckTempOrder);
//if ($countTempOrder > 0) {
//    $cartStatus++;
//    $return_array = array("output" => "error", "msg" => "Already added to cart");
//} else {
// insert data
$insertItemTmpCart = '';
$insertItemTmpCart .=' temp_order_product_id = "' . validateInput($temp_order_product_id) . '"';
$insertItemTmpCart .=', temp_order_product_qty = "' . validateInput($temp_order_product_qty) . '"';
$insertItemTmpCart .=', temp_order_product_price = "' . validateInput($temp_order_product_price) . '"';
$insertItemTmpCart .=', temp_order_session_id = "' . validateInput($temp_order_sesstion_id) . '"';

$sqlInsertItemTempCart = "INSERT INTO tbl_temp_order SET $insertItemTmpCart";
$resultInsertITempCart = mysqli_query($con, $sqlInsertItemTempCart);
//}
/* * ***************************************Temp Cart Generation********************************************* */
$arrTmpCart = array();
$sqlTmpCart = "SELECT tbl_product.product_id,tbl_product.product_title,tbl_product.product_image,tbl_temp_order.* FROM tbl_temp_order "
        . "LEFT JOIN tbl_product ON tbl_temp_order.temp_order_product_id=tbl_product.product_id "
        . "WHERE tbl_temp_order.temp_order_session_id='$temp_order_sesstion_id'";

$resultTmpCart = mysqli_query($con, $sqlTmpCart);
if ($resultTmpCart) {
    while ($objTmpCart = mysqli_fetch_object($resultTmpCart)) {
        $totalCartAmount += ($objTmpCart->temp_order_product_price * $objTmpCart->temp_order_product_qty);
        $arrTmpCart[] = $objTmpCart;
    }
}
if ($cartStatus === 0) {
    $return_array = array("output" => "success",
        "msg" => "Product added to cart",
        "arrTmpCart" => $arrTmpCart,
        "totalCartAmount" => number_format($totalCartAmount, 2));
}
echo json_encode($return_array);
?>

<?php

header("Access-Control-Allow-Origin: *");
include '../config/config.php';
$return_array = array();
$id = '';
$temp_order_product_id = 0;
$temp_order_product_qty = 1;
$temp_order_sesstion_id = session_id();
$temp_order_product_price = 0;
$cartStatus = 0;
$totalCartAmount = 0;
extract($_POST);

$id = validateInput($id);
if ($id > 0 && $id != '') {
    
    $sql = "DELETE FROM tbl_temp_order WHERE temp_order_id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        /* * ***************************************Temp Cart Generation********************************************* */
        $arrTmpCart = array();
        $sqlTmpCart = "SELECT tbl_product.product_id,tbl_product.product_title,tbl_product.product_image,tbl_temp_order.* FROM tbl_temp_order "
            . "LEFT JOIN tbl_product ON tbl_temp_order.temp_order_product_id=tbl_product.product_id "
            . "WHERE tbl_temp_order.temp_order_session_id='$temp_order_sesstion_id'";

        $resultTmpCart = mysqli_query($con, $sqlTmpCart);
        if ($resultTmpCart) {
            while ($objTmpCart = mysqli_fetch_object($resultTmpCart)) {
                $totalCartAmount += number_format(($objTmpCart->temp_order_product_price * $objTmpCart->temp_order_product_qty), 2);
                $arrTmpCart[] = $objTmpCart;
            }
        }
        $return_array = array("output" => "success", "msg" => "Item Deleted","arrTmpCart" => $arrTmpCart, "totalCartAmount" => number_format($totalCartAmount, 2) );
        echo json_encode($return_array);
        exit();
    }
} else {
    $return_array = array("output" => "error", "msg" => "Item not deleted.");
    echo json_encode($return_array);
    exit();
}
?>
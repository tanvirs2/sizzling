<?php

header("Access-Control-Allow-Origin: *");
include '../config/config.php';
$return_array = array();
$newQuantity = '';
$temp_order_product_id = 0;
$temp_order_product_qty = 1;
$temp_order_sesstion_id = session_id();
$temp_order_product_price = 0;
$cartStatus = 0;
$totalCartAmount = 0;
$id = '';
extract($_POST);
$id = validateInput($id);

if ($id > 0 && $id != '') {
    //Get current quantity
    $sqlCurrQty = "SELECT * FROM tbl_temp_order WHERE temp_order_id=$id";
    $resultCurrQty = mysqli_query($con, $sqlCurrQty);
    if($resultCurrQty){
        $objCurrQty = mysqli_fetch_object($resultCurrQty);
        $test = $objCurrQty->temp_order_product_qty;
        if($test > 1) {
            $newQuantity = $test-1;
            $updateArray = '';
            $updateArray .= 'temp_order_product_qty = "' . $newQuantity . '"';

            $sql = "UPDATE tbl_temp_order SET $updateArray WHERE temp_order_id=$id";
            $result = mysqli_query($con, $sql);
            if ($result) {
                /* * ***************************************Temp Cart Generation********************************************* */
                $arrTmpCart = array();
                $sqlTmpCart = "SELECT tbl_product.product_id,tbl_product.product_title,tbl_temp_order.* FROM tbl_temp_order "
                    . "LEFT JOIN tbl_product ON tbl_temp_order.temp_order_product_id=tbl_product.product_id "
                    . "WHERE tbl_temp_order.temp_order_session_id='$temp_order_sesstion_id'";

                $resultTmpCart = mysqli_query($con, $sqlTmpCart);
                if ($resultTmpCart) {
                    while ($objTmpCart = mysqli_fetch_object($resultTmpCart)) {
                        $totalCartAmount += number_format(($objTmpCart->temp_order_product_price * $objTmpCart->temp_order_product_qty), 2);
                        $arrTmpCart[] = $objTmpCart;
                    }
                }
                $return_array = array("output" => "success", "msg" => "Quantity Decreased","arrTmpCart" => $arrTmpCart, "totalCartAmount" => number_format($totalCartAmount, 2) );
                echo json_encode($return_array);
                exit();
            }
        } else{
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
                $return_array = array("output" => "success", "msg" => "Current quantity is less than 1 ","arrTmpCart" => $arrTmpCart, "totalCartAmount" => $totalCartAmount );
                echo json_encode($return_array);
                exit();
            }
        }
    } else{
        $error = "Data not found";
    }

} else {
    $return_array = array("output" => "error", "msg" => "Item not updated.");
    echo json_encode($return_array);
    exit();
}
?>
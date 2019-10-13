<?php
//Recent Product
$sqlRecentProduct = "SELECT * FROM tbl_product WHERE product_status='Active' ORDER BY product_id DESC LIMIT 8";
$resultRecentProduct = mysqli_query($con, $sqlRecentProduct);
//Featured Product
$sqlFeaturedProduct = "SELECT * FROM tbl_product WHERE product_status='Active' ORDER BY product_id DESC LIMIT 8";
$resultFeaturedProduct = mysqli_query($con, $sqlFeaturedProduct);
//Brands
$sqlBrands = "SELECT * FROM tbl_brand WHERE client_status='Active' ORDER BY client_id DESC";
$resultBrands = mysqli_query($con, $sqlBrands);
//Temp Cart
$subTotal = 0;
$arrayTempCart = array();
$sqlTempCart = "SELECT tbl_temp_order.*,tbl_product.*"
    . " FROM tbl_temp_order"
    . " LEFT JOIN tbl_product ON tbl_temp_order.temp_order_product_id = tbl_product.product_id"
    . " WHERE temp_order_session_id='" . session_id() . "'";
$resultTempCart = mysqli_query($con, $sqlTempCart);

if ($resultTempCart) {
    while ($objTempCart = mysqli_fetch_object($resultTempCart)) {
        $arrayTempCart[] = $objTempCart;
    }
}
?>
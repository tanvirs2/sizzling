<?php

header("Access-Control-Allow-Origin: *");
include '../config/config.php';
$return_array = array();
$id = '';
extract($_POST);

$id = validateInput($id);

if ($id > 0 && $id != '') {
    
     $sql = "DELETE FROM tbl_temp_order WHERE temp_order_id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {        
        $return_array = array("output" => "success", "msg" => "Item Deleted");
        echo json_encode($return_array);
        exit();
    }
} else {
    $return_array = array("output" => "error", "msg" => "Item not deleted.");
    echo json_encode($return_array);
    exit();
}
?>
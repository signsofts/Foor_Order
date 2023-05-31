<?php

include('../DBConnection.php');
$product = $_POST["product"];
$order_id = $_POST["order_id"];

try {
    foreach ($product as $key => $value) {

        $menu_id = $value['product_key'];
        $course_id = $_POST["course_id"];
        $ordetail_item = $value['ordetail_item'];
        $query = "INSERT INTO `order_detail` (`order_detail_id`, `course_id`, `menu_id`, `order_id`, `menu_quantity`, `order_status`, `order_time`) 
                VALUES (NULL, '$course_id', '$menu_id ', '$order_id', '$ordetail_item', '0', current_timestamp());";
        $exec = mysqli_query($conn, $query);
    }

    echo 'success';
} catch (\Throwable $e) {
    echo "error";
}

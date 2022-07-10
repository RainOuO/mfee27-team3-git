<?php
require('../db-connect.php');
session_start();

$order_id = $_POST['id'];
$index = $_POST['index'];

$sql = "UPDATE order_product SET status = 0 WHERE id = $order_id";
if( $conn->query($sql) === TRUE ){
    $sqlOrderItem = "SELECT status FROM order_product WHERE id = $order_id";
    $resultOrderItem = $conn->query($sqlOrderItem);
    $resultOrderItem_count = $resultOrderItem->num_rows;
    $rowOrderItem = ($resultOrderItem_count>0)? $resultOrderItem->fetch_assoc():'';
    $rowOrderItem['index'] = intval($index);
    switch($rowOrderItem['status']) {
        case 0:
            $rowOrderItem['status_css'] = [
                "bg" => 'bg-secondary opacity-25',
                "text" => 'text-secondary'
            ];
            $rowOrderItem['status_text'] = "已取消";
            break;
        case 1:
            $rowOrderItem['status_css'] = [
                "bg" => 'bg-danger',
                "text" => 'text-danger'
            ];
            $rowOrderItem['status_text'] = "未結單";
            break;
        case 2:
            $rowOrderItem['status_css'] = [
                "bg" => 'bg-warning',
                "text" => 'text-warning'
            ];
            $rowOrderItem['status_text'] = "處理中";
            break;
        case 3:
            $rowOrderItem['status_css'] = [
                "bg" => 'bg-success',
                "text" => 'text-success'
            ];
            $rowOrderItem['status_text'] = "已結單";
            break;
    };
    $data = [
        "data" => [
            "success" => true,
            "statusChange" => $rowOrderItem
        ]
    ];
}else{
    $data = [
        "data" => [
            "success" => false,
            "message" => "Error: " . $sql . "<br>" . $conn->error
        ]
    ];
}





echo json_encode($data);
?>
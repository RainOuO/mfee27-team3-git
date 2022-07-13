<?php
require('../db-connect.php');
session_start();

$order_id = $_POST['id'];
$index = $_POST['index'];
$status = $_POST['status'];
$newStatus =  $status+1;

$sql = "UPDATE order_product SET status = $newStatus WHERE id = $order_id";
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
                "text" => 'text-white',
                "color" => "secondary",
                "rounded" => "rounded",
                "display" => "invisible"
            ];
            $rowOrderItem['status_text'] = "已取消";
            $rowOrderItem['next_status'] = "";
            break;
        case 1:
            $rowOrderItem['status_css'] = [
                "bg" => 'bg-danger',
                "text" => 'text-danger',
                "color" => "danger",
                "rounded" => "rounded-start",
                "display" => "d-inline-block" 
            ];
            $rowOrderItem['status_text'] = "未確認";
            $rowOrderItem['next_status'] = "處理中";

            break;
        case 2:
            $rowOrderItem['status_css'] = [
                "bg" => 'bg-warning',
                "text" => 'text-warning',
                "color" => "warning",
                "rounded" => "rounded-start",
                "display" => "d-inline-block" 
            ];
            $rowOrderItem['status_text'] = "處理中";
            $rowOrderItem['next_status'] = "已結單";

            break;
        case 3:
            $rowOrderItem['status_css'] = [
                "bg" => 'bg-success',
                "text" => 'text-white',
                "color" => "success",
                "rounded" => "rounded",
                "display" => "invisible"
            ];
            $rowOrderItem['status_text'] = "已結單";
            $rowOrderItem['next_status'] = "";

            break;
    };
    
    $now = date('Y-m-d H:i:s');
    $sqlLog = "INSERT INTO order_product_status (order_id, status_before, status, update_time) VALUES ('$order_id', '$status', $newStatus, '$now')";
    if ($conn->query($sqlLog) === TRUE) {
        $data = [
            "data" => [
                "success" => true,
                "statusChange" => $rowOrderItem,
                "statusBefore" => $status
            ]
        ];
    } else {
        $data = [
            "data" => [
                "success" => false,
                "message" => "Error: " . $sqlLog . "<br>" . $conn->error
            ]
        ];
    }

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
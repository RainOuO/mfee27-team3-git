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
                "text" => 'text-secondary'
            ];
            $rowOrderItem['status_text'] = "已取消";
            break;
        case 1:
            $rowOrderItem['status_css'] = [
                "bg" => 'bg-danger',
                "text" => 'text-danger'
            ];
            $rowOrderItem['status_text'] = "未確認";
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
    
    $now = date('Y-m-d H:i:s');
    $sqlLog = "INSERT INTO order_product_status (status_before, status, update_time) VALUES ('$status', $newStatus, '$now')";
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
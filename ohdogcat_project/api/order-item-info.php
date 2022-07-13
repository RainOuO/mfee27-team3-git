<?php
require('../db-connect.php');
session_start();

$order_id = $_POST['order_id'];
$index = $_POST['index'];

$sql = "SELECT * FROM order_product_detail WHERE order_id = $order_id";
$result = $conn->query($sql);
$result_count = $result->num_rows;
$rows = ($result_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';

$sqlProgress = "SELECT * FROM order_product_status WHERE order_id = $order_id";
$resultProgress = $conn->query($sqlProgress);
$resultProgress_count = $resultProgress->num_rows;
$rowsProgress = ($resultProgress_count>0)? $resultProgress->fetch_all(MYSQLI_ASSOC):'';


$sqlProduct = "SELECT id, name, price, main_photo FROM product";
$resultProduct = $conn->query($sqlProduct);
$resultProduct_count = $resultProduct->num_rows;
$rowsProduct = ($resultProduct_count>0)? $resultProduct->fetch_all(MYSQLI_ASSOC):'';
$productName = array_column($rowsProduct, 'name', 'id');
$productPrice = array_column($rowsProduct, 'price', 'id');
$productImg =  array_column($rowsProduct, 'main_photo', 'id');

$sqlOrderStatus = "SELECT status FROM order_product WHERE id = $order_id";
$resultOrderStatus = $conn->query($sqlOrderStatus);
$rowOrderStatus = $resultOrderStatus->fetch_assoc();
$_SESSION["order-list"][$index]['status'] = $rowOrderStatus['status'];

for($i=0; $i<count($rows); $i++){
    $rows[$i]['productName'] = $productName[$rows[$i]['product_id']];
    $rows[$i]['productPrice'] = $productPrice[$rows[$i]['product_id']];
    $rows[$i]['productImg'] = $productImg[$rows[$i]['product_id']];
};
$progress = [];
switch($rowOrderStatus['status']) {
    case 0:
        $_SESSION["order-list"][$index]['status_css'] = [
            "bg" => 'bg-secondary opacity-25',
            "text" => 'text-secondary'
        ];
        $_SESSION["order-list"][$index]['status_text'] = "已取消";
        $_SESSION["order-list"][$index]['activeOrder'] = false;
        $progress['status'] = 'danger';
        $progress['text'] = '已取消';
        $progress['num'] = '0';

        break;
    case 1:
        $_SESSION["order-list"][$index]['status_css'] = [
            "bg" => 'bg-danger',
            "text" => 'text-danger',
            "offCanvas" => 'danger',
        ];
        $_SESSION["order-list"][$index]['status_text'] = "未確認";
        $_SESSION["order-list"][$index]['activeOrder'] = true;
        $_SESSION["order-list"][$index]['nextStatus'] = '處理中';
        $progress['status'] = 'secondary';
        $progress['text'] = '未確認';
        $progress['num'] = '10';
        break;
    case 2:
        $_SESSION["order-list"][$index]['status_css'] = [
            "bg" => 'bg-warning',
            "text" => 'text-warning',
            "offCanvas" => 'warning',
            "nextStatus" => '已結單'
        ];
        $_SESSION["order-list"][$index]['status_text'] = "處理中";
        $_SESSION["order-list"][$index]['activeOrder'] = true;
        $_SESSION["order-list"][$index]['nextStatus'] = '已結單';
        $progress['status'] = 'warning';
        $progress['text'] = '處理中';
        $progress['num'] = '65';

        break;
    case 3:
        $_SESSION["order-list"][$index]['status_css'] = [
            "bg" => 'bg-success',
            "text" => 'text-success'
        ];
        $_SESSION["order-list"][$index]['status_text'] = "已結單";
        $_SESSION["order-list"][$index]['activeOrder'] = false;
        $progress['status'] = 'success';
        $progress['text'] = '已結單';
        $progress['num'] = '100';
        break;
}


$data = [
    "data" => [
        "order_item" => $_SESSION["order-list"][$index],
        "order_detail" => $rows,
        "progressLog" => [
            'newItem' => (!$resultProgress_count>0),
            'log' => $rowsProgress,
            'progress' => $progress
        ]
    ]
];

echo json_encode($data);
?>
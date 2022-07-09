<?php
require('../db-connect.php');
session_start();

$order_id = $_POST['order_id'];
$index = $_POST['index'];

$sql = "SELECT * FROM order_product_detail WHERE order_id = $order_id";
$result = $conn->query($sql);
$result_count = $result->num_rows;
$rows = ($result_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';

$sqlProduct = "SELECT id, name, price, main_photo FROM product";
$resultProduct = $conn->query($sqlProduct);
$resultProduct_count = $resultProduct->num_rows;
$rowsProduct = ($resultProduct_count>0)? $resultProduct->fetch_all(MYSQLI_ASSOC):'';
$productName = array_column($rowsProduct, 'name', 'id');
$productPrice = array_column($rowsProduct, 'price', 'id');
$productImg =  array_column($rowsProduct, 'main_photo', 'id');

for($i=0; $i<count($rows); $i++){
    $rows[$i]['productName'] = $productName[$rows[$i]['product_id']];
    $rows[$i]['productPrice'] = $productPrice[$rows[$i]['product_id']];
    $rows[$i]['productImg'] = $productImg[$rows[$i]['product_id']];
};


$data = [
    "data" => [
        "order_item" => $_SESSION["order-list"][$index],
        "order_detail" => $rows
    ]
];

echo json_encode($data);
?>
<?php
session_start();

if(!isset($_SESSION["cart"])){
    echo "購物車不可為空";
    exit;
}

require('../db-connect.php');
$user_id = 1;
$now = date('Y-m-d H:i:s');

$sql = "INSERT INTO user_order_product(user_id, order_time) VALUES ('$user_id', '$now')";

if($conn->query($sql)===TRUE){
    $order_id = $conn->insert_id;
    foreach($_SESSION['cart'] as $item){
        $product_id = key($item);
        $amount = current($item);
        $sqlDetail = "INSERT INTO user_order_product_detail (order_id, product_id, amount) VALUES ('$order_id', '$product_id', '$amount')" ;
        if(!$conn->query($sqlDetail)===TRUE){
            echo "Error：" . $sqlDetail . "<br>" . $conn->error;
        }
        unset($_SESSION["cart"]);
    }    
}else{
    echo "Error：" . $sql . "<br>" . $conn->error;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>結帳</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container py-4">
        <h1 class="text-center">訂單成立</h1>
        <div class="py-4 text-center">
            <a href="products.php" class="btn btn-info text-white">回到產品列表</a>
        </div>
    </div>
</body>

</html>
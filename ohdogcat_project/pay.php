<?php
require('./test-account_setting.php');
session_start();

if(!isset($_SESSION["pay"])){
    echo "結帳失敗，沒有商品";
    exit;
}else{
    $pay = $_SESSION["pay"];
}


// echo ($_SESSION["cart"][$pay['target']]);
// var_dump($_SESSION["cart"][$pay['target']]);

$totalPrice = $_SESSION['total_price'];

require('./db-connect.php');
$user_id = $test_user;
$now = date('Y-m-d H:i:s');
$order_no = 'ODC'.date('YzHis').'00'.$user_id;
$store_id = $pay['store']['0'];

$sql = "INSERT INTO order_product(user_id, store_id, order_no, total, order_time, status) VALUES ('$user_id', '$store_id', '$order_no', '$totalPrice', '$now', 1)";

if($conn->query($sql)===TRUE){
    var_dump($sql);
    $order_id = $conn->insert_id; //抓出剛剛 insert 進去的資料的 id
    for($i=0; $i<count($pay['product']); $i++){
        $product_id = $pay['product'][$i]; // 將單一品項的 id 抓出來
        $amount = $pay['amount'][$i]; // 將單一品項的數量抓出來
        $sqlDetail = "INSERT INTO order_product_detail (order_id, product_id, amount) VALUES ('$order_id', '$product_id', '$amount')" ;
        if(!$conn->query($sqlDetail)===TRUE){
            echo "Error：" . $sqlDetail . "<br>" . $conn->error;
        }
    }
    unset($_SESSION["pay"]);
    unset($_SESSION['total_price']);
    unset($_SESSION["cart"][$pay['target']]);
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
<?php
require("./db-connect.php");
session_start();
if(isset($_GET['id']) && !empty($_GET['id'])){
    $store_id = $_GET['id'];
};

$cart = [];

for($i =0; $i<count($_SESSION["cart"]); $i++){
    if(in_array($store_id, $_SESSION["cart"][$i]['store'])){
        $cart = $_SESSION["cart"][$i];
        $cart['target'] = $i;
    }
}




$sql = "SELECT id, name, price, main_photo FROM product";

$result = $conn->query($sql);
$product_count = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);
$productName = array_column($rows, 'name', 'id');
$productPrice = array_column($rows, 'price', 'id');
$productImg = array_column($rows, 'main_photo', 'id');

$totalPrice = 0; 
if(!empty($cart)){
    for($i=0; $i<count($cart['product']); $i++){
        $totalPrice += ($productPrice[$cart['product'][$i]]*$cart['amount'][$i]);
    }
}

$_SESSION["total_price"] = $totalPrice;
$_SESSION["pay"] = $cart;

?>
<!doctype html>
<html lang="en">

<head>
    <title>購物車細項</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="py-2 text-end">
            <a href="products.php" class="btn btn-info text-white">繼續購物</a>
        </div>

        <?php if(!isset($_SESSION["cart"])):?>
        購物車為空
        <?php else:?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>封面照片</th>
                    <th>產品名稱</th>
                    <th>單價</th>
                    <th>數量</th>
                    <th>小計</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<count($cart['product']); $i++):?>
                <tr>
                    <td><img src="./images/<?= $productImg[$cart['image'][$i]]?>" class="w-100" style="max-width: 150px;" alt=""></td>
                    <td><?= $productName[$cart['product'][$i]]?></td>
                    <td><?= $productPrice[$cart['product'][$i]]?></td>
                    <td><?= $cart['amount'][$i]?></td>
                    <td><?= ($productPrice[$cart['product'][$i]]*$cart['amount'][$i])?></td>
                </tr>
                <?php endfor;?>
                <tr>
                    <td colspan="5" class="text-end">購物車總計： <?= $totalPrice?> 元</td>
                </tr>
            </tbody>
        </table>
        <div class="py-2 text-end">
            <a href="pay.php" class="btn btn-info text-white">結帳</a>
        </div>
        <?php endif;?>
    </div>
</body>

</html>
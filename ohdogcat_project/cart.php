<?php
require("../db-connect.php");

session_start();

$sql = "SELECT product.* FROM product";

$result = $conn->query($sql);
$product_count = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);
$productName = array_column($rows, 'name', 'id');
$productPrice = array_column($rows, 'price', 'id');

$totalPrice = 0; 
if(isset($_SESSION["cart"])){
    for($i=0; $i<count($_SESSION["cart"]); $i++){
        $totalPrice += ($productPrice[key($_SESSION["cart"][$i])]*current($_SESSION["cart"][$i]));
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
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
                    <th>產品名稱</th>
                    <th>單價</th>
                    <th>數量</th>
                    <th>小計</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION["cart"] as $item):?>
                <tr>
                    <td><?= $productName[key($item)]?></td>
                    <td><?= $productPrice[key($item)]?></td>
                    <td class="text-end"><?= current($item)?></td>
                    <td class="text-end"><?= ($productPrice[key($item)]*current($item))?></td>
                </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="4" class="text-end">購物車總計： <?= $totalPrice?> 元</td>
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
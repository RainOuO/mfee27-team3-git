<?php


if (isset($_GET["type"]) && !empty($_GET["type"])) {
    $type = $_GET["type"];
    $sqlTYPE = "AND product_type = $type";
} else {
    $type = "";
    $sqlTYPE = "";
}

require("./db-connect.php");

$minPrice = isset($_GET["minPrice"]) ? $_GET["minPrice"] : 0;
$maxPrice = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : 9999;
// $maxPrice = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : ;

$sql = "SELECT * FROM product WHERE price>= $minPrice and price <= $maxPrice $sqlTYPE"; //選取資料表
// $sql = "SELECT product.*, catagory.name AS catagory_name FROM product
// JOIN catagory ON product.catagory_id = catagory.id WHERE product.price >= $minPrice and price <= $maxPrice ";
$result = $conn->query($sql); //連線
$product_count = $result->num_rows; //取得資料筆數 
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);

?>
<!-- <body>
    <table class="table table-sm">
        <thead>
            <tr>
                <th class="align-middle text-center">商家ID</th>
                <th class="align-middle text-center">商品no.</th>
                <th class="align-middle">商品分類</th>
                <th>商品名稱</th>
                <th>商品描述</th>
                <th>優惠方案</th>
                <th class="align-middle text-end">單價</th>
                <th class="align-middle text-center">上架區間</th>
                <th class="align-middle text-center">庫存</th>
                <th class="align-middle text-center">啟用</th>
                <th class="align-middle text-center">編修</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row):?>
                <tr>
                    <td class="align-middle text-center"><?= $row["store_id"] ?></td>
                    <td class="align-middle text-center"><?= $row["id"] ?></td>
                    <td class="align-middle text"><?= $row["product_category"] ?></td>
                    <td class="align-middle"><?= $row["name"] ?></td>
                    <td class="align-middle col-2"><?= $row["description"] ?></td>
                    <td>站內年中慶 全站三件打85折</td>
                    <td class="align-middle text-end"><?= $row["price"] ?></td>
                    <td class="align-middle text-center"><?= $row["valid_time_start"] ?>~<br><?= $row["valid_time_end"] ?></td>
                    <td class="align-middle text-center"><?= $row["stock_quantity"] ?></td>
                    <td class="align-middle text-center"><?= $row["valid"] ?></td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body> -->
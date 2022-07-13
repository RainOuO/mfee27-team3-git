<?php
if (!isset($_GET["id"])) {
    echo "沒有參數";
    // exit;
}
$id = $_GET["id"];
$couponId = "AND coupon_id = $id";
var_dump($_GET["id"]);
require("../db-connect.php");
$sql = "SELECT * FROM discount_store WHERE id=$id AND valid=1";
$result = $conn->query($sql);
$userCount = $result->num_rows;

$sqlProduct = "SELECT * FROM product WHERE valid=1 $couponId";
$resultProduct = $conn->query($sqlProduct);
$productCount = $resultProduct->num_rows;
var_dump($productCount);
?>



<!doctype html>
<html lang="en">

<head>
    <title>Discount</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <?php if ($userCount > 0) :
            $row = $result->fetch_assoc(); ?>
            <div class="py-2">
                <a href="ST-store-discounts.php?id=<?= $row["id"] ?>" class="btn btn-info">取消</a>
            </div>

            <table class="table">
                <tr>
                    <th>優惠No.</th>
                    <td><?= $row["id"] ?></td>
                </tr>
                <tr>
                    <th>優惠活動名稱</th>
                    <td><?= $row["name"] ?></td>
                </tr>
                <tr>
                    <th>優惠活動簡述</th>
                    <td><?= $row["description"] ?></td>
                </tr>
                <tr>
                    <th>折扣數字</th>
                    <td><?= $row["discount_number"] ?></td>
                </tr>
                <tr>
                    <th>啟用日期</th>
                    <td><?= $row["start_time"] ?></td>
                </tr>
                <tr>
                    <th>失效日期</th>
                    <td><?= $row["end_time"] ?></td>
                </tr>
                <th>狀態</th>
                <td><?php
                    if ($row["buyer_valid"] == 2) {
                        echo "未生效/已過期";
                    } else {
                        echo "有效";
                    } ?>
                </td>
            </table>
            <div class="py-2">
                <div class="d-flex justify-content-between">
                    <a class="btn btn-info" href="ST-discount-edit.php?id=<?= $row["id"] ?>">修改</a>
                    <a href="ST-do-delete.php?id=<?= $row["id"] ?>" class="btn btn-danger">刪除</a>
                </div>
            </div>
        <?php else : ?>
            沒有該使用者
        <?php endif; ?>
        <div class="table-responsive">
                            <?php if ($productCount > 0) : ?>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <!-- <th class="align-middle text-center">商家ID</th> -->
                                            <th class="align-middle text-center">商品No.</th>
                                            <th class="align-middle">商品分類</th>
                                            <th>商品名稱</th>
                                            <th>商品簡述</th>
                                            <th>優惠方案</th>
                                            <th class="align-middle text-end">單價</th>
                                            <th class="align-middle text-center">上架區間</th>
                                            <th class="align-middle text-center">庫存</th>
                                            <!-- <th class="align-middle text-center">啟用</th> -->
                                            <th class="align-middle text-center">編修</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //把資料轉換成關聯式陣列
                                        while ($row = $resultProduct->fetch_assoc()) : //從資料庫一次抽取單筆資料 用while迴圈顯示
                                        ?>
                                            <tr>
                                                <!-- <td class="align-middle text-center"><?= $row["store_id"] ?></td> -->
                                                <td class="align-middle text-center"><?= $row["id"] ?></td>
                                                <td class="align-middle text"><?= $row["product_category"] ?></td>
                                                <td class="align-middle col-2"><?= $row["name"] ?></td>
                                                <td class="align-middle col-2"><?= $row["intro"] ?></td>
                                                <td class="align-middle"><?= $row["coupon_id"] ?></td>
                                                <td class="align-middle text-end"><?= $row["price"] ?></td>
                                                <td class="align-middle text-center">
                                                    <?= date("Y-m-d ", strtotime($row["valid_time_start"])) ?><br>
                                                    <?= date("Y-m-d ", strtotime($row["valid_time_end"])) ?></td>
                                                <td class="align-middle text-center"><?= $row["stock_quantity"] ?></td>
                                                <!-- <td class="align-middle text-center"><?= $row["valid"] ?></td> -->
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn detailBtn" onclick="window.location.href='productDetail.php?store_id=<?= $storeID ?>&id=<?= $row['id'] ?>'">查看</button>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                
                                <!-- <div class="d-flex justify-content-center pt-3">
                                    <nav aria-label="Page navigation example ">
                                        <ul class="pagination">
                                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                                <a class="pageBtn <?php if ($i == $page) echo "active"; ?> " href="allProductList.php?type=<?= $type ?>&page=<?= $i ?>&order=<?= $ordertype ?>"><?= $i ?></a>
                                            <?php endfor; ?>
                                        </ul>
                                    </nav>
                                </div> -->
                            <?php else : ?>
                                沒有套用此優惠活動的商品
                            <?php endif; ?>
                        </div>
    </div>
</body>

</html>
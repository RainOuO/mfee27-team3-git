<div class="table-responsive">
    <?php if ($product_count > 0) : ?>
    <table class="table table-sm table-hover">
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
                                        while ($row = $result->fetch_assoc()) :
                                            // var_dump($row); //從資料庫一次抽取單筆資料 用while迴圈顯示
                                        ?>
            <tr>
                <!-- <td class="align-middle text-center"><?= $row["store_id"] ?></td> -->
                <td class="align-middle text-center"><?= $row["id"] ?></td>
                <td class="align-middle text"><?= $row["category_name"] ?></td>
                <td class="align-middle col-2"><?= $row["name"] ?></td>
                <td class="align-middle col-2"><?= $row["intro"] ?></td>
                <td class="align-middle"><?= $row["coupon_name"] ?></td>
                <td class="align-middle text-end"><?= $row["price"] ?></td>
                <td class="align-middle text-center">
                    <?= date("Y-m-d ", strtotime($row["valid_time_start"])) ?><br>
                    <?= date("Y-m-d ", strtotime($row["valid_time_end"])) ?></td>
                <td class="align-middle text-center"><?= $row["stock_quantity"] ?></td>
                <!-- <td class="align-middle text-center"><?= $row["valid"] ?></td> -->
                <td class="align-middle text-center">
                    <button type="button" class="btn lightblueBtn"
                        onclick="window.location.href='../product-detail/?store_id=<?= $storeID ?>&type=<?= $row['product_type'] ?>&id=<?= $row['id'] ?>'">查看</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center pt-3">
        <nav aria-label="Page navigation example ">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                <a class="darkblueBtn <?php ($i == $page) ? "active" : "" ?> "
                    href="../products/?= $type ?>&page=<?= $i ?>&order=<?= $ordertype ?>"><?= $i ?></a>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <?php else : ?>
    目前沒有資料
    <?php endif; ?>
</div>
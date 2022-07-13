<div class="container">
    <div class="py-2">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn lightblueBtn mx-1">
                <a class="bBtn btn-info" href="ST-store-discounts.php?id=<?=$id?>">取消變更</a>
            </button>
            <button type="button" class="btn lightblueBtn mx-1">
                <a class="bBtn" href="../store-discount-edit/?id=<?= $id ?>">前往修改</a>
            </button>
            <a href="ST-do-delete.php?id=<?= $id  ?>" class="mx-1 btn btn-danger py-2">刪除</a>
        </div>
    </div>

    <?php if ($userCount > 0) :
                                $row = $result->fetch_assoc(); ?>


    <table class="table table-hover">
        <tr>
            <th>優惠編號</th>
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

    <p style="text-align:center; " class="mb-4 fs-5 mt-5"><span class="detail"> 使用此優惠活動的商品</span><br></p>
    <?php else : ?>
    沒有該使用者
    <?php endif; ?>
    <div class="table-responsive ">
        <?php if ($productCount > 0) : ?>
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
                        <button type="button" class="btn lightblueBtn"
                            onclick="window.location.href='productDetail.php?store_id=<?= $storeID ?>&id=<?= $row['id'] ?>'">查看</button>
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
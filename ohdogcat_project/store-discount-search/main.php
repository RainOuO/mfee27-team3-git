<div class="container">
    <div class="row d-flex justify-content-between btn-group align-items-center">
        <div class="col-4 row d-flex">
            <form class=" col-8 d-flex" action="../store-discount-search/" method="get">
                <input type="text" class="form-control col-3 me-2" name="search" placeholder="輸入關鍵字">
                <input type="hidden" name="type" value="<?= $type ?>">
                <button class="btn yellowBtn col-3 " type="submit">搜尋</button>
            </form>
        </div>
        <div class="col-2 countBox d-flex justify-content-end ">
            <button class="btn lightblueBtn d-flex justify-content-end me-4 "
                onclick="window.location.href='../store-discounts/'">回到優惠券列表</button>

        </div>
    </div>
    <div class="py-2">
        <h2><?= $search ?>的搜尋結果</h2>
        <div class="py-2">共 <?= $userCount ?> 筆資料</div>
    </div>
    <?php if ($userCount > 0) : ?>
    <table class="table table-sm">
        <thead>
            <tr>
                <td class="align-middle text-center">優惠編號</td>
                <td class="align-middle text-center">優惠名稱</td>
                <td class="align-middle text-center">優惠敘述</td>
                <td class="align-middle text-center">折扣數字</td>
                <td class="align-middle text-center">啟用日期</td>
                <td class="align-middle text-center">失效日期</td>
                <td class="align-middle text-center">狀態</td>
                <td class="align-middle text-center">編修</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td class="align-middle text-center"><?php echo $row["id"] ?></td>
                <td class="align-middle text-center col-2"><?php echo $row["name"] ?></td>
                <td class="align-middle text-center col-2"><?php echo $row["description"] ?></td>
                <td class="align-middle text-center"><?php echo $row["discount_number"] ?></td>
                <td class="align-middle text-center"><?php echo $row["start_time"] ?></td>
                <td class="align-middle text-center"><?php echo $row["end_time"] ?></td>

                <td class="align-middle text-center"><?php
                                                              if ($row["buyer_valid"] == 2) {
                                                                echo "無效<br>";
                                                              } else {
                                                                echo "有效<br>";
                                                              } ?>
                </td>
                <td class="align-middle text-center">
                    <button type="button" class="btn detailBtn lightblueBtn">
                        <a class="detail" href="../store-discount-detail/?id=<?= $row["id"] ?>">查看</a>
                    </button>
                </td>
                <!-- <td class="align-middle text-center">
              <button type="button" class="btn detailBtn" href="discount.php?id=<?= $row["id"] ?>">查看
            </td> -->
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else : ?>
    沒有符合的結果
    <?php endif; ?>

</div>
<div class="container">
    <div class="row d-flex justify-content-between btn-group align-items-center">
        <div class="col-4 row d-flex">
            <form class=" col-8 d-flex" action="../discount-search/" method="get">
                <input type="text" class="form-control col-3  mt-2 ms-4" name="search" placeholder="輸入關鍵字">
                <input type="hidden" name="type" value="<?= $type ?>">
                <button class="btn yellowBtn col-3 mx-2 mt-2" type="submit">搜尋</button>
            </form>
        </div>
        <div class="col-2 countBox d-flex justify-content-end">
            <button class="btn lightblueBtn d-flex justify-content-end me-4  mt-2"
                onclick="window.location.href='../discounts'">回到優惠券列表</button>

        </div>
    </div>
    <div class="py-2 ms-4">
        <h2><?= $search ?>的搜尋結果</h2>
        <div class="py-2">共 <?= $userCount ?> 筆資料</div>
    </div>
    <?php if ($userCount > 0) : ?>
    <table class="table table-sm  table-hover">
        <thead>
            <tr>
                <td class="align-middle text-center">優惠券編號</td>
                <td class="align-middle text-center">優惠券名稱</td>
                <td class="align-middle text-center">優惠券簡述</td>
                <td class="align-middle text-center">庫存</td>
                <td class="align-middle text-center">折扣數字</td>
                <td class="align-middle text-center">優惠序號</td>
                <td class="align-middle text-center">啟用日期</td>
                <td class="align-middle text-center">失效日期</td>
                <td class="align-middle text-center">編修</td>
            </tr>
        </thead>
        <tbody>
            <?php
                                        //把資料轉換成關聯式陣列
                                        while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td class="align-middle text-center"><?php echo $row["id"] ?></td>
                <td class="align-middle text-center"><?php echo $row["name"] ?></td>
                <td class="align-middle text-center"><?php echo $row["description"] ?></td>
                <td class="align-middle text-center"><?php echo $row["amount"]."張" ?></td>
                <td class="align-middle text-center"><?php echo $row["discount_number"] ?></td>
                <td class="align-middle text-center"><?php echo $row["discount_code"] ?></td>
                <td class="align-middle text-center"><?php echo $row["start_time"] ?></td>
                <td class="align-middle text-center"><?php echo $row["end_time"] ?></td>
                <td class="align-middle text-center"><a class="btn lightblueBtn aBtn"
                        href="../discounts/?id=<?= $row["id"] ?>">查看</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        <?php else : ?>
        沒有符合的結果
        <?php endif; ?>
</div>
</div>
<div class="row d-flex justify-content-between btn-group align-items-center w-100">
    <!-- category選擇 -->
    <div class="col-6 my-3 ms-4">
        <a class="btn catBtn  <?php
                                        if ($category == "") echo "active";
                                        ?>" aria-current="page"
            href="../discounts/?ordertype=<?= $ordertype ?>">全部種類</a>

        <a class="btn catBtn  <?php
                                        if ($_GET['category'] == "1") echo "active";
                                        ?>" aria-current="page"
            href="../discounts/?ordertype=<?= $ordertype ?>&valid=<?= $valid ?>&category=1">%數折價券</a>
        <a class="btn catBtn  <?php
                                        if ($_GET['category'] == "2") echo "active";
                                        ?>" aria-current="page"
            href="../discounts/?ordertype=<?= $ordertype ?>&valid=<?= $valid ?>&category=2">現金折價券</a>
    </div>
    <!-- 新增優惠券 -->
    <div class="col-2 countBox d-flex justify-content-end">
        <button class="btn filterBtn d-flex justify-content-end me-3"
            onclick="window.location.href='../discount-create/'">新增優惠券 </button>
    </div>
    <!-- end新增優惠券 -->
</div>

<?php if ($pageUserCount > 0) : ?>
<table class="table table-sm  table-hover">
    <thead>
        <tr>
            <td class="align-middle text-center">優惠券編號</td>
            <td class="align-middle text-center">優惠券分類</td>
            <td class="align-middle text-center">優惠券名稱</td>
            <td class="align-middle text-center">優惠券簡述</td>
            <td class="align-middle text-center">折扣數字</td>
            <td class="align-middle text-center">優惠序號</td>
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
            <td class="align-middle text-center">
                <?php
                          if ($row["category_id"] == 1) {
                            echo "%數折扣券";
                          } elseif ($row["category_id"] == 2) {
                            echo "現金折扣券";
                          } else {
                            echo "商家優惠活動";
                          }
                          ?></td>
            <td class="align-middle text-center col-2"><?php echo $row["name"] ?></td>
            <td class="align-middle text-center col-2"><?php echo $row["description"] ?></td>
            <td class="align-middle text-center"><?php echo $row["discount_number"] ?></td>
            <td class="align-middle text-center"><?php echo $row["discount_code"] ?></td>
            <td class="align-middle text-center"><?php echo $row["start_time"] ?></td>
            <td class="align-middle text-center"><?php echo $row["end_time"] ?></td>

            <td class="align-middle text-center"><?php
                                                              if ($row["buyer_valid"] == 2) {
                                                                echo "無效/失效<br>";
                                                              } else {
                                                                echo "有效<br>";
                                                              } ?>
            </td>
            <td class="align-middle text-center">
                <button type="button" class="btn detailBtn">
                    <a class="detail aBtn" href="../discount-detail?id=<?= $row["id"] ?>">查看</a>

                </button>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<div class="d-flex justify-content-center pt-3">
    <nav aria-label="Page navigation example ">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
            <a class="pageBtn <?php if ($i == $page) echo "active"; ?> "
                href="../discounts/?page=<?= $i ?>&ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>"><?= $i ?></a>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<?php else : ?>
目前沒有資料
<?php endif; ?>
</div>
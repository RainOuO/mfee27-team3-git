<div class="overflow-hidden">
    <div class="row d-flex justify-content-end btn-group align-items-center w-100">
        <!-- 全部有效失效 -->
        <!-- end 全部有效失效 -->
        <!-- 新增優惠券 -->
        <div class="me-4 col-2 countBox d-flex justify-content-end">
            <button class="btn filterBtn" onclick="window.location.href='../store-discount-create/'">新增優惠</button>
        </div>
        <!-- end新增優惠券 -->

        <!-- <div class="d-flex justify-content-end align-items-center col-6">
                  <a href="ST-discount-create.php" class="btn yellowBtn">新增優惠活動</a>
                </div> -->
    </div>

    <?php if ($pageUserCount > 0) : ?>
    <table class="table table-sm table-hover">
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
                <td class="align-middle text-center "><?php echo $row["id"] ?></td>
                <td class="align-middle text-center col-2"><?php echo $row["name"] ?></td>
                <td class="align-middle text-center "><?php echo $row["description"] ?></td>
                <td class="align-middle text-center "><?php echo $row["discount_number"] ?></td>
                <td class="align-middle text-center col-2"><?php echo $row["start_time"] ?></td>
                <td class="align-middle text-center col-2"><?php echo $row["end_time"] ?></td>
                <td class="align-middle text-center "><?php
                                                              if ($row["buyer_valid"] == 2) {
                                                                echo "無效/失效<br>";
                                                              } else {
                                                                echo "有效<br>";
                                                              } ?>
                </td>
                <td class="align-middle text-center"><a class="btn aBtn lightblueBtn"
                        href="../store-discount-detail/?id=<?= $row["id"] ?>">查看</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>



    <?php else : ?>
    目前沒有資料
    <?php endif; ?>
    <div class="d-flex justify-content-center pt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                <a class="pageBtn
    <?php if ($page == $i) echo "active"; ?>"
                    href="../store-discounts/?page=<?= $i ?>&ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>"><?= $i ?></a>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>
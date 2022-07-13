<div class="overflow-hidden">
    <!-- search -->
    <div class="row d-flex justify-content-between btn-group align-items-center">
        <form action="../store-discount-search/" method="get" class="col-6 ">
            <div class="col-4 d-flex keywordBar ms-4">
                <input type="text" class="form-control col-8 mt-2 me-3" name="search" placeholder="輸入關鍵字">
                <input class="col-2 mt-2" type="hidden" name="type" value="<?= $type ?>" />
                <button class="btn yellowBtn col-3 mt-2" type="submit">搜尋</button>
            </div>
        </form>
        <!-- end search -->

        <!-- 下拉式排序start -->
        <div class="col-2 dropdown-left d-flex me-4 justify-content-end align-item-flex-end  mt-3">
            <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownCenterBtn"
                data-bs-toggle="dropdown" aria-expanded="false">
                <?= (!isset($_GET['sort']) || empty($_GET['sort'])) ? '優惠券排序' : (($order == 'DESC') ? ($sort_text . "↑") : ($sort_text . "↓")) ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
                <li>
                    <a class="col-2 orderBtn"
                        href="../store-discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=1"
                        class="orderBtn <?php if ($order == 1) echo "active" ?>" name="id ASC">編號排序↓</a>
                </li>
                <li>
                    <a class="col-2 orderBtn"
                        href="../store-discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=2"
                        class="orderBtn <?php if ($order == 2) echo "active" ?>" name="id DESC">編號排序↑</a>
                </li>
                <li>
                    <a class="col-2 orderBtn"
                        href="../store-discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=3"
                        class="orderBtn <?php if ($order == 3) echo "active" ?>" name="discount_number ASC">折扣價格↓</a>
                </li>
                <li>
                    <a class="col-2 orderBtn"
                        href="../store-discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=4"
                        class="orderBtn <?php if ($order == 4) echo "active" ?>" name="discount_number DESC">折扣價格↑</a>
                </li>
            </ul>
            <!-- 下拉式排序end -->
        </div>
    </div>

    <div class="row d-flex justify-content-between btn-group align-items-center">
        <!-- 全部有效失效 -->
        <div class="col-6 my-3 ms-4">
            <ul class="nav nav-pills ">
                <li class="nav-item">
                    <a class="btn darkblueBtn <?php
                                                if ($valid == "") echo "active";
                                                ?>" aria-current="page"
                        href="../store-discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>">所有狀態</a>
                </li>
                <li class="nav-item">
                    <a class="btn darkblueBtn  <?php
                                                  if ($_GET['valid'] == "1") echo "active";
                                                  ?>" aria-current="page"
                        href="../store-discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=1">有效</a>
                </li>
                <li class="nav-item">
                    <a class="btn darkblueBtn  <?php
                                                  if ($_GET['valid'] == "2") echo "active";
                                                  ?>" aria-current="page"
                        href="../store-discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=2">失效</a>
                </li>
            </ul>
        </div>
        <!-- end 全部有效失效 -->
        <!-- 新增優惠券 -->
        <div class="col-4 me-4  countBox d-flex justify-content-end">
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
                                                                echo "失效<br>";
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
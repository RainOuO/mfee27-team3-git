<hr class="m-0">

<div class="d-flex justify-content-between align-items-center my-3 py-3">

    <form action="../discount-search/" method="get" class="col-6">
        <div class="col-4 d-flex keywordBar ms-4">
            <input type="text" class="form-control col-8 mt-2" name="search" placeholder="輸入關鍵字">
            <input class="col-2" type="hidden" name="type" value="<?= $type ?>" />
            <button class="btn mx-2 filterBtn col-4 mt-2" type="submit">搜尋</button>
        </div>
    </form>
    <!-- end search -->

    <!-- 排序 -->
    <div class=" d-flex justify-content-end btn-group align-items-center mt-3 col-6">
        <div class="row d-flex justify-content-end align-items-end flex-shrink-1 w-100">
            <div class="d-flex  justify-content-end align-items-center col-6">

                <!-- 第幾頁 -->
                <?php if ($pageUserCount > 0) : ?>
                <h6>
                    共<?= $pageUserCount ?>筆優惠券資料，此頁顯示第<?= $starItem ?>筆~第<?= $endItem ?>筆</h6>
                <?php endif; ?>
            </div>
            <!-- 排序 -->
            <div class="col-2 dropdown-left d-flex me-4">
                <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownCenterBtn"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <?= (!isset($_GET['sort']) || empty($_GET['sort'])) ? '優惠券排序' : (($order == 'DESC') ? ($sort_text . "↑") : ($sort_text . "↓")) ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
                    <li>
                        <a class="col-2 orderBtn"
                            href="../discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=1"
                            class="orderBtn <?php if ($order == 1) echo "active" ?>" name="id ASC">編號排序↓</a>
                    </li>
                    <li>
                        <a class="col-2 orderBtn"
                            href="../discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=2"
                            class="orderBtn <?php if ($order == 2) echo "active" ?>" name="id DESC">編號排序↑</a>
                    </li>
                    <li>
                        <a class="col-2 orderBtn"
                            href="../discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=3"
                            class="orderBtn <?php if ($order == 3) echo "active" ?>"
                            name="discount_number ASC">折扣價格↓</a>
                    </li>
                    <li>
                        <a class="col-2 orderBtn"
                            href="../discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=4"
                            class="orderBtn <?php if ($order == 4) echo "active" ?>"
                            name="discount_number DESC">折扣價格↑</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
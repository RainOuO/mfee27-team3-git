<hr class="m-0">

<div class="d-flex justify-content-between align-items-center my-3 py-3">
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
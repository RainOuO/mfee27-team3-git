<hr class="m-0">
<div class="d-flex justify-content-between align-items-center my-3 py-3">
    <div class="d-flex justify-content-start col-6">
        <div class="dropdown mt-3 d-flex align-items-center ">
            <button class="btn dropdown-toggle btn-lg m-2 filterBtn" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                篩選條件
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" id="keyFilter">關鍵字查詢</a></li>
                <li><a class="dropdown-item" id="dateFilter">上架區間查詢</a></li>
                <li><a class="dropdown-item" id="priceFilter">價格區間查詢</a></li>
            </ul>
        </div>
        <div class="filters ms-2">
            <div id="searchbykey" style="display:none">
                <form action="../products/" method="get">
                    <div class="col-10 d-flex mt-4 keywordBar ">
                        <input type="text" class="col-9 form-control " name="keyword" placeholder="輸入關鍵字">
                        <input type="hidden" name="type" value="<?= $type ?>" />
                        <button class="col-3 btn mx-2 filterBtn" type="submit">搜尋</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="filters ms-2">
            <div id="searchbydate" style="display:none">
                <form action="../products/" method="get">
                    <div class="col-10 d-flex mt-4">
                        <div class="col-5 mx-1">
                            <div class="dateF">上架日</div>
                            <input type="date" class="form-control dateS" name="startDate" required>
                        </div>
                        <div class="col-auto mx-1 mt-3">
                            <div class="">~</div>
                        </div>
                        <div class="col-5 mx-1">
                            <div class="dateF">下架日</div>
                            <input type="date" class="form-control dateS" name="endDate" required>
                        </div>
                        <input type="hidden" name="type" value="<?= $type ?>" />
                        <button class=" col-auto btn mx-1 filterBtn" type="submit">搜尋</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="filters ms-2">
            <div id="searchbyprice" style="display:none">
                <form action="../products/" method="get">
                    <div class="col-9 d-flex mt-4 priceBar">
                        <input type="number" class="form-control mx-1" placeholder="價格min" name="minPrice" value=""
                            required>


                        <input type="number" class="form-control mx-1" placeholder="~價格max" name="maxPrice" value=""
                            required>
                        <input type="hidden" name="type" value="<?= $type ?>" />
                        <button class="col-auto btn ms-1 filterBtn" type="submit">搜尋</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6 row d-flex justify-content-end btn-group align-items-center mt-3">
        <a class="col-2 orderBtn"
            href="../products/?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=1"
            class="darkblueBtn <?php if ($order == 1) echo "active" ?>" name="priceOrder ASC">單價↑</a>
        <a class="col-2 orderBtn"
            href="../products/?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=2"
            class="darkblueBtn <?php if ($order == 2) echo "active" ?>" name="priceOrder DESC">單價↓</a>
        <a class="col-2 orderBtn"
            href="../products/?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=3"
            class="darkblueBtn <?php if ($order == 3) echo "active" ?>" name="launchOrder ASC">上架時間↑</a>
        <a class="col-2 orderBtn"
            href="../products/?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=4"
            class="darkblueBtn <?php if ($order == 4) echo "active" ?>" name="launchOrder DESC">上架時間↓</a>
    </div>
    
</div>
<div class="d-flex justify-content-end align-items-center">
        <div class="countBox">
            <?php if ($product_count > 0) : ?>
                <h4 class="countBox">
                    現在為第<?= $page ?>頁，商品第<?= $starItem ?>-<?= $endItem ?>筆資料，共<?= $product_count ?>筆商品資料</h4>
            <?php endif; ?>
        </div>
        <button class="btn filterBtn me-1 ms-3 my-3" onclick="window.location.href='../product-create/?store_id=<?= $storeID ?>&type=<?= $type ?>'">新增商品</button>
    </div>

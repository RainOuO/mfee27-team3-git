<hr class="m-0">
<div class="d-flex justify-content-between align-items-center my-3 py-3">
    <div class="d-flex justify-content-start flex-shrink-0">
        <div class="dropdown d-flex align-items-center ">
            <button class="btn dropdown-toggle filterBtn h-100" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                篩選條件
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" id="keyFilter">關鍵字查詢</a></li>
                <li><a class="dropdown-item" id="dateFilter">上架區間查詢</a></li>
                <li><a class="dropdown-item" id="priceFilter">價格區間查詢</a></li>
            </ul>
        </div>
        <div class="filters ms-2" id="searchbykey" style="display:block">
            <div>
                <div class="col-10 d-flex keywordBar ">
                    <input id="keyword" type="text" class="col-9 form-control " name="keyword" placeholder="輸入關鍵字" value="<?=$search?>">
                    <button class="col-3 btn mx-2 filterBtn go-filter" type="button">搜尋</button>
                </div>
            </div>
        </div>
        <div class="filters ms-2" id="searchbydate" style="display:none">
            <div>
                <form action="doFilter.php" method="post">
                    <div class="col-10 d-flex align-items-center">
                        <div class="col-5 mx-1">
                            <input type="date" class="form-control dateS date-range" name="start-date">
                        </div>
                        ~
                        <div class="col-5 mx-1">
                            <input type="date" class="form-control dateS date-range" name="end-date">
                        </div>
                        <button class=" col-auto btn mx-1 filterBtn go-filter" type="button">搜尋</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="filters ms-2" id="searchbyprice" style="display:none">
            <div>
                <form action="doFilter.php" method="post">
                    <div class="col-9 d-flex align-items-center">
                        <input type="number" class="form-control mx-1 price-range" placeholder="價格最小值" name="min-price">
                        ~
                        <input type="number" class="form-control mx-1 price-range" placeholder="價格最大值" name="max-price">
                        <button class="col-auto btn ms-1 filterBtn go-filter" type="button">搜尋</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end btn-group align-items-center flex-shrink-1 w-100 pe-3">
        <a href="?status=<?=$status?>&order=DESC&sort=total&search=<?=$search?>&page=<?=$page?>" class="orderBtn">總價↑</i></a>
        <a href="?status=<?=$status?>&order=ASC&sort=total&search=<?=$search?>&page=<?=$page?>" class="orderBtn">總價↓</i></a>
        <a href="?status=<?=$status?>&order=DESC&sort=order_time&search=<?=$search?>&page=<?=$page?>" class="orderBtn">下單時間↑</i></a>
        <a href="?status=<?=$status?>&order=ASC&sort=order_time&search=<?=$search?>&page=<?=$page?>" class="orderBtn">下單時間↓</i></a>
    </div>
    <div class=" flex-shrink-0 d-flex align-items-center">
        <div class="countBox">
            <h4 class="countBox">共 <?= $resultAllCount ?> 筆資料，此頁顯示第 <?= $startItem ?> 筆 ~ 第 <?= $endItem ?> 筆</h4>
        </div>
    </div>
</div>


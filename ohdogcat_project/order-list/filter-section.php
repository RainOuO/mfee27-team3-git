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
        <div class="filters ms-2" id="searchbykey" style="display:block; width: 360px;">
            <div class="d-flex keywordBar row gx-1">
                <input id="keyword" type="text" class="form-control col me-2" name="keyword" placeholder="輸入關鍵字"
                    value="<?=$search?>">
                <button class="col-2 btn filterBtn go-filter me-2" type="button">搜尋</button>
                <a href="?status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=&page=<?=$page?>" class="col-2 btn filterBtn">清空</a>
            </div>
        </div>
        <div class="filters ms-2" id="searchbydate" style="display:none">
            <div>
                <form action="doFilter.php" method="post">
                    <div class="col-10 d-flex align-items-center">
                        <div class="col-5 mx-1">
                            <input type="date" class="form-control dateS date-range" name="start-date" value="<?=$dateStart?>">
                        </div>
                        ~
                        <div class="col-5 mx-1">
                            <input type="date" class="form-control dateS date-range" name="end-date" value="<?=$dateEnd?>">
                        </div>
                        <button class=" col-auto btn mx-1 filterBtn go-filter" type="button">搜尋</button>
                        <a href="?status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=&dateEnd=&search=<?=$search?>&page=<?=$page?>" class="col-auto btn filterBtn">清空</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="filters ms-2" id="searchbyprice" style="display:none">
            <div>
                <form action="doFilter.php" method="post">
                    <div class="col-9 d-flex align-items-center">
                        <input type="number" class="form-control mx-1 price-range" placeholder="價格最小值" name="min-price" value="<?=$priceMin?>">
                        ~
                        <input type="number" class="form-control mx-1 price-range" placeholder="價格最大值" name="max-price" value="<?=$priceMax?>">
                        <button class="col-auto btn mx-1 filterBtn go-filter" type="button">搜尋</button>
                        <a href="?status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&priceMin=&priceMax=&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page=<?=$page?>" class="col-auto btn filterBtn">清空</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end align-items-center flex-shrink-1 w-100">
        <div class="countBox">
            <h4 class="countBox">共 <?= $resultAllCount ?> 筆資料，此頁顯示第 <?= $startItem ?> 筆 ~ 第 <?= $endItem ?> 筆</h4>
        </div>
    </div>
    <div class="dropdown-left d-flex justify-content-end flex-shrink-0" style="width: 140px;">
        <button class="btn btn-outline-secondary border border-secondary dropdown-toggle" type="button" id="dropdownCenterBtn" data-bs-toggle="dropdown"
            aria-expanded="false">
            <?=(!isset($_GET['sort'])||empty($_GET['sort']))?'訂單排序':(($order == 'DESC')? ($sort_text."↑"):($sort_text."↓"))?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
            <li>
                <a href="?status=<?=$status?>&order=DESC&sort=total&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page=<?=$page?>"
                    class="dropdown-item">總價↑</a>
            </li>
            <li>
                <a href="?status=<?=$status?>&order=ASC&sort=total&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page=<?=$page?>"
                    class="dropdown-item">總價↓</a>
            </li>
            <li>
                <a href="?status=<?=$status?>&order=DESC&sort=order_time&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page=<?=$page?>"
                    class="dropdown-item">下單時間↑</a>
            </li>
            <li>
                <a href="?status=<?=$status?>&order=ASC&sort=order_time&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page=<?=$page?>"
                    class="dropdown-item">下單時間↓</a>
            </li>
        </ul>
    </div>
</div>
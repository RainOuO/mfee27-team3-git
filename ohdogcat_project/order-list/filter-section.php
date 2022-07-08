<hr class="m-0">
<div class="d-flex justify-content-between align-items-center my-3">
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
                <form action="doFilter-keyword.php" method="post">
                    <div class="col-10 d-flex keywordBar ">
                        <input type="text" class="col-9 form-control " name="keyword" placeholder="輸入關鍵字">
                        <button class="col-3 btn mx-2 filterBtn" type="submit">搜尋</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="filters ms-2" id="searchbydate" style="display:none">
            <div>
                <form action="doFilter-date.php" method="post">
                    <div class="col-10 d-flex">
                        <div class="col-5 mx-1">
                            <div class="dateF">上架日</div>
                            <input type="date" class="form-control dateS" name="start-date">
                        </div>
                        <div class="col-auto mx-1 mt-3">
                            <div class="">~</div>
                        </div>
                        <div class="col-5 mx-1">
                            <div class="dateF">下架日</div>
                            <input type="date" class="form-control dateS" name="end-date">
                        </div>
                        <button class=" col-auto btn mx-1 filterBtn " type="submit">搜尋</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="filters ms-2" id="searchbyprice" style="display:none">
            <div>
                <form action="doFilter-price.php" method="post">
                    <div class="col-9 d-flex priceBar">
                        <input type="number" class="form-control mx-1" placeholder="價格最小值~" name="min-price">
                        <input type="number" class="form-control mx-1" placeholder="~價格最大值" name="max-price">
                        <button class="col-auto btn ms-1 filterBtn" type="submit">搜尋</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end btn-group align-items-center flex-shrink-1 w-100 pe-3">
        <a href="" class="orderBtn">單價↑</i></a>
        <a href="" class="orderBtn">單價↓</i></a>
        <a href="" class="orderBtn">上架時間↑</i></a>
        <a href="" class="orderBtn">上架時間↓</i></a>
    </div>
    <div class=" flex-shrink-0 d-flex align-items-center">
        <div class="countBox">
            <h4 class="countBox">以下商品共: 00筆</h4>
        </div>
        <button class="btn filterBtn ms-4">新增商品</button>
    </div>
</div>
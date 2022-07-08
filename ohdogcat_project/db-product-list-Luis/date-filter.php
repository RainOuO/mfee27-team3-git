<form action="filter-date.php" method="get">
    <div class="col-10 d-flex mt-4">
        <div class="col-5 mx-1">
            <div class="dateF">上架日</div>
            <input type="date" class="form-control dateS" name="startdate">
        </div>
        <div class="col-auto mx-1 mt-3">
            <div class="">~</div>
        </div>
        <div class="col-5 mx-1">
            <div class="dateF">下架日</div>
            <input type="date" class="form-control dateS" name="enddate">
        </div>
        <button class=" col-auto btn mx-1 filterBtn" type="submit">搜尋</button>
    </div>
</form>
<form action="./filter-page.php" method="get">
    <div class="col-9 d-flex mt-4 priceBar">
        <input type="number" class="form-control mx-1" placeholder="價格最小值~" name="minPrice" value="<?php $minPrice = isset($_GET["minPrice"]) ? $_GET["minPrice"] : 0;
                                                                                                    echo $minPrice;
                                                                                                    ?>
                                                                                                    ">


        <input type="number" class="form-control mx-1" placeholder="~價格最大值" name="maxPrice" value="<?php $maxPrice = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : 9999;
                                                                                                    echo $maxPrice ?>">
        <button class="col-auto btn ms-1 filterBtn" type="submit">搜尋</button>
    </div>
</form>
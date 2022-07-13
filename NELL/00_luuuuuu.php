<?php
require("./00_doproducts.php");
require("../db-connect.php");

// session_start();


// 判斷帶入的參數
$page = isset($_GET["page"]) ?  $page = $_GET["page"] : 1;
$perPage = 10;
$start = ($page - 1) * $perPage;
// echo $start;
$type = isset($_GET["type"]) && !empty($_GET["type"]) ? $_GET["type"] : "";
$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
$minPrice = isset($_GET["minPrice"]) ? $_GET["minPrice"] : 0;
$maxPrice = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : "";
if (isset($_GET["startDate"]) && isset($_GET["endDate"])) {
    $startDate = $_GET["startDate"];
    $endDate = $_GET["endDate"];
} else {
    $startDate = "";
    $endDate = "";
};



//TO-DO: 未來加入 store_id(從 session 拿) 判斷商家
//$storeID= isset($_GET["store_id"]) ? $_GET["store_id"] : "";
$storeID = "";

$ordertype = isset($_GET["order"]) ? $_GET["order"] : 5;
switch ($ordertype) {
    case 1:
        $ordertype = "price ASC";
        break;
    case 2:
        $ordertype = "price DESC";
        break;
    case 3:
        $ordertype = "valid_time_start ASC";
        break;
    case 4:
        $ordertype = "valid_time_start DESC";
        break;
    case 5:
        $ordertype = "id ASC";
}

//依條件取得商品
$sql = "SELECT * FROM product WHERE valid= 1";
$sql .= $storeID ? " and store_id = $storeID" : "";
$sql .= $type ? " and product_type = $type " : "";
$sql .= $keyword ? " and (name LIKE '%$keyword%' OR intro LIKE '%$keyword%' OR description LIKE '%$keyword%' )" : "";
$sql .= $minPrice ? " and price >= $minPrice" : "";
$sql .= $maxPrice ? " and price <= $maxPrice" : "";

$sql .= $startDate ? " and (valid_time_start <= '$endDate') and (valid_time_end >= '$startDate')" : "";
$sql .= $ordertype ? " ORDER BY $ordertype" : "";

//根據商品筆數，取得頁碼資訊
$product_count = $conn->query($sql)->num_rows;
//開始的筆數
$starItem = ($page - 1) * $perPage + 1;
//結束的筆數
$endItem = $page * $perPage;
if ($endItem > $product_count) {
    $endItem = $product_count;
};

$totalPage = 1;
//商數 取商數後無條件捨去floor
$quotient = floor($product_count / $perPage);
//餘數
$remainder = ($product_count % $perPage);

if ($remainder === 0) {
    $totalPage = $quotient;
} else {
    $totalPage = $quotient + 1;
}


// $sql = "SELECT product.*, catagory.name AS catagory_name FROM product
// JOIN catagory ON product.catagory_id = catagory.id WHERE product.price >= $minPrice and price <= $maxPrice ";

// $rows = $result->fetch_all(MYSQLI_ASSOC);

//新增 SQL 條件: 取得第 N 頁的商品(一頁 10 筆)
$sql .= " LIMIT $start ,10"; //顯示用
//Query SQL
$result = $conn->query($sql);

// $sqlCate=" SELECT product *, production_class* FROM product, production_class WHERE product.production_category = production_class.id AND product_type = $type";

// $resultCate = $conn->query($sqlCate);
// echo $sql;
?>

<!doctype html>
<html lang="en">

<head>
    <title>商品總覽</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/css/custom-bs.css">
    <link rel="stylesheet" href="../template/css/style.css">
    <style>
        * {
            -webkit-user-drag: none;
            font-family: 'Noto Sans TC', sans-serif;
            color: #222934;

        }

        .filterBtn {
            color: #222934;
            background-color: #FFC845;
        }

        .filterBtn:hover {
            color: #222934;
            background-color: #FFC845;
        }

        .filterBtn:active {
            color: #222934;
            background-color: #FFC845;
        }

        .filterBtn:visited {
            color: #222934;
            background-color: #FFC845;
        }

        .filterBtn:focus {
            color: #222934;
            background-color: #FFC845;
        }

        .detailBtn {
            color: #222934;
            background-color: #D5EEEE;
        }

        .detailBtn:hover {
            color: #fff;
            background-color: #49586f;
        }

        .detailBtn:active {
            color: #fff;
            background-color: #49586f;
        }

        .detailBtn:visited {
            color: #fff;
            background-color: #49586f;
        }

        .detailBtn:focus {
            color: #222934;
            background-color: #D5EEEE;
        }


        .catBtn {
            background-color: #D5EEEE;
            color: #222934;
            font-size: 1.25rem;
        }

        .catBtn:hover {
            color: #fff;
            background-color: #49586f;
        }

        .keywordBar,
        .priceBar {
            height: 48px;
        }

        .countBox {
            line-height: 37px;
            height: 37px;
            font-size: 16px;

        }

        .orderBtn {
            border: 2px solid #49586f;
            color: #222934;
            padding: 5px;
            margin-left: 3px;
            border-radius: 3px;
            text-align: center;
        }

        .orderBtn:hover {
            color: #fff;
            background-color: #49586f;
        }

        .pageBtn {
            padding: 10px;
            border: 2px solid #49586f;
            border-radius: 5px;
            color: #222934;
        }

        .pageBtn:active {
            color: #fff;
            background-color: #49586f;
        }

        .pageBtn:hover {
            color: #fff;
            background-color: #49586f;
        }

        .dateF {
            font-size: 0.8rem;
        }

        .dateS {
            height: 30px;
        }
    </style>
</head>

<body>
    <div class="lowest-background w-100 vh-100 d-flex  overflow-hidden">
        <aside id="side-bar" class="side-wrap vh-100 d-flex flex-column">
            <div class="logo-box d-flex justify-content-center align-items-center py-2">
                <a href="" class="fill-w d-block px-4">
                    <img class="img-component dog-body" src="../images/dashboard/logo_dog-body.svg" class="fill-w" alt="">
                    <img class="img-component dog-tail" src="../images/dashboard/logo_dog-tail.svg" class="fill-w" alt="">
                    <img class="img-component dog-text" src="../images/dashboard/logo_dog-text.svg" class="fill-w" alt="">
                </a>
            </div>
            <nav class="menu-box mt-2 overflow-auto flex-shrink-1 h-100">
                <ul class="list-unstyled accordion" id="menu-accordion">
                    <li class="menu-item"><a href="" class="menu-button icon-home no-accordion">首頁</a></li>
                    <li class="menu-item accordion-header">
                        <button href="" class="menu-button icon-products accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">商品管理
                            <div class="status-mark"></div>
                        </button>
                        <div id="collapseProducts" class="accordion-collapse collapse" data-bs-parent="#menu-accordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>

                                        <a href="allProductList.php" class="menu-link">商品總覽</a>
                                    </li>
                                    <li>
                                        <?php foreach ($rowsCate as $row) : ?>
                                            <?php if ($type == $row["type_name"]) ?>
                                            <a href="allProductList.php?type=<?= $row['id'] ?>&page=1" class="menu-link"><?= $row['type_name'] ?></a>
                                        <?php endforeach; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item accordion-header">
                        <button href="" class="menu-button icon-orderlist accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOrderList" aria-expanded="true" aria-controls="collapseOrderList">訂單管理
                            <div class="status-mark"></div>
                        </button>
                        <div id="collapseOrderList" class="accordion-collapse collapse" data-bs-parent="#menu-accordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="" class="menu-link">訂單總覽</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">旅館票券訂單</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">餐廳票券訂單</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">活動票券訂單</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">實體商品訂單</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item accordion-header">
                        <button href="" class="menu-button icon-message accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseMessages" aria-expanded="true" aria-controls="collapseMessages">信件匣
                            <div class="status-mark"></div>
                        </button>
                        <div id="collapseMessages" class="accordion-collapse collapse" data-bs-parent="#menu-accordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="" class="menu-link">所有信件</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">系統信件列表</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">顧客信件列表</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item accordion-header">
                        <button href="" class="menu-button icon-coupon accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCoupon" aria-expanded="true" aria-controls="collapseCoupon">優惠券管理
                            <div class="status-mark"></div>
                        </button>
                        <div id="collapseCoupon" class="accordion-collapse collapse" data-bs-parent="#menu-accordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="" class="menu-link">有效優惠券</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">排程中列表</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">已過期列表</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item"><a href="" class="menu-button icon-setting no-accordion">商家設定</a></li>
                </ul>
            </nav>
            <div class="menu-box mt-2 flex-shrink-0 logout">
                <div class="menu-item"><a href="" class="menu-button no-accordion icon-logout">粗企玩</a></div>
            </div>
        </aside>
        <div class="content-wrap vh-100">
            <div class="container-fluid h-100 py-4 overflow-hidden">
                <div class="d-flex flex-column h-100">
                    <div class="content-header d-flex justify-content-end flex-shrink-0">
                        <a href="" class="d-flex justify-content-end align-items-center">
                            <div class="user-name pe-4">汪汪先輩</div>
                            <div class="user-sticker rounded-3 overflow-hidden"><img src="../images/dashboard/pohto_user-sticker.jpg" class="fill-w" alt=""></div>
                        </a>
                    </div>
                    <hr class="flex-shrink-0">
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100 px-4">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <div class=" pb-2">
                                <?php if (!isset($_GET["type"])) : ?>
                                    <h2>商品總覽</h2>
                                <?php else : ?>
                                    <?php foreach ($rowstitle as $rows) : ?>
                                        <h2> <?= $rows['type_name'] ?></h2>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="d-flex row pb-1 pe-3 justify-content-center">
                            <div class="d-flex justify-content-start col-6">
                                <div class="dropdown mt-3 d-flex align-items-center ">
                                    <button class="btn dropdown-toggle btn-lg m-2 filterBtn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
                                        <form action="allProductList.php" method="get">
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
                                        <form action="allProductList.php" method="get">
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
                                        <form action="allProductList.php" method="get">
                                            <div class="col-9 d-flex mt-4 priceBar">
                                                <input type="number" class="form-control mx-1" placeholder="價格min" name="minPrice" value="" required>


                                                <input type="number" class="form-control mx-1" placeholder="~價格max" name="maxPrice" value="" required>
                                                <input type="hidden" name="type" value="<?= $type ?>" />
                                                <button class="col-auto btn ms-1 filterBtn" type="submit">搜尋</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 row d-flex justify-content-end btn-group align-items-center mt-3">
                                <a class="col-2 orderBtn" href="allProductList.php?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=1" class="orderBtn <?php if ($order == 1) echo "active" ?>" name="priceOrder ASC">單價↑</a>
                                <a class="col-2 orderBtn" href="allProductList.php?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=2" class="orderBtn <?php if ($order == 2) echo "active" ?>" name="priceOrder DESC">單價↓</a>
                                <a class="col-2 orderBtn" href="allProductList.php?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=3" class="orderBtn <?php if ($order == 3) echo "active" ?>" name="launchOrder ASC">上架時間↑</a>
                                <a class="col-2 orderBtn" href="allProductList.php?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=4" class="orderBtn <?php if ($order == 4) echo "active" ?>" name="launchOrder DESC">上架時間↓</a>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="countBox">
                                <?php if ($product_count > 0) : ?>
                                    <h4 class="countBox">
                                        現在為第<?= $page ?>頁，商品第<?= $starItem ?>-<?= $endItem ?>筆資料，共<?= $product_count ?>筆商品資料</h4>

                                <?php endif; ?>
                            </div>
                            <button class="btn filterBtn me-1 ms-3 my-3" onclick="window.location.href='productNew.php?store_id=<?= $storeID ?>&type=<?= $type ?>'">新增商品</button>
                        </div>
                        <div class="table-responsive">
                            <?php if ($product_count > 0) : ?>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <!-- <th class="align-middle text-center">商家ID</th> -->
                                            <th class="align-middle text-center">商品No.</th>
                                            <th class="align-middle">商品分類</th>
                                            <th>商品名稱</th>
                                            <th>商品簡述</th>
                                            <th>優惠方案</th>
                                            <th class="align-middle text-end">單價</th>
                                            <th class="align-middle text-center">上架區間</th>
                                            <th class="align-middle text-center">庫存</th>
                                            <!-- <th class="align-middle text-center">啟用</th> -->
                                            <th class="align-middle text-center">編修</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //把資料轉換成關聯式陣列
                                        while ($row = $result->fetch_assoc()) : //從資料庫一次抽取單筆資料 用while迴圈顯示
                                        ?>
                                            <tr>
                                                <!-- <td class="align-middle text-center"><?= $row["store_id"] ?></td> -->
                                                <td class="align-middle text-center"><?= $row["id"] ?></td>
                                                <td class="align-middle text"><?= $row["product_category"] ?></td>
                                                <td class="align-middle col-2"><?= $row["name"] ?></td>
                                                <td class="align-middle col-2"><?= $row["intro"] ?></td>
                                                <td class="align-middle"><?= $row["coupon_id"] ?></td>
                                                <td class="align-middle text-end"><?= $row["price"] ?></td>
                                                <td class="align-middle text-center">
                                                    <?= date("Y-m-d ", strtotime($row["valid_time_start"])) ?><br>
                                                    <?= date("Y-m-d ", strtotime($row["valid_time_end"])) ?></td>
                                                <td class="align-middle text-center"><?= $row["stock_quantity"] ?></td>
                                                <!-- <td class="align-middle text-center"><?= $row["valid"] ?></td> -->
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn detailBtn" onclick="window.location.href='productDetail.php?store_id=<?= $storeID ?>&id=<?= $row['id'] ?>'">查看</button>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                
                                <div class="d-flex justify-content-center pt-3">
                                    <nav aria-label="Page navigation example ">
                                        <ul class="pagination">
                                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                                <a class="pageBtn <?php if ($i == $page) echo "active"; ?> " href="allProductList.php?type=<?= $type ?>&page=<?= $i ?>&order=<?= $ordertype ?>"><?= $i ?></a>
                                            <?php endfor; ?>
                                        </ul>
                                    </nav>
                                </div>
                            <?php else : ?>
                                目前沒有資料
                            <?php endif; ?>
                        </div>

                    </main>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script>
        let keywordFilter = document.querySelector("#keyFilter");
        let key = document.querySelector("#searchbykey");
        let dateFilter = document.querySelector("#dateFilter");
        let date = document.querySelector("#searchbydate");
        let priceFilter = document.querySelector("#priceFilter");
        let price = document.querySelector("#searchbyprice");

        keywordFilter.addEventListener("click", function() {
            // console.log("click2");
            key.style.display = "block";
            date.style.display = "none";
            price.style.display = "none";
        });
        dateFilter.addEventListener("click", function() {
            // console.log("click2");
            key.style.display = "none";
            date.style.display = "block";
            price.style.display = "none";
        });
        priceFilter.addEventListener("click", function() {
            // console.log("click3");
            key.style.display = "none";
            date.style.display = "none";
            price.style.display = "block";
        });
    </script>
</body>

</html>
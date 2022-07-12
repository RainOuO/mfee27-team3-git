<?php
require("./doproducts.php");
require("./db-connect.php");

session_start();


// 判斷帶入的參數
$page = isset($_GET["page"]) ?  $page = $_GET["page"] : 1;
$perPage = 10;
$start = ($page - 1) * $perPage;
echo $start;
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
$sql .= $keyword ? " and (name LIKE '%$keyword%' OR description LIKE '%$keyword%' OR )" : "";
$sql .= $minPrice ? " and price >= $minPrice" : "";
$sql .= $maxPrice ? " and price <= $maxPrice" : "";
//BUG!!
$sql .= $startDate ? " and (valid_time_start <= '$endDate') and (valid_time_end >= '$startDate')" : "";

// $sql .= $endDate ? " or ('$startDate' <= valid_time_end and '$endDate' >= valid_time_end))" : "";
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

echo $sql;

// $sql = "SELECT product.*, catagory.name AS catagory_name FROM product
// JOIN catagory ON product.catagory_id = catagory.id WHERE product.price >= $minPrice and price <= $maxPrice ";

// $rows = $result->fetch_all(MYSQLI_ASSOC);

//新增 SQL 條件: 取得第 N 頁的商品(一頁 10 筆)
$sql .= " LIMIT $start ,10"; //顯示用
//Query SQL
$result = $conn->query($sql);
?>
<?php
session_start();
require('../template/login-verify.php');
$time = date('njGis');
$path = '../';
$css = "./style.css?$time";
$js = "./main.js?$time";
$main = "./main.php";
$header = "./header.php";
$filterSection = "./filter-section.php";
$footer = false;
$current = 'products';
$pageType = (isset($_GET['type'])&&!empty($_GET['type']))?$_GET['type']:'0';





require("../db-connect.php");
require("./doProducts.php");
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
//預計新增判斷是否上架中
// $available = isset ($_GET["available"]) ? $_GET["available"] : "";
if (isset($_GET["startDate"]) && isset($_GET["endDate"])) {
    $startDate = $_GET["startDate"];
    $endDate = $_GET["endDate"];
} else {
    $startDate = "";
    $endDate = "";
};

//TO-DO: 未來加入 store_id(從 session 拿) 判斷商家
//$storeID= isset($_GET["store_id"]) ? $_GET["store_id"] : "";
$storeID = $_SESSION['user']['id'];

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
        $ordertype = "product.id ASC";
}

//依條件取得商品
$sql = "SELECT product.*, discount_store.id AS coupon_id_store,
discount_store.name AS coupon_name, product_class.id AS p_id, product_class.name AS category_name FROM (product 
INNER JOIN discount_store ON discount_store.id = product.coupon_id ) INNER JOIN product_class ON product_class.id = product.product_category
WHERE product.valid = 1";


$sql .= $storeID ? " and store_id = $storeID" : "";
$sql .= $type ? " and product_type = $type " : "";
$sql .= $keyword ? " and (product.name LIKE '%$keyword%' OR intro LIKE '%$keyword%' OR product.description LIKE '%$keyword%' )" : "";
$sql .= $minPrice ? " and price >= $minPrice" : "";
$sql .= $maxPrice ? " and price <= $maxPrice" : "";
$sql .= $startDate ? " and (valid_time_start <= '$endDate') and (valid_time_end >= '$startDate')" : "";
// $sql .= $available ? " and available = $available" : "";
$sql .= $ordertype ? " ORDER BY $ordertype" : "";
// SELECT product.*, product_class.id AS p_id, product_class.name AS category_name FROM product JOIN product_class ON product_class.id = product.product_category WHERE product.valid= 1 ORDER BY product.id ASC;
// echo sql
// var_dump($_SESSION['user']);

// var_dump( $sql);
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

$now = date('Y-m-d H:i:s');
$sql00 = "UPDATE product set available = 0 WHERE (valid_time_end <= NOW() ) or (valid_time_start >= NOW())";
$sql01 = "UPDATE product set available = 1 WHERE (valid_time_start <= NOW()) and (valid_time_end >= NOW())";
$conn->query($sql00);
$conn->query($sql01);


// $sqlCateName = " SELECT product_class.* FROM product_class INNER JOIN product ON product_class.id = product.product_category ";
// $sqlCateName.= "LIMIT $start ,10";

// $resultCateName = $conn->query($sqlCateName);

// echo $sqlCateName;
// var_dump ($rowsCateName);
// while ($rowsCateName = $resultCateName->fetch_assoc()):
// $rows = $result->fetch_all(MYSQLI_ASSOC);
// var_dump($rowsCateName);

// endwhile;
//新增 SQL 條件: 取得第 N 頁的商品(一頁 10 筆)
$sql .= " LIMIT $start ,10"; //顯示用
//Query SQL
$result = $conn->query($sql);

// $row = $result->fetch_assoc();
// var_dump($row);
//判斷是否有效
// if ($conn->query($sql) === TRUE) {

//     echo "新資料新增完成";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $resultCate = $conn->query($sql);

// $proudct_category = $rowCate["product_category"];
// var_dump($rowCate);
// while ($rowCate=$resultCate->fetch_assoc()):
// // // echo $proudct_category;
// echo ( $rowCate['product_category']);
// // var_dump ( $rowCate['product_category']);
// $categoryname =  $rowCate['product_category'];





// // $sqlCateName = "SELECT product_class.name FROM product_class, product  where product.product_category = '$proudct_category'  AND product.product_category = product_class.id" ;

// 

require('../template/dashboard.php');
?>



<?php
session_start();
require('../template/login-verify.php');
$time = date('njGis');
$path = '../';
$css = "./style.css?$time";
$js = "./main.js?$time";
$main = "./main.php";
$header = './header.php';
$filterSection = './filter-section.php';
$footer = false;
$current = 'letter-box';
$pageType = (isset($_GET['type'])&&!empty($_GET['type']))?$_GET['type']:'0';
$title = '信件匣';

require("../db-connect.php");


// session 資料處理
$store_id = $_SESSION['user']['id'];

// get 資料處理
$order = isset($_GET['order']) ? $_GET['order'] : 1;
$type = isset($_GET['type']) ? $_GET['type'] : "";
$page = isset($_GET["page"]) ? $page = $_GET["page"] : 1;
// $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";

// 參數處理
$perPage = 10;
$start = ($page - 1) * $perPage;

// 排序開關
switch ($order) {
    case 1:
        $orderType = "time ASC";
        break;
    case 2:
        $orderType = "time DESC";
        break;
    case 3:
        $orderType = "reply_status ASC";
        break;
    case 4:
        $orderType = "reply_status DESC";
        break;
    default:
        $orderType = "ASC";
}

// 列表顯示判斷&資料庫語法
if ($type == 1) {
    $sqlWhere = "user_id = 1 order by 'ASC'";
} elseif ($type == 2) {
    $sqlWhere = "user_id > 1 AND store_id = $store_id AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id AND letter_1.store_id = letter.store_id ) order by $orderType";
} else {
    // 家豪 所有信件，語法修正
    $sqlWhere = "store_id IN (0, '$store_id') AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id AND letter_1.store_id = letter.store_id ) order by $orderType";
}

$sqlUserId = "SELECT * FROM letter letter_1 where $sqlWhere";
// $resultUserId = $conn->query($sqlUserId);
// $countUserId = $resultUserId->num_rows;
// $rowsUserId = $resultUserId->fetch_all(MYSQLI_ASSOC);

// 家豪，頁碼新增
// ----- 列表頁數程式專區起點 ----- //
//根據商品筆數，取得頁碼資訊
$listCount = $conn->query($sqlUserId)->num_rows;
//開始的筆數
$starItem = ($page - 1) * $perPage + 1;
//結束的筆數
$endItem = $page * $perPage;
if ($endItem > $listCount) {
    $endItem = $listCount;
};

// 檢測用
// echo "listCount: " . $listCount . "<br>starItem: " . $starItem . "<br>endItem: " . $endItem;

$totalPage = 1;
//商數 取商數後無條件捨去floor
$quotient = floor($listCount / $perPage);
//餘數
$remainder = ($listCount % $perPage);

if ($remainder === 0) {
    $totalPage = $quotient;
} else {
    $totalPage = $quotient + 1;
}

//新增 SQL 條件: 取得第 N 頁的商品(一頁 10 筆)
$sqlWhere .= " LIMIT $start, 10"; //顯示用
// $sqlWhere .= $keyword ? " and product.name LIKE '%$keyword%'" : "";
$sqlUserId = "SELECT * FROM letter letter_1 where $sqlWhere";
$resultUserId = $conn->query($sqlUserId);
$countUserId = $resultUserId->num_rows;
$rowsUserId = $resultUserId->fetch_all(MYSQLI_ASSOC);

// ----- 列表頁數程式專區終點 ----- //



// // 取得重複 user_id 裡，時間最新(大)的資料
// $sqlUserId = "SELECT * FROM letter letter_1 
// where store_id = $store_id AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id) ORDER BY $orderType";

// 利用關聯式陣列，查詢出 user_id 的 name
$sqlUserName = "SELECT id,name FROM users";
$resultUserName = $conn->query($sqlUserName);
$rowsUserName = $resultUserName->fetch_all(MYSQLI_ASSOC);
$userName = array_column($rowsUserName, "name", "id");
require("../template/dashboard.php");
?>
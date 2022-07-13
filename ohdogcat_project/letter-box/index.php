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
require("../db-connect.php");



// session 資料處理
$store_id = $_SESSION['user']['id'];

// get 資料處理
$order = isset($_GET['order']) ? $_GET['order'] : 1;
$type = isset($_GET['type']) ? $_GET['type'] : "";

// 排序開關
switch($order){
    case 1:
        $orderType="time ASC";
        break;
    case 2:
        $orderType="time DESC";
        break;
    case 3:
        $orderType="reply_status ASC";
        break;
    case 4:
        $orderType="reply_status DESC";
        break;
    default:
        $orderType="ASC";
}

// 列表顯示判斷&資料庫語法
if( $type == 1 ){
    $sqlWhere = "user_id = 1 order by 'ASC'";
}elseif( $type == 2){
    $sqlWhere = "user_id > 1 AND store_id = $store_id AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id AND letter_1.store_id = letter.store_id ) order by $orderType";
}else{
    $sqlWhere = "time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id) ORDER BY $orderType";
}

$sqlUserId ="SELECT * FROM letter letter_1 where $sqlWhere";
$resultUserId = $conn->query($sqlUserId);
$UserIdCount = $resultUserId->num_rows;
$rowsUserId = $resultUserId->fetch_all(MYSQLI_ASSOC);
// var_dump($sqlUserId);

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
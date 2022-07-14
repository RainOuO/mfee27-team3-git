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
$footer = "./footer.php";
$current = 'discount';
$pageType = '2';
$title = '優惠活動列表';


require('../db-connect.php');

$ZeroTime = "0000-00-00";
$sql01 = "UPDATE discount_store set buyer_valid= 1 WHERE (start_time <= NOW()) and (end_time >= NOW())";
$sql00 = "UPDATE discount_store set buyer_valid= 2 WHERE (start_time > NOW()) or (end_time < NOW())";
$sql001 = "UPDATE discount_store set buyer_valid= 1 WHERE (start_time = '0000-00-00 00:00:00') AND(end_time = '0000-00-00 00:00:00')";

$conn->query($sql01);
$conn->query($sql00);
$conn->query($sql001);


$page = isset($_GET["page"]) ?  $page = $_GET["page"] : 1;
$perPage = 10;
$start = ($page - 1) * $perPage;
$category = isset($_GET["category"]) && !empty($_GET["category"]) ? $_GET["category"] : "";
$valid  = isset($_GET["valid"]) ? $_GET["valid"] : "";

$ordertype = isset($_GET["order"]) ? $_GET["order"] : 1;

switch ($ordertype) {
  case 1:
    $ordertype = "id ASC";
    break;
  case 2:
    $ordertype = "id DESC";
    break;
  case 3:
    $ordertype = "discount_number ASC";
    break;
  case 4:
    $ordertype = "discount_number DESC";
    break;
}

$sql = "SELECT * FROM discount_store WHERE valid= 1";
// $sql .= $category ? " AND category_id = $category " : "";
$sql .= $valid ? " AND buyer_valid = $valid " : "";
$sql .= $ordertype ? " ORDER BY $ordertype" : "";
$pageUserCount = $conn->query($sql)->num_rows;
// var_dump($pageUserCount);
$starItem = ($page - 1) * $perPage + 1;
//結束的筆數
$endItem = $page * $perPage;
if ($endItem > $pageUserCount) {
  $endItem = $pageUserCount;
};

$totalPage = 10;
//商數 取商數後無條件捨去floor
$quotient = floor($pageUserCount / $perPage);
//餘數
$remainder = ($pageUserCount % $perPage);

if ($remainder === 0) {
  $totalPage = $quotient;
} else {
  $totalPage = $quotient + 1;
}

$sql .= " LIMIT $start ,10";
$result = $conn->query($sql);

require('../template/dashboard.php');
?>


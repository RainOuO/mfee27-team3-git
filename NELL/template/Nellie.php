<?php
require("../../db-connect.php");
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
    $ordertype = "name ASC";
    break;
  case 4:
    $ordertype = "name DESC";
    break;
}

$sql = "SELECT * FROM discount WHERE valid= 1";
// $sql .= $storeID ? " and store_id = $storeID" : "";
$sql .= $category ? " AND category_id = $category " : "";
$sql .= $valid ? " AND buyer_valid = $valid " : "";
$sql .= $ordertype ? " ORDER BY $ordertype" : "";
$pageUserCount = $conn->query($sql)->num_rows;
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
?>
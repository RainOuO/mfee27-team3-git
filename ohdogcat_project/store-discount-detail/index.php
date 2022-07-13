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


require('../db-connect.php');

if (!isset($_GET["id"])) {
    echo "沒有參數";
    // exit;
}
$id = $_GET["id"];
$couponId = "AND coupon_id = $id";
// var_dump($_GET["id"]);
$sql = "SELECT * FROM discount_store WHERE id=$id AND valid=1";
$result = $conn->query($sql);
$userCount = $result->num_rows;

$sqlProduct = "SELECT * FROM product WHERE valid=1 $couponId";
$resultProduct = $conn->query($sqlProduct);
$productCount = $resultProduct->num_rows;

require('../template/dashboard.php');
?>


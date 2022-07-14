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
$title = '編輯優惠活動';


require('../db-connect.php');

if (!isset($_GET["id"])) {
    echo "沒有參數";
    // exit;
}
$id = $_GET["id"];
$sql = "SELECT * FROM discount_store WHERE id=$id AND valid=1";

$result = $conn->query($sql);
$userCount = $result->num_rows;

require('../template/dashboard.php');
?>


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
$title = '建立優惠活動';
$title = '查看優惠活動';



require('../db-connect.php');

require('../template/dashboard.php');
?>


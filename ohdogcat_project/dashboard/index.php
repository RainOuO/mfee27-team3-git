<?php
session_start();
$time = date('njGis');
$css = "./style.css?$time";
$js = "./main.js?$time";
$main = "./main.php";
$header = "./header.php";
$filterSection = "./filter-section.php";
$footer = false;
require('../template/dashboard.php');
?>

<?php
session_start();
$time = date('njGis');
$css = "./style.css?$time";
$js = "./main.js?$time";
$main = "./main.php";
$header = false;
$filterSection = false;
$footer = false;
require('../template/dashboard.php');
?>

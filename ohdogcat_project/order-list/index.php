<?php
header('Cache-Control:no-cache,must-revalidate');   
header('Pragma:no-cache');   
header("Expires:0"); 
session_start();
$css = './style.css';
$js = './main.js';
$main = './main.php';
require('../template/dashboard.php');
?>
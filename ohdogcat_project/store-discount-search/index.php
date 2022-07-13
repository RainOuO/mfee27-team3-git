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

if (!isset($_GET["search"])) {
    $search = "";
    $userCount = 0;
  } else {
    $search = $_GET["search"];
  
    //須完全符合
    // $sql = "SELECT id, account, name, email, phone FROM users WHERE account = '$search'";
  
    //模糊比對
    $sql = "SELECT id, name, description, discount_number, start_time, end_time, buyer_valid FROM discount_store WHERE name LIKE '%$search%'";
  
    $result = $conn->query($sql);
    $userCount = $result->num_rows;
  }

require('../template/dashboard.php');
?>


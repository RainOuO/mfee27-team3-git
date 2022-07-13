<?php
session_start();
require('../template/login-verify.php');
$time = date('njGis');
$path = '../';
$css = "./style.css?$time";
$js = "./main.js?$time";
$main = "./main.php";
$header = './header.php';
$filterSection = false;
$footer = './footer.php';
$current = 'letter-box';
$pageType = false;
require("../db-connect.php");



// GET 資料處理
$user_id = $_GET['user_id'];

// SESSION 資料處理
$store_id = $_SESSION['user']['id'];

// 抓取 letter資料表內容，且只有 user_id AND $store_id資料
$sql = "SELECT * FROM letter where user_id = '$user_id' AND (store_id = '$store_id' OR store_id IS NULL)";
$result = $conn->query($sql);
$letterCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

// 抓取 users資料表內容，為了抓取 user_id對應名稱
$sqlUserName = "SELECT id,name FROM users WHERE id = '$user_id' ";
$resultUserName = $conn -> query($sqlUserName);
$rowsUserName = $resultUserName -> fetch_assoc();

// 抓取 store_info資料表內容，為了抓取 store_id對應名稱、圖片
$sqlStoreName = "SELECT id, name, photo FROM store_info WHERE id = '$store_id'";
$resultStoreName = $conn -> query($sqlStoreName);
$rowsStoreName = $resultStoreName -> fetch_assoc();
require("../template/dashboard.php");
?>
<script>
    // scroll Bar 永遠保持在最底部
    var chatHistory = document.getElementById("main");
    chatHistory.scrollTop = chatHistory.scrollHeight;
</script>
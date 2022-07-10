<?php

require("./db-connect.php");
if (!isset($_POST["name"])) {
    echo "沒有帶入資料";
    exit;
}

// 進資料庫比對前先檢查 減少效能浪費
$store_id = "";
// TO-DO 
$tpye= "";
$name = $_POST["name"];
$category = $_POST["category"];
$intro = $_POST["intro"];
$price = $_POST["price"];
$spec = $_POST["spec"];
$main_photo = $_POST["main_photo"];
$sub_photo = $_POST["sub_photo"];
$valid_start = $_POST["valid_start"];
$valid_end = $_POST["valid_end"];
$coupon = $_POST["coupon"];
$create_time = $_POST["create_time"];
$stock = $_POST["stock"];
$description = $_POST["description"];

// 以上都沒問題進資料庫檢查
// $sql = "SELECT account FROM users WHERE account='$account'";
// // 檢查account欄位是否存在
// $result = $conn->query($sql);
// $userCount = $result->num_rows;

// if ($userCount > 0) {
//     echo "this account is existed";
//     exit;
// }

//寫入資料庫
$now = date('Y-m-d H:i:s');
$sqlCreate = "INSERT INTO product (name, store_id, product_type, intro, description ,price, product_category, create_time, valid_time_start, valid_time_end, 
stock_quantity, coupon_id, main_photo, sub_photo, valid) 
VALUE('$name','$store_id', '', '$intro','$description','$price','$category','$now','$valid_start','$valid_end','$stock','$coupon','$main_photo','$sub_photo',1)";

// echo $sqlCreate;

$isCreate = $conn->query($sqlCreate) === TRUE;
$conn->close();
if ($isCreate) {
    header("location: allProductList.php");
} else {
    echo "帳號建立錯誤" . $conn->error;
}
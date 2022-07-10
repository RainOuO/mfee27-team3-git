<?php

require("./db-connect.php");
// if (!isset($_GET["id"])) {
//     echo "沒有帶入資料";
//     exit;
// }

// echo $_GET["id"];
// 進資料庫比對前先檢查 減少效能浪費
$id = $_POST["id"];
$store_id = "";
//TO-DO: validate session
$type= "";
$name = $_POST["name"];
$category = $_POST["category"];
$intro = $_POST["intro"];
$price = $_POST["price"];
// $spec = $_POST["spec"];
$main_photo = $_POST["main_photo"];
$sub_photo = $_POST["sub_photo"];
$valid_start = $_POST["valid_start"];
$valid_end = $_POST["valid_end"];
$coupon = $_POST["coupon"];
// $create_time = $_POST["create_time"];
$stock = $_POST["stock"];
$description = $_POST["description"];


//寫入資料庫
$now = date('Y-m-d H:i:s');
// $sqlCreate = "INSERT INTO product (name, store_id, product_type, intro, description ,price, product_category, create_time, valid_time_start, valid_time_end, 
// stock_quantity, coupon_id, main_photo, sub_photo, valid) 
// VALUE('$name','$store_id', '', '$intro','$description','$price','$category','$now','$valid_start','$valid_end','$stock','$coupon','$main_photo','$sub_photo',1)";
$sqlUpdate="UPDATE product SET name = '$name', intro = '$intro', description = '$description', price = '$price', product_category = $category, create_time = '$now', valid_time_start = '$valid_start', valid_time_end = '$valid_end', stock_quantity = $stock, coupon_id = $coupon, main_photo = '$main_photo', sub_photo = '$sub_photo' WHERE id = '$id'";

echo $sqlUpdate;

$isUpdate = $conn->query($sqlUpdate) === TRUE;
$conn->close();

if ($isUpdate) {
    header("location: productDetail.php?id=$id");
} else {
    echo "帳號更新錯誤" . $conn->error;
}


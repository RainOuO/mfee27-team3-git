<?php

require("./db-connect.php");
// if (!isset($_POST["store_id"])) {
//     echo "沒有帶入資料";
//     exit;
// }

// 進資料庫比對前先檢查 減少效能浪費
$store_id = "";
// TO-DO 
$type = $_POST["type"];
// echo $type;
$name = $_POST["name"];
$category = $_POST["category"];
$intro = $_POST["intro"];
$price = $_POST["price"];
// $spec = $_POST["spec"];
$main_photo = $_FILES["main_photo"];
$sub_photo = $_FILES["sub_photo"];
$valid_start = $_POST["valid_start"];
$valid_end = $_POST["valid_end"];
$coupon = $_POST["coupon"];

$stock = $_POST["stock"];
$description = $_POST["description"];

//圖片上傳資料庫
if ($_FILES["main_photo"]["error"] == 0 && $_FILES["sub_photo"]["error"] == 0) {
    if (
        move_uploaded_file($_FILES["main_photo"]["tmp_name"], "./upload_main_photo/" . $_FILES["main_photo"]["name"]) &&
        move_uploaded_file($_FILES["sub_photo"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo"]["name"])
    ) {
        // //TO-DO
        $fileNameC = $_FILES["main_photo"]["name"];
        $fileNameS = $_FILES["sub_photo"]["name"];
        // $sqlPhoto = "INSERT INTO  product ( main_photo, sub_photo ) VALUE ('$fileNameC','$fileNameS,') ";
        $sqlPhoto = "INSERT INTO  product ( main_photo, sub_photo ) VALUE ('$fileNameC','$fileNameS')";
    } else {
        echo "照片建立錯誤";
    };
}
$cover = $main_photo["name"];
$sub = $sub_photo["name"];
$sqlCreate = "INSERT INTO product (name, store_id, product_type, intro, description ,price, product_category, create_time, main_photo, sub_photo, valid_time_start, valid_time_end, 
stock_quantity, coupon_id, valid) 
VALUE('$name','$store_id', '$type', '$intro','$description','$price','$category','$now', '$cover','$sub,','$valid_start','$valid_end','$stock','$coupon',1)";
$isCreate = $conn->query($sqlCreate) === TRUE;
$conn->close();
if ($isCreate) {

    // header("location: allProductList.php?type=$type&page=1");
} else {
    echo "帳號建立錯誤" . $conn->error;
}

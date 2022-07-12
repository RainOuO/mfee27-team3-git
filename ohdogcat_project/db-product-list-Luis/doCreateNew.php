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
//上傳封面照片
$main_photo = $_FILES["main_photo"];
//上傳商品照片
$fileNameS1 = $_FILES["sub_photo1"];
$fileNameS2 = $_FILES["sub_photo2"];
$fileNameS3 = $_FILES["sub_photo3"];
$fileNameS4 = $_FILES["sub_photo4"];
$fileNameS5 = $_FILES["sub_photo5"];
$valid_start = $_POST["valid_start"];
$valid_end = $_POST["valid_end"];
$coupon = $_POST["coupon"];
$now = date('Y-m-d H:i:s');
$stock = $_POST["stock"];
$description = $_POST["description"];

// echo ($_FILES["main_photo"]["tmp_name"])."<br>";
// echo ($_FILES["sub_photo1"]["name"])."<br>";
// echo ($_FILES["sub_photo2"]["name"])."<br>";
// echo($_FILES["sub_photo3"]["error"])."<br>";
// echo($_FILES["sub_photo4"]["error"])."<br>";
// echo($_FILES["sub_photo5"]["error"])."<br>";

//圖片上傳資料庫
if (
    ($_FILES["main_photo"]["error"] == 0 || $_FILES["main_photo"]["error"] ==  4 ) &&
        ($_FILES["sub_photo1"]["error"] == 0 || $_FILES["sub_photo1"]["error"] == 4 )&&
        ($_FILES["sub_photo2"]["error"] == 0 || $_FILES["sub_photo2"]["error"] == 4 )&&
        ($_FILES["sub_photo3"]["error"] == 0 || $_FILES["sub_photo3"]["error"] == 4 )&&
        ($_FILES["sub_photo4"]["error"] == 0 || $_FILES["sub_photo4"]["error"] == 4 )&&
        ($_FILES["sub_photo5"]["error"] == 0 || $_FILES["sub_photo5"]["error"] == 4 )
) {
    if (
        move_uploaded_file($_FILES["main_photo"]["tmp_name"], "./upload_main_photo/" . $_FILES["main_photo"]["name"]) &&
        (
        move_uploaded_file($_FILES["sub_photo1"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo1"]["name"]) ||
        move_uploaded_file($_FILES["sub_photo2"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo2"]["name"]) ||
        move_uploaded_file($_FILES["sub_photo3"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo3"]["name"]) ||
        move_uploaded_file($_FILES["sub_photo4"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo4"]["name"]) ||
        move_uploaded_file($_FILES["sub_photo5"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo5"]["name"]))
    ) {
        // //TO-DO
        $fileNameC =  isset($_FILES["main_photo"]["name"]) ? $_FILES["main_photo"]["name"] : "";
        $fileNameS1 = isset($_FILES["sub_photo1"]["name"]) ? $_FILES["sub_photo1"]["name"] : "";
        $fileNameS2 = isset($_FILES["sub_photo2"]["name"]) ? $_FILES["sub_photo2"]["name"] : "";
        $fileNameS3 = isset($_FILES["sub_photo3"]["name"]) ? $_FILES["sub_photo3"]["name"] : "";
        $fileNameS4 = isset($_FILES["sub_photo4"]["name"]) ? $_FILES["sub_photo4"]["name"] : "";
        $fileNameS5 = isset($_FILES["sub_photo5"]["name"]) ? $_FILES["sub_photo5"]["name"] : "";



        $fileSubtotal = "$fileNameS1,$fileNameS2,$fileNameS3,$fileNameS4,$fileNameS5,";
        // echo ($fileSubtotal);



        $sqlCreate = "INSERT INTO product (name, store_id, product_type, intro, description ,price, product_category, create_time, main_photo, sub_photo, valid_time_start, valid_time_end, 
        stock_quantity, coupon_id, valid) 
        VALUE('$name','$store_id', '$type', '$intro','$description','$price','$category', '$now', '$fileNameC','$fileSubtotal','$valid_start','$valid_end','$stock','$coupon',1)";


        $isCreate = $conn->query($sqlCreate);
        $conn->close();
        if ($isCreate  === TRUE) {
            header("location: allProductList.php?type=$type&page=1");
            // echo "新增成功" ;
        } else {
            echo "資料庫連線錯誤" . $conn->error;
        }
    } else {
        echo "商品建立錯誤";
    };
}

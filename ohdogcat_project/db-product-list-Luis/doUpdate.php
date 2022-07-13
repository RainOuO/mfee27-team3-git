<?php
// session_start();
require("./db-connect.php");


// echo $_GET["id"];
// 進資料庫比對前先檢查 減少效能浪費
$id = $_POST["id"];
$store_id = "";
//TO-DO: validate session
$type = "";
$name = $_POST["name"];
$category = $_POST["category"];
$intro = $_POST["intro"];
$price = $_POST["price"];
// 第二階段開發功能
// $spec = $_POST["spec"];

$valid_start = $_POST["valid_start"];
$valid_end = $_POST["valid_end"];
$coupon = $_POST["coupon_id"];
// $create_time = $_POST["create_time"];
$stock = $_POST["stock"];
$description = $_POST["description"];

//載入舊資料
$sqlOldPhoto = "SELECT * FROM product WHERE valid=1 AND id = $id";
$resultOldPhoto = $conn->query($sqlOldPhoto);
$rowOld = $resultOldPhoto->fetch_assoc();
//取舊資料陣列
if ($rowOld["main_photo"] == "") {
    $oldMainPhoto = "";
}else {
    $oldMainPhoto = $rowOld["main_photo"];
}
if ($rowOld["sub_photo"] == "") {
    $oldSubPhoto1 = "";
    $oldSubPhoto2 = "";
    $oldSubPhoto3 = "";
    $oldSubPhoto4 = "";
    $oldSubPhoto5 = "";
} else {
    $rowSubOld = explode(",", $rowOld["sub_photo"]);
    array_pop($rowSubOld);
    var_dump($rowSubOld) . "<br>";

    $oldSubPhoto1 = $rowSubOld[0];
    $oldSubPhoto2 = $rowSubOld[1];
    $oldSubPhoto3 = $rowSubOld[2];
    $oldSubPhoto4 = $rowSubOld[3];
    $oldSubPhoto5 = $rowSubOld[4];
}

//結合新舊陣列
// $finalArr = [];
// for ($i = 0; $i < count($rowSubNew); $i++) {
//     if ($rowSubNew[$i] == '') {
//         array_push($finalArr, $rowSubOld[$i]);
//     } else {
//         array_push($finalArr, $rowSubNew[$i]);
//     }
// }
// $sql_text = '';
// foreach ($finalArr as $i) {
//     $sql_text .= $i . ",";
// }
// // var_dump($sql_text);
// $j = explode(",", $sql_text);
// array_pop($j);
// var_dump($j);

// var_dump($rowOld); //explode去除逗號
//刪除最後一個資料 ","後面的空值
// var_dump($rowOld);

// update多張照片
// $id = $_SESSION["store_id"]['id'];

$now = date('Y-m-d H:i:s');

//判斷是否有取到 main photo的新上傳資料
if ($_FILES["main_photo"]["error"] == 0) {
    if (move_uploaded_file($_FILES["main_photo"]["tmp_name"], "./upload_main_photo/" . $_FILES["main_photo"]["name"])) {
        $fileNameC = $_FILES["main_photo"]["name"];
    }
} else {
    $fileNameC = $oldMainPhoto;
}
if ($_FILES["sub_photo1"]["error"] == 0) {
    if (move_uploaded_file($_FILES["sub_photo1"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo1"]["name"])) {
        $fileNameS1 = $_FILES["sub_photo1"]["name"];
    }
} else {
    $fileNameS1 = $oldSubPhoto1;
}
if ($_FILES["sub_photo2"]["error"] == 0) {
    if (move_uploaded_file($_FILES["sub_photo2"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo2"]["name"])) {
        $fileNameS2 = $_FILES["sub_photo2"]["name"];
    }
} else {
    $fileNameS2 = $oldSubPhoto2;
}
if ($_FILES["sub_photo3"]["error"] == 0) {
    if (move_uploaded_file($_FILES["sub_photo3"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo3"]["name"])) {
        $fileNameS3 = $_FILES["sub_photo3"]["name"];
    }
} else {
    $fileNameS3 = $oldSubPhoto3;
}
if ($_FILES["sub_photo4"]["error"] == 0) {
    if (move_uploaded_file($_FILES["sub_photo4"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo4"]["name"])) {
        $fileNameS4 = $_FILES["sub_photo4"]["name"];
    }
} else {
    $fileNameS4 = $oldSubPhoto4;
}
if ($_FILES["sub_photo5"]["error"] == 0) {
    if (move_uploaded_file($_FILES["sub_photo5"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo5"]["name"])) {
        $fileNameS5 = $_FILES["sub_photo5"]["name"];
    }
} else {
    $fileNameS5 = $oldSubPhoto5;
}

echo $fileNameC;
$fileSubtotal = "$fileNameS1,$fileNameS2,$fileNameS3,$fileNameS4,$fileNameS5,";
echo $fileSubtotal;


$sqlUpdate = "UPDATE product SET name = '$name', intro = '$intro', description = '$description', price = '$price', create_time = '$now', valid_time_start = '$valid_start', valid_time_end = '$valid_end',
stock_quantity = '$stock', product_category = '$category', main_photo ='$fileNameC', sub_photo ='$fileSubtotal', coupon_id = '$coupon' WHERE product.id = '$id'";


// echo $sqlUpdate;

$isUpdate = $conn->query($sqlUpdate);
$conn->close();
if ($isUpdate === TRUE) {
    echo "資料修改成功";
    header("location: productDetail.php?type=$type&id=$id");
} else {
    echo "Error: " . $sqlUpdate . "<br>" . $conn->error;
    echo "資料更新錯誤";
};


<?php
// session_start();
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
$type = "";
$name = $_POST["name"];
$category = $_POST["category"];
$intro = $_POST["intro"];
$price = $_POST["price"];
// $spec = $_POST["spec"];

//新資料
// $main_photo = $_FILES["main_photo"];
// $fileNameS1 = $_FILES["sub_photo1"]["name"];
// $fileNameS2 = $_FILES["sub_photo2"]["name"];
// $fileNameS3 = $_FILES["sub_photo3"]["name"];
// $fileNameS4 = $_FILES["sub_photo4"]["name"];
// $fileNameS5 = $_FILES["sub_photo5"]["name"];
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

// echo "舊資料" . "<br>";
// $rowSubOld = explode(",", $rowOld["sub_photo"]);
// array_pop($rowSubOld);
// var_dump($rowSubOld) . "<br>";



// $fileSubtotal = "$fileNameS1,$fileNameS2,$fileNameS3,$fileNameS4,$fileNameS5,";
// // echo($fileSubtotal). "<br>";
// $rowSubNew = explode(",", $fileSubtotal);
// array_pop($rowSubNew);
// var_dump($rowSubNew[1]);

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




// $oldMainPhoto = $rowOld['main_photo'];
// $oldSubPhoto1 = $rowOld['sub_photo'][0];
// $oldSubPhoto2 = $rowOld['sub_photo'][1] ;
// $oldSubPhoto3 = $rowOld['sub_photo'][2] ;
// $oldSubPhoto4 = $rowOld['sub_photo'][3] ;
// $oldSubPhoto5 = $rowOld['sub_photo'][4] ;


// var_dump($rowOld); //explode去除逗號
//刪除最後一個資料 ","後面的空值
// var_dump($rowOld);
echo "舊資料";
echo $oldMainPhoto . "<br>";
// echo $rowSubOld[0] . "<br>";
// echo $rowSubOld[1] . "<br>";
// echo $rowSubOld[2] . "<br>";
// echo $rowSubOld[3] . "<br>";
// echo $rowSubOld[4] . "<br>";
echo "新資料";
// echo $main_photo = $_FILES["main_photo"];
// echo $fileNameS1 = $_FILES["sub_photo1"]["name"];
// echo $fileNameS2 = $_FILES["sub_photo2"]["name"];
// echo $fileNameS3 = $_FILES["sub_photo3"]["name"];
// echo $fileNameS4 = $_FILES["sub_photo4"]["name"];
// echo $fileNameS5 = $_FILES["sub_photo5"]["name"];

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

// if ($_FILES["sub_photo1"]["error"] == 0) {
//     move_uploaded_file($_FILES["sub_photo1"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo1"]["name"]) ;
//     $fileNameS1 = $_FILES["sub_photo1"]["name"];
// }else {
//     $fileNameS1 = $oldSubPhoto1;
// }
// if ($_FILES["sub_photo2"]["error"] == 0) {
//     move_uploaded_file($_FILES["sub_photo2"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo2"]["name"]) ;
//     $fileNameS2 = $_FILES["sub_photo2"]["name"];
// }else {
//     $fileNameS2 = $oldSubPhoto2;
// }
// if ($_FILES["sub_photo3"]["error"] == 0) {
//     move_uploaded_file($_FILES["sub_photo3"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo3"]["name"]) ;
//     $fileNameS3 = $_FILES["sub_photo3"]["name"];
// }else {
//     $fileNameS3 = $oldSubPhoto3;
// }
// if ($_FILES["sub_photo4"]["error"] == 0) {
//     move_uploaded_file($_FILES["sub_photo4"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo4"]["name"]) ;
//     $fileNameS4 = $_FILES["sub_photo4"]["name"];
// }else {
//     $fileNameS4 = $oldSubPhoto4;
// }
// if ($_FILES["sub_photo5"]["error"] == 0) {
//     move_uploaded_file($_FILES["sub_photo5"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo5"]["name"]) ;
//     $fileNameS5 = $_FILES["sub_photo5"]["name"];
// }else {
//     $fileNameS5 = $oldSubPhoto5;
// }

// $fileSubtotal = "$fileNameS1,$fileNameS2,$fileNameS3,$fileNameS4,$fileNameS5,";
// echo $fileNameS1;
// echo $fileNameS2;
// echo $fileNameS3;
// echo $fileNameS4;
// echo $fileNameS5;





// if (
// $_FILES["main_photo"]["error"] == 0 ||
// $_FILES["sub_photo1"]["error"] == 0 ||
// $_FILES["sub_photo2"]["error"] == 0 ||
// $_FILES["sub_photo3"]["error"] == 0 ||
// $_FILES["sub_photo4"]["error"] == 0 ||
// $_FILES["sub_photo5"]["error"] == 0
// ) {
// if (
// move_uploaded_file($_FILES["main_photo"]["tmp_name"], "./upload_main_photo/" . $_FILES["main_photo"]["name"]) ||
// move_uploaded_file($_FILES["sub_photo1"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo1"]["name"]) ||
// move_uploaded_file($_FILES["sub_photo2"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo2"]["name"]) ||
// move_uploaded_file($_FILES["sub_photo3"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo3"]["name"]) ||
// move_uploaded_file($_FILES["sub_photo4"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo4"]["name"]) ||
// move_uploaded_file($_FILES["sub_photo5"]["tmp_name"], "./upload_sub_photo/" . $_FILES["sub_photo5"]["name"])
// ) {
// // //TO-DO
// $fileNameC = $_FILES ["main_photo"]["error"] == 0 ? $_FILES["main_photo"]["name"] : "$oldMainPhoto";
// $fileNameS1 = $_FILES["sub_photo1"]["error"] == 0 ? $_FILES["sub_photo1"]["name"] : "$oldSubPhoto1";
// $fileNameS2 = $_FILES["sub_photo2"]["error"] == 0 ? $_FILES["sub_photo2"]["name"] : "$oldSubPhoto2";
// $fileNameS3 = $_FILES["sub_photo3"]["error"] == 0 ? $_FILES["sub_photo3"]["name"] : "$oldSubPhoto3";
// $fileNameS4 = $_FILES["sub_photo4"]["error"] == 0 ? $_FILES["sub_photo4"]["name"] : "$oldSubPhoto4";
// $fileNameS5 = $_FILES["sub_photo5"]["error"] == 0 ? $_FILES["sub_photo5"]["name"] : "$oldSubPhoto5";
// }
// }
    // $sqlUpdate = "UPDATE product SET name = '$name', intro = '$intro', description = '$description', price = '$price',
    // product_category = '$category', create_time = '$now', valid_time_start = '$valid_start', valid_time_end = '$valid_end',
    // stock_quantity = '$stock', main_photo ='$fileNameC', sub_photo= '$fileSubtotal', coupon_id = '$coupon' WHERE id = '$id'";

    // echo $sqlUpdate;
    // $isUpdate = $conn->query($sqlUpdate);
    // $conn->close();
    // if ($isUpdate === TRUE) {
    // echo "資料修改成功";
    // // header("location: productDetail.php?type=$type&id=$id");
    // } else {
    // echo "Error: " . $sqlUpdate . "<br>" . $conn->error;
    // }
    // } else {
    // echo "資料更新錯誤";
    // };
    // }



    //寫入資料庫
    // $now = date('Y-m-d H:i:s');
    // $sqlCreate = "INSERT INTO product (name, store_id, product_type, intro, description ,price, product_category, create_time, valid_time_start, valid_time_end,
    // stock_quantity, coupon_id, main_photo, sub_photo, valid)
    // VALUE('$name','$store_id', '', '$intro','$description','$price','$category','$now','$valid_start','$valid_end','$stock','$coupon','$main_photo','$sub_photo',1)";
    // $sqlUpdate="UPDATE product SET name = '$name', intro = '$intro', description = '$description', price = '$price',
    // product_category = $category, create_time = '$now', valid_time_start = '$valid_start', valid_time_end = '$valid_end',
    // stock_quantity = '$stock', main_photo ='$fileNameC', sub_photo = '$fileNameS,' coupon_id = '$coupon' WHERE id = '$id'";

    // echo $sqlUpdate;

    // $isUpdate = $conn->query($sqlUpdate) === TRUE;
    // $conn->close();

    // if ($isUpdate) {
    // // header("location: productDetail.php?id=$id");
    // } else {
    // echo "帳號更新錯誤" . $conn->error;
    // }

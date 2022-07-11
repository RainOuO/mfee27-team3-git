<?php

require("./db-connect.php");

$id = 1;
// $main_photo = $_POST["main_photo"];
var_dump($_FILES["main_photo"]);
if ($_FILES["main_photo"]["error"] == 0) {
    if (move_uploaded_file($_FILES["main_photo"]["tmp_name"], "./upload_main_photo/" . $_FILES["main_photo"]["name"])) {

        $fileName = $_FILES["main_photo"]["name"];
        $sqlMainPhoto = "INSERT INTO  product ( main_photo ) VALUE ('$fileName') ";

        if ($conn->query($sqlMainPhoto) === TRUE) {
            echo "圖片上傳成功";
        } else {
            echo "Error: " . $sqlMainPhoto . "<br>" . $conn->error;
        }
    } else {
        echo "照片建立錯誤";
    }
}


?>
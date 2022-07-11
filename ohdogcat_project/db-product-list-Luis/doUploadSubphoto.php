<?php
session_start();
require("../db-connect.php");

$id = 1;
$sub_photo=$_POST["sub_photo"];
$myFile=$_POST["myFile"];
echo $myFile;
var_dump($_FILES["myFile"]);
if ($_FILES["myFile"]["error"] == 0){
    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], "../upload_photo/".$_FILES["myFile"]["name"])){

        $fileName=$_FILES["myFile"]["name"];
        // $now=date('Y-m-d H:i:s');

        // $sql="INSERT INTO product (main_photo) VALUES ('$main_photo')";
        // echo $sql;
        $sqlSub="UPDATE product SET sub_photo = CONCAT(sub_photo, '$fileName|') WHERE id = $id";
        echo $sqlSub;

        if ($conn->query($sqlSub) === TRUE) {
            echo "新資料輸入成功";
        } else {
            echo "Error: " . $sqlSub . "<br>" . $conn->error;
        }

        echo "upload success!";
        // header("location: upload.php");
    }else{
        echo "upload fail!!";
    }
}

?>
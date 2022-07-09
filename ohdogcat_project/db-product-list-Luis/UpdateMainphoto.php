<?php
session_start();

require("db-connect.php");
$id = $_SESSION["user"]['id'];
var_dump($id);

if ($_FILES["MainFile"]["error"] == 0) {  
    if (move_uploaded_file($_FILES["MainFile"]["tmp_name"],"../images/dashboard/".$_FILES["MainFile"]["name"]))  { 
        $fileName = $_FILES["MainFile"]["name"]; //第一個myFile值是input 裡面的name 後面name是規定語法 取得他檔案名稱
        $sql = "UPDATE  product  SET  main_photo='$fileName'  WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION["id"] = $id;

            if (isset($_SESSION["id"])) {
                $_SESSION['updates'] = 'successs';
                header("location:bbbbbbbproduct-edit-new-swiper.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "upload fail!!";
        
    }
}

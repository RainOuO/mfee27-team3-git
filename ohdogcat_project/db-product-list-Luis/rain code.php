<?php
session_start();

require("db-connect.php");
$id = $_SESSION["user"]['id'];

if ($_FILES["myFile"]["error"] == 0) {
    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], "../images/dashboard/" . $_FILES["myFile"]["name"])) {
        $fileName = $_FILES["myFile"]["name"];
        // var_dump($fileName);
        $sql = "UPDATE  product  SET  sub_photo= CONCAT(sub_photo,'$fileName,')  WHERE id=2";
        if ($conn->query($sql) === TRUE) {
            // session_start();
            // $_SESSION["id"] = $id;
            // if (isset($_SESSION["id"])) {
            // $_SESSION['updates'] = 'successs';
            header("location:product-detail.php");
            echo "更新圖片成功";
            echo "$sql";
            // var_dump($fileName);
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "upload fail!!";
}

<?php
require("../db-connect.php");
if (!isset($_POST["name"])) {
    echo "沒有帶資料";
    exit;
}
session_start();
$id = $_SESSION["user"]['account'];  //抓帳號使用者傳給他

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$area = $_POST["area"];
$address = $_POST["address"];
$_FILES['myFile'];
/////////////////////////讀取 照片名稱
if ($_FILES["myFile"]["error"] == 0) {
    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], "../images/store_photo/" . $_FILES["myFile"]["name"])) {
        $fileName = $_FILES["myFile"]["name"];
        $sql = "UPDATE  store_info  SET  photo='$fileName' ,name='$name',phone='$phone',email='$email',address='$address'
        ,area='$area' WHERE account='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "資料照片更新成功! ";
                $_SESSION['update'] = 'success';
                header("location: user1.php");
        } else {
            echo "建立資料表錯誤: " . $conn->error;
        }
    }
}
/////////////單獨更新名稱電話地方
$sqln = "UPDATE  store_info  SET  name='$name',phone='$phone',email='$email',address='$address'
,area='$area' WHERE account='$id'";
if ($conn->query($sqln) === TRUE) {
// echo "資料照片更新成功! ";
$_SESSION['update'] = 'success';
header("location: user1.php");
}

?>
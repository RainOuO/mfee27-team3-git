<?php
require("../db-connect.php");
session_start();
$id = $_SESSION["user"]['account'];  //抓帳號使用者傳給他
$name=$_POST["name"];
// $trip1 = $_POST["trip1"];
// $Dining_room = $_POST["Dining_room"];
// $hotel= $_POST["hotel"];
// $product=$_POST["product"];


$sql = "UPDATE store_info SET 
store_right='$name' 
 WHERE account='$id'";


if ($conn->query($sql) === TRUE) {
    // echo "權限輸改成功! ";
    $_SESSION['update'] = 'success';
         header("location: user1.php");


    
} else {
    echo "建立資料表錯誤: " . $conn->error;
};

?>
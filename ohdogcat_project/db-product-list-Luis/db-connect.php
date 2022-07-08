<?php
//資料庫連線
$servername = "localhost";
$username = "admin";
$password = "0000";
$dbname = "team3_project";

$conn = new mysqli($servername, $username, $password , $dbname);
//檢查連線

// php裡面 ->代表是conn物件的其中一個方法或資訊connect_error
if ($conn->connect_error) {
    die("連線失敗:".$conn->connect_error);
}else {
    // echo "連線成功";
}

?>
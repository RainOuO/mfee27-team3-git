<?php
require("../db-connect.php");
if (!isset($_POST["name"])) {
    echo "沒有帶資料到本頁";
}

$name = $_POST["name"];
$description = $_POST["description"];
$discount_number = $_POST["discount_number"];
$start_time = $_POST["start_time"];
$end_time = $_POST["end_time"];
$now = date('Y-m-d H:i:s');

$sqlUpdate = "INSERT INTO discount_store (name, description, discount_number, start_time, end_time, create_time, valid) VALUES ('$name', '$description', '$discount_number', '$start_time', '$end_time', '$now', 1)";

// $conn->query($sql);


//有效 -> 1 無效 -> 2
$sql01 = "UPDATE discount_store set buyer_valid= 1 WHERE (start_time <= create_time) and (end_time >= create_time)";
$sql00 = "UPDATE discount_store set buyer_valid= 2 WHERE (start_time >= create_time) or (end_time <= create_time)";




if ($conn->query($sqlUpdate) === TRUE) {
    if (strtotime($now) < strtotime($end_time) && strtotime($now) > strtotime($start_time)) {
        $conn->query($sql01);
        $conn->query($sql00);
        // echo"111111";
    } else {
        $conn->query($sql01);
        $conn->query($sql00);
    }
    echo "新資料新增完成";
} else {
    echo "Error: " . $sqlUpdate . "<br>" . $conn->error;
}


$conn->close();
header("location:ST-discount-create.php");
exit;


// if (strtotime($now) < strtotime($end_time) && strtotime($now) > strtotime($start_time)) {
//     $sqlUpdate = "UPDATE discount_store set buyer_valid= 1 WHERE (start_time <= create_time) and (end_time >= reate_time)";
// } else {
//     $sqlUpdate = "UPDATE discount_store set buyer_valid= 0 WHERE(start_time >= create_time) OR (end_time <= create_time)";
// }
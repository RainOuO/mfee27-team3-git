<?php
require("../db-connect.php");
if(!isset($_POST["name"])){
    echo "沒有帶資料到本頁";
    exit;
}

$category_id=$_POST["category_id"];
$name=$_POST["name"];
$description=$_POST["description"];
$discount_number=$_POST["discount_number"];
$amount=$_POST["amount"];
$discount_code=$_POST["discount_code"];
// $upper_limit=$_POST["upper_limit"];
$lower_limit=$_POST["lower_limit"];
$start_time=$_POST["start_time"];
$end_time=$_POST["end_time"];
$now=date('Y-m-d H:i:s');
$buyer_valid=$_POST["buyer_valid"];
// echo $now;

// exit;

// echo "$name, $email, $phone";
$sql="INSERT INTO discount (category_id, name, description, amount, discount_number, discount_code, lower_limit, start_time, end_time, create_time, valid, buyer_valid) VALUES ('$category_id','$name', '$description', '$amount', '$discount_number', '$discount_code', '$lower_limit',  '$start_time', '$end_time', '$now', 1, 1)";

if ($conn->query($sql) === TRUE) {
    echo "新資料新增完成";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("location: create-discount.php");


?>
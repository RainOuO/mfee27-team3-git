<?php
if(!isset($_POST["name"])){
    echo "沒有帶資料";
    exit;
}
require("../db-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$description=$_POST["description"];
$discount_number=$_POST["discount_number"];
$start_time=$_POST["start_time"];
$end_time=$_POST["end_time"];

$sql="UPDATE discount_store SET name='$name', description='$description', discount_number='$discount_number', start_time='$start_time', end_time='$end_time' WHERE id=$id";


if ($conn->query($sql) === TRUE) {
    echo "資料表discount修改完成";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();

header("location: ../store-discount-edit/?id=".$id);
?>
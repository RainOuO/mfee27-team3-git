<?php
if(!isset($_POST["name"])){
    echo "沒有帶資料";
    exit;
}
require("../db-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$description=$_POST["description"];
$amount=$_POST["amount"];
// $discount_number=$_POST["discount_number"];
// $upper_limit=$_POST["upper_limit"];
$lower_limit=$_POST["lower_limit"];
$start_time=$_POST["start_time"];
$end_time=$_POST["end_time"];
echo $start_time;
echo "<br>";
echo $end_time;

$sql="UPDATE discount SET name='$name', description='$description', amount='$amount', lower_limit='$lower_limit', start_time='$start_time', end_time='$end_time' WHERE id=$id";


if ($conn->query($sql) === TRUE) {
    echo "資料表discount修改完成";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();

header("location: ../discount-edit/?id=".$id);
?>
<?php
require("../db-connect.php");

$id=$_GET["id"];
//真刪除->很危險!
// $sql="DELETE FROM users WHERE id='$id'";

$sql="UPDATE discount SET valid=0 WHERE id='$id'";
// echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}
header("location: ../discounts/")

?>
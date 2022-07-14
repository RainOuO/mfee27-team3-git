<?php
require("./db-connect.php");
$id=$_GET["id"];

// $sql="DELETE FROM users WHERE id='$id'";
// echo $sql;
$sqlDelete="UPDATE product SET valid=0 WHERE id='$id'";

$isDelete = $conn->query($sqlDelete) === TRUE;
$conn->close();

if ($isDelete) {
    header("location: allProductList.php");
} else {
    echo "商品刪除錯誤" . $conn->error;
}

?>

<?php
require("./db-connect.php"); //連結資料庫

$minPrice = isset($_GET["minPrice"]) ? $_GET["minPrice"] : 0;
$maxPrice = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : 9999;
// $maxPrice = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : ;

$sqlPrice = "SELECT * FROM product WHERE price>= $minPrice and price <= $maxPrice"; //選取資料表
// $sql = "SELECT product.*, catagory.name AS catagory_name FROM product
// JOIN catagory ON product.catagory_id = catagory.id WHERE product.price >= $minPrice and price <= $maxPrice ";
$resultPrice = $conn->query($sqlPrice); //連線
$product_countPrice = $resultPrice->num_rows; //取得資料筆數 
$rowsPrice = $resultPrice->fetch_all(MYSQLI_ASSOC);


?>
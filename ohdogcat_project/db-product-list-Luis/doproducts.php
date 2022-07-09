<?php

$page =isset($_GET["page"])?  $page = $_GET["page"]: 1;
$type = isset($_GET["type"]) && !empty($_GET["type"]) ? $_GET["type"] : "";


require("./db-connect.php");

// $sqltype1 = "SELECT product.*, p_type.id AS product_type FROM product
// JOIN p_type ON product.product_type = p_type.id
// $sqlWhere";

//側欄
$sqlCate =  "SELECT * FROM p_type WHERE valid=1";
$resultCate = $conn->query($sqlCate);
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);
$rowsCate1 = $resultCate->num_rows;

//標題
$sqltitle =  "SELECT * FROM p_type WHERE valid=1 AND id='$type'";
$resulttitle = $conn->query($sqltitle);
$rowstitle = $resulttitle->fetch_all(MYSQLI_ASSOC);


// $sqlAll = "SELECT * FROM product WHERE valid=1";
// $resultAll = $conn->query($sqlAll); //連線資料庫取得所有資料庫的欄位資料放入result
// // $productsCount = $resultAll->num_rows; //判斷資料欄數(筆數)放入userCount


//帶入頁碼
// $perPage = 5;
// $start = ($page - 1) * $perPage;
// //資料庫
// $sql = "SELECT * FROM product WHERE valid=1 LIMIT $start,5"; // //選取資料庫的所有欄位資料

// $result = $conn->query($sql);
// $productsCount = $result->num_rows;


// $starItem = ($page - 1) * $perPage + 1; //開始的筆數
// $endItem = $page * $perPage; //結束的筆數
// if ($endItem > $productsCount) {
//     $endItem = $productsCount;
// };


// $totalPage = 1;
// $quotient = floor($productsCount / $perPage);  //商數 取商數後無條件捨去floor
// $remainder = ($productsCount % $perPage); //餘數

// if ($remainder === 0) {
//     $totalPage = $quotient;
// } else {
//     $totalPage = $quotient + 1;
// }

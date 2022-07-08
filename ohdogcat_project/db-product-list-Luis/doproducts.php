<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
$id = $_SESSION["user"]['account'];
$store_right = $_SESSION["user"]['store_right'];
require("./db-connect.php");


if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

if (isset($_GET["store_id"])) {
    $store_id = $_GET["store_id"];
    $sqlSTORE = "AND store_id = $store_id";
} else {
    $store_id = "";
    $sqlSTORE = "";
}



require("./db-connect.php");

// $sqltype1 = "SELECT product.*, p_type.id AS product_type FROM product
// JOIN p_type ON product.product_type = p_type.id
// $sqlWhere";

//側欄
$sqlCate =  "SELECT * FROM p_type WHERE id='$store_right'";
$resultCate = $conn->query($sqlCate); 
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);
$rowsCate1 = $resultCate->num_rows;



///////////////撈最底下資料
$sqlCate =  "SELECT * FROM product WHERE id='$store_right'";
$resultCates = $conn->query($sqlCate); 
$rowsA = $resultCates->fetch_all(MYSQLI_ASSOC);

//標題
$sqltitle =  "SELECT * FROM p_type WHERE valid=1 AND id='$store_right'";
// echo "$sqltitle";
$resulttitle = $conn->query($sqltitle); 
$rowstitle = $resulttitle->fetch_all(MYSQLI_ASSOC);


$sqlAll = "SELECT * FROM product WHERE valid=1 AND product_category ='$store_right'";
$resultAll = $conn->query($sqlAll); //連線資料庫取得所有資料庫的欄位資料放入result
$rowstitle = $resulttitle->fetch_all(MYSQLI_ASSOC);

// $productsCount = $resultAll->num_rows; //判斷資料欄數(筆數)放入userCount


//////////////撈資料庫 下半部呈現畫面
$sqlAlll = "SELECT * FROM product WHERE valid=1 id='$store_right'";
$resultAlll = $conn->query($sqlAlll); //連線資料庫取得所有資料庫的欄位資料放入result
// $productsss = $resultAlll->fetch_assoc ( ); //判斷資料欄數(筆數)放入userCount


//帶入頁碼
$perPage =5;
$start = ($page - 1) * $perPage;
//資料庫
$sql = "SELECT * FROM product WHERE valid=1 AND $store_right  LIMIT $start,5";// //選取資料庫的所有欄位資料
// $sql = "SELECT * FROM product WHERE valid=1 AND $store_right AND $sqlSTORE LIMIT $start,5";// //選取資料庫的所有欄位資料


$sql1="SELECT * FROM product WHERE valid=1 AND $store_right ";
$result1 = $conn->query($sql1);
$productsCount1 = $result1->num_rows;
// var_dump($productsCount1);


$result = $conn->query($sql); //連線資料庫取得所有資料庫的欄位資料放入result
$productsCount = $result->num_rows;
// var_dump($productsCount);

$starItem = ($page - 1) * $perPage + 1; //開始的筆數
$endItem = $page * $perPage; //結束的筆數
if ($endItem > $productsCount) {
    $endItem = $productsCount;
};


$totalPage = 1;
$quotient = floor($productsCount1 / $perPage);  //商數 取商數後無條件捨去floor
$remainder = ($productsCount1 % $perPage); //餘數

if ($remainder === 0) {
    $totalPage = $quotient;
} else {
    $totalPage = $quotient + 1;
}
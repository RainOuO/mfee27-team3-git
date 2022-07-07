<?php
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

if (isset($_GET["type"])) {
    $type = $_GET["type"];
    $sqlTYPE = "AND product_type = $type";
} else {
    $type = "";
    $sqlTYPE = "";
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


$sqlCate =  "SELECT * FROM p_type WHERE valid=1 ";
$resultCate = $conn->query($sqlCate); 
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);

$sqlAll = "SELECT * FROM product WHERE valid=1";
$resultAll = $conn->query($sqlAll); //連線資料庫取得所有資料庫的欄位資料放入result
$productsCount = $resultAll->num_rows; //判斷資料欄數(筆數)放入userCount


//引入資料庫product
// $sqlAll = "SELECT * FROM product WHERE valid=1";
// $resultAll = $conn->query($sqlAll); //連線資料庫取得所有資料庫的欄位資料放入result
// $productsCount = $resultAll->num_rows; //判斷資料欄數(筆數)放入userCount


//帶入頁碼

$perPage = 10;
$start = ($page - 1) * $perPage;

$sql = "SELECT * FROM product WHERE valid=1 $sqlTYPE $sqlSTORE LIMIT $start,10";
// //選取資料庫的所有欄位資料
$result = $conn->query($sql); //連線資料庫取得所有資料庫的欄位資料放入result

$pageCount = $result->num_rows;

$starItem = ($page - 1) * $perPage + 1; //開始的筆數
$endItem = $page * $perPage; //結束的筆數
if ($endItem > $productsCount) {
    $endItem = $productsCount;
};
// var_dump($productsCount);
$totalPage = 0;
//$a= //商數;
$quotient = floor($productsCount / $perPage);  //商數 取商數後無條件捨去floor
$remainder = ($productsCount % $perPage); //餘數

if ($remainder === 0) {
    $totalPage = $quotient;
} else {
    $totalPage = $quotient + 1;
}
// var_dump($totalPage);
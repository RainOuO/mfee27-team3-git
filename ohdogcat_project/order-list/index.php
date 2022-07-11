<?php
header('Cache-Control:no-cache,must-revalidate');   
header('Pragma:no-cache');   
header("Expires:0"); 
session_start();
$css = './style.css';
$js = './main.js';
$main = './main.php';


require('../db-connect.php');
$store_id = 1;


// GET query-string
$page = (!isset($_GET["page"]) || empty($_GET["page"])) ? 1 : ($_GET["page"]);
$order = (!isset($_GET["order"]) || empty($_GET["order"])) ? 'DESC' : ($_GET["order"]);
$sort = (!isset($_GET["sort"]) || empty($_GET["sort"])) ? 'order_time' : ($sort = $_GET["sort"]);
$status = (isset($_GET["status"]) && $_GET["status"] != '') ? ($_GET["status"]):'';
$search = (!isset($_GET["search"]) || empty($_GET["search"])) ? '' : ($_GET["search"]);
$sqlStatus = ($status !== '')? "AND status = $status":'';
$sqlSearch = ($search !== '')? "((order_no LIKE '%$search%') OR (users.name LIKE '%$search%'))":'';
$sqlStoreId = ($search !== '')? "AND store_id = $store_id":"store_id = $store_id";

// 計算出所有資料共有幾列
$sqlAll = "SELECT * FROM order_product WHERE store_id = $store_id $sqlStatus";
$conn->query("SET NAMES UTF8");
$resultAll = $conn->query($sqlAll);
$resultAllCount = $resultAll->num_rows;

$perPage = 10;
$start = ($page-1) * $perPage;

// WHERE ((account LIKE '%$search%') OR (userName LIKE '%$search%') OR (email LIKE '%$search%') OR (phone LIKE '%$search%')) AND valid = 1;";store_id = $store_id $sqlStatus $sqlSearch

$sql = "SELECT order_product.*, users.name as userName FROM order_product 
JOIN users ON order_product.user_id = users.id
WHERE $sqlSearch $sqlStoreId $sqlStatus 
ORDER BY $sort $order
LIMIT $start, $perPage
";
// echo$sql;
$conn->query("SET NAMES UTF8");
$result = $conn->query($sql);
$result_count = $result->num_rows;
$rows = ($result_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';
// var_dump($rows);

$endItem = $start + $result_count;
$startItem = ($page-1) * $perPage + 1;
$totalPage = ceil($resultAllCount/$perPage);




$sqlUser = "SELECT id, name, email FROM users";
$conn->query("SET NAMES UTF8");
$resultUser = $conn->query($sqlUser);
$resultUser_count = $resultUser->num_rows;
$rowsUser = ($resultUser_count>0)? $resultUser->fetch_all(MYSQLI_ASSOC):'';
$userName = array_column($rowsUser, 'name', 'id');
$userEmail = array_column($rowsUser, 'email', 'id');


if($result_count>0) {
    for($i=0; $i<count($rows); $i++){
        $rows[$i]['userName'] = $userName[$rows[$i]['user_id']];
        $rows[$i]['userEmail'] = $userEmail[$rows[$i]['user_id']];
        switch($rows[$i]['status']) {
            case 0:
                $rows[$i]['status_css'] = [
                    "bg" => 'bg-secondary opacity-25',
                    "text" => 'text-secondary'
                ];
                $rows[$i]['status_text'] = "已取消";
                $rows[$i]['activeOrder'] = false;
                break;
            case 1:
                $rows[$i]['status_css'] = [
                    "bg" => 'bg-danger',
                    "text" => 'text-danger'
                ];
                $rows[$i]['status_text'] = "未確認";
                $rows[$i]['activeOrder'] = true;
                break;
            case 2:
                $rows[$i]['status_css'] = [
                    "bg" => 'bg-warning',
                    "text" => 'text-warning'
                ];
                $rows[$i]['status_text'] = "處理中";
                $rows[$i]['activeOrder'] = true;
                break;
            case 3:
                $rows[$i]['status_css'] = [
                    "bg" => 'bg-success',
                    "text" => 'text-success'
                ];
                $rows[$i]['status_text'] = "已結單";
                $rows[$i]['activeOrder'] = false;
                break;
        }
    };
}
$_SESSION["order-list"] = $rows;
require('../template/dashboard.php');
?>


<script>
    let goFilter = document.querySelectorAll('.go-filter');
    goFilter[0].addEventListener('click', (event)=>{
        let keyword = document.querySelector('#keyword').value;
        if (keyword != ''&& keyword != <?=$search?>) {
            location.href = `?status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&search=${keyword}&page=<?=$page?>`;
        }
        
    });
    goFilter[1].addEventListener('click', ()=>{

    });
    goFilter[2].addEventListener('click', ()=>{

    });
</script>
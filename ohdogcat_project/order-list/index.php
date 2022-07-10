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
$search = (!isset($_GET["search"]) || empty($_GET["search"])) ? '' : 'AND search = '.($_GET["search"]);
$sqlStatus = ($status !== '')? "AND status = $status":'';
$sqlSearch = ($search !== '')? "AND search = $search":'';

$sqlAll = "SELECT * FROM order_product WHERE store_id = $store_id $sqlStatus";
$resultAll = $conn->query($sqlAll);
$resultAllCount = $resultAll->num_rows;

$perPage = 10;
$start = ($page-1) * $perPage;


$sql = "SELECT * FROM order_product WHERE store_id = $store_id $sqlStatus
ORDER BY $sort $order
LIMIT $start, $perPage
";

$result = $conn->query($sql);
$result_count = $result->num_rows;
$rows = ($result_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';

$endItem = $start + $result_count;
$startItem = ($page-1) * $perPage + 1;
$totalPage = ceil($resultAllCount/$perPage);




$sqlUser = "SELECT id, name, email FROM users";
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
                $rows[$i]['status_text'] = "未結單";
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
    goFilter[0].addEventListener('click', ()=>{
        let keyword = document.querySelector('#keyword').value;
        location.href = 
    });
    goFilter[1].addEventListener('click', ()=>{

    });
    goFilter[2].addEventListener('click', ()=>{

    });
</script>
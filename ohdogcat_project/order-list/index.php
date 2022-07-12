<?php
session_start();
$time = date('njGis');
$css = "./style.css?$time";
$js = "./main.js?$time";
$main = "./main.php";
$header = "./header.php";
$filterSection = "./filter-section.php";
$footer = "./footer.php";


require('../db-connect.php');
$store_id = 1;


// GET query-string
$page = (!isset($_GET["page"]) || empty($_GET["page"])) ? 1 : ($_GET["page"]);
$order = (!isset($_GET["order"]) || empty($_GET["order"])) ? 'DESC' : ($_GET["order"]);
$sort = (!isset($_GET["sort"]) || empty($_GET["sort"])) ? '' : ($sort = $_GET["sort"]);
$sqlSort = (!isset($_GET["sort"]) || empty($_GET["sort"])) ? 'order_time' : ($sort = $_GET["sort"]);
$status = (isset($_GET["status"]) && $_GET["status"] != '') ? ($_GET["status"]):'';
$search = (!isset($_GET["search"]) || empty($_GET["search"])) ? '' : ($_GET["search"]);
$dateStart = (!isset($_GET["dateStart"]) || empty($_GET["dateStart"])) ? '' : ($_GET["dateStart"]);
$dateEnd = (!isset($_GET["dateEnd"]) || empty($_GET["dateEnd"])) ? '' : ($_GET["dateEnd"]);
$dateStart_sql = ($dateStart != '')? date("$dateStart 00:00:00"):'';
$dateEnd_sql = ($dateEnd != '')? date("$dateEnd 23:59:59"):'';
$priceMin = (!isset($_GET["priceMin"]) || empty($_GET["priceMin"])) ? '' : ($_GET["priceMin"]);
$priceMax = (!isset($_GET["priceMax"]) || empty($_GET["priceMax"])) ? '' : ($_GET["priceMax"]);
$sqlStatus = ($status !== '')? "AND status = $status":'';
$sqlSearch = ($search !== '')? "((order_no LIKE '%$search%') OR (users.name LIKE '%$search%'))":'';
$sqlStoreId = ($search !== '')? "AND store_id = $store_id":"store_id = $store_id";
$sqlDate = ($dateStart != '' && $dateEnd != '')? "AND (order_time BETWEEN '$dateStart_sql' AND '$dateEnd_sql')":'';
$sqlPrice = ($priceMin != '' && $priceMax != '')? "AND (total BETWEEN '$priceMin' AND '$priceMax')":'';

if($sort == 'total'){
    $sort_text = '總價';
}else if($sort == 'order_time'){
    $sort_text = '下單時間';
}


// 計算出所有資料共有幾列
$sqlAll = "SELECT * FROM order_product WHERE store_id = $store_id $sqlStatus";
$conn->query("SET NAMES UTF8");
$resultAll = $conn->query($sqlAll);
$resultAllCount = $resultAll->num_rows;

$perPage = 10;
$start = ($page-1) * $perPage;

// 主要 query 語法
$sql = "SELECT order_product.*, users.name as userName FROM order_product 
JOIN users ON order_product.user_id = users.id
WHERE $sqlSearch $sqlStoreId $sqlStatus $sqlDate $sqlPrice
ORDER BY $sqlSort $order
LIMIT $start, $perPage
";
$conn->query("SET NAMES UTF8");
$result = $conn->query($sql);
$result_count = $result->num_rows;
$rows = ($result_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';

$endItem = $start + $result_count;
$startItem = ($page-1) * $perPage + 1;
$totalPage = ceil($resultAllCount/$perPage);



// 用來關聯的表
$sqlUser = "SELECT id, name, email FROM users";
$conn->query("SET NAMES UTF8");
$resultUser = $conn->query($sqlUser);
$resultUser_count = $resultUser->num_rows;
$rowsUser = ($resultUser_count>0)? $resultUser->fetch_all(MYSQLI_ASSOC):'';
$userName = array_column($rowsUser, 'name', 'id');
$userEmail = array_column($rowsUser, 'email', 'id');

// 把狀態寫入陣列中帶給 api
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
    if(<?=($sqlDate!='')?'true':'false';?>){
        let filters = document.querySelectorAll('.filters');
        filters[0].style['display'] = 'none';
        filters[1].style['display'] = 'block';
        filters[2].style['display'] = 'none';

    }else if(<?=($sqlPrice!='')?'true':'false';?>){
        let filters = document.querySelectorAll('.filters');
        filters[0].style['display'] = 'none';
        filters[1].style['display'] = 'none';
        filters[2].style['display'] = 'block';
    }




    let goFilter = document.querySelectorAll('.go-filter');
    goFilter[0].addEventListener('click', (event)=>{
        let keyword = document.querySelector('#keyword').value;
        if (keyword != ''&& keyword != '<?=$search?>') {
            location.href = `?status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&search=${keyword}&page=<?=$page?>`;
        }
        
    });
    goFilter[1].addEventListener('click', ()=>{
        let dateRange = document.querySelectorAll('.date-range');
        let dateStart = dateRange[0].value;
        let dateEnd = dateRange[1].value
        if(dateStart == '' || dateEnd == ''){
            Swal.fire(
                '日期格式錯誤',
                '請正確填入起始與結束日期',
                'warning'
            )
        }else if(dateStart > dateEnd){
            Swal.fire(
                '日期格式錯誤',
                '起始日期不得大於結束日期',
                'warning'
            )
        }else{
            if(dateStart != '<?=$dateStart?>' && dateEnd != '<?=$dateEnd?>'){
                location.href = `?status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&dateStart=${dateStart}&dateEnd=${dateEnd}&page=<?=$page?>`;
            }
            
        }
    });
    goFilter[2].addEventListener('click', ()=>{
        let priceRange = document.querySelectorAll('.price-range');
        let priceMin = Number(priceRange[0].value);
        let priceMax = Number(priceRange[1].value);
        if(priceMin == '' || priceMax == ''){
            Swal.fire(
                '金額格式錯誤',
                '請正確填入金額最小值與最大值',
                'warning'
            )
        }else if(priceMin > priceMax){
            Swal.fire(
                '金額格式錯誤',
                '金額最小值不得大於最大值',
                'warning'
            )
        }else{
            if(priceMin != '<?=$priceMin?>' && priceMax != '<?=$priceMax?>'){
                location.href = `?status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&priceMin=${priceMin}&priceMax=${priceMax}&page=<?=$page?>`;
            }
        }
    });
</script>
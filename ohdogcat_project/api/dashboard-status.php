<?php
session_start();
require('../db-connect.php');
$id = $_SESSION['user']['id']; 
$todayStart = date('Y-m-d 00:00:00');
$todayEnd = date('Y-m-d 23:59:59');
$thisMonth = date('Y-m-1 00:00:00');
$day_1 = date( "Y-m-d 00:00:00", strtotime(" -7 day"));
$day_2 = date( "Y-m-d 00:00:00", strtotime(" -6 day"));
$day_3 = date( "Y-m-d 00:00:00", strtotime(" -5 day"));
$day_4 = date( "Y-m-d 00:00:00", strtotime(" -4 day"));
$day_5 = date( "Y-m-d 00:00:00", strtotime(" -3 day"));
$day_6 = date( "Y-m-d 00:00:00", strtotime(" -2 day"));
$day_7 = date( "Y-m-d 00:00:00", strtotime(" -1 day"));
$today = date( "Y-m-d 00:00:00", strtotime(" -0 day"));

$daysArr =[ $day_1, $day_2, $day_3, $day_4, $day_5, $day_6, $day_7, $today];

for($i=0; $i<count($daysArr); $i++){
    $daysArr[$i] = strtotime($daysArr[$i])-1;
}


$todayTotal = 0;
$todayOrders = [];
$todayNewItems = 0;
$intervalOrders = [0, 0, 0, 0, 0, 0, 0];
$intervalDate = [date( "m/d", strtotime(" -7 day")), date( "m/d", strtotime(" -6 day")), date( "m/d", strtotime(" -5 day")), date( "m/d", strtotime(" -4 day")), date( "m/d", strtotime(" -3 day")), date( "m/d", strtotime(" -2 day")), date( "m/d", strtotime(" -1 day"))];


$sql = "SELECT * FROM order_product WHERE (store_id = $id) AND (order_time BETWEEN '$day_1' AND '$todayEnd')";
$result = $conn->query($sql);
$count = $result->num_rows;
if($count>0){
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    for($i=0; $i<count($daysArr); $i++){ //針對八個時間點運算
        if($i == (count($daysArr)-1)){ //若是計算今天訂單的情況
            foreach($rows as $row){
                if(strtotime($row['order_time']) > $daysArr[$i]){
                    $todayTotal = $todayTotal + $row['total']; 
                    array_push($todayOrders, $row);
                    $todayNewItems = ($row['status'] == 1)? ($todayNewItems + 1) : $todayNewItems;
                }
            }
        }else{
            foreach($rows as $row){
                if(strtotime($row['order_time']) > $daysArr[$i] && strtotime($row['order_time']) <= $daysArr[$i+1]){
                    $intervalOrders[$i] = $intervalOrders[$i]+1;
                }
            }
        }
    }
}


$todayOrdersAmount = count($todayOrders);



$sqlStatus = "SELECT total, status FROM order_product WHERE (store_id = $id) AND (order_time BETWEEN '$day_1' AND '$todayEnd')";
$resultStatus = $conn->query($sqlStatus);
$countStatus = $resultStatus->num_rows;
$status = [
    'newOrder' => 0,
    'inProcess' => 0,
    'finished' => 0,
    'cancelled' => 0
];
$monthTotal = 0;
if($countStatus>0){
    $rowsStatus = $resultStatus->fetch_all(MYSQLI_ASSOC);
    foreach($rowsStatus as $row){
        $monthTotal = $monthTotal + $row['total'];
        switch ($row['status']){
            case 0:
                $status['cancelled'] = $status['cancelled'] + 1;
                break;
            case 1:
                $status['newOrder'] = $status['newOrder'] + 1;
                break;
            case 2:
                $status['inProcess'] = $status['inProcess'] + 1;
                break;
            case 3:
                $status['finished'] = $status['finished'] + 1;
                break;
        }
    }
}

// echo"<br>本月營業額<br>";
// var_dump($monthTotal);
// echo"<br>今日營業額<br>";
// var_dump($todayTotal);
// echo"<br>今日訂單數<br>";
// var_dump($todayOrdersAmount);
// echo"<br>未處理訂單<br>";
// var_dump($todayNewItems);
// echo"<br>最近七日數字<br>";
// var_dump($intervalOrders);
// echo"<br>本月訂單狀態<br>";
// var_dump($status);



$data = [
    "data" => [
        'revenueMonth' => $monthTotal,
        'revenueToday' => $todayTotal,
        'amountToday' => $todayOrdersAmount,
        'newItemToday' => $todayNewItems,
        'intervalOrders' => $intervalOrders,
        'ordersStatusByMonth' => $status,
        'intervalDate' => $intervalDate
    ]
];

echo json_encode($data);
?>
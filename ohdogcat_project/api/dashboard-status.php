<?php
session_start();
require('../db-connect.php');
$id = 1; //$_SESSION['user']['id'];
$todayStart = date('Y-m-d 00:00:00');
$todayEnd = date('Y-m-d 23:59:59');
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

for($i=0; $i<count($daysArr); $i++){ //針對八個時間點運算
    if($i == count($daysArr)-1){ //若是計算今天訂單的情況
        foreach($rows as $row){
            if(strtotime($row['order_time']) > $daysArr[$i]){
                $todayTotal = $todayTotal + $row['total']; 
                array_push($todayOrders, $row);
            }
        }
    }
}


// $sql = "SELECT * FROM order_product WHERE (store_id = 1) AND (order_time BETWEEN '$day_1' AND '$day_7_end')";
// $result = $conn->query($sql);
// $count = $result->num_rows;
// if($count>0){
//     $rows = $result->fetch_all(MYSQLI_ASSOC);
//     $todayTotal = 0;
//     $todayOrders = [];
//     $intervalOrders = [0, 0, 0, 0, 0, 0, 0];
//     foreach($rows as $row){
//         if(strtotime($row['order_time']) > strtotime($day_7_end)){
//             $todayTotal = $todayTotal + $row['total']; 
//             array_push($todayOrders, $row);
//         }else if(strtotime($row['order_time']) >= strtotime($day_7)){

//         };
        
//     }
// }

// $sqlInterval = "SELECT * FROM order_product WHERE (store_id = 1) AND (order_time BETWEEN '$day_1' AND '$day_7_end')";


?>
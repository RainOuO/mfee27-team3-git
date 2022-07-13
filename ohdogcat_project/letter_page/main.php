<?php
require("../../db-connect.php");


// session 資料處理
$store_id = $_SESSION['user']['store_id'];

// get 資料處理
$order = isset($_GET['order']) ? $_GET['order'] : 1;
$type = isset($_GET['type']) ? $_GET['type'] : "";

// 排序開關
switch($order){
    case 1:
        $orderType="time ASC";
        break;
    case 2:
        $orderType="time DESC";
        break;
    case 3:
        $orderType="reply_status ASC";
        break;
    case 4:
        $orderType="reply_status DESC";
        break;
    default:
        $orderType="ASC";
}

// 列表顯示判斷
if( $type == 1 ){
    // $sqlUserId = "SELECT * FROM letter letter_1 where user_id = 1 order by 'ASC'";
    // $sqlUserId = "SELECT * FROM letter letter_1 where user_id = 1 AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id AND letter_1.store_id = letter.store_id ) order by $orderType";
    $sqlWhere = "user_id = 1 order by 'ASC'";
}elseif( $type == 2){
    // $sqlUserId = "SELECT * FROM letter letter_1 where user_id > 1 AND store_id = $store_id AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id AND letter_1.store_id = letter.store_id ) order by $orderType";
    $sqlWhere = "user_id > 1 AND store_id = $store_id AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id AND letter_1.store_id = letter.store_id ) order by $orderType";
}else{
    // $sqlUserId = "SELECT * FROM letter letter_1 where (store_id = $store_id OR user_id = 1) AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id) order by $orderType";
    // $sqlUserId = "SELECT * FROM letter letter_1 where time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id) ORDER BY $orderType";
    $sqlWhere = "time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id) ORDER BY $orderType";
}

$sqlUserId ="SELECT * FROM letter letter_1 where $sqlWhere";
$resultUserId = $conn->query($sqlUserId);
$UserIdCount = $resultUserId->num_rows;
$rowsUserId = $resultUserId->fetch_all(MYSQLI_ASSOC);

// // 取得重複 user_id 裡，時間最新(大)的資料
// $sqlUserId = "SELECT * FROM letter letter_1 
// where store_id = $store_id AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id) ORDER BY $orderType";

// 利用關聯式陣列，查詢出 user_id 的 name
$sqlUserName = "SELECT id,name FROM users";
$resultUserName = $conn->query($sqlUserName);
$rowsUserName = $resultUserName->fetch_all(MYSQLI_ASSOC);
$userName = array_column($rowsUserName, "name", "id");
?>

<div class="main-content p-4">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
        <h1>信件匣</h1>
        <div class="row" role="">
            <form class="col-auto" action="index.php" method="get">
                <input type="hidden" name="type">
                <button class="btn catBtn my-3 rounded-0" type="submit">所有信件</button>
            </form>
            <form class="col-auto" action="index.php" method="get">
                <input type="hidden" name="type" value="1">
                <button class="btn catBtn my-3 rounded-0" type="submit">系統信件列表</button>
            </form>
            <form class="col-auto" action="index.php" method="get">
                <input type="hidden" name="type" value="2">
                <button class="btn catBtn my-3 rounded-0" type="submit">顧客信件列表</button>
            </form>
        </div>
    </div>
    <div class="row mt-3 g-3 justify-content-start">
        <div class="col-6">
            <div class="row">
                <div class="col-auto">
                    <h5>用戶搜尋</h5>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" placeholder="請輸入關鍵字">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn filterBtn">搜尋</button>
                </div>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center mt-3">
            <a href="index.php?order=1" class="orderBtn col-3 <?php if($order==1) echo "active" ?>">回覆時間↑</a>
            <a href="index.php?order=2" class="orderBtn col-3 <?php if($order==2) echo "active" ?>">回覆時間↓</a>
            <a href="index.php?order=3" class="orderBtn col-2 <?php if($order==3) echo "active" ?>">已回覆↓</a>
            <a href="index.php?order=4" class="orderBtn col-2 <?php if($order==4) echo "active" ?>">未回覆↓</a>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end align-items-center">
        <div class="countBox">
            <h4 class="countBox">共 <?= $UserIdCount; ?> 筆</h4>
        </div>
    </div>
    <!-- <h2>Second title</h2> -->
    <div class="table-responsive">
        <table class="table table-sm justify-content-between align-items-center">
            <thead>
                <tr>
                    <th class="align-middle text-center">用戶名稱</th>
                    <th class="align-middle text-center">內容</th>
                    <th class="align-middle text-center">建立時間</th>
                    <th class="align-middle text-center">狀態</th>
                    <th class="align-middle text-center">編修</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rowsUserId as $row) : ?>
                    <tr>
                        <td class="align-middle text-center"><?= $userName[$row['user_id']]; ?></td>
                        <td class="align-middle text-start single-ellipsis"><?= $row['content']; ?></td>
                        <td class="align-middle text-center"><?= $row['time']; ?></td>
                        <td class="align-middle text-center"><?php if($row['reply_status'] ==1){ echo "未回覆";}else{ echo "已回覆";};?></td>
                        <td><a class="btn catBtn" href="reply-letter.php?user_id=<?=$row['user_id']?>">回覆</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
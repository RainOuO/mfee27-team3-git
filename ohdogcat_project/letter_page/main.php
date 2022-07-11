<?php

require("../../db-connect.php");

// session 資料處理

$store_id = $_SESSION['user']['store_id'];

var_dump($store_id);
echo "<br>";

// 選取 letter表
// $sql = "SELECT * FROM letter";
// $result = $conn->query($sql);
// $letterCount = $result->num_rows;
// $rows = $result->fetch_all(MYSQLI_ASSOC);

// 取得重複 user_id 裡，時間最新(大)的資料 - 試做1
// $sqlUserId = "SELECT user_id, content, MAX(time)  FROM letter GROUP BY user_id";
// $resultUserId = $conn -> query($sqlUserId);
// $UserIdCount = $resultUserId -> num_rows;
// $rowsUserId = $resultUserId -> fetch_all(MYSQLI_ASSOC);


// 取得重複 user_id 裡，時間最新(大)的資料
$sqlUserId = "SELECT * FROM letter letter_1 
where store_id = $store_id AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id) order by time";
$resultUserId = $conn->query($sqlUserId);
$UserIdCount = $resultUserId->num_rows;
$rowsUserId = $resultUserId->fetch_all(MYSQLI_ASSOC);

var_dump($resultUserId);

// var_dump($UserIdCount);

?>

<div class="main-content p-4">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
        <h1>信件匣</h1>
        <div class="row" role="">
            <form class="col-6" action="test.php" method="get">
                <input type="hidden" name="type" value="1">
                <button class="btn catBtn my-3 rounded-0" type="submit">系統信件列表</button>
            </form>
            <form class="col-6" action="test.php" method="get">
                <input type="hidden" name="type" value="2">
                <button class="btn catBtn my-3 rounded-0" type="submit">顧客信件列表</button>
            </form>
        </div>
    </div>
    <div class="row mt-3 g-3 justify-content-start">
        <div class="col-2">
            <button type="button" class="btn searchBtn">篩選條件 ▸</button>
        </div>
        <div class="col-2">
            <input type="text" class="form-control" placeholder="請輸入關鍵字">
        </div>
        <div class="col-2">
            <button type="button" class="btn searchBtn">搜尋</button>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center mt-3">
            <a href="" class="orderBtn col-2">已回覆</a>
            <a href="" class="orderBtn col-2">未回覆</a>
            <a href="" class="orderBtn col-3">建立時間↑</a>
            <a href="" class="orderBtn col-3">建立時間↓</a>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end align-items-center">
        <div class="countBox">
            <h4 class="countBox">以下訊息共: <?= $UserIdCount; ?>筆</h4>
        </div>
    </div>
    <!-- <h2>Second title</h2> -->
    <div class="table-responsive">
        <table class="table table-sm justify-content-between align-items-center">
            <thead>
                <tr>
                    <th class="align-middle text-center">聯絡人</th>
                    <th class="align-middle text-center">內容</th>
                    <th class="align-middle text-center">建立時間</th>
                    <th class="align-middle text-center">狀態</th>
                    <th class="align-middle text-center">編修</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rowsUserId as $row) : ?>
                    <tr>
                        <td class="align-middle text-center"><?= $row['user_id']; ?></td>
                        <td class="align-middle text-start"><?= $row['content']; ?></td>
                        <td class="align-middle text-center"><?= $row['time']; ?></td>
                        <td class="align-middle text-center">已回覆</td>
                        <td><a class="btn catBtn" href="reply-letter.php?user_id=<?=$row['user_id']?>">回覆</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
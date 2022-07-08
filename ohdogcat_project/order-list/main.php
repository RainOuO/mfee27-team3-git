<?php
require('../db-connect.php');
$store_id = 1;
$sql = "SELECT * FROM order_product WHERE store_id = $store_id";
$result = $conn->query($sql);
$result_count = $result->num_rows;
$rows = ($result_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';

$sqlUser = "SELECT id, name FROM users";
$resultUser = $conn->query($sqlUser);
$resultUser_count = $resultUser->num_rows;
$rowsUser = ($resultUser_count>0)? $resultUser->fetch_all(MYSQLI_ASSOC):'';
$userName = array_column($rowsUser, 'name', 'id');

$sqlListDetail = "SELECT name FROM users";
$resultListDetail = $conn->query($sqlListDetail);
$resultListDetail_count = $resultListDetail->num_rows;
$rowsListDetail = ($resultListDetail_count>0)? $resultListDetail->fetch_all(MYSQLI_ASSOC):'';
// var_dump($rows);
?>

<div class="table-responsive pt-3">
    <?php if($result_count>0): ?>
    <table class="table table-sm table-hover transition-3">
        <thead>
            <tr>
                <th class="align-middle px-0">訂單序號</th>
                <th class="align-middle px-0">用戶暱稱</th>
                <th class="align-middle px-0">總價</th>
                <th class="align-middle px-0">狀態</th>
                <th class="align-middle px-0">訂單時間</th>
                <th class="align-middle px-0"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row):?>
            <tr class="<?= ($row['status'] == 0)? '':'text-secondary'; ?>">
                <td class="align-middle"><?= $row['order_no'] ?></td>
                <td class="align-middle"><?= $userName[$row['user_id']] ?></td>
                <td class="align-middle"><?= $row['total'] ?></td>
                <td class="align-middle <?= ($row['status'] == 0)? 'text-danger':''; ?>"><?= ($row['status'] == 0)? '未結單':'已結單'; ?></td>
                <td class="align-middle"><?= $row['order_time'] ?></td>
                <td class="align-middle text-center">
                    <button type="button" class="btn detailBtn">查看</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <h3>目前尚無訂單</h3>
    <?php endif; ?>
</div>
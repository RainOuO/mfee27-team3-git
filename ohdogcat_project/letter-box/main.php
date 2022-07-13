
<div class="main-content p-4">
    <!-- <h2>Second title</h2> -->
    <div class="table-responsive">
        <table class="table table-sm justify-content-between align-items-center table-hover">
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
                        <td class="align-middle text-center"><a class="btn catBtn" href="../letter-reply/?user_id=<?=$row['user_id']?>">回覆</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
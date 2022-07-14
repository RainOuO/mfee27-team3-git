<div class="main-content p-4">
    <!-- <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
        <h1>信件匣</h1>
        <div class="row" role="">
            <form class="col-auto" action="index.php" method="get">
                <input type="hidden" >
                <button class="btn catBtn my-3 rounded-0" type="submit">所有信件</button>
            </form>
            <form class="col-auto" action="index.php?type=<?= $type ?>" method="get">
                <input type="hidden" name="type" value="1">
                <button class="btn catBtn my-3 rounded-0" type="submit">系統信件列表</button>
            </form>
            <form class="col-auto" action="index.php?type=<?= $type ?>" method="get">
                <input type="hidden" name="type" value="2">
                <button class="btn catBtn my-3 rounded-0" type="submit">顧客信件列表</button>
            </form>
        </div>
    </div> -->

    <!-- <h2>Second title</h2> -->
    <div class="table-responsive">
        <?php if ($listCount  > 0) : ?>
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
                            <td class="align-middle text-center"><?php if ($row['reply_status'] == 1) {echo "未回覆";} else { echo "已回覆";}; ?></td>
                            <td class="align-middle text-center"><a class="btn catBtn" href="../letter-reply/?user_id=<?= $row['user_id'] ?>">回覆</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                            <a type="role" class="btn darkblueBtn <?php if ($i == $page) echo 'active'; ?>" href="index.php?order=<?= $order ?>&type=<?= $type ?>&page=<?= $i ?>"><?= $i ?></a>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        <?php else : ?>
            目前沒有資料
        <?php endif; ?>
    </div>
</div>
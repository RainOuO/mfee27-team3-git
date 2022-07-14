<div class="container">
    <?php if ($userCount > 0) :
                                $row = $result->fetch_assoc(); ?>
    <form action="doUpdate.php" method="post">
        <input name="id" type="hidden" value="<?= $row["id"] ?>">
        <table class="table ">
            <tr>
                <th>優惠券編號</th>
                <td><?= $row["id"] ?></td>
            </tr>
            <tr>
                <th>優惠券名稱</th>
                <td><input type="text" name="name" class="form-control" value="<?= $row["name"] ?>"></td>
            </tr>
            </tr>
            <tr>
                <th>優惠券簡述</th>
                <td><input type="text" name="description" class="form-control" value="<?= $row["description"] ?>"></td>
            </tr>
            <tr>
                <th>庫存數量</th>
                </th>
                <td><input type="text" name="amount" class="form-control"
                        value="<?= $row["amount"] ?>"></td>
            </tr>
            <tr>
                <th>最低使用金額</th>
                </th>
                <td><input type="number" name="lower_limit" class="form-control" value="<?= $row["lower_limit"] ?>">
                </td>
            </tr>
            <tr>
                <th>啟用日期</th>
                </th>
                <td><input type="date" name="start_time" class="form-control" value="<?= $row["start_time"] ?>"></td>
            </tr>
            <tr>
                <th>失效日期</th>
                </th>
                <td><input type="date" name="end_time" class="form-control" value="<?= $row["end_time"] ?>"></td>
            </tr>
        </table>
        <div class="py-2">
            <div class="d-flex justify-content-end">

                <div class="py-2">
                    <a href="../discounts/" class="btn lightblueBtn mx-2">回折價券列表</a>
                </div>
                <div class="py-2">
                    <button class="btn yellowBtn" type="submit">儲存</button>
                </div>
            </div>
        </div>

    </form>
    <?php else : ?>
    沒有該使用者
    <?php endif; ?>
</div>
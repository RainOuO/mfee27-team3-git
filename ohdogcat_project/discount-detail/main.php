<div class="container">
    <?php if ($userCount > 0) :
                                $row = $result->fetch_assoc(); ?>

    <table class="table table-hover">
        <tr>
            <th>優惠券編號</th>
            <td><?= $row["id"] ?></td>
        </tr>
        <tr>
            <th>優惠券名稱</th>
            <td><?= $row["name"] ?></td>
        </tr>
        <tr>
            <th>優惠券簡述</th>
            <td><?= $row["description"] ?></td>
        </tr>
        <tr>
            <th>庫存數量</th>
            <td><?= $row["amount"] ?></td>
        </tr>
        <tr>
            <th>折扣數字</th>
            <td><?= $row["discount_number"] ?></td>
        </tr>
        <tr>
            <th>優惠序號</th>
            <td><?= $row["discount_code"] ?></td>
        </tr>
        <tr>
            <th>最低使用金額</th>
            <td><?php
                                            if ($row["lower_limit"] == 0) {
                                                echo "未設定";
                                            } else {
                                                echo $row["lower_limit"];
                                            } ?></td>
        </tr>
        <tr>
            <th>啟用日期</th>
            <td><?= $row["start_time"] ?></td>
        </tr>
        <tr>
            <th>失效日期</th>
            <td><?= $row["end_time"] ?></td>
        </tr>
        <th>狀態</th>
        <td><?php
                                        if ($row["buyer_valid"] == 2) {
                                            echo "失效";
                                        } else {
                                            echo "有效";
                                        } ?>
        </td>
    </table>
    <div class="py-2">
        <div class="d-flex justify-content-end">
            <a href="doDelete.php?id=<?= $row["id"] ?>" class="mx-1 btn btn-danger py-2">刪除</a>
            <button type="button" class="btn lightblueBtn mx-1">
                <a class="bBtn" href="../discounts/?id=<?= $row["id"] ?>" class="  btn-info">取消變更</a>
            </button>
            <button type="button" class="btn yellowBtn mx-1">
                <a class="yBtn" href="../discount-edit/?id=<?= $row["id"] ?>">前往修改</a>
            </button>
        </div>
    </div>
    <?php else : ?>
    沒有該使用者
    <?php endif; ?>
</div>
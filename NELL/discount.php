<?php
if (!isset($_GET["id"])) {
    echo "沒有參數";
    // exit;
}
$id = $_GET["id"];

require("../db-connect.php");
$sql = "SELECT * FROM discount WHERE id=$id AND valid=1";

$result = $conn->query($sql);
$userCount = $result->num_rows;

?>



<!doctype html>
<html lang="en">

<head>
    <title>Discount</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <?php if ($userCount > 0) :
            $row = $result->fetch_assoc(); ?>
            <div class="py-2">
                <a href="discounts.php?id=<?= $row["id"] ?>" class="btn btn-info">取消</a>
            </div>

            <table class="table">
                <tr>
                    <th>優惠券No.</th>
                    <td><?= $row["id"] ?></td>
                </tr>
                <tr>
                    <th>優惠券分類</th>
                    <td><?php
                        if ($row["category_id"] == 1) {
                            echo "%數折扣券";
                        } else {
                            echo "現金折扣券";
                        }
                        ?></td>
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
                        echo "未生效/已過期";
                    } else {
                        echo "有效";
                    } ?>
                </td>
            </table>
            <div class="py-2">
                <div class="d-flex justify-content-between">
                    <a class="btn btn-info" href="discount-edit.php?id=<?= $row["id"] ?>">修改</a>
                    <a href="doDelete.php?id=<?= $row["id"] ?>" class="btn btn-danger">刪除</a>
                </div>
            </div>
        <?php else : ?>
            沒有該使用者
        <?php endif; ?>
    </div>
</body>

</html>
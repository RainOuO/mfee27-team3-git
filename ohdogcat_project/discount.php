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
                    <th>Id</th>
                    <td><?= $row["id"] ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?= $row["name"] ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?= $row["description"] ?></td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td><?= $row["amount"] ?></td>
                </tr>
                <tr>
                    <th>Discount number</th>
                    <td><?= $row["discount_number"] ?></td>
                </tr>
                <tr>
                    <th>Discount code</th>
                    <td><?= $row["discount_code"] ?></td>
                </tr>
                <tr>
                    <th>Lower Limit</th>
                    <td><?php
                        if ($row["lower_limit"] == 0) {
                            echo "未設定";
                        } else {
                            echo $row["lower_limit"];
                        } ?></td>
                </tr>
                <tr>
                    <th>Upper Limit</th>
                    <td>
                        <?php
                        if ($row["upper_limit"] == 0) {
                            echo "未設定";
                        } else {
                            echo $row["upper_limit"];
                        } ?></td>
                </tr>
                <tr>
                    <th>Start time</th>
                    <td><?= $row["start_time"] ?></td>
                </tr>
                <tr>
                    <th>End time</th>
                    <td><?= $row["end_time"] ?></td>
                </tr>
                <th>狀態</th>
                <td><?php
                    if ($row["buyer_valid"] == 0) {
                        echo "未啟用";
                    } else {
                        echo "啟用中";
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
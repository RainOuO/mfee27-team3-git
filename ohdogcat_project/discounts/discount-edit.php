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
    <title>Discount Edit</title>
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
                <a href="discounts.php" class="btn btn-info">回折價券列表</a>
            </div>
            <form action="doUpdate.php" method="post">
                <input name="id" type="hidden" value="<?= $row["id"] ?>">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <td><?= $row["id"] ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name" class="form-control" value="<?= $row["name"] ?>"></td>
                    </tr>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><input type="text" name="description" class="form-control" value="<?= $row["description"] ?>"></td>
                    </tr>
                    <tr>
                        <th>Discount number</th>
                        </th>
                        <td><input type="text" name="discount_number" class="form-control" value="<?= $row["discount_number"] ?>"></td>
                    </tr>
                    <tr>
                        <th>Lower Limit</th>
                        </th>
                        <td><input type="number" name="lower_limit" class="form-control" value="<?= $row["lower_limit"] ?>"></td>
                    </tr>
                    <tr>
                        <th>Upper Limit</th>
                        </th>
                        <td><input type="number" name="upper_limit" class="form-control" value="<?= $row["upper_limit"] ?>"></td>
                    </tr>

                    <tr>
                        <th>Start time</th>
                        </th>
                        <td><input type="date" name="start_time" class="form-control" value="<?= $row["start_time"] ?>"></td>
                    </tr>
                    <tr>
                        <th>End time</th>
                        </th>
                        <td><input type="date" name="end_time" class="form-control" value="<?= $row["end_time"] ?>"></td>
                    </tr>
                </table>
                <div class="py-2">
                    <button class="btn btn-info" type="submit">儲存</button>
                </div>
            </form>
        <?php else : ?>
            沒有該使用者
        <?php endif; ?>
    </div>
</body>

</html>
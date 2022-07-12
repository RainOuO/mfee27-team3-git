<?php
//搜尋用GET較好
require("../db-connect.php");

if (!isset($_GET["search"])) {
    $search = "";
    $userCount = 0;
} else {
    $search = $_GET["search"];

    //須完全符合
    // $sql = "SELECT id, account, name, email, phone FROM users WHERE account = '$search'";

    //模糊比對
    $sql = "SELECT id, name, description,amount, discount_number,discount_code,start_time,end_time FROM discount WHERE name LIKE '%$search%'";

    $result = $conn->query($sql);
    $userCount = $result->num_rows;
}




?>


<!doctype html>
<html lang="en">

<head>
    <title>Discount Search</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="py-2">
            <a href="discounts.php" class="btn btn-info">User List</a>
            <form action="discount-search.php" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control">
                    <button type="submit" class="btn btn-info">搜尋</button>
            </form>
        </div>
        <div class="py-2">
            <h2><?= $search ?>的搜尋結果</h2>
            <div class="py-2">共 <?= $userCount ?> 筆資料</div>
        </div>
        <?php if ($userCount > 0) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>name</td>
                        <td>description</td>
                        <td>amount</td>
                        <td>discount_number</td>
                        <td>discount_code</td>
                        <td>start_time</td>
                        <td>end_time</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //把資料轉換成關聯式陣列
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["description"] ?></td>
                            <td><?php echo "amount: " . $row["amount"] ?></td>
                            <td><?php echo "discount_number: " . $row["discount_number"] ?></td>
                            <td><?php echo $row["discount_code"] ?></td>
                            <td><?php echo $row["start_time"] ?></td>
                            <td><?php echo $row["end_time"] ?></td>
                            <td><a class="btn btn-info" href="discount.php?id=<?= $row["id"] ?>">Detail</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            沒有符合的結果
        <?php endif; ?>

    </div>
</body>

</html>
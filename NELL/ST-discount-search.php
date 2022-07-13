<?php
require("../db-connect.php");

if (!isset($_GET["search"])) {
    $search = "";
    $userCount = 0;
} else {
    $search = $_GET["search"];

    //須完全符合
    // $sql = "SELECT id, account, name, email, phone FROM users WHERE account = '$search'";

    //模糊比對
    $sql = "SELECT id, name, description, discount_number, start_time, end_time, buyer_valid FROM discount_store WHERE name LIKE '%$search%'";

    $result = $conn->query($sql);
    $userCount = $result->num_rows;
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>ST Discount Search</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="py-2">
            <a href="ST-store-discounts.php" class="btn btn-info">回優惠活動列表</a>
            <form action="ST-discount-search.php" method="get">
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
            <table class="table table-sm">
      <thead>
        <tr>
          <td class="align-middle text-center">優惠券No.</td>
          <td class="align-middle text-center">優惠券名稱</td>
          <td class="align-middle text-center">優惠券簡述</td>
          <td class="align-middle text-center">折扣數字</td>
          <td class="align-middle text-center">啟用日期</td>
          <td class="align-middle text-center">失效日期</td>
          <td class="align-middle text-center">狀態</td>
          <td class="align-middle text-center">編修</td>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td class="align-middle text-center"><?php echo $row["id"] ?></td>
            <td class="align-middle text-center col-2"><?php echo $row["name"] ?></td>
            <td class="align-middle text-center col-2"><?php echo $row["description"] ?></td>
            <td class="align-middle text-center"><?php echo $row["discount_number"] ?></td>
            <td class="align-middle text-center"><?php echo $row["start_time"] ?></td>
            <td class="align-middle text-center"><?php echo $row["end_time"] ?></td>

            <td class="align-middle text-center"><?php
                                                  if ($row["buyer_valid"] == 2) {
                                                    echo "無效<br>";
                                                  } else {
                                                    echo "有效<br>";
                                                  } ?>
            </td>
            <td class="align-middle text-center">
            <button type="button" class="btn detailBtn">
              <a class="detail" href="ST-discount-detail.php?id=<?= $row["id"] ?>">查看</a>
            </button>
            </td>
            <!-- <td class="align-middle text-center">
              <button type="button" class="btn detailBtn" href="discount.php?id=<?= $row["id"] ?>">查看
            </td> -->
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
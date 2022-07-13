<?php
require("../db-connect.php");

$page = isset($_GET["page"]) ?  $page = $_GET["page"] : 1;
$perPage = 10;
$start = ($page - 1) * $perPage;
$category = isset($_GET["category"]) && !empty($_GET["category"]) ? $_GET["category"] : "";
$valid  = isset($_GET["valid"]) ? $_GET["valid"] : "";

$ordertype = isset($_GET["order"]) ? $_GET["order"] : 1;

switch ($ordertype) {
  case 1:
    $ordertype = "id ASC";
    break;
  case 2:
    $ordertype = "id DESC";
    break;
  case 3:
    $ordertype = "discount_number ASC";
    break;
  case 4:
    $ordertype = "discount_number DESC";
    break;
  
}

$sql = "SELECT * FROM discount_store WHERE valid= 1";
// $sql .= $category ? " AND category_id = $category " : "";
$sql .= $valid ? " AND buyer_valid = $valid " : "";
$sql .= $ordertype ? " ORDER BY $ordertype" : "";
$pageUserCount = $conn->query($sql)->num_rows;
// var_dump($pageUserCount);
$starItem = ($page - 1) * $perPage + 1;
//結束的筆數
$endItem = $page * $perPage;
if ($endItem > $pageUserCount) {
    $endItem = $pageUserCount;
};

$totalPage = 10;
//商數 取商數後無條件捨去floor
$quotient = floor($pageUserCount / $perPage);
//餘數
$remainder = ($pageUserCount % $perPage);

if ($remainder === 0) {
    $totalPage = $quotient;
} else {
    $totalPage = $quotient + 1;
}

$sql .= " LIMIT $start ,10";
$result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">

<head>
  <title>ST Store Discounts</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="/fontawesome-free-6.1.1-web/css/all.min.css">
  <style>
    * {
      -webkit-user-drag: none;
      font-family: 'Noto Sans TC', sans-serif;
      color: #222934;

    }

    thead {
      font-weight: 600;
    }

    .filterBtn {
      color: #222934;
      background-color: #FFC845;
    }

    .filterBtn:hover {
      color: #222934;
      background-color: #FFC845;
    }

    .filterBtn:active {
      color: #222934;
      background-color: #FFC845;
    }

    .filterBtn:visited {
      color: #222934;
      background-color: #FFC845;
    }

    .filterBtn:focus {
      color: #222934;
      background-color: #FFC845;
    }
    .detail{
      
      text-decoration: none;
    }
    .detailBtn {
      color: #222934;
      background-color: #D5EEEE;
    }

    .detailBtn:hover {
      color: #fff;
      background-color: #49586f;
    }

    .detailBtn:active {
      color: #fff;
      background-color: #49586f;
    }

    .detailBtn:visited {
      color: #fff;
      background-color: #49586f;
    }

    .detailBtn:focus {
      color: #222934;
      background-color: #D5EEEE;
    }


    .catBtn {
      background-color: #D5EEEE;
      color: #222934;
      font-size: 1.25rem;
    }

    .catBtn:hover {
      color: #fff;
      background-color: #49586f;
    }

    .keywordBar,
    .priceBar {
      height: 48px;
    }

    .countBox {
      line-height: 37px;
      height: 37px;
      font-size: 16px;

    }

    .orderBtn {
      border: 2px solid #49586f;
      color: #222934;
      padding: 5px;
      margin-left: 3px;
      border-radius: 3px;
      text-decoration: none;
      text-align: center;
    }

    .orderBtn:hover {
      color: #fff;
      background-color: #49586f;
    }

    .pageBtn {
      padding: 10px;
      border: 2px solid #49586f;
      border-radius: 5px;
      color: #222934;
      text-decoration: none;
    }

    .pageBtn:active {
      color: #fff;
      background-color: #49586f;
    }

    .pageBtn:hover {
      color: #fff;
      background-color: #49586f;
    }

    .dateF {
      font-size: 0.8rem;
    }

    .dateS {
      height: 30px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="py-2">
      <form action="ST-discount-search.php" method="get">
        <div class="input-group">
          <input type="text" name="search" class="form-control">
          <button type="submit" class="btn btn-info">搜尋</button>
      </form>
    </div>
  </div>
  <div class="py-2 d-flex justify-content-end align-items-center">

  <div class="col-5 row d-flex justify-content-end btn-group align-items-center ">
      <a class="col-2 orderBtn" href="ST-store-discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=1" class="orderBtn <?php if ($order == 1) echo "active" ?>" name="id ASC">創建時間↑</a>
      <a class="col-2 orderBtn" href="ST-store-discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=2" class="orderBtn <?php if ($order == 2) echo "active" ?>" name="id DESC">創建時間↓</a>
      <a class="col-2 orderBtn" href="ST-store-discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=3" class="orderBtn <?php if ($order == 3) echo "active" ?>" name="discount_number ASC">折扣價格↑</a>
      <a class="col-2 orderBtn" href="ST-store-discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=4" class="orderBtn <?php if ($order == 4) echo "active" ?>" name="discount_number DESC">折扣價格↓</a>
    </div>
    </div>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($valid == "") echo "active";
                          ?>" aria-current="page" href="ST-store-discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>">全部</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['valid'] == "1") echo "active";
                          ?>" aria-current="page" href="ST-store-discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=1">有效</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['valid'] == "2") echo "active";
                          ?>" aria-current="page" href="ST-store-discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=2">失效</a>
    </li>
  </ul>

  <?php if ($pageUserCount > 0) : ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>優惠No.</td>
          <td>優惠名稱</td>
          <td>優惠敘述</td>
          <td>折扣數字</td>
          <td>啟用日期</td>
          <td>失效日期</td>
          <td>狀態</td>
          <td>使用此優惠的商品</td>

        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["description"] ?></td>
            <td><?php echo $row["discount_number"] ?></td>
            <td><?php echo $row["start_time"] ?></td>
            <td><?php echo $row["end_time"] ?></td>
            <td><?php
                if ($row["buyer_valid"] == 2) {
                  echo "無效<br>";
                } else {
                  echo "有效<br>";
                } ?>
            </td>
            <td><a class="btn btn-info" href="ST-discount-detail.php?id=<?= $row["id"] ?>">查看</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <div class="py-2">
      <a href="ST-discount-create.php" class="btn btn-info">新增優惠活動</a>
    </div>

  <?php else : ?>
    目前沒有資料
  <?php endif; ?>
  <div class="py-2">
    <nav aria-label="...">
      <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
          <li class="page-item
    <?php if ($page == $i) echo "active"; ?>"><a class="page-link" href="ST-store-discounts.php?page=<?= $i ?>&ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>"><?= $i ?></a></li>
        <?php endfor; ?>
      </ul>
    </nav>
  </div>
  </div>
</body>

</html>
<?php
session_start();
//SESSION還沒確認
$_SESSION["store_id"]=$storeID;
// var_dump($_SESSION);


require("../db-connect.php");

$page = isset($_GET["page"]) ?  $page = $_GET["page"] : 1;
$perPage = 10;
$start = ($page - 1) * $perPage;
$category = isset($_GET["category"]) && !empty($_GET["category"]) && $_GET["category"] ? $_GET["category"] : "";
$valid  = isset($_GET["valid"]) ? $_GET["valid"] : "";
$storeID = isset($_GET["storeID"]) ? $_GET["storeID"] : "";
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

$sql = "SELECT * FROM discount WHERE valid= 1";
$sql .= $storeID ? "AND store_id = $storeID" : "";
$sql .= $category  ? " AND category_id = $category " : "";
$sql .= $valid ? " AND buyer_valid = $valid " : "";
$sql .= $ordertype ? " ORDER BY $ordertype" : "";
$pageUserCount = $conn->query($sql)->num_rows;
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

// echo $page."<br>" ;
// echo $perPage."<br>";
// echo $totalPage."<br>";

?>
<!doctype html>
<html lang="en">

<head>
  <title>Discounts</title>
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
  <div class="col-12 row d-flex justify-content-between btn-group align-items-center">
    <!-- <div id="searchbykey" style="display:block"> -->
    <form action="discount-search.php" method="get" class="col-6">
      <div class="col-4 d-flex keywordBar ms-4">
        <input type="text" class="col-2 form-control " name="search" placeholder="輸入關鍵字">
        <!-- <input type="hidden" name="search" value="<?= $type ?>" /> -->
        <button class="col-3 btn mx-2 filterBtn" type="submit">搜尋</button>
      </div>
    </form>
    <!-- </div> -->
    <!-- <div class="container">
    <div class="py-2">
      <form action="discount-search.php" method="get">
        <div class="input-group">
          <input type="text" name="search" class="form-control">
          <button type="submit" class="btn btn-info">搜尋</button>
      </form>
    </div>
  </div> -->
    <div class="col-5 row d-flex justify-content-end btn-group align-items-center ">
      <a class="col-2 orderBtn" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=1" class="orderBtn <?php if ($order == 1) echo "active" ?>" name="id ASC">創建時間↑</a>
      <a class="col-2 orderBtn" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=2" class="orderBtn <?php if ($order == 2) echo "active" ?>" name="id DESC">創建時間↓</a>
      <a class="col-2 orderBtn" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=3" class="orderBtn <?php if ($order == 3) echo "active" ?>" name="discount_number ASC">折扣價格↑</a>
      <a class="col-2 orderBtn" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=4" class="orderBtn <?php if ($order == 4) echo "active" ?>" name="discount_number DESC">折扣價格↓</a>
    </div>
  </div>

  <!-- <div class="py-2 d-flex justify-content-end align-items-center">
    <div class="me-2">排序 <?= $ordertype ?></div>

    <div class="btn-group">
      <a href="discounts.php?valid=<?= $valid ?>&category=<?= $category ?>&order=1" class="btn btn-primary <?php if ($ordertype == 1) echo "active" ?>">id <i class="fa-solid fa-arrow-down-short-wide"></i></a>
      <a href="discounts.php?valid=<?= $valid ?>&category=<?= $category ?>&order=2" class="btn btn-primary <?php if ($ordertype == 2) echo "active" ?>">id <i class="fa-solid fa-arrow-down-wide-short"></i></a>
      <a href="discounts.php?valid=<?= $valid ?>&category=<?= $category ?>&order=3" class="btn btn-primary <?php if ($ordertype == 3) echo "active" ?>">name <i class="fa-solid fa-arrow-down-a-z"></i></a>
      <a href="discounts.php?valid=<?= $valid ?>&category=<?= $category ?>&order=4" class="btn btn-primary <?php if ($ordertype == 4) echo "active" ?>">name <i class="fa-solid fa-arrow-down-z-a"></i></a>
    </div>
  </div> -->
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($category == "") echo "active";
                          ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>">全部</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['category'] == "1") echo "active";
                          ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&valid=<?= $valid ?>&category=1">%數折價券</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['category'] == "2") echo "active";
                          ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&valid=<?= $valid ?>&category=2">現金折價券</a>
    </li>
  </ul>

  <div class="countBox d-flex justify-content-end mt-3">
    <?php if ($pageUserCount > 0) : ?>
      <h4 class="countBox">
        現在為第<?= $page ?>頁，優惠券第<?= $starItem ?>-<?= $endItem ?>筆資料，共<?= $pageUserCount ?>筆優惠券資料</h4>

    <?php endif; ?>
    <button class="btn filterBtn ms-3 me-2" onclick="window.location.href='create-discount.php'">新增優惠券</button>
  </div>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link   <?php
                            if ($valid == "") echo "active";
                            ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>">全部</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['valid'] == "1") echo "active";
                          ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=1">有效</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['valid'] == "2") echo "active";
                          ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=2">失效</a>
    </li>
  </ul>

  <?php if ($pageUserCount > 0) : ?>
    <table class="table table-sm">
      <thead>
        <tr>
          <td class="align-middle text-center">優惠券No.</td>
          <td class="align-middle text-center">優惠券分類</td>
          <td class="align-middle text-center">優惠券名稱</td>
          <td class="align-middle text-center">優惠券簡述</td>
          <td class="align-middle text-center">折扣數字</td>
          <td class="align-middle text-center">優惠序號</td>
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
            <td class="align-middle text-center">
              <?php
              if ($row["category_id"] == 1) {
                echo "%數折扣券";
              } 
              if ($row["category_id"] == 2) {
                echo "現金折扣券";
              }
              ?></td>
            <td class="align-middle text-center col-2"><?php echo $row["name"] ?></td>
            <td class="align-middle text-center col-2"><?php echo $row["description"] ?></td>
            <td class="align-middle text-center"><?php echo $row["discount_number"] ?></td>
            <td class="align-middle text-center"><?php echo $row["discount_code"] ?></td>
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
              <a class="detail" href="discount.php?id=<?= $row["id"] ?>">查看</a>
            </button>
            </td>
            <!-- <td class="align-middle text-center">
              <button type="button" class="btn detailBtn" href="discount.php?id=<?= $row["id"] ?>">查看
            </td> -->
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <!-- 
    <div class="py-2">
      <a href="create-discount.php" class="btn btn-info">新增折價券</a>
    </div> -->


    <!-- <div class="d-flex justify-content-center pt-3">
      <nav aria-label="Page navigation example ">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
            <li class="pageBtn
    <?php if ($page == $i) echo "active"; ?>"><a class="pageBtnNumber" href="discounts.php?page=<?= $i ?>&ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>"><?= $i ?></a></li>
          <?php endfor; ?>
        </ul>
      </nav>
    </div> -->

    <div class="d-flex justify-content-center pt-3">
      <nav aria-label="Page navigation example ">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
            <a class="pageBtn <?php if ($i == $page) echo "active"; ?> " href="discounts.php?page=<?= $i ?>&ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>"><?= $i ?></a>
          <?php endfor; ?>
        </ul>
      </nav>
    </div>

  <?php else : ?>
    目前沒有資料
  <?php endif; ?>
  </div>
</body>

</html>
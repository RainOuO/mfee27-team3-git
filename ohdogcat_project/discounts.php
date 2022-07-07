<?php
require("../db-connect.php");

if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = 1;
}
if (isset($_GET["category"])) {
  $category = $_GET["category"];
  // $sqlWhere="WHERE discount.category_id =$category";

} else {
  $category = "";
  // $sqlWhere="";
}


// $page = $_GET["page"];

$sqlAll = "SELECT * FROM discount WHERE valid=1";
$resultAll = $conn->query($sqlAll);
$userCount = $resultAll->num_rows;

$sqlCategory = "SELECT category_id FROM discount";
$resultCategory = $conn->query($sqlCategory);
$rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC);

$perPage = 10;
$start = ($page - 1) * $perPage;

// $order=$_GET["order"];
$order = isset($_GET["order"]) ? $_GET["order"] : 1;

switch ($order) {
  case 1:
    $orderType = "id ASC";
    break;
  case 2:
    $orderType = "id DESC";
    break;
  case 3:
    $orderType = "name ASC";
    break;
  case 4:
    $orderType = "name DESC";
    break;
  default:
    $orderType = "id ASC";
}

$sql = "SELECT * FROM discount WHERE valid=1 ORDER BY $orderType LIMIT $start, 10";

$result = $conn->query($sql);
$pageUserCount = $result->num_rows;

$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;
if ($endItem > $userCount) $endItem = $userCount;

$totalPage = 50;
$quotient = floor($userCount / $perPage); //商
//floor 無條件捨去
$remainder = ($userCount % $perPage); //餘數

if ($remainder === 0) {
  //商
  $totalPage = $quotient;
} else {
  $totalPage = $quotient + 1;
}

// $totalPage=ceil($userCount / $perPage);
//無條件進位

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

</head>

<body>
  <div class="container">
    <div class="py-2">
      <form action="discount-search.php" method="get">
        <div class="input-group">
          <input type="text" name="search" class="form-control">
          <button type="submit" class="btn btn-info">搜尋</button>
      </form>
    </div>
  </div>
  <div class="py-2 d-flex justify-content-end align-items-center">
    <div class="me-2">排序 <?= $order ?></div>
    <div class="btn-group">
      <a href="discounts.php?page=<?= $page ?>&order=1" class="btn btn-primary <?php if ($order == 1) echo "active" ?>">id <i class="fa-solid fa-arrow-down-short-wide"></i></a>
      <a href="discounts.php?page=<?= $page ?>&order=2" class="btn btn-primary <?php if ($order == 2) echo "active" ?>">id <i class="fa-solid fa-arrow-down-wide-short"></i></a>
      <a href="discounts.php?page=<?= $page ?>&order=3" class="btn btn-primary <?php if ($order == 3) echo "active" ?>">name <i class="fa-solid fa-arrow-down-a-z"></i></a>
      <a href="discounts.php?page=<?= $page ?>&order=4" class="btn btn-primary <?php if ($order == 4) echo "active" ?>">name <i class="fa-solid fa-arrow-down-z-a"></i></a>
    </div>
  </div>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($category == "") echo "active";
                          ?>" aria-current="page" href="discounts.php?page=<?= $page ?>&order=<?= $order ?>">全部</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($category == "1") echo "active";
                          ?>" aria-current="page" href="discounts.php?page=<?= $page ?>&order=<?= $order ?>&category=1">%數折價券</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($category == "2") echo "active";
                          ?>" aria-current="page" href="discounts.php?page=<?= $page ?>&order=<?= $order ?>&category=2">現金折價券</a>
    </li>

  </ul>
  <div class="py-2">第 <?= $startItem ?>-<?= $endItem ?>筆,共 <?= $userCount ?> 筆資料</div>
  <?php if ($pageUserCount > 0) : ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>id</td>
          <td>category_id</td>
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
            <td><?php echo $row["category_id"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["description"] ?></td>
            <td><?php echo "amount: " . $row["amount"] ?></td>
            <td><?php
                if ($row["category_id"] == 1) {
                  echo $row["discount_number"] . "% OFF";
                } else {
                  echo "折" . $row["discount_number"] . "元";
                }
                ?></td>
            <td><?php echo $row["discount_code"] ?></td>
            <td><?php echo $row["start_time"] ?></td>
            <td><?php echo $row["end_time"] ?></td>
            
            <td><?php
                if ($row["buyer_valid"] == 0) {
                  echo "未啟用<br>";
                } else {
                  echo "啟用中<br>";
                } ?><a class="btn btn-danger" href="doInvisible.php?id=<?= $row["id"] ?>&page=<?= $page ?>">隱藏</a>
              <a class="btn btn-danger" href="doVisible.php?id=<?= $row["id"] ?>&page=<?= $page ?>">啟用</a>
            </td>
            <td><a class="btn btn-info" href="discount.php?id=<?= $row["id"] ?>">Detail</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <div class="py-2">
      <a href="create-discount.php" class="btn btn-info">新增折價券</a>
    </div>

  <?php else : ?>
    目前沒有資料
  <?php endif; ?>
  <div class="py-2">
    <nav aria-label="...">
      <ul class="pagination">
        <!-- <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li> -->
        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
          <li class="page-item
    <?php if ($page == $i) echo "active"; ?>"><a class="page-link" href="discounts.php?page=<?= $i ?>&order=<?= $order ?>"><?= $i ?></a></li>
        <?php endfor; ?>
        <!-- <li class="page-item">
    <a class="page-link" href="users.php?page=2">2</a></li>
    <li class="page-item"><a class="page-link" href="users.php?page=3">3</a></li> -->
        <!-- <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li> -->
      </ul>
    </nav>
  </div>
  </div>
</body>

</html>
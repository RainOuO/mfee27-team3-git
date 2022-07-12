<?php
require("../db-connect.php");

// if (isset($_GET["page"])) {
//   $page = $_GET["page"];
// } else {
//   $page = 1;
// }

$page = isset($_GET["page"]) ?  $page = $_GET["page"] : 1;
$perPage = 10;
$start = ($page - 1) * $perPage;
// echo $start;
$category = isset($_GET["category"]) && !empty($_GET["category"]) ? $_GET["category"] : "";
$valid  = isset($_GET["valid"]) ? $_GET["valid"] : "";
// $minPrice = isset($_GET["minPrice"]) ? $_GET["minPrice"] : 0;
// $maxPrice = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : "";
// if (isset($_GET["startDate"]) && isset($_GET["endDate"])) {
//     $startDate = $_GET["startDate"];
//     $endDate = $_GET["endDate"];
// } else {
//     $startDate = "";
//     $endDate = "";
// };




// if(!isset($_GET["category"]) && !isset($_GET["valid"]) && empty($_GET["valid"]) && empty($_GET["category"])){
//   $category = "";
//   $category1 = "";
//   $category2="&";
//   $valid = "";
//   $valid1= "";
// }elseif(isset($_GET["category"]) && !isset($_GET["valid"]) && empty($_GET["valid"]) && !empty($_GET["category"])){
//   $category = $_GET["category"];
//   $category1 = "AND category_id = $category";
//   $valid = "";
//   $valid1= "";
// }elseif(!isset($_GET["category"]) && isset($_GET["valid"]) && !empty($_GET["valid"]) && empty($_GET["category"])){
//   $valid = $_GET["valid"];
//   $category = "";
//   $valid1 = "AND buyer_valid = $valid";
//   $category1 = "";
// }else{
//   $category = $_GET["category"];
//   $valid = $_GET["valid"];
//   $category1 = "AND category_id = $category";
//   $valid1 = "AND buyer_valid = $valid";
// }





// if (isset($_GET["category"]) && !empty($_GET["category"])&& !empty($_GET["valid"])) {
//   $category = $_GET["category"];
//   $category = "AND category_id = $category";
// }else {
//   $category = "";
// }
// if (isset($_GET["valid"]) && !empty($_GET["valid"]) && !empty($_GET["category"])) {
//   $valid = $_GET["valid"];
//   $valid = ",buyer_valid = $valid";
// }else if(empty($_GET["category"])){
//   $valid = $_GET["valid"];
//   $valid = "AND buyer_valid = $valid";
// }else {
//   $valid = "";
// }
// if(!empty($_GET["valid"]) && !empty($_GET["category"])){
//   $valid=" buyer_valid = $valid";
// }


// $sqlCategory = "SELECT category_id FROM discount WHERE category_id=1";
// $resultCategory = $conn->query($sqlCategory);
// $categoryCount = $resultCategory->num_rows;
// $rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC);
// var_dump($resultCategory);

// $perPage = 10;
// $start = ($page - 1) * $perPage;

// $order=$_GET["order"];
$ordertype = isset($_GET["order"]) ? $_GET["order"] : 5;

switch ($ordertype) {
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
    case 5:
    $orderType = "id ASC";
}

// $sqlAll = "SELECT * FROM discount WHERE valid=1 $category $valid ORDER BY $orderType";
// $resultAll = $conn->query($sqlAll);
// $userCount = $resultAll->num_rows;
// var_dump($userCount);
// $sqlAll = "SELECT * FROM discount WHERE valid=1 $category1 $valid1 ORDER BY $orderType";
// $resultAll = $conn->query($sqlAll);
// $userCount = $resultAll->num_rows;
// var_dump($userCount);

$sql = "SELECT * FROM discount WHERE valid= 1";
// $sql .= $storeID ? " and store_id = $storeID" : "";
$sql .= $category ? " and category_id = $category " : "";
$sql .= $valid ? " and buyer_valid = $valid " : "";
// $sql11111 = "SELECT * FROM discount WHERE valid=1 AND category_id=1 AND buyer_valid=1 ORDER BY $orderType ";
// $result111 = $conn->query($sql11111);
// $user1 = $result111->num_rows;
$sql .= $ordertype ? " ORDER BY $ordertype" : "";
$pageUserCount = $conn->query($sql)->num_rows;
// var_dump($user1);
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


// $sql2 = "SELECT * FROM discount WHERE valid=1 ORDER BY $orderType";
// $resultAll2 = $conn->query($sql2);
// $userCount2 = $resultAll2->num_rows;

// $sql1 = "SELECT * FROM discount WHERE valid=1 $category $valid ORDER BY $orderType LIMIT $start, 10";
// $result1 = $conn->query($sql1);
// $pageUserCount = $result1->num_rows;
// var_dump($pageUserCount);

// var_dump($pageUserCount);
// $startItem = ($page - 1) * $perPage + 1;
// $endItem = $page * $perPage;
// if ($endItem > $pageUserCount) $endItem = $pageUserCount;

// $totalPage = 10;
// $quotient = floor($userCount2 / $perPage); //商
// //floor 無條件捨去
// $remainder = ($userCount2 % $perPage); //餘數

// if ($remainder === 0) {
//   //商
//   $totalPage = $quotient;
// } else {
//   $totalPage = $quotient + 1;
// }

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
    <!-- <div class="me-2">排序 <?= $order ?></div> -->

    <div class="btn-group">
      <a href="discounts.php?page=<?= $page ?>&valid=<?= $valid ?>&category=<?= $category ?>&order=1" class="btn btn-primary <?php if ($order == 1) echo "active" ?>">id <i class="fa-solid fa-arrow-down-short-wide"></i></a>
      <a href="discounts.php?page=<?= $page ?>&valid=<?= $valid ?>&category=<?= $category ?>&order=2" class="btn btn-primary <?php if ($order == 2) echo "active" ?>">id <i class="fa-solid fa-arrow-down-wide-short"></i></a>
      <a href="discounts.php?page=<?= $page ?>&valid=<?= $valid ?>&category=<?= $category ?>&order=3" class="btn btn-primary <?php if ($order == 3) echo "active" ?>">name <i class="fa-solid fa-arrow-down-a-z"></i></a>
      <a href="discounts.php?page=<?= $page ?>&valid=<?= $valid ?>&category=<?= $category ?>&order=4" class="btn btn-primary <?php if ($order == 4) echo "active" ?>">name <i class="fa-solid fa-arrow-down-z-a"></i></a>
    </div>
    </div>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($category == "") echo "active";
                          ?>" aria-current="page" href="discounts.php?page=<?= $_GET["page"] ?>&order=<?= $order ?>">全部</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['category'] == "1") echo "active";
                          ?>" aria-current="page" href="discounts.php?page=<?= $page ?>&order=<?= $order ?>&valid=<?= $valid ?>&category=1">%數折價券</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['category'] == "2") echo "active";
                          ?>" aria-current="page" href="discounts.php?page=<?= $page ?>&order=<?= $order ?>&valid=<?= $valid ?>&category=2">現金折價券</a>
    </li>
  </ul>

  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($valid == "") echo "active";
                          ?>" aria-current="page" href="discounts.php?page=<?= $_GET["page"] ?>&order=<?= $order ?>&category=<?= $category ?>">全部</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['valid'] == "1") echo "active";
                          ?>" aria-current="page" href="discounts.php?page=<?= $page ?>&order=<?= $order ?>&category=<?= $category ?>&valid=1">有效</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  <?php
                          if ($_GET['valid'] == "2") echo "active";
                          ?>" aria-current="page" href="discounts.php?page=<?= $page ?>&order=<?= $order ?>&category=<?= $category ?>&valid=2">失效</a>
    </li>
  </ul>

  <?php if ($pageUserCount > 0) : ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>Id</td>
          <td>類別</td>
          <td>優惠券名稱</td>
          <td>優惠券敘述</td>
          <td>折扣數字</td>
          <td>優惠序號</td>
          <td>啟用日期</td>
          <td>失效日期</td>
          <td>狀態</td>
          <td>詳情</td>

        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td>
              <?php
              if ($row["category_id"] == 1) {
                echo "%數折扣券";
              } elseif ($row["category_id"] == 2) {
                echo "現金折扣券";
              } else {
                echo "商家優惠活動";
              }
              ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["description"] ?></td>
            <td><?php echo $row["discount_number"] ?></td>
            <td><?php echo $row["discount_code"] ?></td>
            <td><?php echo $row["start_time"] ?></td>
            <td><?php echo $row["end_time"] ?></td>

            <td><?php
                if ($row["buyer_valid"] == 2) {
                  echo "無效<br>";
                } else {
                  echo "有效<br>";
                } ?>
              <!-- <a class="btn btn-danger" href="doInvisible.php?id=<?= $row["id"] ?>&page=<?= $page ?>">隱藏</a>
              <a class="btn btn-danger" href="doVisible.php?id=<?= $row["id"] ?>&page=<?= $page ?>">啟用</a> -->
            </td>
            <td><a class="btn btn-info" href="discount.php?id=<?= $row["id"] ?>">Detail</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <div class="py-2">
      <a href="create-discount.php" class="btn btn-info">新增折價券</a>
      <a href="create-discount.php" class="btn btn-info">有效優惠券</a>
      <a href="create-discount.php" class="btn btn-info">無效/失效優惠券</a>
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
    <?php if ($page == $i) echo "active"; ?>"><a class="page-link" href="discounts.php?page=<?= $i ?>&order=<?= $order ?>&category=<?= $category ?>&valid=<?= $valid ?>"><?= $i ?></a></li>
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
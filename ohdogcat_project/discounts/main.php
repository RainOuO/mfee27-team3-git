<?php
require("../db-connect.php");

if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = 1;
}
if (isset($_GET["category"]) && !empty($_GET["category"])) {
  $category = $_GET["category"];
  $category = "AND category_id = $category";
} else {
  $category = "";
}



$sqlCategory = "SELECT category_id FROM discount WHERE category_id=1";
$resultCategory = $conn->query($sqlCategory);
$categoryCount= $resultCategory->num_rows;
$rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC);
// var_dump($resultCategory);

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

$sqlAll = "SELECT * FROM discount WHERE valid=1 $category ORDER BY $orderType";
$resultAll = $conn->query($sqlAll);
$userCount = $resultAll->num_rows;
// var_dump($userCount);

$sql = "SELECT * FROM discount WHERE valid=1 $category ORDER BY $orderType LIMIT $start, 10";

$result = $conn->query($sql);
$pageUserCount = $result->num_rows;


$startItem = ($page - 1) * $perPage + 1;
$endItem = $page * $perPage;
if ($endItem > $pageUserCount) $endItem = $pageUserCount;

$totalPage = 10;
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

<div class="d-flex justify-content-between align-items-center border-bottom">
    <div class=" pb-2">
        <h1>優惠券</h1>
    </div>
    <div class="pe-1" role="">
        <input type="button" class="btn catBtn my-3" value="折價券總覽" onclick="window.location.href='backtoALLIST.php'">
        <input type="button" class="btn catBtn my-3" value="%數折價券" onclick="window.location.href='discounts.php?page=<?= $page ?>&order=<?= $order ?>&category=1'">
        <input type="button" class="btn catBtn my-3" value="現金折價券" onclick="window.location.href='restaurantlist.php'">

    </div>
</div>
<div class="d-flex justify-content-between row pb-1 pe-3">
    <div class="d-flex justify-content-between row pb-1 pe-3">

        <form action="discount-search.php" method="get" class=" col-2 d-flex align-items-center mt-2  ">
            <div class="d-flex mt-4 align-items-center mb-4">
                <input type="text" class="col-3 form-control " name="keyword" placeholder="輸入關鍵字">
                <button class="col-3 btn mx-2 filterBtn" type="submit">搜尋</button>
            </div>
        </form>

        <div class="col-6 row d-flex justify-content-end btn-group align-items-center mt-2">
            <a href="" class="orderBtn  col-2 ">單價↑</i></a>
            <a href="" class="orderBtn col-2 ">單價↓</i></a>
            <a href="" class="orderBtn  col-2 ">上架時間↑</i></a>
            <a href="" class="orderBtn  col-2 ">上架時間↓</i></a>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end align-items-center">
        <div class="countBox">
            <h4 class="countBox">以下商品共: <?=$userCount?> 筆</h4>
        </div>
        <button class="btn filterBtn me-1 ms-3 my-3">新增商品</button>
    </div>
    <div class="table-responsive">
    <?php if ($pageUserCount > 0) : ?>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th class="align-middle text-center">優惠券ID</th>
                    <th class="align-middle">優惠券分類</th>
                    <th>優惠券名稱</th>
                    <th>優惠券描述</th>
                    <th>折扣內容</th>
                    <th class="align-middle text-end">啟用日期</th>
                    <th class="align-middle text-center">失效日期</th>
                    <th class="align-middle text-center">狀態</th>
                    <th class="align-middle text-center">編修</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td class="align-middle text-center"><?php echo $row["id"] ?></td>
                        <td class="align-middle">
                            <?php
                            if ($row["category_id"] == 1) {
                                echo "%數折扣券";
                            } elseif ($row["category_id"] == 2) {
                                echo "現金折扣券";
                            }
                            ?></td>
                        <td class="align-middle"><?php echo $row["name"] ?></td>
                        <td class="align-middle"><?php echo $row["description"] ?></td>
                        <td><?php
                            if ($row["category_id"] == 1) {
                                echo $row["discount_number"] . "% OFF";
                            } else {
                                echo "折" . $row["discount_number"] . "元";
                            }
                            ?></td>
                        <td class="align-middle text-center"><?php echo $row["start_time"] ?></td>
                        <td class="align-middle text-center"><?php echo $row["end_time"] ?></td>

                        <td class="align-middle text-center"><?php
                            if ($row["buyer_valid"] == 0) {
                                echo "無效<br>";
                            } else {
                                echo "有效<br>";
                            } ?>
                        </td>
                        <td class="align-middle text-center"><a class="btn btn-info" href="discount.php?id=<?= $row["id"] ?>">詳情</a></td>
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

        <div class="d-flex justify-content-center pt-3">
            <nav aria-label="Page navigation example ">
                <ul class="pagination">
                    <li class=" ">
                        <a class="pageBtn" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class=""><a class="pageBtn" href="#">1</a></li>
                    <li class=""><a class="pageBtn" href="#">2</a></li>
                    <li class=""><a class="pageBtn" href="#">3</a></li>
                    <li class="">
                        <a class=" pageBtn" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
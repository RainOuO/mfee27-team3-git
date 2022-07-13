<!-- 最上方資料給家豪用------------ -->
<!-- <h2 class="m-0">優惠券管理(豪哥這邊)</h2>
    <div class="py-2 ps-5" role="">
      <a class="btn catBtn  <?php
                            if ($valid == "") echo "active";
                            ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>">所有狀態
      </a>

      <a class="btn catBtn <?php
                            if ($_GET['valid'] == "1") echo "active";
                            ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=1">有效
      </a>

      <a class="btn catBtn  <?php
                            if ($_GET['valid'] == "2") echo "active";
                            ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=2">失效
      </a>
    </div> -->
<!-- end最上方資料給家豪用------------ -->

<?php
require("../db-connect.php");
// require('../template/dashbord-discounts.php');

// store_id
// session_start();
// $store_id = $_SESSION['store_id'];

// 001
$sql01 = "UPDATE discount set buyer_valid= 1 WHERE (start_time <= NOW()) and (end_time >= NOW())";
$sql00 = "UPDATE discount set buyer_valid= 2 WHERE (start_time > NOW()) or (end_time < NOW())";
$sql001 = "UPDATE discount set buyer_valid= 1 WHERE (start_time = '0000-00-00 00:00:00') AND(end_time = '0000-00-00 00:00:00')";

$conn->query($sql01);
$conn->query($sql00);
$conn->query($sql001);


// end001

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

$sql = "SELECT * FROM discount WHERE valid= 1";
// $sql .= $storeID ? " and store_id = $storeID" : "";
$sql .= $category ? " AND category_id = $category " : "";
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

?>



<!-- 家豪模板區 ------------------->
<!doctype html>
<html lang="en">

<head>
  <title>Discount</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="../template/css/custom-bs.css">
  <link rel="stylesheet" href="../template/css/style.css">

</head>

<body>
  <div class="lowest-background w-100 vh-100 d-flex  overflow-hidden">
    <aside id="side-bar" class="side-wrap vh-100 d-flex flex-column">
      <div class="logo-box d-flex justify-content-center align-items-center py-2">
        <a href="" class="fill-w d-block px-4">
          <img class="img-component dog-body" src="../images/dashboard/logo_dog-body.svg" class="fill-w" alt="">
          <img class="img-component dog-tail" src="../images/dashboard/logo_dog-tail.svg" class="fill-w" alt="">
          <img class="img-component dog-text" src="../images/dashboard/logo_dog-text.svg" class="fill-w" alt="">
        </a>
      </div>
      <nav class="menu-box mt-2 overflow-auto flex-shrink-1 h-100">
        <ul class="list-unstyled accordion" id="menu-accordion ">
          <li class="menu-item"><a href="" class="menu-button icon-home no-accordion">首頁</a></li>
          <li class="menu-item accordion-header">
            <button href="" class="menu-button icon-products accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">商品管理
              <div class="status-mark"></div>
            </button>
            <div id="collapseProducts" class="accordion-collapse collapse" data-bs-parent="#menu-accordion">
              <div class="accordion-body">
                <ul class="list-unstyled">
                  <li>
                    <a href="" class="menu-link">商品總覽</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">旅館票券列表</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">餐廳票券列表</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">活動票券列表</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">實體商品列表</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class="menu-item accordion-header">
            <button href="" class="menu-button icon-orderlist accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOrderList" aria-expanded="true" aria-controls="collapseOrderList">訂單管理
              <div class="status-mark"></div>
            </button>
            <div id="collapseOrderList" class="accordion-collapse collapse" data-bs-parent="#menu-accordion">
              <div class="accordion-body">
                <ul class="list-unstyled">
                  <li>
                    <a href="" class="menu-link">訂單總覽</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">旅館票券訂單</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">餐廳票券訂單</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">活動票券訂單</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">實體商品訂單</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class="menu-item accordion-header">
            <button href="" class="menu-button icon-message accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseMessages" aria-expanded="true" aria-controls="collapseMessages">信件匣
              <div class="status-mark"></div>
            </button>
            <div id="collapseMessages" class="accordion-collapse collapse" data-bs-parent="#menu-accordion">
              <div class="accordion-body">
                <ul class="list-unstyled">
                  <li>
                    <a href="" class="menu-link">所有信件</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">系統信件列表</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">顧客信件列表</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class="menu-item accordion-header">
            <button href="" class="menu-button icon-coupon accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCoupon" aria-expanded="true" aria-controls="collapseCoupon">優惠券管理
              <div class="status-mark"></div>
            </button>
            <div id="collapseCoupon" class="accordion-collapse collapse" data-bs-parent="#menu-accordion">
              <div class="accordion-body">
                <ul class="list-unstyled">
                  <li>
                    <a href="" class="menu-link">有效優惠券</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">排程中列表</a>
                  </li>
                  <li>
                    <a href="" class="menu-link">已過期列表</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class="menu-item"><a href="" class="menu-button icon-setting no-accordion">商家設定</a></li>
        </ul>
      </nav>
      <div class="menu-box mt-2 flex-shrink-0 logout">
        <div class="menu-item"><a href="" class="menu-button no-accordion icon-logout">粗企玩</a></div>
      </div>
    </aside>
    <div class="content-wrap vh-100">
      <div class="container-fluid h-100 py-4 overflow-hidden row">
        <div class="d-flex flex-column h-100">
<!-- 采平標題區 -->
        <div class="content-header d-flex justify-content-end mb-3">
        <div class="d-flex flex-shrink-1 w-100 align-items-center">

        <h2 class="m-0">優惠券管理</h2>
              <div class="py-2 ps-5" role="">
                <a class="btn catBtn  <?php
                                      if ($valid == "") echo "active";
                                      ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>">所有狀態
                </a>

                <a class="btn catBtn <?php
                                      if ($_GET['valid'] == "1") echo "active";
                                      ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=1">有效
                </a>

                <a class="btn catBtn  <?php
                                      if ($_GET['valid'] == "2") echo "active";
                                      ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=2">失效
                </a>
              </div>
              
            </div>
            <!--店家名稱照片區 -->
            <a href="../store-info/" class="d-flex justify-content-end align-items-center flex-shrink-0">
            <div class="user-name pe-4"><?= $userNickName ?></div>
            <div class="user-sticker rounded-3 overflow-hidden border border-1 p-1 bg-white"><img src="../images/store_photo/<?= $userPhoto ?>" class="fill-w object-fit" alt=""></div>
        </a>
          </div>
          <!-- END采平標題區 -->
          <hr class="flex-shrink-0">
          <main id="main" class="content-main overflow-auto flex-shrink-1 h-100">

            <!-- end上方家豪模板區 ------------------->
            <!-- 采平discounts區域 -->
            <style>
              * {
                -webkit-user-drag: none;
                font-family: 'Noto Sans TC', sans-serif;
                color: #222934;

              }

              thead {
                font-weight: 600;
              }

              .filterBtn,
              .filterBtn:active,
              .filterBtn:focus {
                color: #222934;
                background-color: #FFC845;
                border: 0;
                transition: all .3s;
              }

              .filterBtn:hover {
                color: #222934;
                background-color: #ffe3a1;
              }


              .filterBtn:visited {
                color: #222934;
                background-color: #FFC845;
              }



              .detailBtn,
              .detailBtn:focus {
                color: #222934;
                background-color: #D5EEEE;
              }



              .detailBtn:active,
              .detailBtn:visited,
              .detailBtn:hover {
                color: #fff;
                background-color: #49586f;
              }

              .keywordBar,
              .priceBar {
                height: 48px;
              }

              .catBtn {
                border-color: #49586f;
                color: #222934;
                font-size: 16px;
                margin: 4px 0;
                margin-right: 0.25vw;
                letter-spacing: .5px;
                padding: 4px 12px;
              }

              .catBtn:hover,
              .catBtn.current-active,
              .catBtn.active
               {
                color: #fff !important;
                background-color: #49586f;
              }

              .aBtn {
                text-decoration: none;
                color: #222934;
              }

              .aBtn:hover {
                color: white;
              }

              .orderBtn {
                color: #222934;
                padding: 5px;
                margin-left: 3px;
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

              .pageBtn.active {
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
            <div class="overflow-hidden">
              <!-- search -->
              <div class="row d-flex justify-content-between btn-group align-items-center">
                <form action="discount-search.php" method="get" class="col-6">
                  <div class="col-4 d-flex keywordBar ms-4">
                    <input type="text" class="form-control col-8 mt-2" name="search" placeholder="輸入關鍵字">
                    <input class="col-2" type="hidden" name="type" value="<?= $type ?>" />
                    <button class="btn mx-2 filterBtn col-4 mt-2" type="submit">搜尋</button>
                  </div>
                </form>
                <!-- end search -->

                <!-- 排序 -->
                <div class=" d-flex justify-content-end btn-group align-items-center mt-3 col-6">
                  <div class="row d-flex justify-content-end align-items-end flex-shrink-1 w-100">
                    <div class="d-flex  justify-content-end align-items-center col-6">

                      <!-- 第幾頁 -->
                      <?php if ($pageUserCount > 0) : ?>
                        <h6>
                          共<?= $pageUserCount ?>筆優惠券資料，此頁顯示第<?= $starItem ?>筆~第<?= $endItem ?>筆</h6>
                      <?php endif; ?>
                    </div>
                    <!-- 排序 -->
                    <div class="col-2 dropdown-left d-flex me-4">
                      <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownCenterBtn" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= (!isset($_GET['sort']) || empty($_GET['sort'])) ? '優惠券排序' : (($order == 'DESC') ? ($sort_text . "↑") : ($sort_text . "↓")) ?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
                        <li>
                          <a class="col-2 orderBtn" href="./discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=1" class="orderBtn <?php if ($order == 1) echo "active" ?>" name="id ASC">編號排序↓</a>
                        </li>
                        <li>
                          <a class="col-2 orderBtn" href="./discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=2" class="orderBtn <?php if ($order == 2) echo "active" ?>" name="id DESC">編號排序↑</a>
                        </li>
                        <li>
                          <a class="col-2 orderBtn" href="./discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=3" class="orderBtn <?php if ($order == 3) echo "active" ?>" name="discount_number ASC">折扣價格↓</a>
                        </li>
                        <li>
                          <a class="col-2 orderBtn" href="./discounts.php?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=<?= $valid ?>&order=4" class="orderBtn <?php if ($order == 4) echo "active" ?>" name="discount_number DESC">折扣價格↑</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end排序 -->

              <div class="row d-flex justify-content-between btn-group align-items-center">
                <!-- category選擇 -->
                <div class="col-6 my-3 ms-4">
                  <a class="btn catBtn  <?php
                                        if ($category == "") echo "active";
                                        ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>">全部種類</a>

                  <a class="btn catBtn  <?php
                                        if ($_GET['category'] == "1") echo "active";
                                        ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&valid=<?= $valid ?>&category=1">%數折價券</a>
                  <a class="btn catBtn  <?php
                                        if ($_GET['category'] == "2") echo "active";
                                        ?>" aria-current="page" href="discounts.php?ordertype=<?= $ordertype ?>&valid=<?= $valid ?>&category=2">現金折價券</a>
                </div>
                <!-- 新增優惠券 -->
                <div class="col-2 countBox d-flex justify-content-end">
                  <button class="btn filterBtn d-flex justify-content-end me-3" onclick="window.location.href='create-discount.php'">新增優惠券 </button>
                </div>
                <!-- end新增優惠券 -->
              </div>

              <?php if ($pageUserCount > 0) : ?>
                <table class="table table-sm  table-hover">
                  <thead>
                    <tr>
                      <td class="align-middle text-center">優惠券編號</td>
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
                          } elseif ($row["category_id"] == 2) {
                            echo "現金折扣券";
                          } else {
                            echo "商家優惠活動";
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
                                                                echo "失效<br>";
                                                              } else {
                                                                echo "有效<br>";
                                                              } ?>
                        </td>
                        <td class="align-middle text-center">
                          <button type="button" class="btn detailBtn">
                            <a class="detail aBtn" href="discount.php?id=<?= $row["id"] ?>">查看</a>

                          </button>
                        </td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>

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
        </div>
        <!-- end采平discounts區域 -->
        <!-- 下方家豪模板區 ------------------->
        </main>
      </div>
    </div>
  </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
  </script>

</body>

</html>

<!-- end家豪模板區 ------------------->
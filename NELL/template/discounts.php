<?php require("./Nellie.php") ?>

<!doctype html>
<html lang="en">

<head>
    <title>Discounts</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/css/custom-bs.css">
    <link rel="stylesheet" href="../template/css/style.css">
    <link rel="stylesheet" href="<?= $css ?>">

    <!-- 連接Nellie.css -->
   <link rel="stylesheet" href="./Nellie.css">
    
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
                <ul class="list-unstyled accordion" id="menu-accordion">
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
                                    <a href="discounts.php?ordertype=<?= $ordertype ?>" class="menu-link">店家優惠活動列表</a>
                                    </li>
                                    <li>
                                        <a href="discounts.php?ordertype=<?= $ordertype ?>" class="menu-link">優惠券列表</a>
                                    </li>
                                    <!-- <li>
                                        <a href="discounts.php?ordertype=<?= $ordertype ?>" class="menu-link">已過期列表</a>
                                    </li> -->
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
            <div class="container-fluid h-100 py-4 overflow-hidden">
                <div class="d-flex flex-column h-100">
                    <div class="content-header d-flex justify-content-end flex-shrink-0">
                        <a href="" class="d-flex justify-content-end align-items-center">
                            <div class="user-name pe-4">汪汪先輩</div>
                            <div class="user-sticker rounded-3 overflow-hidden"><img src="../images/dashboard/pohto_user-sticker.jpg" class="fill-w" alt=""></div>
                        </a>
                    </div>
                    <hr class="flex-shrink-0">
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100">
   
<body>
  <div class="col-12 row d-flex justify-content-between btn-group align-items-center">
    <!-- <div id="searchbykey" style="display:block"> -->
    <form action="discounts.php" method="get" class="col-6">
      <div class="col-4 d-flex keywordBar ms-4">
        <input type="text" class="col-2 form-control " name="keyword" placeholder="輸入關鍵字">
        <input type="hidden" name="type" value="<?= $type ?>" />
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
      <a class="col-2 orderBtn" href="allProductList.php?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=1" class="orderBtn <?php if ($order == 1) echo "active" ?>" name="priceOrder ASC">單價↑</a>
      <a class="col-2 orderBtn" href="allProductList.php?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=2" class="orderBtn <?php if ($order == 2) echo "active" ?>" name="priceOrder DESC">單價↓</a>
      <a class="col-2 orderBtn" href="allProductList.php?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=3" class="orderBtn <?php if ($order == 3) echo "active" ?>" name="launchOrder ASC">上架時間↑</a>
      <a class="col-2 orderBtn" href="allProductList.php?type=<?= $type ?>&keyword=<?= $keyword ?>&minPrice=<?= $minPrice ?>&maxPrice=<?= $maxPrice ?>&startDate=<?= $startDate ?>&endDate=<?= $endDate ?>&order=4" class="orderBtn <?php if ($order == 4) echo "active" ?>" name="launchOrder DESC">上架時間↓</a>
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
  <!-- <ul class="nav nav-pills">
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
  </ul> -->

  <div class="countBox d-flex justify-content-end mt-3">
    <?php if ($pageUserCount > 0) : ?>
      <h4 class="countBox">
        現在為第<?= $page ?>頁，優惠券第<?= $starItem ?>-<?= $endItem ?>筆資料，共<?= $pageUserCount ?>筆優惠券資料</h4>

    <?php endif; ?>
    <button class="btn filterBtn ms-3 me-2" onclick="window.location.href='create-discount.php?store_id=<?= $storeID ?>&type=<?= $type ?>'">新增優惠券</button>
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
                                                    echo "無效<br>";
                                                  } else {
                                                    echo "有效<br>";
                                                  } ?>
            </td>
            <!-- <td class="align-middle text-center"><a class="btn btn-info" href="discount.php?id=<?= $row["id"] ?>">查看</a></td> -->
            <td class="align-middle text-center">
              <button type="button" class="btn detailBtn" onclick="window.location.href='discount.php?store_id=<?= $storeID ?>&id=<?= $row['id'] ?>'">查看</button>
            </td>
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
    <script src="<?= $js ?>"></script>
</body>

</html>
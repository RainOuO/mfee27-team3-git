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
    $sql = "SELECT id, name, description, amount, discount_number,discount_code,start_time,end_time FROM discount WHERE name LIKE '%$search%'";

    $result = $conn->query($sql);
    $userCount = $result->num_rows;
}
?>
<!-- 家豪模板區 ------------------->
<!doctype html>
<html lang="en">

<head>
    <title>Discount Search</title>
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
            <div class="container-fluid h-100 py-4 overflow-hidden">
                <div class="d-flex flex-column h-100">

                    <!-- 純標題區 -->
                    <div class="content-header d-flex justify-content-end mb-3">
                        <div class="d-flex flex-shrink-1 w-100 align-items-center">
                            <h2 class="m-0">搜尋</h2>
                        </div>
                        <!--汪汪照片區<a>-->
                        <a href="../store-info/" class="d-flex justify-content-end align-items-center flex-shrink-0">
                            <div class="user-name pe-4"><?= $userNickName ?></div>
                            <div class="user-sticker rounded-3 overflow-hidden border border-1 p-1 bg-white"><img src="../images/store_photo/<?= $userPhoto ?>" class="fill-w object-fit" alt=""></div>
                        </a>
                    </div>
                    <hr class="flex-shrink-0">
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100">

                        <!-- end上方家豪模板區 ------------------->

                        <!-- 采平discounts區域 -->
                        <style>
                            .yellowBtn,
                            .yellowBtn:active,
                            .yellowBtn:focus {
                                color: #222934;
                                background-color: #FFC845;
                                border: 0;
                                transition: all .3s;
                            }

                            .yellowBtn:hover {
                                color: #222934;
                                background-color: #ffe3a1;
                            }


                            .yellowBtn:visited {
                                color: #222934;
                                background-color: #FFC845;
                            }

                            .lightblueBtn,
                            .lightblueBtn:focus {
                                color: #222934;
                                background-color: #D5EEEE;
                            }

                            .lightblueBtn:active,
                            .lightblueBtn:hover {
                                color: #fff;
                                background-color: #49586f;
                            }

                            .aBtn {
                                text-decoration: none;
                                color: #222934;
                            }

                            .aBtn:hover {
                                color: white;
                            }
                        </style>
                        <div class="container">
                            <div class="row d-flex justify-content-between btn-group align-items-center">
                                <div class="col-4 row d-flex">
                                    <form class=" col-8 d-flex" action="discount-search.php" method="get">
                                        <input type="text" class="form-control col-3  mt-2 ms-4" name="search" placeholder="輸入關鍵字">
                                        <input type="hidden" name="type" value="<?= $type ?>">
                                        <button class="btn yellowBtn col-3 mx-2 mt-2" type="submit">搜尋</button>
                                    </form>
                                </div>
                                <div class="col-2 countBox d-flex justify-content-end">
                                    <button class="btn lightblueBtn d-flex justify-content-end me-4  mt-2" onclick="window.location.href='discounts.php'">回到優惠券列表</button>

                                </div>
                            </div>
                            <div class="py-2 ms-4">
                                <h2><?= $search ?>的搜尋結果</h2>
                                <div class="py-2">共 <?= $userCount ?> 筆資料</div>
                            </div>
                            <?php if ($userCount > 0) : ?>
                                <table class="table table-sm  table-hover">
                                    <thead>
                                        <tr>
                                            <td class="align-middle text-center">優惠券編號</td>
                                            <td class="align-middle text-center">優惠券名稱</td>
                                            <td class="align-middle text-center">優惠券簡述</td>
                                            <td class="align-middle text-center">庫存</td>
                                            <td class="align-middle text-center">折扣數字</td>
                                            <td class="align-middle text-center">優惠序號</td>
                                            <td class="align-middle text-center">啟用日期</td>
                                            <td class="align-middle text-center">失效日期</td>
                                            <td class="align-middle text-center">編修</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //把資料轉換成關聯式陣列
                                        while ($row = $result->fetch_assoc()) : ?>
                                            <tr>
                                                <td class="align-middle text-center"><?php echo $row["id"] ?></td>
                                                <td class="align-middle text-center"><?php echo $row["name"] ?></td>
                                                <td class="align-middle text-center"><?php echo $row["description"] ?></td>
                                                <td class="align-middle text-center"><?php echo $row["amount"]."張" ?></td>
                                                <td class="align-middle text-center"><?php echo $row["discount_number"] ?></td>
                                                <td class="align-middle text-center"><?php echo $row["discount_code"] ?></td>
                                                <td class="align-middle text-center"><?php echo $row["start_time"] ?></td>
                                                <td class="align-middle text-center"><?php echo $row["end_time"] ?></td>
                                                <td class="align-middle text-center"><a class="btn lightblueBtn aBtn" href="discount.php?id=<?= $row["id"] ?>">查看</a></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                <?php else : ?>
                                    沒有符合的結果
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
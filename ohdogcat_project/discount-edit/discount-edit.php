<?php


?>
<!-- 家豪模板區 ------------------->
<!doctype html>
<html lang="en">

<head>
    <title>Create Discount</title>
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
        <h2 class="m-0">修改優惠券</h2>
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
                            .lightblueBtn:visited,
                            .lightblueBtn:hover {
                                color: #fff;
                                background-color: #49586f;
                            }

                            .aBtn {
                                text-decoration: none;
                                color: #222934;
                            }

                            .aBtn:hover {
                                color: #222934;
                            }
                        </style>
                        <div class="container">
                            <?php if ($userCount > 0) :
                                $row = $result->fetch_assoc(); ?>
                                <form action="doUpdate.php" method="post">
                                    <input name="id" type="hidden" value="<?= $row["id"] ?>">
                                    <table class="table ">
                                        <tr>
                                            <th>優惠券編號</th>
                                            <td><?= $row["id"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>優惠券名稱</th>
                                            <td><input type="text" name="name" class="form-control" value="<?= $row["name"] ?>"></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <th>優惠券簡述</th>
                                            <td><input type="text" name="description" class="form-control" value="<?= $row["description"] ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>庫存數量</th>
                                            </th>
                                            <td><input type="text" name="discount_number" class="form-control" value="<?= $row["discount_number"] ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>最低使用金額</th>
                                            </th>
                                            <td><input type="number" name="lower_limit" class="form-control" value="<?= $row["lower_limit"] ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>啟用日期</th>
                                            </th>
                                            <td><input type="date" name="start_time" class="form-control" value="<?= $row["start_time"] ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>失效日期</th>
                                            </th>
                                            <td><input type="date" name="end_time" class="form-control" value="<?= $row["end_time"] ?>"></td>
                                        </tr>
                                    </table>
                                    <div class="py-2">
                                        <div class="d-flex justify-content-end">

                                            <div class="py-2">
                                                <a href="../discounts" class="btn lightblueBtn mx-2">回折價券列表</a>
                                            </div>
                                            <div class="py-2">
                                                <button class="btn yellowBtn" type="submit">儲存</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            <?php else : ?>
                                沒有該使用者
                            <?php endif; ?>
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
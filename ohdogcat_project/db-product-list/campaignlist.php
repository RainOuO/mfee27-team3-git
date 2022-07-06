<!doctype html>
<html lang="en">

<head>
    <title>活動票券列表</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/css/custom-bs.css">
    <link rel="stylesheet" href="../template/css/style.css">
    <style>
        * {
            -webkit-user-drag: none;
            font-family: 'Noto Sans TC', sans-serif;
            color: #222934;

        }

        .filterBtn {
            color: #222934;
            background-color: #FFC845;
        }

        .detailBtn {
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

            /* margin: 2px; */

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
                    <div class="content-header d-flex justify-content-end flex-shrink-0">
                        <a href="" class="d-flex justify-content-end align-items-center">
                            <div class="user-name pe-4">汪汪先輩</div>
                            <div class="user-sticker rounded-3 overflow-hidden"><img src="../images/dashboard/pohto_user-sticker.jpg" class="fill-w" alt=""></div>
                        </a>
                    </div>
                    <hr class="flex-shrink-0">
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100 px-4">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <div class=" pb-2">
                                <h2>活動票券列表</h2>
                            </div>
                            <div class="pe-1" role="">
                                <input type="button" class="btn catBtn my-3" value="商品總覽" onclick="window.location.href='backtoALLIST.php'">
                                <input type="button" class="btn catBtn my-3" value="旅遊票券列表" onclick="window.location.href='travellist.php'">
                                <input type="button" class="btn catBtn my-3" value="餐廳票券列表" onclick="window.location.href='restaurantlist.php'">
                                <input type="button" class="btn catBtn my-3" value="活動票券列表" onclick="window.location.href='campaignlist.php'">
                                <input type="button" class="btn catBtn my-3" value="實體商品列表" onclick="window.location.href='productlist.php'">

                            </div>
                        </div>
                        <div class="d-flex justify-content-between row pb-1 pe-3">
                            <div class="d-flex justify-content-start col-7">
                                <div class="dropdown mt-3 d-flex align-items-center ">
                                    <button class="btn dropdown-toggle btn-lg m-2 filterBtn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        篩選條件
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" id="keyFilter">關鍵字查詢</a></li>
                                        <li><a class="dropdown-item" id="dateFilter">上架區間查詢</a></li>
                                        <li><a class="dropdown-item" id="priceFilter">價格區間查詢</a></li>
                                    </ul>
                                </div>
                                <div class="filters ms-2">
                                    <div id="searchbykey" style="display:none">
                                        <form action="doFilter-keyword.php" method="post">
                                            <div class="col-10 d-flex mt-4 keywordBar ">
                                                <input type="text" class="col-9 form-control " name="keyword" placeholder="輸入關鍵字">
                                                <button class="col-3 btn mx-2 filterBtn" type="submit">搜尋</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="filters ms-2">
                                    <div id="searchbydate" style="display:none">
                                        <form action="doFilter-date.php" method="post">
                                            <div class="col-10 d-flex mt-4">
                                                <div class="col-5 mx-1">
                                                    <div class="dateF">上架日</div>
                                                    <input type="date" class="form-control dateS" name="start-date">
                                                </div>
                                                <div class="col-auto mx-1 mt-3">
                                                    <div class="">~</div>
                                                </div>
                                                <div class="col-5 mx-1">
                                                    <div class="dateF">下架日</div>
                                                    <input type="date" class="form-control dateS" name="end-date">
                                                </div>
                                                <button class=" col-auto btn mx-1 filterBtn" type="submit">搜尋</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="filters ms-2">
                                    <div id="searchbyprice" style="display:none">
                                        <form action="doFilter-price.php" method="post">
                                            <div class="col-9 d-flex mt-4 priceBar">
                                                <input type="number" class="form-control mx-1" placeholder="價格最小值~" name="min-price">
                                                <input type="number" class="form-control mx-1" placeholder="~價格最大值" name="max-price">
                                                <button class="col-auto btn ms-1 filterBtn" type="submit">搜尋</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 row d-flex justify-content-end btn-group align-items-center mt-4">
                                <a href="" class="orderBtn  col-2 ">單價↑</i></a>
                                <a href="" class="orderBtn col-2 ">單價↓</i></a>
                                <a href="" class="orderBtn  col-2 ">上架時間↑</i></a>
                                <a href="" class="orderBtn  col-2 ">上架時間↓</i></a>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="countBox">
                                <h4 class="countBox">以下商品共: 00筆</h4>
                            </div>
                            <button class="btn filterBtn me-1 ms-3 my-3">新增商品</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">票券ID</th>
                                        <th class="align-middle">商品分類</th>
                                        <th>商品名稱</th>
                                        <th>商品描述</th>
                                        <th>優惠方案</th>
                                        <th class="align-middle text-end">單價</th>
                                        <th class="align-middle text-center">上架區間</th>
                                        <th class="align-middle text-center">庫存</th>
                                        <th class="align-middle text-center">啟用</th>
                                        <th class="align-middle text-center">編修</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">001</td>
                                        <td class="align-middle text">寵物周邊>寵物服飾>小型犬></td>
                                        <td class="align-middle">狗狗救生衣</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>站內年中慶 全站三件打85折</td>
                                        <td class="align-middle text-end">379</td>
                                        <td class="align-middle text-center">22/07/05~22/07/31</td>
                                        <td class="align-middle text-center">20</td>
                                        <td class="align-middle text-center">1</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">002</td>
                                        <td class="align-middle ">寵物周邊>寵物服飾>貓</td>
                                        <td class="align-middle">貓咪造型衣服</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>站內年中慶 全站三件打85折</td>
                                        <td class="align-middle text-end">3790</td>
                                        <td class="align-middle text-center">22/07/15~22/09/30</td>
                                        <td class="align-middle text-center">11</td>
                                        <td class="align-middle text-center">1</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">003</td>
                                        <td class="align-middle ">寵物周邊>寵物清潔></td>
                                        <td class="align-middle">潔牙骨</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>兒童節寵愛牠</td>
                                        <td class="align-middle text-end">2000</td>
                                        <td class="align-middle text-center">22/07/01~22/08/30</td>
                                        <td class="align-middle text-center">9</td>
                                        <td class="align-middle text-center">1</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">004</td>
                                        <td class="align-middle ">寵物周邊>寵物清潔></td>
                                        <td class="align-middle">貓砂</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>站內年中慶 全站三件打85折</td>
                                        <td class="align-middle text-end">1900</td>
                                        <td class="align-middle text-center">22/07/05~22/08/05</td>
                                        <td class="align-middle text-center">5</td>
                                        <td class="align-middle text-center">1</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">005</td>
                                        <td class="align-middle ">寵物周邊>寵物食品>貓食</td>
                                        <td class="align-middle">貓咪零嘴</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>兒童節寵愛牠</td>
                                        <td class="align-middle text-end">1780</td>
                                        <td class="align-middle text-center">22/07/10~22/08/18</td>
                                        <td class="align-middle text-center">7</td>
                                        <td class="align-middle text-center">1</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">006</td>
                                        <td class="align-middle ">寵物周邊>寵物食品>搔癢棒</td>
                                        <td class="align-middle">貓咪玩具</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>兒童節寵愛牠</td>
                                        <td class="align-middle text-end">350</td>
                                        <td class="align-middle text-center">22/08/10~22/08/18</td>
                                        <td class="align-middle text-center">15</td>
                                        <td class="align-middle text-center">0</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">007</td>
                                        <td class="align-middle ">寵物周邊>寵物食品>狗食</td>
                                        <td class="align-middle">狗狗罐頭</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>父親節優惠</td>
                                        <td class="align-middle text-end">350</td>
                                        <td class="align-middle text-center">22/07/15~22/09/18</td>
                                        <td class="align-middle text-center">7</td>
                                        <td class="align-middle text-center">1</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">008</td>
                                        <td class="align-middle ">寵物周邊>寵物服飾>貓</td>
                                        <td class="align-middle">貓圍巾</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>站內年中慶 全站三件打85折</td>
                                        <td class="align-middle text-end">300</td>
                                        <td class="align-middle text-center">22/07/10~22/08/18</td>
                                        <td class="align-middle text-center">6</td>
                                        <td class="align-middle text-center">1</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">009</td>
                                        <td class="align-middle ">寵物周邊>寵物食品>貓食</td>
                                        <td class="align-middle">貓咪零嘴</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>618周年慶 滿千送百</td>
                                        <td class="align-middle text-end">1050</td>
                                        <td class="align-middle text-center">22/07/10~22/08/18</td>
                                        <td class="align-middle text-center">2</td>
                                        <td class="align-middle text-center">1</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">010</td>
                                        <td class="align-middle">寵物周邊>護具>狗></td>
                                        <td class="align-middle">狗狗項圈</td>
                                        <td class="align-middle">商品描述...</td>
                                        <td>毛孩親一夏優惠活動 滿300折扣...</td>
                                        <td class="align-middle text-end">790</td>
                                        <td class="align-middle text-center">22/07/10~22/08/18</td>
                                        <td class="align-middle text-center">售完</td>
                                        <td class="align-middle text-center">0</td>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn detailBtn">查看</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        let keywordFilter = document.querySelector("#keyFilter");
        let key = document.querySelector("#searchbykey");
        let dateFilter = document.querySelector("#dateFilter");
        let date = document.querySelector("#searchbydate");
        let priceFilter = document.querySelector("#priceFilter");
        let price = document.querySelector("#searchbyprice");

        keywordFilter.addEventListener("click", function() {
            // console.log("click2");
            key.style.display = "block";
            date.style.display = "none";
            price.style.display = "none";
        });
        dateFilter.addEventListener("click", function() {
            // console.log("click2");
            key.style.display = "none";
            date.style.display = "block";
            price.style.display = "none";
        });
        priceFilter.addEventListener("click", function() {
            // console.log("click3");
            key.style.display = "none";
            date.style.display = "none";
            price.style.display = "block";
        });
    </script>
</body>

</html>
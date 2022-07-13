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
                            <h2 class="m-0">新增優惠券</h2>
                        </div>
                        <!--汪汪照片區<a>-->
                        <a href="../store-info/" class="d-flex justify-content-end align-items-center flex-shrink-0">
                            <div class="user-name pe-4"><?= $userNickName ?></div>
                            <div class="user-sticker rounded-3 overflow-hidden border border-1 p-1 bg-white"><img src="../images/store_photo/<?= $userPhoto ?>" class="fill-w object-fit" alt=""></div>
                        </a>
                    </div>
                    <hr class="flex-shrink-0">
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100">

                        <!-- 家豪模板區 ------------------->

                        <style>
                            #set_time {
                                display: block;
                            }

                            #set_code {
                                display: block;
                            }

                            #good {
                                display: none;
                                color: blue;
                            }

                            #nogood {
                                display: none;
                                color: red;
                            }

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
                        </style>

                        <body>
                            <div class="container">
                                <form action="doCreate.php" method="post">
                                    <div class="mb-2">
                                        <label for="">優惠券名稱： </label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">優惠券敘述： </label>
                                        <input type="text" class="form-control" name="description">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">種類： </label><br>
                                        <Input type="Radio" name="category_id" value="1" required onclick="document.getElementById('set_code').style.display = 'block'" checked>%數折價券
                                        <Input type="Radio" name="category_id" value="2" onclick="document.getElementById('set_code').style.display = 'block'">現金折價券
                                    </div>
                                    <div class="mb-2">
                                        <label for="">折扣數字：</label>
                                        <input type="number" class="form-control" name="discount_number" placeholder="EX:8折優惠/優惠券需填入80、現金折價100元需填入100" required>
                                    </div>
                                    <div class="mb-2" id="set_code">
                                        <label for="">請填入八碼序號（限定使用英文大寫、數字）： <br></label>
                                        <input type="text" class="form-control" id="code" name="discount_code" placeholder="EX:HAPPY100" onblur="myFunction(value)">
                                        <h6 id="good">此序號可使用</h6>
                                        <h6 id="nogood">此序號不可使用</h6>

                                        <script>
                                            const value = document.getElementById("code").value;

                                            function myFunction(value) {
                                                var regex = /[A-Z0-9]{8}/;
                                                if (!regex.test(value)) {
                                                    document.getElementById('good').style.display = 'none'
                                                    document.getElementById('nogood').style.display = 'block'
                                                } else {
                                                    document.getElementById('good').style.display = 'block'
                                                    document.getElementById('nogood').style.display = 'none'
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">優惠券數量：</label>
                                        <input type="number" class="form-control" name="amount">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">可用優惠券的最低價格：</label>
                                        <input type="number" class="form-control" name="lower_limit">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">是否限制使用時間： </label><br>
                                        <Input type="Radio" name="state" value="1" onclick="document.getElementById('set_time').style.display = 'block'" required checked>限制
                                        <Input type="Radio" name="state" value="0" onclick="document.getElementById('set_time').style.display = 'none'">不限制
                                    </div>
                                    <div id="set_time">
                                        <div class="mb-2">
                                            <label for="">優惠啟用時間</label>
                                            <input type="date" class="form-control" name="start_time">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">優惠結束時間</label>
                                            <input type="date" class="form-control" name="end_time">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end ">
                                        <button class="btn yellowBtn me-2" type="submit">確認送出</button>
                                        <a href="discounts.php" class="lightblueBtn btn">回折價券列表</a>
                                    </div>
                                </form>
                            </div>



                            <!-- 家豪模板區 ------------------->
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

<!-- 家豪模板區 ------------------->
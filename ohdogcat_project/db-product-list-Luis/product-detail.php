<?php
// session_start();
// $id = $_SESSION["user"]['id'];

$page = isset($_GET["page"]) ?  $page = $_GET["page"] : 1;
$perPage = 10;
$start = ($page - 1) * $perPage;

// if (!isset($_GET['id'])) {
//     echo "沒有資料";
//     exit;
// }

// $id = $_GET["id"];

require("db-connect.php");
require("doproducts.php");
$sql2 = "SELECT * FROM product WHERE valid=1 ";
///////////////我把指定get id=$id取消了 22:00更改 記得改回來
$result2 = $conn->query($sql2);


$product_count = $result2->num_rows; //取得資料筆數 


//頁碼

$sqlALL = "SELECT * FROM product";
$resultALL = $conn->query($sqlALL); //連線
$productPage_count = $resultALL->num_rows; //秀頁碼

$starItem = ($page - 1) * $perPage + 1; //開始的筆數
$endItem = $page * $perPage; //結束的筆數
if ($endItem > $productPage_count) {
    $endItem = $productPage_count;
};

$totalPage = 1;
$quotient = floor($productPage_count / $perPage);  //商數 取商數後無條件捨去floor
$remainder = ($productPage_count % $perPage); //餘數

if ($remainder === 0) {
    $totalPage = $quotient;
} else {
    $totalPage = $quotient + 1;
}
//撈權限id
$store_right = $_SESSION["user"]['store_right'];
$type = isset($_GET["type"]) && !empty($_GET["type"]) ? $_GET["type"] : "";

////撈權限id
//////側欄開始
$sqlCate =  "SELECT * FROM p_type WHERE id='$store_right'";
$resultCate = $conn->query($sqlCate); 
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);
$rowsCate1 = $resultCate->num_rows;

///////////////從資料庫撈圖商品圖片
$userstore_right = $_SESSION["user"]['store_right'];
require("db-connect.php");
///////////////2022 7 10 8:45分改了 $userstore_right 原本是$id 
$sqll = "SELECT * FROM product WHERE store_id='$userstore_right'";
$results = $conn->query($sqll);
$rowss = $results->fetch_all(MYSQLI_ASSOC);
// var_dump($rowss);
?>



<!doctype html>
<html lang="en">

<head>
    <title>商品基本資料編輯</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/css/custom-bs.css">
    <link rel="stylesheet" href="../template/css/style.css">
    <script src="https://cdn.tiny.cloud/1/ay2w3c7mo5uqcc06wa6n04dowpis8ayyklz2btqenk5c9kp8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .photo-window {
            text-align: center;

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

        .cover-photo img {
            width: 500px;
            height: 500px;
            /* border: 1px solid #000; */
            border-radius: 15px;
            min-width: 350px;
            width: 100%;
            object-fit: contain;
            overflow: hidden;
        }

        .slideshow {
            box-shadow: 2px 2px 5px;
            width: 600px;
            max-width: 100%;
            height: 170px;
            overflow-y: auto;
            object-fit: contain;
            white-space: nowrap;
        }


        .photo1 {
            width: 150px;
            height: 150px;
        }



        .photo-upload .photo-window {
            max-width: 100%;
        }


        .swiper {
            width: 600px;
            height: 160px;
            /* background: #D5EEEE;
            border: 5px solid #D5EEEE; */
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
            border: 1px solid lightgrey;
        }
    </style>
</head>

<body class="bg vw-100 vh-100" id="bg">
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

                                        <a href="AllProductList.php" class="menu-link">商品總覽</a>
                                    </li>
                                    <li>
                                        <?php foreach ($rowsCate as $row) : ?>
                                            <?php if ($type == $row["type_name"]) ?>
                                            <a href="AllProductList.php?type=<?= $row['id'] ?>&page=1" class="menu-link"><?= $row['type_name'] ?></a>
                                        <?php endforeach; ?>
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
                    <li class="menu-item"><a href="user1.php" class="menu-button icon-setting no-accordion">商家設定</a></li>
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
                        <?php if (isset($_SESSION["user"])) : ?>
                                <div class="user-name pe-4"> 歡迎 <?= $_SESSION["user"]["account"] ?></div>
                            <?php endif; ?>
                            <div class="user-sticker rounded-3 overflow-hidden"><img src="../images/dashboard/pohto_user-sticker.jpg" class="fill-w" alt=""></div>
                        </a>
                    </div>
                    <hr class="flex-shrink-0">
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100 p-4">
                        <?php if ($product_count > 0) : ?>
                            <div class="border-bottom pb-2">
                                <h2>商品內容管理</h2>
                            </div>
                            <div class="d-flex justify-content-between align-items-center m-2">
                                <div class="title d-flex mt-2">
                                    <img src="./IMAGES/8666681_edit_icon.png" width="48" height="48" alt="">
                                    <h4 class="pt-3">基本設定(**項目為必填不可空白)</h4>
                                </div>
                                <div class="crudBox">
                                    <button type="button" class="btn filterBtn mx-1">編輯</button>
                                    <button type="button" class="btn filterBtn ms-1" onclick="window.location.href='AllProductList.php'">返回總表</button>
                                </div>
                            </div>
                            <hr>

                            <div class="row d-flex justify-content-center">
                                <div class="photobar d-flex flex-column col-5">
                                    <div class="photo-window d-flex flex-column  ">
                                        <div class="cover-photo m-3">
                                            <!-- 商家封面開始 -->
                                            <img class="object-cover" <?php if ($rowss[0]["main_photo"] == '') : ?>
                                        img src="./IMAGES/3669480_account_circle_ic_icon.svg" alt="">
                                <?php else : ?>
                                    <img src="../images/dashboard/<?= $rowss[0]["main_photo"] ?>" alt="">
                                <?php endif; ?>
                                        <!-- 商品照片開始 -->
                                    </div>
                                    <div class="swiper mySwiper ">
                                        <div class="swiper-wrapper">
                                            <?php if ($rowss[0]["sub_photo"] == '') : ?> 
                                                <img class="object-cover"src="./IMAGES/doglogo.png"alt="">
                                        <?php else : ?>
                                            <?php  
                                            $rowphoto=explode(",",$rowss[0]["sub_photo"]); //explode去除逗號
                                            array_pop($rowphoto);
                                            foreach($rowphoto as $rowaa){
                                                echo "<div class='swiper-slide photo1'><img src='../IMAGES/dashboard/$rowaa'/></div>";
                                                }?>
                                            <?php endif; ?>
                                            <!-- <div class="swiper-slide photo1"><img class="" src="./IMAGES/doglogo.png" alt=""></div> -->
                                            <!-- <div class="swiper-slide photo1"><img class="" src="./IMAGES/doglogo.png" alt=""></div> -->
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                                    <form action="photoUpdate.php" method="post" enctype="multipart/form-data">
                                        <div class="row photo-upload mt-3 d-flex justify-content-center">
                                            <div class=" d-flex col-6">
                                                <input class="form-control" type="file" name="MainmyFile">
                                                <button class="btn filterBtn" type="submit">封面照片</button>
                                            </div>
                                            <div class="d-flex col-6">
                                                <input class="form-control" type="file" name="myFile">
                                                <button class="btn filterBtn" type="submit">商品照片</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="basic-setting col-6">
                                    <?php if ($product_count > 0) :
                                        $row = $result2->fetch_assoc() ?>
                                        <form action="doUpdate">
                                            <label for="">商品名稱**</label>
                                            <div type="text" name="name" class="py-2"><?= $row['name'] ?> </div>
                                            <label for="">商品分類**</label>
                                            <div name='category' class=" py-2">
                                                <?= $row['product_category'] ?>
                                            </div>
                                            <label for="">商品簡介</label>
                                            <div type="text" name="intro" class="py-2"><?= $row['description'] ?></div>
                                            <label for="">商品價格**</label>
                                            <div type="text" name="price" class="py-2">NTD: <?= $row['price'] ?></div>
                                            <div class="d-flex mt-2">
                                                <img src="./IMAGES/8666681_edit_icon.png" width="48" height="48" alt="">
                                                <h3 class="pt-3">進階設定</h3>
                                            </div>
                                            <hr>
                                            <label for="">上架時間</label>
                                            <div type="datetime-local" name="spec" class=""><?= $row['valid_time_start'] ?></div>
                                            <label for="">下架時間</label>
                                            <div type="datetime-local" name="spec" class=""><?= $row['valid_time_end'] ?></div>
                                            <label for="">優惠券方案使用</label><br>
                                            <select name='dragdown' class="form-control">
                                                <option value='0'>全站周年慶</option>
                                                <option value='1'>父親節活動</option>
                                                <option value='2'>兒童節寵愛牠</option>
                                                <option value='4'>站內年中慶 全站三件打85折</option>
                                                <option value='5'>由優惠券管理作連動</option>
                                                <option value='6'>無</option>
                                            </select>
                                            <label for="">資料創建時間</label>
                                            <div type="date" name="spec" class=""><?= $row['create_time'] ?></div>
                                            <label for="">商品庫存數</label>
                                            <div type="text" name="spec" class=""><?= $row['stock_quantity'] ?></div>
                                            <!-- <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    商品售罄提醒 <span style="color: red">**系統會在庫存數量小於10的時候發送站內信提醒**</span>
                                                </label>
                                            </div> -->
                                        </form>
                                    <?php else : ?>
                                        無此筆資料
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr>
                            <form method="post">
                                <div class="text-end mb-1 d-flex justify-content-between">
                                    <h3>商品文案編輯頁面</h3> <button class="btnry" type="submit">儲存草稿</button>
                                </div>
                                <textarea id="mytextarea" name="product">歡迎編輯 請勿上傳不雅文字</textarea>
                            </form>
                            <hr>
                            <div class="d-flex justify-content-end">
                                <div class="crudBox">
                                    <button type="button" class="btn filterBtn mx-1"><a href="product-edit-new-swiper.php?id=<?= $row['id'] ?>">編輯</a>編輯</button>
                                    <button type="button" class="btn filterBtn ms-1">返回總表</button>
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

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
</body>
<?php else : ?>
    目前沒有資料
<?php endif; ?>

</html>
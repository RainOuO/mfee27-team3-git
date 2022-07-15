<?php

require("./db-connect.php");

$type = isset($_GET["type"]) && !empty($_GET["type"]) ? $_GET["type"] : "";
$storeID = "";
//第二階段 : 加入store_id 取值
$type = $_GET["type"];


//拉 discount_store 資料庫放入下拉式選單
$sql = "SELECT * FROM discount_store WHERE valid = 1 AND buyer_valid = 1 ";
$result = $conn->query($sql);

//拉 product_class 資料庫放入下拉式選單
$sqlP = "SELECT * FROM product_class ";
$resultP = $conn->query($sqlP);


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
    <!-- <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script> -->
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

        label {
            font-size: 18px;
            font-weight: 500;
        }

        .cover-photo img {
            width: 500px;
            height: 500px;
            min-width: 350px;
            width: 100%;
            object-fit: contain;


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
            max-width: 100%;

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

        .a-upload input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer
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
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100 p-4">

                        <div class="border-bottom pb-2">
                            <h2>商品內容管理</h2>
                        </div>
                        <form action="doCreateNew.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="<?= $type ?>" />
                            <div class="d-flex justify-content-between align-items-center m-2">
                                <div class="title d-flex mt-2">
                                    <img src="./IMAGES/8666681_edit_icon.png" width="48" height="48" alt="">
                                    <h4 class="pt-3">基本設定(**項目為必填不可空白)</h4>
                                </div>
                                <div class="crudBox">
                                    <button type="submit" class="btn filterBtn mx-1">儲存</button>
                                    <button type="button" class="btn filterBtn ms-1" onclick="window.location.href='allProductList.php?store_id=<?= $storeID ?>&type=<?= $type ?>'">取消新增</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="photobar d-flex flex-column col-5">
                                    <div class="photo-window d-flex flex-column  ">
                                        <div class="cover-photo m-3">
                                            <img src="./IMAGES/no_img.png" alt="" id="preview_cover_img" src="#">
                                        </div>
                                        <div class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide photo1"><img class="" src="./IMAGES/no_img.png" alt="" id="preview_sub_img1" src="#"></div>
                                                <div class="swiper-slide photo1"><img class="" src="./IMAGES/no_img.png" alt="" id="preview_sub_img2" src="#"></div>
                                                <div class="swiper-slide photo1"><img class="" src="./IMAGES/no_img.png" alt="" id="preview_sub_img3" src="#"></div>
                                                <div class="swiper-slide photo1"><img class="" src="./IMAGES/no_img.png" alt="" id="preview_sub_img4" src="#"></div>
                                                <div class="swiper-slide photo1"><img class="" src="./IMAGES/no_img.png" alt="" id="preview_sub_img5" src="#"></div>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                    <!-- 圖片上傳UI位置 -->
                                    <div class="row photo-upload mt-3 d-flex justify-content-center">
                                        <div class="col-5 ">

                                            <h6>封面照片</h6>
                                            <input class="form-control" type="file" name="main_photo" onchange="readURL(this)" targetID="preview_cover_img" accept="image/gif, image/jpeg, image/png">
                                        </div>
                                        <div class="col-7 row">
                                            <!-- 第二階段 清空撤回圖片 -->
                                            <h6>商品照片</h6>
                                            <div class="col-auto"><input class="form-control" type="file" name="sub_photo1" onchange="readURL(this)" targetID="preview_sub_img1" accept="image/gif, image/jpeg, image/png"></div>
                                            <div class="col-auto"><input class="form-control" type="file" name="sub_photo2" onchange="readURL(this)" targetID="preview_sub_img2" accept="image/gif, image/jpeg, image/png"></div>
                                            <div class="col-auto"><input class="form-control" type="file" name="sub_photo3" onchange="readURL(this)" targetID="preview_sub_img3" accept="image/gif, image/jpeg, image/png"></div>
                                            <div class="col-auto"><input class="form-control" type="file" name="sub_photo4" onchange="readURL(this)" targetID="preview_sub_img4" accept="image/gif, image/jpeg, image/png"></div>
                                            <div class="col-auto"><input class="form-control" type="file" name="sub_photo5" onchange="readURL(this)" targetID="preview_sub_img5" accept="image/gif, image/jpeg, image/png"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="basic-setting col-6">
                                    <label for="">商品名稱**</label>
                                    <input type="text" name="name" placeholder="最多輸入20字元，禁用特殊符號" class="form-control" value="" required>
                                    <label for="">商品分類**</label>
                                    <select name='category' class="form-control" required>
                                        <!-- TO-DO 連動category -->
                                        <!-- 家豪: 改用資料庫連動下拉式選單 -->
                                        <?php while ($rowP = $resultP->fetch_assoc()) : ?>
                                            <option value='<?= $rowP["id"] ?>'> <?= $rowP['name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <label for="">商品簡述**</label>
                                    <input type="text" name="intro" placeholder="最多輸入50字元，至少10個字" class="form-control" required>
                                    <label for="">商品價格**</label>
                                    <input type="number" name="price" placeholder="只能輸入大於0的數字NTD" class="form-control" required>
                                    <!-- <label for="">商品規格</label>
                                    <input type="text" name="spec" placeholder="自由增建選項" class="form-control"required> -->
                                    <div class="d-flex mt-2">
                                        <img src="./IMAGES/8666681_edit_icon.png" width="48" height="48" alt="">
                                        <h3 class="pt-3">進階設定</h3>
                                    </div>
                                    <hr>
                                    <label for="">上架時間</label>
                                    <input type="datetime-local" name="valid_start" class="form-control" required>
                                    <label for="">下架時間</label>
                                    <input type="datetime-local" name="valid_end" class="form-control" required>
                                    <label for="">優惠券方案使用</label><br>
                                    <select name='coupon_id' class="form-control">
                                        <!-- 家豪: 改用資料庫連動下拉式選單 -->
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <option value='<?= $row["id"] ?>'> <?= $row['name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <!-- <label for="">商品更新時間</label>
                                    <input type="date" name="create_time" placeholder="自由增建選項" class="form-control" hidden> -->
                                    <label for="">商品庫存數</label>
                                    <input type="number" name="stock" placeholder="只能輸入大於0的數字" class="form-control">
                                    <!-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            商品售罄提醒 <span style="color: red">**系統會在庫存數量小於10的時候發送站內信提醒**</span>
                                        </label>
                                    </div> -->

                                </div>
                            </div>
                            <hr>
                            <label for="">商品文案編輯頁面</label>
                            <textarea class="form-control" rows="10" placeholder="請輸入文案" maxlength="500" name="description"></textarea>
                            <!-- <form method="post"> //第二階端開發功能 :所見及所得
                            <div class="text-end mb-1 d-flex justify-content-between">
                                <h3>商品文案編輯頁面</h3> <button class="btnry" type="submit">儲存草稿</button>
                            </div>
                            <textarea id="mytextarea" name="product">歡迎編輯 請勿上傳不雅文字</textarea></form> -->
                            <hr>
                            <div class="d-flex justify-content-end">
                                <div class="crudBox">
                                    <button type="submit" class="btn filterBtn mx-1">儲存</button>
                                    <button type="button" class="btn filterBtn ms-1" onclick="window.location.href='allProductList.php?store_id=<?= $storeID ?>&type=<?= $type ?>'">取消新增</button>
                                </div>
                            </div>
                        </form>
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
        //封面照片上傳預覽
        function readURL(input) {
            if (input.files && input.files[0]) {
                var imageTagID = input.getAttribute("targetID");
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById(imageTagID);
                    img.setAttribute("src", e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!-- <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script> -->
</body>

</html>
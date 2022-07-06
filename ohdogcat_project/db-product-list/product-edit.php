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
    <style>
        .photo-window {
            padding: 5px;
            text-align : center;
            
        }


        .filterBtn {
            color: #222934;
            background-color: #FFC845;
        }

        .cover-photo img {
            width: 500px;
            height: 500px;
            /* border: 1px solid #000; */
            border-radius: 15px;

        }

        .cover-photo img {

            object-fit: cover;
        }

        .slideshow {
         box-shadow: 2px 2px 5px;
            width: 600px;
            height: 170px;
            overflow-y: auto;
            object-fit: contain;
            white-space: nowrap;
        }


        .photo1 {
           width: 150px;
           height: 150px;
        }

        .photo1 img {
            
            object-fit: contain;
            border: 2px solid grey;

        }

        /* 網頁捲軸【寬度】 */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* 網頁捲軸【背景】顏色 */
        ::-webkit-scrollbar-track {
            background: #3cbdd0;
        }

        /* 網頁捲軸【把手】顏色 */
        ::-webkit-scrollbar-thumb {
            background: #D5EEEE;
            width: 5px;
            border-radius: 15px;
        }

        /* 網頁捲軸【滑過時】把手的顏色 */
        ::-webkit-scrollbar-thumb:hover {
            background: #49586f;
            height: 3px;
            width: 3px;
            border-radius: 10px;
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
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100 p-4">

                        <div class="border-bottom pb-2">
                            <h2>商品內容管理</h2>
                        </div>
                        <div class="d-flex justify-content-between align-items-center m-2">
                            <div class="title d-flex mt-2">
                                <img src="./8666681_edit_icon.png" width="48" height="48" alt="">
                                <h4 class="pt-3">基本設定(**項目為必填不可空白)</h4> 
                            </div>
                            <div class="crudBox">
                                <button type="button" class="btn filterBtn mx-1">修改</button>
                                <button type="button" class="btn filterBtn mx-1">複製</button>
                                <button type="button" class="btn filterBtn mx-1">清空</button>
                                <button type="button" class="btn filterBtn ms-1">刪除</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="photo d-flex flex-column col-5">
                                <div class="photo-window d-flex flex-column  ">
                                    <div class="cover-photo m-3">
                                        <img src="./dogsuit.jpg" alt="">
                                    </div>
                                    <div class="slideshow d-flex">
                                        <div class="photo1"> <img class="photo1" src="./dogsuit.jpg" alt=""></div>
                                        <div class="photo1"> <img class="photo1"src="./dog2.jpg" alt=""></div>
                                        <div class="photo1"> <img class="photo1" src="./dog.jpg" alt=""></div>
                                        <div class="photo1"> <img class="photo1" src="./dogsuit.jpg" alt=""></div>
                                        <div class="photo1"> <img class="photo1" src="./dogsuit.jpg" alt=""></div>
                                        <div class="photo1"> <img class="photo1"src="./dogsuit.jpg" alt=""></div>
                                        <div> <img class="photo1"src="./dogsuit.jpg" alt=""></div>
                                    </div>
                                </div>
                                <form action="doUpload.php" method="post" enctype="multipart/form-data">
                                    <div class="row upload mt-3 d-flex justify-content-center" >
                                        <div class=" d-flex col-6">
                                            <input class="form-control" type="file" name="myFile">
                                            <button class="btn filterBtn" type="submit">上傳封面照片</button>
                                        </div>
                                        <div class="d-flex col-6">
                                            <input class="form-control" type="file" name="myFile">
                                            <button class="btn filterBtn" type="submit">上傳商品照片</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="basic-setting col-6">
                                <form action="doUpdate">
                                    <label for="">商品名稱</label>
                                    <input type="text" name="name" placeholder="最多輸入20字元，禁用特殊符號" class="form-control">
                                    <label for="">商品分類</label>
                                    <input type="text" name="category" placeholder="預計下拉選單" class="form-control">
                                    <label for="">商品介紹</label>
                                    <input type="text" name="intro" placeholder="最多輸入50字元" class="form-control">
                                    <label for="">商品價格</label>
                                    <input type="text" name="price" placeholder="只能輸入大於0的數字" class="form-control">
                                    <label for="">商品規格</label>
                                    <input type="text" name="spec" placeholder="自由增建選項" class="form-control">
                                    <div class="d-flex mt-2">
                                        <img src="./8666681_edit_icon.png" width="48" height="48" alt="">
                                        <h3 class="pt-3">進階設定</h3>
                                    </div>


                                    <hr>
                                    <label for="">上架時間</label>
                                    <input type="datetime-local" name="spec" class="form-control">
                                    <label for="">優惠券使用</label>
                                    <input type="text" name="spec" placeholder="下拉式" class="form-control">
                                    <label for="">商品有效期限</label>
                                    <input type="text" name="spec" placeholder="自由增建選項" class="form-control">
                                </form>
                            </div>
                        </div>
                        <hr>
                        <form method="post">
                            <div class="text-end mb-1 d-flex justify-content-between">
                                <h3>商品網頁編輯頁面</h3> <button class="btnry" type="submit">儲存草稿</button>
                            </div>
                            <textarea id="mytextarea" name="product">歡迎編輯 傳到session</textarea>

                        </form>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <div class="crudBox">
                                <button type="button" class="btn filterBtn mx-1">修改</button>
                                <button type="button" class="btn filterBtn mx-1">複製</button>
                                <button type="button" class="btn filterBtn mx-1">清空</button>
                                <button type="button" class="btn filterBtn ms-1">刪除</button>
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

</html>
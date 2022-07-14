<?php
session_start();
require("../../db-connect.php");


// GET 資料處理
$store_id = $_GET['store_id'];

// SESSION 資料處理
$user_id = $_SESSION['user']['user_id'];

// 抓取 letter資料表內容，且只有 user_id AND $store_id資料
$sql = "SELECT * FROM letter where user_id = '$user_id' AND (store_id = '$store_id' OR store_id IS NULL)";
$result = $conn->query($sql);
$letterCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

// 抓取 users資料表內容，為了抓取 user_id對應名稱
$sqlUserName = "SELECT id,name FROM users WHERE id = '$user_id' ";
$resultUserName = $conn -> query($sqlUserName);
$rowsUserName = $resultUserName -> fetch_assoc();

// 抓取 store_info資料表內容，為了抓取 store_id對應名稱、圖片
$sqlStoreName = "SELECT id, name, photo FROM store_info WHERE id = '$store_id'";
$resultStoreName = $conn -> query($sqlStoreName);
$rowsStoreName = $resultStoreName -> fetch_assoc();

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/css/custom-bs.css">
    <link rel="stylesheet" href="../template/css/style.css">
    <link rel="stylesheet" href="<?= $css ?>">
    <style>
    main{
        overflow: hidden;
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

    .text-word-break{
        word-break: break-all;
        min-width: 50px;
        max-width: 200px;
    }

    .object-cover{
        object-fit: cover;
    }

    .stickers{
        border: 1px solid #ccc;;
        border-radius: 50%;
        width: 70%;
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
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100">
                        <div class="main-content p-4 position-relative">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                <h1>回覆</h1>
                            </div>
                            <?php foreach ($rows as $row) : ?>
                                <div class="card mb-3" style="max-width: auto;">
                                    <div class="row g-0">
                                        <div class="col-md-1 d-flex justify-content-center align-items-center object-cover">
                                            <?php if($row['reply_status'] == 1): ?>
                                                <img class="stickers" src="../images/profile-user.png" class="img-fluid rounded-start" alt="...">
                                            <?php else: ?>
                                                <?php if(isset($rowsStoreName['photo'])== null): ?>
                                                    <img class="stickers" src="../images/profile-user.png" class="img-fluid rounded-start" alt="...">
                                                <?php else: ?>
                                                    <img class="stickers" src="../images/store_photo/<?=$rowsStoreName['photo']?>" class="img-fluid rounded-start" alt="...">
                                                <?php endif;?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-1">
                                            <?php if($row['reply_status'] == 1){echo $rowsUserName['name'];}else{echo $rowsStoreName['name'];} echo "<br>" . $row['time']; ?>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="card-body">
                                                <p class="card-text"><?= $row['content'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </main>
                    <div class="bottom-area">
                        <hr>
                        <form action="UserDoReply.php" method="post">
                            <input name="user_id" type="hidden" value="<?= $user_id ?>">
                            <textarea class="form-control textarea" id="exampleFormControlTextarea1" rows="3" name="message" required placeholder="請輸入訊息" onkeydown="if(event.keyCode==32||event.keyCode==13){return false;}"></textarea>
                            <div class="error"></div>
                            <div class="row mt-2 g-2 justify-content-end">
                                <div class="col-2">
                                    <input class="btn filterBtn" type ="button" onclick="javascript:location.href='index.php'" value="返回"></input>
                                    <button class="btn filterBtn" type="submit">送出</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <script>
        // scroll Bar 永遠保持在最底部
        var chatHistory = document.getElementById("main");
        chatHistory.scrollTop = chatHistory.scrollHeight;
    </script>
</body>

</html>
<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
$id = $_SESSION["user"]['account'];
// $id=$_SESSION["user"]['name'];
// $id=$_SESSION["user"]['id'];
// $password=$_SESSION["user"]["password"];
require("../db-connect.php");

$sql = "SELECT * FROM store_info WHERE account='$id' ";
$result = $conn->query($sql);
$userCount = $result->num_rows;

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

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <style>
        .iconpen{
            margin-top: 5px;
            margin-right: 8px;
            width: 30px;
            height: 40px;
        }
        body {
            position: relative;
        }
        .btn5{
            border-radius: 5px;
            width: 100px;
            height: 35px;
            background-color: #FFC845;
        }
        

        .toastify {
            background: url("./IMAGES/bg_dog-icon.png") 12px center / 50px no-repeat, url('./IMAGES/bg_toast-bg.png') no-repeat center center / cover, #fff !important;
            color: #000;
        }
        .formpassword{
            width: 600px;
            font-size: 22px;

        }
        .btn6{
            
        background-color: #49586f;
        margin-top: 10px;
        margin-right: 15px;
        width: 130px;
        height: 40px;
        color: #fff;
        border-radius: 5px;
        padding: 8px 10px 20px 18px;
        }
        .btn6:hover{
        background-color: #ffc845;
            color: #000;
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
                <div class="menu-item"><a href="logout.php" class="menu-button no-accordion icon-logout">粗企玩</a></div>
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
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100">
                    <div class="d-flex bd-highlight mb-3">
                            <span class="iconpen">
                                <img src="./7968880_pen_pen tool_adobe illustrator tool_icon.svg" alt="">
                             </span>
                            <h2 class="me-auto  bd-highlight">變更密碼</h2>
                            <a href="edit.php" class=" btn6 bd-highlight">商家資訊總覽</a>
                            <!-- <a href="editpassword.php" class=" btn2 bd-highlight">變更新密碼</a> -->
                        </div>
                        <hr>


                        <?php if ($userCount > 0) :
                            $row = $result->fetch_assoc();
                        ?>
                            <!-- <div class="py-2">
                <a class="btn btn-info" href="user.php">取消</a>
            </div> -->
                            <form class="formpassword" action="passwordUpdate.php" method="POST">
                                <input name="id" type="hidden" value="<?= $row["id"] ?>">
                                <table class="table">


                                    <th>舊密碼</th>
                                    <td><input type="tel" name="password" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>新密碼</th>
                                        <td><input type="tel" name="newpassword" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>第二次輸入</th>
                                        <td><input type="tel" name="repassword" class="form-control"></td>
                                    </tr>

                                </table>
                                <div class="py-2 text-end">
                                    <button type="submit" class="btn5" href="#">儲存</button>
                                </div>
                            </form>

                        <?php else : ?>
                            沒有該使用者
                        <?php endif; ?>
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

<script>
        if ('<?=  $_SESSION['update'] ?>'== 'error1' ) {
            console.log(132);
            Toastify({
                text: "舊密碼輸入錯誤!",
                duration: 2000,
                destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                //   close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {

                    background: "linear-gradient(to right, rgb(255, 165, 0), #96c93d)",
                    width: "250px",
                    height: "50px",
                    padding: "15px  15px 5px 66px",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        }else if('<?=  $_SESSION['update'] ?>'== 'error2' ) {
            console.log(132);
            Toastify({
                text: "兩次密碼輸入不一致",
                duration: 2000,
                destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                //   close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {

                    background: "linear-gradient(to right, rgb(255, 165, 0), #96c93d)",
                    width: "250px",
                    height: "50px",
                    padding: "15px  15px 5px 66px",
                },
                onClick: function() {} // Callback after click
            }).showToast();
            
      }
      <?php $_SESSION['update']=''?>
        
       

       
    </script>














</body>











</html>
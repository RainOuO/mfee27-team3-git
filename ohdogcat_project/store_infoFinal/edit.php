<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
$id = $_SESSION["user"]['account'];
require("db-connect.php");

$sql = "SELECT * FROM store_info WHERE account='$id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$userCount = $result->num_rows;
$results = $conn->query($sql);
$rowss = $results->fetch_all(MYSQLI_ASSOC);

/////////////// 側邊欄位 join到type 商家權限名稱 

$sql = "SELECT id, type_name FROM p_type";
$result = $conn->query($sql);
$resultType = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$store_type = array_column($rows, 'type_name', 'id');
$rowType = $resultType->fetch_all(MYSQLI_ASSOC); //指定撈出p_type的權限

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            position: relative;
        }
        .emailinput,.phoneinput{
            height: 70px;
        }
       .passwordinput,.accountinput,.nameinput{
        
        height: 55px;
       }

        .iconpen {
            margin-top: 5px;
            margin-right: 8px;
            width: 30px;
            height: 40px;
        }

        .photoinputALL {
            margin-top: 25px;
            width: 530px;
    
            font-size: 20px;
            font-weight: 200;
        
        }
        

        .imgALL {
            margin-right: 50PX;
        }
        .table1{
            width: 650px;
            font-size: 20px;
            font-weight: 200;

        }
        .input1 {
            margin-top: 8px;
            
        }

        .btn1 {
            background-color: #49586f;
            margin-top: 10px;
            margin-right: 15px;
            width: 130px;
            height: 40px;
            color: white;
            border-radius: 5px;
            text-align: center;
            justify-content: center;
            align-items: center;
            display: flex;
            /* padding: 8px 10px 20px 18px; */
        }

        .btn1:hover {
            background-color: #ffc845;
            color: #000;
        }

        .btn2 {
            /* padding: 8px 10px 20px 28px; */
            text-align: center;
            justify-content: center;
            align-items: center;
            display: flex;
            background-color: #D5EEEE;
            margin-top: 10px;
            width: 130px;
            height: 40px;
            border-radius: 5px;
        }


        .btn2:hover {
            background-color: #ffc845;
            color: #000;
        }

        .btn3up{
            margin: 20px 0 0 0;
            background-color: #FFC845;
            width: 80px;
            height: 38px;
            border-radius: 5px;
            line-height: 25px;
        }

        .btndiv {
            position: absolute;
            right: 13%;
            top: 68%;
        }

        .btn4 {
            background-color: #FFC845;
            width: 80px;
            height: 50px;
            border-radius: 5px;
        }

        .object-cover {
            width: 550;
            height: 450px;
            object-fit: cover;
            margin: auto 50px;
        }

        .btnphoto {
            border-radius: 5px;
            width: 100px;
            height: 35px;
            background-color: #FFC845;
        }

        .inputphoto {
            width: 250px;
            background-color: #D5EEEE;
        }


        .toastify {
            background: url("./IMAGES/bg_dog-icon.png") 12px center / 50px no-repeat, url('./IMAGES/bg_toast-bg.png') no-repeat center center / cover, #fff !important;
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
                                        <a href="AllProductList.php" class="menu-link">商品總覽</a>
                                    </li>
                                    <li>
                                    <?php if ($store_type == [$row["store_right"]] ) ?>
                                        <a href="AllProductList.php?type=<?= $row['id'] ?>&page=1" class="menu-link"><?=$store_type[$row["store_right"]]?></a>
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
                            <h2 class="me-auto  bd-highlight">商家設定</h2>
                            <a href="user1.php" class=" btn1 bd-highlight">商家資訊總覽</a>
                            <a href="storerightup.php" class=" btn1 bd-highlight">變更商家權限</a>
                            <a href="editpassword.php" class=" btn2 bd-highlight">變更新密碼</a>
                        </div>
                        <hr>
                        <div class="d-flex my-4">

                            <div class="my-2 imgALL ">
                                <?php foreach ($rowss as $rowa) : ?>
                                    <img class="object-cover" <?php if (isset($rowa["photo"]) == null) : ?> 
                                        src="./IMAGES/3669480_account_circle_ic_icon.svg" alt="">
                                <?php else : ?>
                                    <img src="../images/store_photo/<?= $rowa["photo"] ?>" alt="">
                                <?php endif; ?>
                                <form class="photoinputALL" action="doUpdate.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="max_file_size" value="1024000">
                                    <div class="mb-2">
                                        <input class="form-control inputphoto mx-3" type="file" name="myFile">
                                    </div>
                                    <!-- <button class="btnphoto mx-2" type="submit">照片儲存</button> -->
                            <?php endforeach; ?>
                            </div>


                            <?php if ($userCount > 0) :
                                 ?>
                                <form  class="form1" action="doUpdate.php" method="POST">
                                    <input name="id" type="hidden" value="<?= $row["id"] ?>">
                                    <table class="table table1">

                                        <tr>
                                            <th>店家名稱</th>
                                            <td class="nameinput"><input type="text" name="name" class="form-control input1" value="<?= $row["name"] ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>帳號</th>
                                            <td class="input1 accountinput"> <?= $row["account"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>密碼</th>
                                            <td class="input1 passwordinput">*******</td>
                                        </tr>
                                        <tr>
                                            <th class="phoneinput" >連絡電話</th>
                                            <td><input type="tel" name="phone" class="form-control input1" value="<?= $row["phone"] ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="emailinput">Email</th>
                                            <td><input type="email" name="email" class="form-control input1" value="<?= $row["email"] ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label class="title " for="livingn">區域:</label>
                                            <select name="area">
                                                <option>北部</option>
                                                <option>中部</option>
                                                <option>南部</option>
                                            </select>
                                            </th>
                                            
                                            <!-- <th>地址</th> -->
                                            <td>
                                                <input type="text" name="address" class="form-control input1" value="<?= $row["address"] ?>">
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="py-2 btndiv">
                                        <!-- <button href="user1.php" type="submit" class="btn4 mx-2">取消</button> -->
                                        <button type="submit" class="btn3up mx-2">儲存</button>

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
        if ('<?= $_SESSION['updates'] ?>' == 'successs') {
            Toastify({
                text: "照片更新成功",
                duration: 4000,
                destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                //   close: true,
                gravity: "bottom", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {

                    background: "linear-gradient(to right, rgb(255, 165, 0), #96c93d)",
                    width: "160px",
                    height: "80px",
                    padding: "15px  15px 5px 66px",
                },
                onClick: function() {} // Callback after click
            }).showToast();
            <?php unset($_SESSION['updates']) ?>
        }
    </script>
</body>

</html>
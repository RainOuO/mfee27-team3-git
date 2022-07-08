<?php
require("./db-connect.php");

session_start();

// $min = (isset($_GET["min"])) ? (($_GET["min"]=='')? 0:$_GET["min"]) : 0;
// $max = (isset($_GET["max"])) ? (($_GET["max"]=='')? 9999:$_GET["max"]) : 9999;
// $category_id = (isset($_GET["category"])) ? (($_GET["category"]=='')? '':$_GET["category"]) : '';
// $sql_WHERE_category = ($category_id == '') ? '': "AND product.category_id = $category_id"; 

// $sqlCategory = "SELECT * FROM category";

// $resultCategory = $conn->query($sqlCategory);
// $categoryCount = $resultCategory->num_rows;
// $categoryRows = ($categoryCount>0)? $resultCategory->fetch_all(MYSQLI_ASSOC):'';

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$product_count = $result->num_rows;
$rows = ($product_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';


$sqlClass = "SELECT * FROM product_class";
$resultClass = $conn->query($sqlClass);
$productClass_count = $resultClass->num_rows;
$rowsClass = ($productClass_count>0)? $resultClass->fetch_all(MYSQLI_ASSOC):'';
$productClass = array_column($rowsClass, 'name', 'id');

$sqlStore = "SELECT id, name FROM store_info";
$resultStore = $conn->query($sqlStore);
$productStore_count = $resultStore->num_rows;
$rowsStore = ($productStore_count>0)? $resultStore->fetch_all(MYSQLI_ASSOC):'';
$storeName = array_column($rowsStore, 'name', 'id');




// 判斷分類
for($i=0; $i<count($rows); $i++){
    switch ($rows[$i]['store_class']) {
        case 1:
            $rows[$i]['store_class'] = '超級英雄';
            break;
        case 2:
            $rows[$i]['store_class'] = '政治英雄';
            break;
    }
};
?>

<!doctype html>
<html lang="en">

<head>
    <title>Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        * {
            -webkit-user-drag: none;
        }
        img {
            width: 100%;
            height: auto;
        }

        .object-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cart-count {
            width: 20px;
            height: 20px;
            background-color: red;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            font-size: 12px;
            transform: translate(50%, -50%);
            top: 0;
            right: 0;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="py-4 text-end">
                <button id="getCartInfo" class="btn btn-primary position-relative" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    購物車
                    <span class="cart-count"><?=(isset($_SESSION["cart"]) != 0)? count($_SESSION["cart"]):0;?></span>
                </button>
            </div>
            <div class="py-4">
                <div class="row">
                    <?php if($product_count>0):foreach($rows as $row): ?>
                    <div class="col-4 mb-2">
                        <div class="mb-5 py-2">
                            <figure class="ratio ratio-4x3">
                                <img class="object-cover" src="./images/<?=$row['main_photo']?>" alt="">
                            </figure>
                            <div class="d-flex justify-content-between">
                                <div class="text-success" style="font-size: 14px;"><?= $row['store_class'] ?></div>
                                <div class="text-black" style="font-size: 14px;">店鋪：<?= $storeName[$row['store_id']] ?></div>
                            </div>
                            
                            <div class="text-black text-right py-2"
                                style="font-size: 12px;">分類：<?= $productClass[$row['product_class_id']] ?></div>
                            <h2 class="h4 fw-bold"><?=$row['name']?></h2>
                            <p>$ <?=$row['price']?></p>
                            <button class="btn btn-info btn-cart text-white  w-100" data-id="<?=$row['id']?>"
                                data-store="<?=$row['store_id']?>">加入購物車</button>
                        </div>
                    </div>
                    <?php endforeach; else: ?>
                    <p class="text-danger">範圍內查無商品</p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- 購物車內容 -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="offcanvas-body">
                    <div class="border-bottom border-1 pb-4">
                        <h5>店鋪ID：</h5>
                        <div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                        <div style="font-size: 14px;">品名</div>
                                        <div style="font-size: 12px;">數量</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="cart.php" class="btn btn-info text-white position-relative w-100" href="cart.php">
                            結帳
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script>
        const btnAddCart = document.querySelectorAll(".btn-cart");
        const btnGetCartInfo = document.querySelector("#getCartInfo");

        for (let i = 0; i < btnAddCart.length; i++) {
            btnAddCart[i].addEventListener('click', function () {
                let productId = this.dataset.id;
                let storeId = this.dataset.store;
                let cartNum = document.querySelector('.cart-count');
                $.ajax({
                        method: "POST",
                        url: `./api/cart-info.php`,
                        dataType: "json",
                        data: {
                            action: 'add',
                            product_id: productId,
                            store_id: storeId
                        }
                    })
                    .done(function (response) {
                        let cartCount = 0;
                        for(let i of response.data){
                            cartCount += i.product.length;
                        }
                        console.log(response.data);
                        cartNum.innerText = cartCount;

                    }).fail(function (jqXHR, textStatus) {
                        console.log("Request failed: " + textStatus);
                    });
            });
        }


        btnGetCartInfo.addEventListener('click', function () {
            $.ajax({
                    method: "POST",
                    url: `./api/cart-info.php`,
                    dataType: "json",
                    data: {
                            action: 'get',
                        }
                })
                .done(function (response) {
                    let cartContent = document.querySelector('#offcanvas-body');
                    if( response.data == '' ){
                        cartContent.innerText = '購物車是空的';
                        // cartContent.appendChild('購物車是空的');
                    }else{
                        let htmlContent = ``;
                        for(let i of response.data){
                            let itemInfo = '';
                            for(let item=0; item<i['product'].length; item++){
                                itemInfo += `
                                <div>
                                    <div class="container-fluid p-0">
                                        <div class="row pb-2">
                                            <div class="col-4">
                                                <img src="./images/${i['image'][item]}" class="object-cover" alt="">
                                            </div>
                                            <div class="col-8">
                                                <div style="font-size: 14px;">品名：${i['product'][item]}</div>
                                                <div style="font-size: 12px;">數量：${i['amount'][item]}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }   
                            htmlContent += `<div class="border-bottom border-1 py-4"><h5 class="py-1">店鋪：${i['store'][1]}</h5>${itemInfo}<a href="cart.php?id=${i['store'][0]}" class="btn btn-info text-white position-relative w-100 mt-2">
                                    結帳
                                </a></div>`;
                        }
                        cartContent.innerHTML = htmlContent;
                        
                        

                    }
                    
                    // console.log(response.data);
                }).fail(function (jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
        });
    </script>
</body>
<?php //session_destroy();?>
</html>
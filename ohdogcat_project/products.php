<?php
require("./db-connect.php");

// session_start();

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
$sql = "SELECT * FROM product_class";
$result = $conn->query($sql);
$product_count = $result->num_rows;
$rows = ($product_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';
$
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

        .object-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #cart-count {
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
                <a href="cart.php" class="btn btn-info text-white position-relative" href="cart.php">
                    購物車
                    <span id="cart-count"><?=(isset($_SESSION["cart"]) != 0)? count($_SESSION["cart"]):0;?></span>
                </a>
            </div>
            <div class="py-4">
                <div class="row">
                    <?php if($product_count>0):foreach($rows as $row): ?>
                    <div class="col-4 mb-2">
                        <div class="mb-5 py-2">
                            <figure class="ratio ratio-4x3">
                                <img class="object-cover" src="../images/<?=$row['img']?>" alt="">
                            </figure>
                            <a class="text-success text-decoration-none"
                                href="?min=<?=$min?>&max=<?=$max?>&category=<?=$row['category_id']?>"><?=$row['category_name']?></a>
                            <h2 class="h4 fw-bold"><?=$row['name']?></h2>
                            <p>$ <?=$row['price']?></p>
                            <button class="btn btn-info btn-cart text-white  w-100" data-id="<?=$row['id']?>">加入購物車</button>
                        </div>
                    </div>
                    <?php endforeach; else: ?>
                    <p class="text-danger">範圍內查無商品</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="./inputListener.js"></script> -->
    <script>
        // let filterPrice = document.querySelectorAll('.priceInput');
        // for (let i = 0; i < filterPrice.length; i++) {
        //     filterPrice[i].addEventListener('input', () => {
        //         filterPrice[i].value = (filterPrice[i].value > 9999) ? 9999 : filterPrice[i].value;
        //         filterPrice[i].value = (filterPrice[i].value < 0) ? 0 : filterPrice[i].value;
        //     })
        // }
        // let filterBtn = document.querySelector('#filterBtn');
        // filterBtn.addEventListener('click', (event) => {
        //     if (filterPrice[0].value != '' && filterPrice[1].value != '') {
        //         let minValue = Number(filterPrice[0].value);
        //         let maxValue = Number(filterPrice[1].value);
        //         if (minValue > maxValue) {
        //             alert('輸入的金額區間無效');
        //             event.preventDefault();
        //         }
        //     }
        // });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script>
        const btnCart = document.querySelectorAll(".btn-cart");

        for (let i = 0; i < btnCart.length; i++) {
            btnCart[i].addEventListener('click', function () {
                let productId = this.dataset.id;
                let cartNum = document.querySelector('#cart-count');
                $.ajax({
                        method: "POST",
                        url: `../api/add-cart.php`,
                        dataType: "json",
                        data: {
                            product_id: productId
                        }
                    })
                    .done(function (response) {
                        cartNum.innerText = response.data.length;
                    }).fail(function (jqXHR, textStatus) {
                        console.log("Request failed: " + textStatus);
                    });
            });
        }
    </script>
</body>

</html>


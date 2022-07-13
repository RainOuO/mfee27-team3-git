<?php
session_start();
require('../template/login-verify.php');
$time = date('njGis');
$path = '../';
$css = "./style.css?$time";
$js = "./main.js?$time";
$main = "./main.php";
$header = "./header.php";
$filterSection = "./filter-section.php";
$footer = false;
$current = 'products';
$pageType = (isset($_GET['type'])&&!empty($_GET['type']))?$_GET['type']:'0';





require("../db-connect.php");
if (!isset($_SESSION["user"]))

    if (!isset($_GET['id'])) {
        echo "沒有資料";
        exit;
    }
$storeID = "";
$id = $_GET["id"];
//TO-DO
//商品id 使用seesion?
// require("./doproducts.php");
// $sql = "SELECT * FROM product WHERE valid=1 AND id = $id";
$sql = "SELECT product.*, discount_category.id AS coupon_id_new,
discount_category.name AS coupon_name, product_class.id AS p_id, product_class.name AS category_name FROM (product 
INNER JOIN discount_category ON discount_category.id = product.coupon_id ) INNER JOIN product_class ON product_class.id = product.product_category
WHERE product.valid = 1 and product.id = $id";

// $sql = $storeID ? "AND store_id = $storeID" : "";
$result = $conn->query($sql);

$type = isset($_GET["type"]) && !empty($_GET["type"]) ? $_GET["type"] : "";
$storeID = "";
$product_count = $result->num_rows; //取得資料筆數 

require('../template/dashboard.php');
?>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 35,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <script>
        let deleteBtn = document.querySelector("#deleteBtn");
        deleteBtn.addEventListener("click", function() {
            console.log("click-delete");

        });
    </script>


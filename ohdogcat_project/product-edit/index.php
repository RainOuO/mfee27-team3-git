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

if (!isset($_GET['id'])) {
    //Enhance-TO-DO: redirect to product not found page.
    echo "沒有資料";
    exit;
}
$type = isset($_GET["type"]) && !empty($_GET["type"]) ? $_GET["type"] : "";
$category = $_GET["category"];
$storeID = "";
$id = $_GET["id"];

//TO-DO
//商品id 使用seesion?
// $sql = "SELECT * FROM product WHERE valid=1 AND id = $id";
$sql = "SELECT product.*, discount_category.id AS coupon_id_new,
discount_category.name AS coupon_name, product_class.id AS p_id, product_class.name AS category_name FROM (product 
INNER JOIN discount_category ON discount_category.id = product.coupon_id ) INNER JOIN product_class ON product_class.id = product.product_category
WHERE product.valid = 1 and product.id = $id";
$result = $conn->query($sql);

$product_count = $result->num_rows; //取得資料筆數 

require('../template/dashboard.php');
?>


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
                console.log(imageTagID);
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById(imageTagID);
                    console.log(img);
                    img.setAttribute("src", e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
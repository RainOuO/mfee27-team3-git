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
$title = '新增商品';





require("../db-connect.php");

$storeID = $_SESSION['user']['id'];

$type = isset($_GET["type"]) && !empty($_GET["type"]) ? $_GET["type"] : "";
//第二階段 : 加入store_id 取值
$type = $_GET["type"];


//拉 discount_store 資料庫放入下拉式選單
$sql = "SELECT * FROM discount_store WHERE valid = 1 AND buyer_valid = 1 ";
$result = $conn->query($sql);

//拉 product_class 資料庫放入下拉式選單
$sqlP = "SELECT * FROM product_class ";
$resultP = $conn->query($sqlP);
// echo $type;

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
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById(imageTagID);
                    img.setAttribute("src", e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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

$type = isset($_GET["type"]) && !empty($_GET["type"]) ? $_GET["type"] : "";
$storeID = $_SESSION['user']['id'];
$type = $_GET["type"];
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
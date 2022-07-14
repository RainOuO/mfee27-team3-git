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
$footer = "./footer.php";
$current = 'discount';
$pageType = '1';
$title = '建立折扣碼優惠券';

require('../db-connect.php');

require('../template/dashboard.php');
?>

<script>
    const value = document.getElementById("code").value;

    function myFunction(value) {
        var regex = /[A-Z0-9]{8}/;
        if (!regex.test(value)) {
            document.getElementById('good').style.display = 'none'
            document.getElementById('nogood').style.display = 'block'
        } else {
            document.getElementById('good').style.display = 'block'
            document.getElementById('nogood').style.display = 'none'
        }
    }
</script>


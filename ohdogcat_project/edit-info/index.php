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
$current = 'store-info';
$pageType = false;
$title = '編輯商家資料';


$accout = $_SESSION["user"]['account'];
require("../db-connect.php");

$sql = "SELECT * FROM store_info WHERE account='$accout' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$userCount = $result->num_rows;
$results = $conn->query($sql);
$rowss = $results->fetch_all(MYSQLI_ASSOC);

/////////////// 側邊欄位 join到type 商家權限名稱 

$sql = "SELECT * FROM store_info WHERE account='$accout'"; //判定是帳號 可改成store_id
$result = $conn->query($sql);
$userCount = $result->num_rows;
//////////////   撈商家使用者資料
$results = $conn->query($sql);
$row = $result->fetch_assoc(); //撈所有使用者
$rowss = $results->fetch_all(MYSQLI_ASSOC);
var_dump($rowss);

$typeArr = explode(',', $row["store_right"]);

$sqlWHERE = '';
for ($i = 0; $i < count($typeArr); $i++) {
    if ($i == 0) {
        $ALLstore_right = $typeArr[$i];
        $sqlWHERE .= "id = $ALLstore_right";
    } else {
        $ALLstore_right = $typeArr[$i];
        $sqlWHERE .= " OR id = $ALLstore_right";
    }
}
$sql = "SELECT id, type_name FROM p_type WHERE $sqlWHERE";
$result = $conn->query($sql);
$resultType = $conn->query($sql);
$product_count = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);
for ($i = 0; $i < count($rows); $i++) { //更換測欄頁面的地方  記得改~~!! id:1=旅遊 id:2=餐廳
    switch ($rows[$i]['id']) {
        case 1:
            $rows[$i]['href'] = "user1.php";  //更換測欄頁面的地方  記得改~~!!
            break;
        case 2:
            $rows[$i]['href'] = "user2.php";
            break;
        case 3:
            $rows[$i]['href'] = "user3.php";
            break;
        case 4:
            $rows[$i]['href'] = "user4.php";
            break;
    } //更換測欄頁面的地方  記得改~~!!
}
$store_type = array_column($rows, 'type_name', 'vaild');
$rowType = $resultType->fetch_all(MYSQLI_ASSOC); //指定撈出p_type的權限
require('../template/dashboard.php');

?>

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

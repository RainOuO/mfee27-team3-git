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
$title = '更改密碼';


$accout = $_SESSION["user"]['account'];
// $id=$_SESSION["user"]['name'];
// $id=$_SESSION["user"]['id'];
// $password=$_SESSION["user"]["password"];
require("../db-connect.php");

$sql = "SELECT * FROM store_info WHERE account='$accout' ";
$result = $conn->query($sql);
$userCount = $result->num_rows;


$sql = "SELECT * FROM store_info WHERE account='$accout'"; //判定是帳號 可改成store_id
$result = $conn->query($sql);
$userCount = $result->num_rows;
//////////////   撈商家使用者資料
$results = $conn->query($sql);
$row = $result->fetch_assoc(); //撈所有使用者
$rowss = $results->fetch_all(MYSQLI_ASSOC);

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

    // let submit = document.querySelector('#submit');
    // let form = document.querySelector('#form');
    // submit.addEventListener('click', function(e) {
    //     Swal.fire({
    //         title: '你確定要更新密碼？',
    //         icon: 'info',
    //         showDenyButton: false,
    //         showCancelButton: true,
    //         confirmButtonText: '送出',
    //         denyButtonText: `取消`,
    //         }).then((result) => {
    //         if (result.isConfirmed) {
    //         }else if(Swal.DismissReason.backdrop){
    //             e.preventDefault();
    //         }
    //     })
    // });




    if ('<?=  $_SESSION['update'] ?>'== 'error1' ) {
            console.log(132);
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'info',
                title: '舊密碼輸入錯誤！'
            })
        }else if('<?=  $_SESSION['update'] ?>'== 'error2' ) {
            console.log(132);
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'info',
                title: '兩次密碼輸入不一致'
            })
            
      }
      <?php $_SESSION['update']=''?>
</script>


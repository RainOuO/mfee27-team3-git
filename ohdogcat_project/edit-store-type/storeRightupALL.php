<?php
require("../db-connect.php");
session_start();
$id = $_SESSION["user"]['account'];  //抓帳號使用者傳給他
$type_1 = (isset($_POST["type_1"]))? $_POST["type_1"]:'';
$type_2 = (isset($_POST["type_2"]))? $_POST["type_2"]:'';
$type_3 = (isset($_POST["type_3"]))? $_POST["type_3"]:'';
$type_4 = (isset($_POST["type_4"]))? $_POST["type_4"]:'';
$typeArr = [ $type_1, $type_2, $type_3, $type_4];
$storeRight = [];
//判斷 true 的有那些，抓進 storeRight
foreach($typeArr as  $item){
    if($item){
        array_push($storeRight, $item);
    }
}
$storeRight_text = ''; 
echo $storeRight_text;
// 把是 true 的值組成 sql 語法要用的字串
for($i=0; $i<count($storeRight); $i++){
    if($i == (count($storeRight)-1)){
        $storeRight_text .= $storeRight[$i];
    }else{s
        $storeRight_text .= $storeRight[$i].",";
    }
}
echo $storeRight_text;



$sql = "UPDATE store_info SET store_right= '$storeRight_text'  WHERE account='$id'";



if ($conn->query($sql) === TRUE) {
    // echo "權限輸改成功! ";
    $_SESSION['update'] = 'success';
         header("location: ../store-info");


    
} else {
    echo "建立資料表錯誤: " . $conn->error;
};

?>
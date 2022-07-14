<?php
if(!isset($_SESSION['user'])||empty($_SESSION['user'])){
    header('location: ../login/login.php');
    exit;
}
if(isset($_SESSION["user"]["store_right"]) && $_SESSION["user"]["store_right"] !='' && !empty($_SESSION["user"]["store_right"]) && $_SESSION["user"]["store_right"] != 0 ){
    $checkStoreRight = false;
    $id = $_SESSION["user"]["id"];
    $typeArr = explode(',', $_SESSION["user"]["store_right"]);
    $typeData = [];
    for ($i = 0; $i < count($typeArr); $i++) {
        switch(number_format($typeArr[$i])){
            case 1:
                $typeInfo = [
                    'text' => '旅遊票券列表',
                    'href' => '../products/?type=1',
                    'type' => '1'
                ];
                array_push($typeData, $typeInfo);
                break;
            case 2:
                $typeInfo = [
                    'text' => '餐廳票券列表',
                    'href' => '../products/?type=2',
                    'type' => '2'
                ];
                array_push($typeData, $typeInfo);
                break;
            case 3:
                $typeInfo = [
                    'text' => '活動票券列表',
                    'href' => '../products/?type=3',
                    'type' => '3'
                ];
                array_push($typeData, $typeInfo);
                break;
            case 4:
                $typeInfo = [
                    'text' => '寵物商品列表',
                    'href' => '../products/?type=4',
                    'type' => '4'
                ];
                array_push($typeData, $typeInfo);
                break;
        }
    }
}else{
    $checkStoreRight = true;
    $id = $_SESSION["user"]["id"];
}


if($_SESSION['user']['photo'] == ''){
    $userPhoto = 'Sample_User_Icon.svg';
}else{
    $userPhoto = $_SESSION['user']['photo'];
}

if($_SESSION['user']['name'] == ''){
    $userNickName = '汪汪 ~ 記得更新商家資訊唷汪';
}else{
    $userNickName = $_SESSION['user']['name'];
}

?>
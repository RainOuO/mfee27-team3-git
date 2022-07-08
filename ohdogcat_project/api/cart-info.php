<?php
session_start();

if($_POST['action'] == 'add'){
    $product_id = $_POST["product_id"];
    $store_id = $_POST["store_id"];

    $newStore = [
        'store' => [$store_id],
        'product' => [$product_id],
        'image' => [$product_id],
        'amount' => [1]
    ];

    // $newItem = [
    //     $product_id 
    // ];



    $product_exist = false; // flag -- 判斷是否有出現過該產品 or 店鋪

    if(isset($_SESSION["cart"])){
        $cart = $_SESSION["cart"];
        
    } else {
        $cart = [];
    };



    for($i =0; $i<count($cart); $i++){
        if(in_array($store_id, $cart[$i]['store'])){ // 如果該店鋪出現過
            if(in_array($product_id, $cart[$i]['product'])){ // 如果該產品已有被加入過，就只增加數量
                $index = array_search($product_id, $cart[$i]['product']);
                $cart[$i]['amount'][$index]++;
                $product_exist = true;
                goto end;
            }else{ // 如果該產品沒有被加入過，就新增一個產品
                $amount = 1;
                array_push($cart[$i]['product'], $product_id);
                array_push($cart[$i]['image'], $product_id);
                array_push($cart[$i]['amount'], $amount);
                // $cart[$i]['product'][$product_id] = 1;
                $product_exist = true;
                goto end;
            }
        }
    };


    end:
    if(!$product_exist) { // 如果這間店鋪沒有加入過，就直接新增一筆店鋪+產品資料
        array_push($cart, $newStore);
    };

    $_SESSION["cart"] = $cart;

    $data = [
        "data" => $cart,
    ];

}else if($_POST['action'] == 'get'){
    if(isset($_SESSION['cart'])){
        require('../db-connect.php');
        $info = $_SESSION['cart'];

        $sql = "SELECT id, name, main_photo FROM product";
        $result = $conn->query($sql);
        $product_count = $result->num_rows;
        $rows = ($product_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';
        $productName = array_column($rows, 'name', 'id');
        $productImg = array_column($rows, 'main_photo', 'id');

        $sqlStore = "SELECT id, name FROM store_info";
        $resultStore = $conn->query($sqlStore);
        $productStore_count = $resultStore->num_rows;
        $rowsStore = ($productStore_count>0)? $resultStore->fetch_all(MYSQLI_ASSOC):'';
        $storeName = array_column($rowsStore, 'name', 'id');

        for($i =0; $i<count($info); $i++){ // 將 $info 重新賦值為正確資訊
            array_push($info[$i]['store'], $storeName[$info[$i]['store'][0]]);
            for($index =0; $index<count($info[$i]['product']); $index++){
                $info[$i]['product'][$index] = $productName[$info[$i]['product'][$index]];
                $info[$i]['image'][$index] = $productImg[$info[$i]['image'][$index]];
            }
        };

        $data = [
            "data" => $info,
        ];
    }else{
        $data = [
            "data" => [],
        ];
    }
    
}

echo json_encode($data);
?>
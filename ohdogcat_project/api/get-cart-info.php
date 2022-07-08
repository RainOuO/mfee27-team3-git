<?php
session_start();

$product_id = $_POST["product_id"];
$store_id = $_POST["store_id"];

$newStore = [
    $store_id => [
        $product_id => 1
    ]
];

$newItem = [
    $product_id => 1
];



$product_exist = false;

if(isset($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
    
} else {
    $cart = [];
};



for($i =0; $i<count($cart); $i++){
    if(array_key_exists($store_id, $cart[$i])){
        for($index =0; $index<count($cart[$i][$store_id]); $index++){
            if(array_key_exists($product_id, $cart[$i][$store_id])){
                $cart[$i][$store_id][$index][$product_id]++;
                $product_exist = true;
                break;
            }
        }
        array_push($cart[$i][$store_id], $newItem);
        $product_exist = true;
        break;
    }
};


if(!$product_exist) {
    array_push($cart, $newStore);
};

$_SESSION["cart"] = $cart;

$data = [
    "data" => $cart,
];
echo json_encode($data);
?>


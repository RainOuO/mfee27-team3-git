<?php
session_start();

$product_id = $_POST["product_id"];

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
    if(array_key_exists($product_id, $cart[$i])){
        $cart[$i][$product_id]++;
        $product_exist = true;
        break;
    }
};


if(!$product_exist) {
    array_push($cart, $newItem);
};

$_SESSION["cart"] = $cart;

$data = [
    "data" => $cart,
];

echo json_encode($data);
?>


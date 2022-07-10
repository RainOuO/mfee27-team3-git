<?php
    // 要start才可以使用session
    session_start();

    // $_SESSION["name"] = "John";

    // echo $_SESSION["name"];

    $user = [
        "id" => 1,
        "name" => "Joe",
        "email" => "joe@test.com"
    ];
    
    $_SESSION["user"] = $user;

    // var_dump($_SESSION["user"]);
    // echo $_SESSION["user"]["name"];
?>
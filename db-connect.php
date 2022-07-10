<?php

    $severname = "localhost";
    $username = "admin";
    $password = "123456";
    $dbname = "team3_project";

    $conn = new mysqli($severname, $username, $password, $dbname);
    // 檢查連線
    if ($conn -> connect_error){
        die("連線失敗" . $conn -> connect_error);
    }else{
        // echo "連線成功";
    }
?>
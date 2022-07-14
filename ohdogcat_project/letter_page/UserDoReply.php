<?php
    session_start();
    // POST檢測
    if (!isset($_POST['message']) OR !isset($_POST['message'])) {
        echo "沒有參數";
        exit;
    }
    require("../../db-connect.php");

    // POST 資料處理
    $user_id = $_POST['user_id'];
    $message = $_POST['message'];

    // SESSION 資料處理
    $store_id = $_SESSION['user']['store_id'];

    // 資料庫寫入，商家寫入 reply_status = 2 , 用來判斷回復狀態
    // 資料庫寫入，user 不寫入 reply_status 預設為1 用來判斷回復狀態
    $now = date("Y-m-d H:i:s");
    $sqlMessage = "INSERT INTO letter (content, time, user_id, store_id)  VALUES ('$message', '$now', '$user_id', '$store_id')";
    $resultMessage = $conn->query($sqlMessage);
    header("Location:user-reply-letter.php?store_id=$store_id");

?>
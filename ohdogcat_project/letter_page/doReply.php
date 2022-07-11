<?php
    if (!isset($_POST['message']) OR !isset($_POST['message'])) {
        echo "沒有參數";
        exit;
    }
    require("../../db-connect.php");
    
    var_dump($_POST['user_id']);
    var_dump($_POST['message']);
    $user_id = $_POST['user_id'];
    $message = $_POST['message'];

    $now = date("Y-m-d H:i:s");
    $sqlMessage = "INSERT INTO letter (content, time, user_id)  VALUES ('$message', '$now', '$user_id')";
    $resultMessage = $conn->query($sqlMessage);
    header("Location:reply-letter.php?user_id=$user_id");

?>
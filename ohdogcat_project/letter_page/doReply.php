<?php
    require("../../db-connect.php");
    // session_start();


    // $user_id = $_SESSION['user']['user_id'];

    $user_id = $_POST['user_id'];

    $sql = "SELECT * FROM letter where user_id = '$user_id'";
    $result = $conn->query($sql);
    $letterCount = $result->num_rows;
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    if (isset($_POST['message'])) {
        $message = $_POST['message'];
        $now = date("Y-m-d H:i:s");
        $sqlMessage = "INSERT INTO letter (content, time, user_id)  VALUES ('$message', '$now', '$user_id')";
        $resultMessage = $conn->query($sqlMessage);
        header("Location:doReply.php?user_id=$user_id");
    }
    // header("Location:reply-letter.php");
?>
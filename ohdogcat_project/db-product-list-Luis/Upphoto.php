<?php
session_start();

require("db-connect.php");
$id = $_SESSION["user"]['id'];

if ($_FILES["myFile"]["error"] == 0) {
    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], "../images/dashboard/" . $_FILES["myFile"]["name"])) {
        $fileName = $_FILES["myFile"]["name"];
      

        $sql = "UPDATE  product  SET  sub_photo='$fileName'  WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION["id"] = $id;
            if (isset($_SESSION["id"])) {
                $_SESSION['updates'] = 'successs';
                header("location:bbbbbbbproduct-edit-new-swiper.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "upload fail!!";
    }
}

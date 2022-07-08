<?php
session_start();

require("db-connect.php");
$id = $_SESSION["user"]['id'];

if ($_FILES["myFile"]["error"] == 0) {
    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], "../images/store_photo/" . $_FILES["myFile"]["name"])) {


        $fileName = $_FILES["myFile"]["name"];
        // var_dump($fileName);

        //上傳



        // $sql = "INSERT INTO store_info (photo) VALUES ('$fileName') ";
        $sql = "UPDATE  store_info  SET  photo='$fileName'  WHERE id='$id'";








        // $stmt = $db_host->prepare($sql);
        // $stmt->execute([$name, $filename, $id]);

        //更新
        // $sql = "UPDATE store_info SET name='$name'  , phone='$phone',
        // email='$email',address='$address' ,area='$area' WHERE id='$id'";

       

        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION["id"] = $id;
        
            if (isset($_SESSION["id"])) {
                $_SESSION['updates'] = 'successs';
                header("location: edit.php");
                
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // echo "upload success!";
        // header("location: file-upload.php");
    } else {
        echo "upload fail!!";
    }
}

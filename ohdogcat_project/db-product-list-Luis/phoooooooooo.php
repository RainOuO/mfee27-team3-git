<?php 
// $sql="SELECT *FROM images";
// $result = $conn->query($sql);
// $rows = $result->fetch_all(MYSQLI_ASSOC);

// echo($ids);



require("db-connect.php");


// $name=$_POST["name"];

if($_FILES["myFile"]["error"]==0){
    if(move_uploaded_file($_FILES["myFile"]["tmp_name"], "../images/testimage/".$_FILES["myFile"]["name"])){

        $fileName=$_FILES["myFile"]["name"];
        // $now=date('Y-m-d H:i:s');

        $sql="INSERT INTO images (image) VALUES ('$fileName') ";

        if ($conn->query($sql) === TRUE) {
            
            session_start();
            $ids = $_SESSION["user"]['id'];

            $_SESSION["userid"]["idd"] = $ids;
            $_SESSION["name"]["images"] =$fileName;
            // header("location:bbbbbbbproduct-edit-new-swiper.php");
            

            echo "新資料輸入成功";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "upload success!";
        // header("location:AAAAAAAproduct-edit-new-swiper.php");
    }else{
        echo "upload fail!!";
    }
}

?>

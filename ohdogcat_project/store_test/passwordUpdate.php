<?php
require("../db-connect.php");


if (!isset($_POST["password"])) {
    echo "沒有帶資料";
    exit;
}
$id = $_POST["id"];
$password = $_POST["password"];
$newpassword= $_POST["newpassword"];
$repassword=$_POST["repassword"];
$sql="SELECT * FROM store_info WHERE id='$id' AND password='$password' ";


session_start();
$oldpassword=$_SESSION["user"]['password'];

if($oldpassword!==$password ){
    $_SESSION["update"] = $id;
    isset($_SESSION["error"]);
    $_SESSION['update'] = 'error1';
    header("location: editpassword.php");
    // echo "密碼錯誤";
    exit;
}

// session_start();
    $_SESSION["up"] = $id;

if($newpassword != $repassword){
    isset($_SESSION["up"]);
    $_SESSION['update'] = 'error2';
    header("location: editpassword.php");
    exit;
}else{
    
}


$sql = "UPDATE store_info SET password='$repassword' WHERE id='$id'";


if ($conn->query($sql) === TRUE) {
    echo "資料輸改成功! ";
    
    // session_start();
   $_SESSION["user"]['password']=$repassword;
  
    var_dump($_SESSION["user"]['password']);
   

    $_SESSION["id"] = $id;

    if (isset($_SESSION["id"])) {
        $_SESSION['update'] = 'success';
        header("location: user1.php");
        
    }
} else {
    echo "建立資料表錯誤: " . $conn->error;
};

?>
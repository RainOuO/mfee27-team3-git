<?php
require("db-connect.php");
// session_start();
// $_SESSION["id"] = $id;

// if (isset($_SESSION["id"])) {
//     header("location: dashboard.php");
// }


if (!isset($_POST["name"])) {
    echo "沒有帶資料";
    exit;
}
$id = $_POST["id"];
// $account = $_POST["account"];
// $password = $_POST["password"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$area = $_POST["area"];
$address = $_POST["address"];
// echo $name;

$sql = "UPDATE store_info SET name='$name'  , phone='$phone',
email='$email',address='$address' ,area='$area' WHERE id='$id'";

// echo $sql

if ($conn->query($sql) === TRUE) {
    echo "資料輸改成功! ";
    
    session_start();
    $_SESSION["id"] = $id;

    if (isset($_SESSION["id"])) {
        $_SESSION['update'] = 'success';
        header("location: user1.php");
        
    }
} else {
    echo "建立資料表錯誤: " . $conn->error;
};

?>
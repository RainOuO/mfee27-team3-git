<?php
session_start();
if(!isset($_POST["account"])){
    echo "沒有帶資料";
    exit;
}
require("../../../db-connect.php");

$account=$_POST["account"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$email=$_POST["email"];

$sql="SELECT account FROM users WHERE account='$account'";
$result = $conn->query($sql);
$userCount=$result->num_rows;
unset($_SESSION["error1"]);
unset($_SESSION["error2"]);

if($userCount>0){
    $_SESSION["error1"]["ACFalse"]="會員帳號已有人使用";
    header("location:01.sign-up.php");
}else if($password != $repassword){
    $_SESSION["error2"]["PWfalse"]="密碼前後不一致";
    header("location:01.sign-up.php");
}else{
    header("location:03.login.php");
    unset($_SESSION["error"]);
} 

//寫入資料庫
$password=md5($password);
$now=date('Y-m-d H:i:s');
$sqlCreate="INSERT INTO users (account,  password, email,  create_time,valid) VALUES ('$account',  '$password','$email', '$now', 1)";

if ($conn->query($sqlCreate) === TRUE) {
    echo  "true";
} else {
    echo "失敗惹";
}

$conn->close();
?>
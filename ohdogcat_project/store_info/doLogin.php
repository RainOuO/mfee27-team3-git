<?php
session_start();
require("db-connect.php");

if(!isset($_POST["account"])){
    echo "請循正常管道進入本頁";
    exit;
}

$account=$_POST["account"];
// $password=$_POST["password"];
// $password=md5($password);
// echo "$account, $password";

$sql="SELECT * FROM store_info WHERE account='$account'";

$result=$conn->query($sql);
$userExist=$result->num_rows;
// echo $userExist;
if($userExist>0){ //登入成功

    // $_SESSION["user"] = $user;
    $row=$result->fetch_assoc();
    $user=[
        "id"=>$row["id"],
        "account"=>$row["account"],
        "name"=>$row["name"],
        "password"=>$row["password"]

    ];
    unset($_SESSION["error"]);
    $_SESSION["user"]=$user;
    header("location: user1.php");


}else{
    echo "帳號或密碼錯誤";
    $_SESSION["error"]["message"]="帳號或密碼錯誤";

    if(!isset($_SESSION["error"]["times"])){
        $_SESSION["error"]["times"]=1;
    }else{
        $_SESSION["error"]["times"]++;
    }
    

    header("location: login.php");
}


?>
<?php
// 檢查是否有帶資料
if(!isset($_POST["account"]) || !isset($_POST["password"])){
	$data = [
		"status" => 0,
		"message" => "沒有正常的資料"
	];
	echo json_encode($data);
	exit;
}

$account = $_POST["account"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];  
$now = date('Y-m-d H:i:s');

if(empty($_POST["account"])) {
	$data = [
		"status" => 0,
		"message" => "帳戶欄位不得為空"
	];
	echo json_encode($data);
	exit;
  } elseif (empty($_POST["password"])){
	$data = [
		"status" => 0,
		"message" => "密碼欄位不得為空"
	];
	echo json_encode($data);
	exit;
  } elseif (empty($_POST["repassword"])){
	$data = [
		"status" => 0,
		"message" => "再次輸入密碼欄位不得為空"
	];
	echo json_encode($data);
	exit;
  } elseif ($repassword !== $password){
	$data = [
		"status" => 0,
		"message" => "$repassword, $password, 兩次密碼不一致"
	];
	echo json_encode($data);
	exit;
  }

require("../db-connect.php");

$sql = "SELECT account FROM users WHERE account='$account'";

$result = $conn->query($sql);
$userCount = $result->num_rows;

// 檢查帳戶有效性
if($userCount>0){
	$data = [
		"status" => 0,
		"message" => "該帳號已被使用"
	];
	echo json_encode($data);
	exit;
}

$password = md5($password);

$sqlCreate = "INSERT INTO users (account, password, create_time, valid)
VALUES ('$account', '$password', '$now', 1)";

if ($conn->query($sqlCreate) === TRUE) :
	$data = [
		"status" => 1,
		"message" => "註冊成功"
	];
	echo json_encode($data);
else:
	$data = [
		"status" => 0,
		"message" => "Error: ". $sql . "<br>" . $conn->error
	];
	echo json_encode($data);
endif;

$conn->close();
?>

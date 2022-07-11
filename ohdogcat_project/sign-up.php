<?php
require("./db-connect.php");
// $sql = "SELECT id, userName, phone, email FROM users";

// $result = $conn->query($sql);
// $userCount = $result->num_rows;

// if($userCount > 0):
// 	$rows = $result->fetch_all(MYSQLI_ASSOC);
// 	// var_dump($rows);
// endif;
?>

<!doctype html>
<html lang="en">

<head>
	<title>users</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.2.0-beta1 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
		integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
	<div class="container vh-100 d-flex justify-content-center align-items-center">
		<div class="panel">
			<h2 class="text-center pb-3 fw-bold">新會員註冊</h2>
			<div class="mb-2">
				<label for="account">使用者帳戶</label>
				<input id="account" type="text" class="form-control" name="account">
			</div>
			<div class="mb-2">
				<label for="password">密碼</label>
				<input id="password" type="password" class="form-control" name="password">
			</div>
			<div class="mb-2">
				<label for="repassword">再輸入一次密碼</label>
				<input id="repassword" type="password" class="form-control" name="repassword">
			</div>
			<button type="button" id="send" class="btn bg-info w-100 mt-3 text-white fw-bold">註冊</button>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
	</script>
	<script>
		const sendBtn = document.querySelector('#send');
		sendBtn.addEventListener('click', ()=> {
			const inputAccount = document.querySelector('#account').value;
			const inputPassword = document.querySelector('#password').value;
			const inputRePassword = document.querySelector('#repassword').value;
			$.ajax({
                    method: "POST",
                    url: `./api/do-sign-up.php`,
                    dataType: "json",
                    data: { 
						account: inputAccount,
						password: inputPassword,
						repassword: inputRePassword
					}
                })
                .done(function (response) {
                    console.log(response);
					if(response.status == 0){
						alert(response.message);
					}else if(response.status == 1) {
						alert(response.message);
						// location.href = 'users.php';
					}
                }).fail(function (jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
			
		});
	</script>
</body>

</html>
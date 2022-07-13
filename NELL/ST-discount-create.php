<!doctype html>
<html lang="en">

<head>
    <title>Create Discount</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <form action="ST-do-create.php" method="post">
            <div class="mb-2">
                <label for="">優惠活動名稱： </label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-2">
                <label for="">優惠活動敘述： </label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="mb-2">
                <label for="">折扣數字： <br> EX:8折優惠需填入20、現金折價100元需填入100</label>
                <input type="number" class="form-control" name="discount_number" required>
            </div>
            <div id="set_time">
                <div class="mb-2">
                    <label for="">優惠啟用時間</label>
                    <input type="date" class="form-control" name="start_time">
                </div>
                <div class="mb-2">
                    <label for="">優惠結束時間</label>
                    <input type="date" class="form-control" name="end_time">
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-info" type="submit">送出</button>
                <a href="ST-store-discounts.php" class="btn btn-info">回優惠列表</a>
            </div>
        </form>
    </div>

</body>

</html>










<?php
// require("../db-connect.php");
// if (!isset($_POST["name"])) {
//     echo "沒有帶資料到本頁";
//     // exit;
// }

// $category_id = $_POST["category_id"];
// $name = $_POST["name"];
// $description = $_POST["description"];
// $discount_number = $_POST["discount_number"];
// $amount = $_POST["amount"];
// $discount_code = $_POST["discount_code"];
// // $upper_limit=$_POST["upper_limit"];
// $lower_limit = $_POST["lower_limit"];
// $start_time = $_POST["start_time"];
// $end_time = $_POST["end_time"];
// $now = date('Y-m-d H:i:s');
// $buyer_valid = $_POST["buyer_valid"];

// // $today = date('Y-m-d H:i:s');

// // echo "$name, $email, $phone";

// $sql = "INSERT INTO discount (category_id, name, description, amount, discount_number, discount_code, lower_limit, start_time, end_time, create_time, valid) VALUES ('$category_id','$name', '$description', '$amount', '$discount_number', '$discount_code', '$lower_limit',  '$start_time', '$end_time', '$now', 1)";

// if (strtotime($now) < strtotime($end_time) && strtotime($now) > strtotime($start_time)) {
//     $sql = "UPDATE discount set buyer_valid= 1 WHERE(start_time <= '$now') and (end_time >= '$now')";
// } else {
//     $sql = "UPDATE discount set buyer_valid= 2 WHERE(start_time <= '$now') and (end_time >= '$now')";
// }

// if ($conn->query($sql) === TRUE) {
//     echo "新資料新增完成";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
// // header("location: create-store-discount.php");
// exit;
?>
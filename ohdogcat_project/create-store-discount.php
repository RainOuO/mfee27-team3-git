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
        <form action="do-store-Create.php" method="post">
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
                <a href="discounts.php" class="btn btn-info">回優惠列表</a>
            </div>
        </form>
    </div>

</body>

</html>
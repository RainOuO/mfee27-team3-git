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
<style>
    #set_time {
        display: block;
    }
</style>

<body>
    <div class="container">
        <form action="doCreate.php" method="post">
            <div class="mb-2">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" required="required">
            </div>
            <div class="mb-2">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="mb-2">
                <label for="">Type: </label><br>
                <Input type="Radio" name="category_id" value="1">%數折價券
                <Input type="Radio" name="category_id" value="2">現金折價券
            </div>
            <div class="mb-2">
                <label for="">Discount number</label>
                <input type="number" class="form-control" name="discount_number" required="required">
            </div>
            <div class="mb-2">
                <label for="">Upper Limit</label>
                <input type="number" class="form-control" name="upper_limit">
            </div>
            <div class="mb-2">
                <label for="">Lower Limit</label>
                <input type="number" class="form-control" name="lower_limit">
            </div>
            <div class="mb-2">
                <label for="">是否限制使用時間: </label><br>
                <Input type="Radio" name="state" value="1" onclick="document.getElementById('set_time').style.display = 'block'">限制
                <Input type="Radio" name="state" value="0" onclick="document.getElementById('set_time').style.display = 'none'">不限制
            </div>
            <div id="set_time">
                <div class="mb-2">
                    <label for="">Start time</label>
                    <input type="date" class="form-control" name="start_time" required="required">
                </div>
                <div class="mb-2">
                    <label for="">End time</label>
                    <input type="date" class="form-control" name="end_time" required="required">
                </div>
            </div>
            <div class="mb-2">
                <label for="">狀態: </label><br>
                <Input type="Radio" name="buyer_valid" value="0">不啟用
                <Input type="Radio" name="buyer_valid" value="1">啟用
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-info" type="submit">送出</button>
                <a href="discounts.php" class="btn btn-info">回折價券列表</a>
            </div>
        </form>
    </div>
    <script>
        // document.getElementById("set_time").style.visibility = "hidden";
        // document.getElementById("set_time").style.visibility = "visible";
    </script>

</body>

</html>
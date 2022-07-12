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
    #set_code {
        display: block;
    }
    #good {
        display: none;
        color: blue;
    }
    #nogood {
        display: none;
        color: red;
    }
</style>

<body>
    <div class="container">
        <form action="doCreate.php" method="post">
            <div class="mb-2">
                <label for="">優惠券名稱： </label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-2">
                <label for="">優惠券敘述： </label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="mb-2">
                <label for="">種類： </label><br>
                <Input type="Radio" name="category_id" value="1" required onclick="document.getElementById('set_code').style.display = 'block'" checked>%數折價券
                <Input type="Radio" name="category_id" value="2" onclick="document.getElementById('set_code').style.display = 'block'">現金折價券
            </div>
            <div class="mb-2">
                <label for="">折扣數字： <br> EX:8折優惠/優惠券需填入80、現金折價100元需填入100</label>
                <input type="number" class="form-control" name="discount_number" required>
            </div>
            <div class="mb-2" id="set_code" >
                <label for="">請填入由英文字母大寫及數字所組成的八碼序號： <br>EX:HAPPY100</label>
                <input type="text" class="form-control" id="code" name="discount_code" onblur="myFunction(value)">
                <h6 id = "good">此序號可使用</h6>
                <h6 id = "nogood">此序號不可使用</h6>

                  <script>
                    const value = document.getElementById("code").value;

                    function myFunction(value) {
                        var regex = /[A-Z0-9]{8}/;
                        if (!regex.test(value)) {
                            document.getElementById('good').style.display = 'none'
                            document.getElementById('nogood').style.display = 'block'
                        }else{
                            document.getElementById('good').style.display = 'block'
                            document.getElementById('nogood').style.display = 'none'
                        }
                    }
                </script>
            </div>
            <div class="mb-2">
                <label for="">優惠券數量：</label>
                <input type="number" class="form-control" name="amount">
            </div>
            <div class="mb-2">
                <label for="">可用優惠券的最低價格：</label>
                <input type="number" class="form-control" name="lower_limit">
            </div>
            <div class="mb-2">
                <label for="">是否限制使用時間： </label><br>
                <Input type="Radio" name="state" value="1" onclick="document.getElementById('set_time').style.display = 'block'" required checked>限制
                <Input type="Radio" name="state" value="0" onclick="document.getElementById('set_time').style.display = 'none'">不限制
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
                <a href="discounts.php" class="btn btn-info">回折價券列表</a>
            </div>
        </form>
    </div>

</body>

</html>
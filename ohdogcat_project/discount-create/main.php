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
            <Input type="Radio" name="category_id" value="1" required
                onclick="document.getElementById('set_code').style.display = 'block'" checked>%數折價券
            <Input type="Radio" name="category_id" value="2"
                onclick="document.getElementById('set_code').style.display = 'block'">現金折價券
        </div>
        <div class="mb-2">
            <label for="">折扣數字：</label>
            <input type="number" class="form-control" name="discount_number"
                placeholder="EX:8折優惠/優惠券需填入80、現金折價100元需填入100" required>
        </div>
        <div class="mb-2" id="set_code">
            <label for="">請填入八碼序號（限定使用英文大寫、數字）： <br></label>
            <input type="text" class="form-control" id="code" name="discount_code" placeholder="EX:HAPPY100"
                onblur="myFunction(value)">
            <h6 id="good">此序號可使用</h6>
            <h6 id="nogood">此序號不可使用</h6>
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
            <Input type="Radio" name="state" value="1"
                onclick="document.getElementById('set_time').style.display = 'block'" required checked>限制
            <Input type="Radio" name="state" value="0"
                onclick="document.getElementById('set_time').style.display = 'none'">不限制
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
        <div class="d-flex justify-content-end ">
            <button class="btn yellowBtn me-2" type="submit">確認送出</button>
            <a href="../discounts/" class="lightblueBtn btn">回折價券列表</a>
        </div>
    </form>
</div>
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
            <label for="">折扣數字： <br> EX:8折優惠需填入20</label>
            <input type="number" class="form-control" name="discount_number" required>
        </div>
        <div id="set_time">
            <div class="mb-2">
                <label for="">優惠啟用時間</label>
                <input type="datetime-local" class="form-control" name="start_time">
            </div>
            <div class="mb-2">
                <label for="">優惠結束時間</label>
                <input type="datetime-local" class="form-control" name="end_time">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-info yellowBtn mx-2" type="submit">送出</button>
            <a href="../store-discounts/" class="btn lightblueBtn">回優惠列表</a>
        </div>
    </form>
</div>
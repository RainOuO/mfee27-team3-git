<div class="d-flex justify-content-center w-100">
    <div class="bottom-area w-100">
        <hr>
        <form action="doReply.php" method="post">
            <input name="user_id" type="hidden" value="<?= $user_id ?>">
            <textarea class="form-control textarea" id="exampleFormControlTextarea1" rows="3" name="message" required placeholder="請輸入訊息"></textarea>
            <div class="error"></div>
            <div class="mt-2 g-2 justify-content-end text-end">
                <div class="">
                    <input class="btn filterBtn" type ="button" onclick="javascript:location.href='../letter-box'" value="返回"></input>
                    <button class="btn filterBtn" type="submit">送出</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if ($userCount > 0) :
                            $row = $result->fetch_assoc();
                        ?>
<!-- <div class="py-2">
                <a class="btn btn-info" href="user.php">取消</a>
            </div> -->
<form class="formpassword" action="passwordUpdate.php" method="POST">
    <input name="id" type="hidden" value="<?= $_SESSION["user"]['id'] ?>">
    <table class="table">
        <th>舊密碼</th>
        <td><input type="tel" name="password" class="form-control"></td>
        </tr>
        <tr>
            <th>新密碼</th>
            <td><input type="tel" name="newpassword" class="form-control"></td>
        </tr>
        <tr>
            <th>第二次輸入</th>
            <td><input type="tel" name="repassword" class="form-control"></td>
        </tr>

    </table>
    <div class="py-2 text-end">
        <button type="submit" class="btn5" href="#">儲存</button>
    </div>
</form>

<?php else : ?>
沒有該使用者
<?php endif; ?>
</div>
<div class="d-flex my-4 photo">
    <?php foreach ($rowss as $rowa) : ?>
    <img class="object-cover" <?php if (isset($rowa["photo"]) == null) : ?>
        src="./IMAGES/3669480_account_circle_ic_icon.svg" alt="">
    <?php else : ?>
    <img src="../images/store_photo/<?= $rowa["photo"] ?>" alt="">
    <?php endif; ?>

    <?php endforeach; ?>
    <div class="container ">
        <?php if ($userCount > 0) :
                            ?>
        <form class="userfrom" action="doUpdate.php" method="POST">
            <input name="id" type="hidden" value="<?= $row["id"] ?>">
            <table class="table">
                <tr>
                    <th>店家名稱</th>
                    <td><?= $row["name"] ?></td>
                </tr>
                <tr>
                    <th>帳號</th>
                    <td><?= $row["account"] ?></td>
                </tr>
                <tr>
                    <th>password</th>
                    <td>********</td>
                </tr>
                <tr>
                    <th>連絡電話</th>
                    <td><?= $row["phone"] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $row["email"] ?></td>
                </tr>
                <tr>
                    <th>區域</th>
                    <td><?= $row["area"] ?></td>
                </tr>
                <th>店鋪權限</th>
                <td>
                    <class="form-control">
                        <?php
                                                foreach ($rows as $rowRight) {
                                                    echo $rowRight['type_name'] . ' , ';
                                                }
                                                ?>
                </td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td><?= $row["address"] ?></td>
                </tr>
            </table>
            <div class="py-2">
                <!-- <button type="submit" class="btn btn-info" href="editttttt2222">儲存</button> -->
            </div>
        </form>
        <?php else : ?>
        沒有該使用者
        <?php endif; ?>
    </div>
</div>
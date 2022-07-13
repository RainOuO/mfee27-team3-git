<div class="d-flex my-4">
    <div class="my-2 imgALL ">
        <?php foreach ($rowss as $rowa) : ?>
        <div class="mx-auto" style="width: 300px; height: 300px;">
        <?php if (isset($rowa["photo"]) == null) : ?>
            <img id="previewUP" class="object-contain" src="../images/store_photo/Sample_User_Icon.svg" alt="">
        <?php else : ?>
            <img id="previewUP" class="object-contain" src="../images/store_photo/<?= $rowa["photo"] ?>" alt="">
        <?php endif; ?>
        </div>
        <form class="photoinputALL mt-5" action="doUpdate.php" method="post" enctype="multipart/form-data">
            <input class="form-control inputphoto mx-auto mt-3" type="file" onchange="readURL(this)" targetID="previewUP"
                accept="image/gif, image/jpeg, image/png" type="file" name="myFile" />
            <?php endforeach; ?>
    </div>
    <?php if ($userCount > 0) :?>
    <form action="doUpdate.php" method="POST">
        <input name="id" type="hidden" value="<?= $row["id"] ?>">
        <table class="table table1">
            <tr>
                <th>店家名稱</th>
                <td class="nameinput"><input type="text" name="name" class="form-control input1"
                        value="<?= $row["name"] ?>"></td>
            </tr>
            <tr>
                <th>帳號</th>
                <td class="input1 accountinput"> <?= $row["account"] ?></td>
            </tr>
            <tr>
                <th>密碼</th>
                <td class="input1 passwordinput">*******</td>
            </tr>
            <tr>
                <th class="phoneinput">連絡電話</th>
                <td><input type="tel" name="phone" class="form-control input1" value="<?= $row["phone"] ?>"></td>
            </tr>
            <tr>
                <th class="emailinput">Email</th>
                <td><input type="email" name="email" class="form-control input1" value="<?= $row["email"] ?>"></td>
            </tr>
            <tr>
                <th>
                    <label class="title " for="livingn">區域:</label>
                    <select name="area">
                        <option>北部</option>
                        <option>中部</option>
                        <option>南部</option>
                    </select>
                </th>

                <!-- <th>地址</th> -->
                <td>
                    <input type="text" name="address" class="form-control input1" value="<?= $row["address"] ?>">
                </td>
            </tr>
        </table>
        <div class="py-2 btndiv">
            <!-- <button href="user1.php" type="submit" class="btn4 mx-2">取消</button> -->
            <button type="submit" class="btn3up mx-2">儲存</button>

        </div>
    </form>
    <?php else : ?>
    沒有該使用者
    <?php endif; ?>

</div>
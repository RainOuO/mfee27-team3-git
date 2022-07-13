<div class="d-flex my-4 photo">
    <?php foreach ($rowss as $rowa) : ?>
        <div class="w-50">
            <div class="mx-auto" style="width: 300px; height: 300px;">
            <?php if (isset($rowa["photo"]) == null) : ?>
                <img class="object-contain" src="../images/store_photo/Sample_User_Icon.svg" alt="">
            <?php else : ?>
                <img class="object-contain" src="../images/store_photo/<?= $rowa["photo"] ?>" alt="">
            <?php endif; ?>
            </div>
        </div>

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
                                                for ($i=0; $i<count($rows); $i++ ) {
                                                    if($i == (count($rows)-1) ){
                                                        echo $rows[$i]['type_name'];
                                                    }else{
                                                        echo $rows[$i]['type_name'] . '<br>';
                                                    }
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
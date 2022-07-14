<?php if ($product_count > 0) :
                            $row = $result->fetch_assoc() ?>
<form action="doUpdate.php?type=<?=$type?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>" />
    <div class="d-flex justify-content-between align-items-center m-2">
        <div class="title d-flex mt-2">
            <h4 class="pt-3">基本設定(**項目為必填不可空白)</h4>
        </div>
        <div class="crudBox">
            <button type="submit" class="btn filterBtn mx-1">儲存</button>
            <button type="button" class="btn filterBtn ms-1"
                onclick="window.location.href='../product-detail/?store_id=<?= $storeID ?>&id=<?= $row['id'] ?>&type=<?=$type?>'">取消返回</button>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center w-100">
        <div class="photobar d-flex flex-column col-5">
            <div class="photo-window d-flex flex-column  ">
                <div class="cover-photo m-3">
                    <?php if ($row["main_photo"] == '') : ?>

                    <img src="../images/no_img.png" alt="">
                    <?php else : ?>
                    <!-- <img src="./IMAGES/doglogo.png" alt="" id="preview_cover_img" src="#"> -->
                    <img src="../images/upload_main_photo/<?= $row['main_photo'] ?>" id="preview_cover_img" src="#"
                        alt="">
                    <?php endif; ?>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                                                    $rowSub = explode(",", $row["sub_photo"]); //explode去除逗號
                                                    array_pop($rowSub);
                                                    for ($i = 0; $i < count($rowSub); $i++) : ?>
                        <?php if ($rowSub[$i] == '') : ?>
                        <div class="swiper-slide photo1"><img class="" src="../IMAGES/no_img.png"
                                id="preview_sub_img<?= $i ?>" src="#" alt=""></div>
                        <?php else : ?>
                        <div class="swiper-slide photo1"><img class=""
                                src="../images/upload_sub_photo/<?= $rowSub[$i] ?>" id="preview_sub_img<?= $i ?>"
                                src="#" alt=""></div>
                        <?php endif; ?>
                        <?php endfor; ?>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="row photo-upload mt-3 d-flex justify-content-center">
                <div class="col-5 ">

                    <h6>封面照片</h6>
                    <input class="form-control" type="file" name="main_photo" onchange="readURL(this)"
                        targetID="preview_cover_img" accept="image/gif, image/jpeg, image/png">
                </div>
                <div class="col-7 row">
                    <h6>商品照片</h6>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo1"
                            onchange="readURL(this)" targetID="preview_sub_img0"
                            accept="image/gif, image/jpeg, image/png"></div>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo2"
                            onchange="readURL(this)" targetID="preview_sub_img1"
                            accept="image/gif, image/jpeg, image/png"></div>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo3"
                            onchange="readURL(this)" targetID="preview_sub_img2"
                            accept="image/gif, image/jpeg, image/png"></div>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo4"
                            onchange="readURL(this)" targetID="preview_sub_img3"
                            accept="image/gif, image/jpeg, image/png"></div>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo5"
                            onchange="readURL(this)" targetID="preview_sub_img4"
                            accept="image/gif, image/jpeg, image/png"></div>
                </div>
            </div>
        </div>

        <div class="basic-setting col-6">
            <label for="">商品名稱**</label>
            <input type="text" name="name" placeholder="最多輸入20字元，禁用特殊符號" class="form-control"
                value="<?= $row['name'] ?>" required>
            <label for="">商品分類**</label>
            <select name='category' class="form-control" required>
                <?php while ($rowP = $resultP->fetch_assoc()) : ?>
                <option value='<?= $rowP["id"] ?>' <?php if ($rowP["id"] == $row["product_category"]) {
                                                                                        echo "selected";
                                                                                    } ?>> <?= $rowP['name'] ?></option>
                <?php endwhile; ?>
            </select>
            <label for="">商品簡述**</label>
            <input type="text" name="intro" placeholder="最多輸入50字元，至少10個字" class="form-control"
                value="<?= $row['intro'] ?>" required>
            <label for="">商品價格**</label>
            <input type="number" name="price" placeholder="只能輸入大於0的數字" class="form-control" value="<?= $row['price'] ?>"
                required>
            <!--
                                        <label for="">商品規格</label>
                                        <input type="text" name="spec" placeholder="自由增建選項" class="form-control">
                                        -->
            <div class="d-flex mt-2">
                <h3 class="pt-3">進階設定</h3>
            </div>
            <hr>
            <label for="">上架時間**</label>
            <input type="datetime-local" name="valid_start" class="form-control" value="<?= $row['valid_time_start'] ?>"
                required>
            <label for="">下架時間**</label>
            <input type="datetime-local" name="valid_end" class="form-control" value="<?= $row['valid_time_end'] ?>"
                required>
            <label for="">搭配優惠方案**</label><br>
            <select name='coupon_id' class="form-control">
                <?php while ($rowC = $resultC->fetch_assoc()) : ?>
                <option value='<?= $rowC["id"] ?>' <?php if ($rowC["id"] == $row["coupon_id"]) {
                                                                                        echo "selected";
                                                                                    } ?>> <?= $rowC['name'] ?></option>
                <?php endwhile; ?>
            </select>
            <!--
                                        <label for="">商品更新時間</label>
                                        <input type="date" name="create_time" placeholder="自由增建選項" class="form-control" value="<?= $row['create_time'] ?>">
                                        -->
            <label for="">商品庫存數</label>
            <input type="number" name="stock" placeholder="只能輸入大於0的數字" class="form-control"
                value="<?= $row['stock_quantity'] ?>">
            <!-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                商品售罄提醒 <span style="color: red">**系統會在庫存數量小於10的時候發送站內信提醒**</span>
                                            </label>
                                        </div> -->

        </div>
    </div>
    <hr>
    <label for="">商品文案編輯頁面</label>
    <textarea class="form-control" rows="10" placeholder="請輸入文案" maxlength="500"
        name="description"><?= $row['description'] ?></textarea>
    <hr>
    <div class="d-flex justify-content-end">
        <div class="crudBox">
            <button type="submit" class="btn filterBtn mx-1">儲存</button>
            <button type="button" class="btn filterBtn ms-1"
                onclick="window.location.href='../product-detail/?store_id=<?= $storeID ?>&id=<?= $row['id'] ?>&type=<?=$type?>'">取消返回</button>
        </div>
    </div>
    </div>
</form>
<?php else : ?>
無此筆資料
<?php endif; ?>
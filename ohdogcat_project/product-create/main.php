<form action="doCreateNew.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="type" value="<?= $type ?>" />
    <div class="d-flex justify-content-between align-items-center m-2">
        <div class="title d-flex">
            <h4 class="pt-3">基本設定(**項目為必填不可空白)</h4>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center w-100">
        <div class="photobar d-flex flex-column col-5">
            <div class="photo-window d-flex flex-column  ">
                <div class="cover-photo m-3">
                    <img src="../IMAGES/no_img.png" alt="" id="preview_cover_img" src="#">
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide photo1"><img class="" src="../IMAGES/no_img.png" alt=""
                                id="preview_sub_img1" src="#"></div>
                        <div class="swiper-slide photo1"><img class="" src="../IMAGES/no_img.png" alt=""
                                id="preview_sub_img2" src="#"></div>
                        <div class="swiper-slide photo1"><img class="" src="../IMAGES/no_img.png" alt=""
                                id="preview_sub_img3" src="#"></div>
                        <div class="swiper-slide photo1"><img class="" src="../IMAGES/no_img.png" alt=""
                                id="preview_sub_img4" src="#"></div>
                        <div class="swiper-slide photo1"><img class="" src="../IMAGES/no_img.png" alt=""
                                id="preview_sub_img5" src="#"></div>
                        <!-- <div class="swiper-slide photo1"><img class="" src="./IMAGES/no_img.png" alt="" id="preview_sub_imgs" src="#"></div> -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- 圖片上傳UI位置 -->
            <div class="row photo-upload mt-3 d-flex justify-content-center">
                <div class="col-5 ">

                    <h6>封面照片</h6>
                    <input class="form-control" type="file" name="main_photo" onchange="readURL(this)"
                        targetID="preview_cover_img" accept="image/gif, image/jpeg, image/png">
                </div>
                <div class="col-7 row">
                    <h6>商品照片</h6>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo1"
                            onchange="readURL(this)" targetID="preview_sub_img1"
                            accept="image/gif, image/jpeg, image/png"></div>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo2"
                            onchange="readURL(this)" targetID="preview_sub_img2"
                            accept="image/gif, image/jpeg, image/png"></div>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo3"
                            onchange="readURL(this)" targetID="preview_sub_img3"
                            accept="image/gif, image/jpeg, image/png"></div>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo4"
                            onchange="readURL(this)" targetID="preview_sub_img4"
                            accept="image/gif, image/jpeg, image/png"></div>
                    <div class="col-auto"><input class="form-control" type="file" name="sub_photo5"
                            onchange="readURL(this)" targetID="preview_sub_img5"
                            accept="image/gif, image/jpeg, image/png"></div>
                </div>
            </div>
        </div>
        <div class="basic-setting col-6">
            <label for="">商品名稱**</label>
            <input type="text" name="name" placeholder="最多輸入20字元，禁用特殊符號" class="form-control" value="" required>
            <label for="">商品分類**</label>
            <select name='category' class="form-control" required>
                <?php while ($rowP = $resultP->fetch_assoc()) : ?>
                <option value='<?= $rowP["id"] ?>'> <?= $rowP['name'] ?></option>
                <?php endwhile; ?>
            </select>
            <label for="">商品簡述</label>
            <input type="text" name="intro" placeholder="最多輸入50字元，至少10個字" class="form-control">
            <label for="">商品價格**</label>
            <input type="number" name="price" placeholder="只能輸入大於0的數字NTD" class="form-control" required>
            <!-- <label for="">商品規格</label>
                                    <input type="text" name="spec" placeholder="自由增建選項" class="form-control"required> -->
            <div class="d-flex mt-2">
                <h3 class="pt-3">進階設定</h3>
            </div>
            <hr>
            <label for="">上架時間</label>
            <input type="datetime-local" name="valid_start" class="form-control" required>
            <label for="">下架時間</label>
            <input type="datetime-local" name="valid_end" class="form-control" required>
            <label for="">優惠券方案使用</label><br>
            <select name='coupon_id' class="form-control">
                <?php while ($row = $result->fetch_assoc()) : ?>
                <option value='<?= $row["id"] ?>'> <?= $row['name'] ?></option>
                <?php endwhile; ?>
            </select>
            <!-- <label for="">商品更新時間</label>
                                    <input type="date" name="create_time" placeholder="自由增建選項" class="form-control" hidden> -->
            <label for="">商品庫存數</label>
            <input type="number" name="stock" placeholder="只能輸入大於0的數字" class="form-control">
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
    <textarea class="form-control" rows="10" placeholder="請輸入文案" maxlength="500" name="description"></textarea>
    <!-- <form method="post">
                            <div class="text-end mb-1 d-flex justify-content-between">
                                <h3>商品文案編輯頁面</h3> <button class="btnry" type="submit">儲存草稿</button>
                            </div>
                            <textarea id="mytextarea" name="product">歡迎編輯 請勿上傳不雅文字</textarea></form> -->
    <hr>
    <div class="d-flex justify-content-end">
        <div class="crudBox">
            <button type="submit" class="btn filterBtn mx-1">儲存</button>
            <button type="button" class="btn filterBtn ms-1"
                onclick="window.location.href='../products/?store_id=<?= $storeID ?>&type=<?= $type ?>'">取消新增</button>
        </div>
    </div>
</form>
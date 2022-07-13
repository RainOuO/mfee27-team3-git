<?php if ($product_count > 0) :
                            $row = $result->fetch_assoc() ?>
                            <div class="border-bottom pb-2">
                                <h2>商品內容管理</h2>
                            </div>
                            <div class="d-flex justify-content-between align-items-center m-2">
                                <div class="title d-flex mt-2">
                                    <img src="./IMAGES/8666681_edit_icon.png" width="48" height="48" alt="">
                                    <h4 class="pt-3">基本設定</h4>
                                </div>
                                <div class="crudBox">
                                <button type="button" class="btn filterBtn mx-1" onclick="window.location.href='../product-edit/?store_id=<?= $storeID ?>&type=<?= $type ?>&id=<?= $id?>&category=<?=$row['product_category']?>'">編輯</button>
                                <button type="button" class="btn filterBtn mx-1" onclick="window.location.href='doDelete.php?id=<?= $row['id'] ?>'">刪除</button>
                                <button type="button" class="btn filterBtn ms-1" onclick="window.location.href='../products/?store_id=<?= $storeID ?>&type=<?= $type ?>'">返回總表</button>
                            </div>
                            </div>
                            <hr>

                            <div class="row d-flex justify-content-center">
                                <div class="photobar d-flex flex-column col-5">
                                    <div class="photo-window d-flex flex-column align-items-flex-start ">
                                        <div class="cover-photo">
                                            <?php if ($row["main_photo"] == '') : ?>
                                                <img src="./IMAGES/doglogo.png" alt="">
                                            <?php else : ?>
                                                <img src="./upload_main_photo/<?= $row['main_photo'] ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <div class="swiper mySwiper mt-2">
                                            <div class="swiper-wrapper">
                                                <?php
                                                $rowSub = explode(",", $row["sub_photo"]); //explode去除逗號
                                                // var_dump($rowSub) ;
                                                array_pop($rowSub);
                                                foreach ($rowSub as $rowS) : ?>
                                                    <?php if ($row["sub_photo"] == '' || $rowS == '') : ?>
                                                        <img class="swiper-slide photo1" src="./IMAGES/no_img.png" alt="">
                                                    <?php else : ?>
                                                        <div class="swiper-slide photo1"><img class="" src="./upload_sub_photo/<?= $rowS ?>" alt=""></div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="basic-setting col-6">
                                    <form action="doUpdate">
                                        <label for="">商品名稱**</label>
                                        <div type="text" name="name" class="py-2"><?= $row['name'] ?> </div>
                                        <label for="">商品分類**</label>
                                        <div name='category' class=" py-2">
                                            <?= $row["category_name"]?>
                                            <!-- TO-DO 連動category -->
                                        </div>
                                        <label for="">商品簡述</label>
                                        <div type="text" name="intro" class="py-2"><?= $row['intro'] ?></div>
                                        <label for="">商品價格**</label>
                                        <div type="number" name="price" class="py-2">NTD: <?= $row['price'] ?></div>
                                        <div class="d-flex mt-2">
                                            <img src="./IMAGES/8666681_edit_icon.png" width="48" height="48" alt="">
                                            <h3 class="pt-3">進階設定</h3>
                                        </div>
                                        <hr>
                                        <label for="">上架時間</label>
                                        <div type="datetime-local" name="spec" class=""><?= $row['valid_time_start'] ?></div>
                                        <label for="">下架時間</label>
                                        <div type="datetime-local" name="spec" class=""><?= $row['valid_time_end'] ?></div>
                                        <label for="">優惠券方案使用</label><br>
                                        <div name='dragdown' class="" name="coupon">
                                            <!-- TO-DO 連動coupon -->
                                            <?= $row["coupon_name"] ?>
                                        </div>
                                        <!-- <label for="">商品更新時間</label>
                                        <div type="date" name="spec" class=""><?= $row['create_time'] ?></div> -->
                                        <label for="">商品庫存數</label>
                                        <div type="text" name="spec" class=""><?= $row['stock_quantity'] ?></div>
                                        <!-- <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    商品售罄提醒 <span style="color: red">**系統會在庫存數量小於10的時候發送站內信提醒**</span>
                                                </label>
                                            </div> -->
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <form action="">
                                <label for="">商品文案編輯頁面</label>
                                <textarea class="form-control" style="resize:none" rows="10" placeholder="請輸入文案" maxlength="500" readonly><?= $row['description'] ?></textarea>
                            </form>
                            <!-- <form method="post">
                                <div class="text-end mb-1 d-flex justify-content-between">
                                    <h3>商品文案編輯頁面</h3> <button class="btnry" type="submit">儲存草稿</button>
                                </div>
                                <textarea id="mytextarea" name="product">歡迎編輯 請勿上傳不雅文字</textarea>
                            </form> -->
                        <?php else : ?>
                            無此筆資料
                        <?php endif; ?>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <div class="crudBox">
                                <button type="button" class="btn filterBtn mx-1" onclick="window.location.href='../product-edit/.php?store_id=<?= $storeID ?>&type=<?= $type ?>&id=<?= $id?>&category=<?=$row['product_category']?>'">編輯</button>
                                <button type="button" class="btn filterBtn mx-1" onclick="window.location.href='doDelete.php?id=<?= $row['id'] ?>'">刪除</button>
                                <button type="button" class="btn filterBtn ms-1" onclick="window.location.href='../products/.php?store_id=<?= $storeID ?>&type=<?= $type ?>'">返回總表</button>
                            </div>
                        </div>
<img class="object-cover" <?php if ($rowss[0]["main_photo"] == '') : ?> img src="./user.jpg" alt="">
<?php else : ?>
    <img src="../images/dashboard/<?= $rowss[0]["main_photo"] ?>" alt="">
<?php endif; ?>
<!-- 商品照片開始 -->
</div>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php if ($rowss[0]["sub_photo"] == '') : ?>
            <img class="object-cover" src="./user.jpg" alt="">
        <?php else : ?>

            <?php
            $rowphoto = explode(",", $rowss[0]["sub_photo"]); //explode去除逗號
            array_pop($rowphoto);
            foreach ($rowphoto as $rowaa) {

                echo "<div class='swiper-slide photo1'><img src='../images/dashboard/$rowaa'/></div>";
            } ?>
        <?php endif; ?>

    </div>
    <div class="swiper-pagination"></div>
</div>
</div>


<form action="UpdateMainphoto.php" method="post" enctype="multipart/form-data">
    <div class="row photo-upload mt-3 d-flex justify-content-center">
        <div class="mb-2">
            <input class="form-control  mx-3" type="file" name="MainFile">
        </div>
        <button class="btnphoto mx-2" type="submit">上傳封面照片</button>
</form>


<form action="pho111.php" method="post" enctype="multipart/form-data">
    <div class="mb-2">
        <input class="form-control  mx-3" type="file" name="myFile">
    </div>
    <button class="btnphoto mx-2" type="submit">商品照片</button>
    </div>
</form>
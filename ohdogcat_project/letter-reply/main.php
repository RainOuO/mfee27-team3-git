<div class="main-content p-4 position-relative">
    <?php foreach ($rows as $row) : ?>
        <div class="card mb-3" style="max-width: auto;">
            <div class="row g-0">
                <div class="col-md-1 d-flex justify-content-center align-items-center object-cover">
                    <?php if($row['reply_status'] == 1): ?>
                        <div class="w-100 h-100 p-3"><div class="ratio ratio-1x1"><img class="stickers object-fit" src="../images/profile-user.jpg" class="img-fluid rounded-start" alt="..."></div></div>
                    <?php else: ?>
                        <?php if(isset($rowsStoreName['photo'])== null): ?>
                            <div class="w-100 h-100 p-3"><div class="ratio ratio-1x1"><img class="stickers object-fit" src="../images/profile-user.jpg" class="img-fluid rounded-start" alt="..."></div></div>
                        <?php else: ?>
                            <div class="w-100 h-100 p-3"><div class="ratio ratio-1x1"><img class="stickers object-fit" src="../images/store_photo/<?=$rowsStoreName['photo']?>" class="img-fluid rounded-start" alt="..."></div></div>
                        <?php endif;?>
                    <?php endif; ?>
                </div>
                <div class="col-md-1 d-flex justify-content-center align-items-center">
                    <?php if($row['reply_status'] == 1){echo $rowsUserName['name'];}else{echo $rowsStoreName['name'];} echo "<br>" . $row['time']; ?>
                </div>
                <div class="col-md-auto d-flex justify-content-start align-items-center">
                    <div class="card-body">
                        <p class="card-text"><?= $row['content'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
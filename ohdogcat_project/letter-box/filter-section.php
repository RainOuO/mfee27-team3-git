<hr class="m-0">
<div class="d-flex justify-content-end align-items-center mt-3 pt-3 roww-100">

        <div class="col-6 d-flex justify-content-end align-items-center">
            <a href="./?order=1&type=<?= $type ?>" class="orderBtn col-3 <?php if ($order == 1) echo "active" ?>">回覆時間↑</a>
            <a href="./?order=2&type=<?= $type ?>" class="orderBtn col-3 <?php if ($order == 2) echo "active" ?>">回覆時間↓</a>
            <a href="./?order=3&type=<?= $type ?>" class="orderBtn col-3 <?php if ($order == 3) echo "active" ?>">未回覆↓</a>
            <a href="./?order=4&type=<?= $type ?>" class="orderBtn col-3 <?php if ($order == 4) echo "active" ?>">已回覆↓</a>
        </div>
</div>
<div class="d-flex justify-content-end align-items-center mb-3 pb-3">
        <div class="countBox">
        <?php if ($listCount > 0) : ?>
            <h4 class="countBox">現在為第<?= $page ?>頁，信件第<?= $starItem ?>-<?= $endItem ?>筆資料</h4>
        <?php endif; ?>
        </div>
    </div>

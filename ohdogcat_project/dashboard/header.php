<h2 class="m-0">狀態總覽</h2>
<div class="py-2 ps-5" role="">
    <a class="btn catBtn <?= ($status == '')?'current-active':''?>" 
        href="?status=&order=<?=$order?>&sort=<?=$sort?>&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page= ">
        商家資訊總覽
    </a>
    <a class="btn catBtn <?= ($status == 1)?'current-active':''?>" 
        href="?status=1&order=<?=$order?>&sort=<?=$sort?>&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page= ">
        未確認
    </a>
    <a class="btn catBtn <?= ($status == 2)?'current-active':''?>" 
        href="?status=2&order=<?=$order?>&sort=<?=$sort?>&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page= ">
        處理中
    </a>
    <a class="btn catBtn <?= ($status == 3)?'current-active':''?>" 
        href="?status=3&order=<?=$order?>&sort=<?=$sort?>&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page= ">
        已結單
    </a>
    <a class="btn catBtn <?= ($status === '0')?'current-active':''?>" 
        href="?status=0&order=<?=$order?>&sort=<?=$sort?>&priceMin=<?=$priceMin?>&priceMax=<?=$priceMax?>&dateStart=<?=$dateStart?>&dateEnd=<?=$dateEnd?>&search=<?=$search?>&page= ">
        已取消
    </a>
</div>
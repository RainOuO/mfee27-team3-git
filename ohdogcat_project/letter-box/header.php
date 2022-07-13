<h2 class="m-0">信件匣</h2>
<div class="py-2 ps-5" role="">
    <a class="btn catBtn <?= (!$pageType)?'current-active':''?>" 
        href="./">
        所有信件
    </a>
    <a class="btn catBtn <?= ($pageType == 1)?'current-active':''?>" 
        href="?type=1">
        系統信件列表
    </a>
    <a class="btn catBtn <?= ($pageType == 2)?'current-active':''?>" 
        href="?type=2">
        顧客信件列表
    </a>
</div>
        
<h2 class="m-0">優惠券管理</h2>
<div class="py-2 ps-5" role="">
    <a class="btn catBtn  <?php if ($valid == "") echo "active";?>" aria-current="page"
        href="../discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>">所有狀態
    </a>
    <a class="btn catBtn <?php if ($_GET['valid'] == "1") echo "active";?>" aria-current="page"
        href="../discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=1">有效
    </a>
    <a class="btn catBtn  <?php if ($_GET['valid'] == "2") echo "active";?>" aria-current="page"
        href="../discounts/?ordertype=<?= $ordertype ?>&category=<?= $category ?>&valid=2">無效/失效
    </a>
</div>
<?php if (!isset($_GET["type"])) : ?>
    <h2 class="m-0">商品總覽</h2>
<?php else : ?>
<?php foreach ($rowstitle as $rows) : ?>
    <h2 class="m-0"> <?= $rows['type_name'] ?></h2>
<?php endforeach; ?>
<?php endif; ?>

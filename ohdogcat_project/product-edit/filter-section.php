<hr class="m-0">
<div class="d-flex justify-content-between align-items-center my-3 py-3">
    <div class="title d-flex mt-2">
        <img src="./IMAGES/8666681_edit_icon.png" width="48" height="48" alt="">
        <h4 class="pt-3">基本設定</h4>
    </div>
    <div class="crudBox">
        <button type="button" class="btn filterBtn mx-1"
            onclick="window.location.href='../product-edit/.php?store_id=<?= $storeID ?>&type=<?= $type ?>&id=<?= $id?>&category=<?=$row['product_category']?>'">編輯</button>
        <button type="button" class="btn filterBtn mx-1"
            onclick="window.location.href='doDelete.php?id=<?= $row['id'] ?>'">刪除</button>
        <button type="button" class="btn filterBtn ms-1"
            onclick="window.location.href='../products/.php?store_id=<?= $storeID ?>&type=<?= $type ?>'">返回總表</button>

    </div>
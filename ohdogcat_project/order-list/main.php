<?php
require('../db-connect.php');
$store_id = 1;
$sql = "SELECT * FROM order_product WHERE store_id = $store_id ORDER BY order_time DESC";
$result = $conn->query($sql);
$result_count = $result->num_rows;
$rows = ($result_count>0)? $result->fetch_all(MYSQLI_ASSOC):'';
for($i=0; $i<count($rows); $i++){

}

$sqlUser = "SELECT id, name, email FROM users";
$resultUser = $conn->query($sqlUser);
$resultUser_count = $resultUser->num_rows;
$rowsUser = ($resultUser_count>0)? $resultUser->fetch_all(MYSQLI_ASSOC):'';
$userName = array_column($rowsUser, 'name', 'id');
$userEmail = array_column($rowsUser, 'email', 'id');


for($i=0; $i<count($rows); $i++){
    $rows[$i]['userName'] = $userName[$rows[$i]['user_id']];
    $rows[$i]['userEmail'] = $userEmail[$rows[$i]['user_id']];
};
$_SESSION["order-list"] = $rows;
?>

<div class="table-responsive pt-3">
    <?php if($result_count>0): ?>
    <table class="table table-sm table-hover transition-3">
        <thead>
            <tr>
                <th class="align-middle px-0">訂單序號</th>
                <th class="align-middle px-0">用戶暱稱</th>
                <th class="align-middle px-0">總價</th>
                <th class="align-middle px-0">狀態</th>
                <th class="align-middle px-0">訂單時間</th>
                <th class="align-middle px-0"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row):?>
            <tr class="<?= ($row['valid'] == 0)? 'text-secondary':(($row['status'] == 1)?'':''); ?>">
                <td class="align-middle"><?= $row['order_no'] ?></td>
                <td class="align-middle"><?= $userName[$row['user_id']] ?></td>
                <td class="align-middle"><?= $row['total'] ?></td>
                <td class="align-middle <?= ($row['valid'] == 0)? '':(($row['status'] == 1)?'':'text-danger'); ?>">
                    <?= ($row['valid'] == 0)? '已取消訂單':(($row['status'] == 1)?'已結單':'未結單'); ?></td>
                <td class="align-middle"><?= $row['order_time'] ?></td>
                <td class="align-middle text-center">
                    <button type="button" class="btn detailBtn" data-order-id="<?= $row['id'] ?>"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasOrderList"
                        aria-controls="offcanvasOrderList">查看</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- offcanvas -->
    <div class="offcanvas offcanvas-end show" tabindex="-1" id="offcanvasOrderList"
        aria-labelledby="offcanvasOrderListLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasOrderListLabel">訂單序號：</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row h-100">
                <div id="orderDetail" class="col-md-4 h-100 scroll-bar">
                    <div class="card mb-3 mx-auto" style="max-width: 720px; height: 110px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">商品名稱</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text"><small class="text-muted">單價：</small></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text"><small class="text-muted">數量：3</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mx-auto" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">商品名稱</h5>
                                    <p class="card-text">敘述敘述敘述敘述敘述敘述敘述敘述</p>
                                    <p class="card-text"><small class="text-muted">數量：3</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mx-auto" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">商品名稱</h5>
                                    <p class="card-text">敘述敘述敘述敘述敘述敘述敘述敘述</p>
                                    <p class="card-text"><small class="text-muted">數量：3</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mx-auto" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">商品名稱</h5>
                                    <p class="card-text">敘述敘述敘述敘述敘述敘述敘述敘述</p>
                                    <p class="card-text"><small class="text-muted">數量：3</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mx-auto" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">商品名稱</h5>
                                    <p class="card-text">敘述敘述敘述敘述敘述敘述敘述敘述</p>
                                    <p class="card-text"><small class="text-muted">數量：3</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mx-auto" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">商品名稱</h5>
                                    <p class="card-text">敘述敘述敘述敘述敘述敘述敘述敘述</p>
                                    <p class="card-text"><small class="text-muted">數量：3</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mx-auto" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">商品名稱</h5>
                                    <p class="card-text">敘述敘述敘述敘述敘述敘述敘述敘述</p>
                                    <p class="card-text"><small class="text-muted">數量：3</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mx-auto" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">商品名稱</h5>
                                    <p class="card-text">敘述敘述敘述敘述敘述敘述敘述敘述</p>
                                    <p class="card-text"><small class="text-muted">數量：3</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid col-md-8">
                    <div class="">
                        <h4>詳細資料</h4>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <h6 class="text-secondary">用戶暱稱</h6>
                                    <p class="bg-light p-2 rounded-3">陳家豪</p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">商品總數</h6>
                                    <p class="bg-light p-2 rounded-3">8</p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">總金額</h6>
                                    <p class="bg-light p-2 rounded-3">8500 元</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <h6 class="text-secondary">訂單成立時間</h6>
                                    <p class="bg-light p-2 rounded-3">****/**/**</p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">優惠券序號</h6>
                                    <p class="bg-light p-2 rounded-3">未使用優惠券</p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">訂單狀態</h6>
                                    <p class="bg-light p-2 rounded-3 text-danger">未結單</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <h3>目前尚無訂單</h3>
    <?php endif; ?>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script>
    let store_id = <?= $store_id ?>;
    let offcanvas = document.querySelector('#offcanvasOrderList');
    let detailBtn = document.querySelectorAll('.detailBtn');
    
    for (let i = 0; i < detailBtn.length; i++) {
        detailBtn[i].addEventListener('click', function () {
            const orderId = this.dataset.orderId;
            $.ajax({
                    method: "POST",
                    url: `../api/order-item-info.php`,
                    dataType: "json",
                    data: {
                        order_id: orderId,
                        index: i
                    }
                })
                .done(function (response) {
                    let orderDetail = document.querySelector('#orderDetail');
                    let porductItem = '';
                    for(let item of response.data.order_detail){
                        porductItem += `<div class="card mb-3 mx-auto" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <figure class="ratio ratio-4x3 m-0">
                                    <img src="../images/${item.productImg}" class="img-fluid rounded-start fill-w object-fit" alt="...">
                                </figure>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">${item.productName}</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text"><small class="text-muted">單價：${formatNum(item.productPrice)}</small></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text"><small class="text-muted">數量：${item.amount}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                    }
                    orderDetail.innerHTML = porductItem;
                    console.log(response.data);

                }).fail(function (jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
        });
    }




    function formatNum(val) {
        let str = (typeof val == 'string') ? val:String(val);
        let newStr = "";
        let count = 0;
        if (str.indexOf(".") == -1) {
            for (let i = str.length - 1; i >= 0; i--) {
                if (count % 3 == 0 && count != 0) {
                    newStr = str.charAt(i) + "," + newStr;
                } else {
                    newStr = str.charAt(i) + newStr;
                }
                count++;
            }
            str = newStr; //自動補小數點後兩位
            return(str);
        } else {
            for (let i = str.indexOf(".") - 1; i >= 0; i--) {
                if (count % 3 == 0 && count != 0) {
                    newStr = str.charAt(i) + "," + newStr; //碰到3的倍數則加上“,”號
                } else {
                    newStr = str.charAt(i) + newStr; //逐個字符相接起來
                }
                count++;
            }
            str = newStr + (str + "00").substr((str + "00").indexOf("."), 3);
            return(str)
        }
    }
</script>
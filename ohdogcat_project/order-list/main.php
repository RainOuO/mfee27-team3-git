<?php
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
            <?php  for($i=0; $i<count($rows); $i++):?>
                
            <tr class="<?= ($rows[$i]['status'] == 0)? 'text-secondary text-opacity-50':''; ?>">
                <td class="align-middle"><?= $rows[$i]['order_no'] ?></td>
                <td class="align-middle text-truncate"><?= $userName[$rows[$i]['user_id']] ?></td>
                <td class="align-middle"><?= $rows[$i]['total'] ?></td>
                <td class="order_status align-middle text-white">
                    <div  class="d-inline-block py-1 px-3 rounded-5 <?= $rows[$i]['status_css']['bg'] ?>"><?= $rows[$i]['status_text'] ?></div>
                </td>
                <td class="align-middle"><?= $rows[$i]['order_time'] ?></td>
                <td class="align-middle text-start">
                    <button type="button" class="btn detailBtn" data-order-id="<?= $rows[$i]['id'] ?>"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasOrderList"
                        aria-controls="offcanvasOrderList">查看
                    </button>
                    <?php if($rows[$i]['activeOrder']): ?>
                        <button type="button" class="orderCancelBtn btn btn-secondary" data-index="<?= $i ?>" data-cancel-id="<?= $rows[$i]['id'] ?>">取消訂單</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <!-- offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasOrderList"
        aria-labelledby="offcanvasOrderListLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasOrderListLabel">訂單序號：<span class="order-no"></span></h5>
            <button type="button" id="offcanvasClose" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row h-100">
                <div id="productList" class="col-md-4 h-100 scroll-bar">
                </div>
                <div id="orderInfo" class="container-fluid col-md-8">
                    <button type="button" id="orderCancelBtn" class="btn btn-danger">取消訂單</button>
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
    let cancelBtn = document.querySelectorAll('.orderCancelBtn');

    for (let i = 0; i < cancelBtn.length; i++){
        cancelBtn[i].addEventListener('click', function () {
            let cancelId = this.dataset.cancelId;
            let index = this.dataset.index;
            doCancelOrder(cancelId, index);
        });
    }
    
    
    
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
                    let productList = document.querySelector('#productList');
                    let orderInfo = document.querySelector('#orderInfo');
                    let orderNo = document.querySelector('.order-no');
                    let porductItem = '';
                    let activeOrder = (response.data.order_item.status != 0 && response.data.order_item.status != 3 );
                    let amount = 0;
                    for(let item of response.data.order_detail){
                        amount += Number(item.amount);
                        porductItem += `
                        <div class="card mb-3 mx-auto" style="max-width: 720px;">
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
                    let cancelBtn = (activeOrder)? `<button type="button" id="orderCancelBtn" class="btn btn-danger" data-cancel-id="${response.data.order_item.id}">取消訂單</button>`:'';
                    let order_info = `
                        <h4>詳細資料</h4>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <h6 class="text-secondary">用戶暱稱</h6>
                                    <p class="bg-light p-2 rounded-3">${response.data.order_item.userName}</span></p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">商品總數</h6>
                                    <p class="bg-light p-2 rounded-3">${amount}</span></p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">總金額</h6>
                                    <p class="bg-light p-2 rounded-3">${formatNum(response.data.order_item.total)}</span> 元</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <h6 class="text-secondary">訂單成立時間</h6>
                                    <p class="bg-light p-2 rounded-3">${response.data.order_item.order_time}</span></p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">優惠券序號</h6>
                                    <p class="bg-light p-2 rounded-3">${(response.data.order_item.coupon_id == 0)? '未使用優惠券':'商品優惠'}</span></p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">訂單狀態</h6>
                                    <p class="bg-light p-2 rounded-3 ${response.data.order_item.status_css.text}">${response.data.order_item.status_text}</span></p>
                                </div>
                            </div>
                        </div>
                        ${cancelBtn}
                    `;
                    
                    
                    orderNo.innerText = response.data.order_item.order_no;
                    productList.innerHTML = porductItem;
                    orderInfo.innerHTML = order_info;
                    orderCancelBtn = document.querySelector('#orderCancelBtn');
                    if(activeOrder){
                        orderCancelBtn.addEventListener('click', function() {
                            let cancelId = this.dataset.cancelId;
                            let index = i;
                            doCancelOrder(cancelId, index);
                        });
                    }
                    
                    console.log(response.data);
                    
                }).fail(function (jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
        });
    }



    // 金額格式轉換
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



    // 取消訂單按鈕
    function doCancelOrder(cancelId, index) {
        console.log(cancelId, index);
        Swal.fire({
            title: '確定取消訂單?',
            text: '取消後的訂單將無法被回復',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText:'取消',
            confirmButtonText: '確定'
            }).then((result) => {
            if (result.isConfirmed) {
                console.log();
                $.ajax({
                    method: "POST",
                    url: `../api/do-cancel-order.php`,
                    dataType: "json",
                    data: {
                        id: cancelId,
                        index: index
                    }
                }).done(function (response) {
                    console.log(response.data);
                    if(response.data.success){
                        let order_status = document.querySelectorAll('.order_status');
                        let offcanvasClose = document.querySelector('#offcanvasClose');
                        order_status[response.data.statusChange.index].innerHTML = `<div class="d-inline-block py-1 px-3 rounded-5 ${response.data.statusChange.status_css.bg}">${response.data.statusChange.status_text}</div>`;
                        console.log(order_status[response.data.statusChange.index].parentNode);
                        order_status[response.data.statusChange.index].parentNode.classList.add('text-secondary');
                        offcanvasClose.click();
                        Swal.fire(
                        '成功',
                        '該筆訂單已被取消',
                        'success'
                        );
                    }
                    
                }).fail(function (jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
                
            }
        });
    }

    
</script>
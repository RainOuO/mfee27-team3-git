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
                    <div class="btn-group">
                        <div class="d-flex align-items-center px-3 bg-wite pe-none border border-<?=$rows[$i]['status_css']['color']?> text-<?=$rows[$i]['status_css']['color']?> <?=$rows[$i]['status_css']['rounded']?> w-100">
                            <?=$rows[$i]['status_text']?>
                        </div>
                        <button type="button" class="btn btn-<?=$rows[$i]['status_css']['color']?> dropdown-toggle dropdown-toggle-split <?=$rows[$i]['status_css']['display']?>" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="statusUpdateBtn dropdown-item" href="#" data-status="<?=$rows[$i]['status']?>" data-index="<?=$i?>" data-update-id="<?= $rows[$i]['id'] ?>"><?=$rows[$i]['next_status']?></a></li>
                        </ul>
                    </div>
                    <!-- <div  class="d-inline-block py-1 px-3 rounded-5 pe-none <?= $rows[$i]['status_css']['bg'] ?>"><?= $rows[$i]['status_text'] ?></div> -->
                </td>
                <td class="align-middle"><?= $rows[$i]['order_time'] ?></td>
                <td class="align-middle text-start">
                    <button type="button" class="btn detailBtn me-1" data-order-id="<?= $rows[$i]['id'] ?>"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasOrderList"
                        aria-controls="offcanvasOrderList">查看
                    </button>
                    <?php if($rows[$i]['activeOrder']): ?>
                        <button type="button" class="orderCancelBtn btn btn-secondary" data-status="<?=$rows[$i]['status']?>" data-index="<?=$i?>" data-cancel-id="<?= $rows[$i]['id'] ?>">取消訂單</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    <!-- <div class="row">
        <div class="col-12">
            <form action="doMessage.php">
                <textarea class="form-control textarea" id="exampleFormControlTextarea1" rows="3" name="message" required placeholder="請輸入訊息" ></textarea>
                <div class="mt-2 g-2 justify-content-end text-end">
                    <div class="">
                        <button class="btn filterBtn" type="submit">送出</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->

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
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <h3>無資料</h3>
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
    let updateBtn = document.querySelectorAll('.statusUpdateBtn');


    for (let i = 0; i < cancelBtn.length; i++){
        cancelBtn[i].addEventListener('click', function () {
            let cancelId = this.dataset.cancelId;
            let status = this.dataset.status;
            let index = this.dataset.index;
            let removeBtn = cancelBtn[i];
            doCancelOrder(cancelId, index, removeBtn, status);
        });
    }

    for (let i = 0; i < updateBtn.length; i++){
        updateBtn[i].addEventListener('click', function () {
            let updateId = this.dataset.updateId;
            let status = this.dataset.status;
            let index = this.dataset.index;
            let removeBtn = detailBtn[i].nextElementSibling;
            doStatuUpdate(updateId, index, removeBtn, status);
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
                    let status = response.data.order_item.status;
                    let activeOrder = (status != 0 && status != 3 );
                    let amount = 0;
                    let logLength = response.data.progressLog.log.length;
                    let itemLog = response.data.progressLog.log[logLength-1];
                    
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
                    let statusBtn = (activeOrder)? `<div class="btn-group dropend">
                                        <div class="d-flex align-items-center px-3 bg-wite pe-none border border-${response.data.order_item.status_css.offCanvas} text-${response.data.order_item.status_css.offCanvas} rounded-start w-100">${response.data.order_item.status_text}</div>
                                        <button type="button" class="btn btn-${response.data.order_item.status_css.offCanvas} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a id="statusUpdateBtn" class="dropdown-item" href="#" data-update-id="${response.data.order_item.id}"}>${response.data.order_item.nextStatus}</a></li>
                                            <li><a id="orderCancelBtn" class="dropdown-item" href="#" data-cancel-id="${response.data.order_item.id}">取消訂單</a></li>
                                        </ul>
                                    </div>`:`<p class="bg-light p-2 rounded-3 ${response.data.order_item.status_css.text}">${response.data.order_item.status_text}</span></p>`;
                    let progressStatus = (logLength==2)? `<div class="card mb-3 text-secondary bg-secondary bg-opacity-10">
                                                            <div class="card-body">
                                                                <p class="card-text fs-6">${response.data.progressLog.log[0].update_time}   訂單進入處理中</p>
                                                            </div>
                                                        </div>`:'';
                    let isNew = (response.data.progressLog.newItem)? '':`<div class="card mb-3 text-secondary bg-${response.data.progressLog.progress.status} bg-opacity-10">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">訂單${response.data.progressLog.progress.text}</h5>
                                                                            <p class="card-text fs-6">賣家已於 ${itemLog.update_time} 將訂單狀態更新為${response.data.progressLog.progress.text}</p>
                                                                        </div>
                                                                    </div>`;
                    let order_info = `
                        <h4>詳細資料</h4>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div>
                                    <h6 class="text-secondary">用戶暱稱</h6>
                                    <p class="bg-light p-2 rounded-3">${response.data.order_item.userName}</p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">商品總數</h6>
                                    <p class="bg-light p-2 rounded-3">${amount}</p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">總金額</h6>
                                    <p class="bg-light p-2 rounded-3">${formatNum(response.data.order_item.total)} 元</p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">訂單成立時間</h6>
                                    <p class="bg-light p-2 rounded-3">${response.data.order_item.order_time}</p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">優惠券序號</h6>
                                    <p class="bg-light p-2 rounded-3">${(response.data.order_item.coupon_id == 0)? '未使用優惠券':'商品優惠'}</p>
                                </div>
                                <div>
                                    <h6 class="text-secondary">訂單狀態</h6>
                                    ${statusBtn}
                                </div>
                            </div>
                            <div class="col-8">
                                <h6>目前處理進度：</h6>
                                <div class="progress mb-3 gx-2">
                                    <div class="progress-bar bg-${response.data.progressLog.progress.status}" role="progressbar" style="width: ${response.data.progressLog.progress.num}%" aria-valuenow="${response.data.progressLog.progress.num}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="card mb-3 text-secondary bg-secondary bg-opacity-10">
                                    <div class="card-body">
                                        <p class="card-text fs-6">${response.data.order_item.order_time}   訂單建立</p>
                                    </div>
                                </div>
                                ${progressStatus}
                                ${isNew}
                                <div class="row"></div>
                            </div>
                        </div>
                    `;
                    
                    
                    orderNo.innerText = response.data.order_item.order_no;
                    productList.innerHTML = porductItem;
                    orderInfo.innerHTML = order_info;
                    orderCancelBtn = document.querySelector('#orderCancelBtn');
                    statusUpdateBtn = document.querySelector('#statusUpdateBtn');
                    if(activeOrder){
                        orderCancelBtn.addEventListener('click', function() {
                            let cancelId = this.dataset.cancelId;
                            let index = i;
                            let removeBtn = detailBtn[i].nextElementSibling;
                            doCancelOrder(cancelId, index, removeBtn, status);
                        });
                        statusUpdateBtn.addEventListener('click', function() {
                            let updateId = this.dataset.updateId;
                            console.log(updateId);
                            let index = i;
                            let removeBtn = detailBtn[i].nextElementSibling;
                            doStatuUpdate(updateId, index, removeBtn, status);
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
    function doCancelOrder(cancelId, index, removeBtn, status) {
        Swal.fire({
            title: '確定取消訂單？',
            text: '取消後的訂單將無法被回復',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText:'取消',
            confirmButtonText: '確定'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: `../api/do-cancel-order.php`,
                    dataType: "json",
                    data: {
                        id: cancelId,
                        index: index,
                        status: status
                    }
                }).done(function (response) {
                    console.log(response.data);
                    if(response.data.success){
                        let order_status = document.querySelectorAll('.order_status');
                        let offcanvasClose = document.querySelector('#offcanvasClose');
                        order_status[response.data.statusChange.index].innerHTML = `<div class="btn-group">
                        <div class="d-flex align-items-center px-3 bg-wite pe-none border border-secondary text-secondary rounded w-100">
                            已取消                        </div>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split invisible" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="statusUpdateBtn dropdown-item" href="#" data-status="0" data-index="3" data-update-id="39"></a></li>
                        </ul>
                    </div>`;
                        
                        order_status[response.data.statusChange.index].parentNode.classList.add('text-secondary');
                        order_status[response.data.statusChange.index].parentNode.classList.add('text-opacity-50');
                        removeBtn.style['display'] = 'none';
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

    // 更新狀態按鈕
    function doStatuUpdate(updateId, index, removeBtn, status) {
        Swal.fire({
            title: '確定更改訂單狀態？',
            text: '訂單狀態更改將不可回溯',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText:'取消',
            confirmButtonText: '確定'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: `../api/do-update-status.php`,
                    dataType: "json",
                    data: {
                        id: updateId,
                        index: index,
                        status: status
                    }
                }).done(function (response) {
                    console.log(response.data);
                    if(response.data.success){
                        let order_status = document.querySelectorAll('.order_status');
                        let offcanvasClose = document.querySelector('#offcanvasClose');
                        order_status[response.data.statusChange.index].innerHTML = `<div class="btn-group">
                        <div class="d-flex align-items-center px-3 bg-wite pe-none border border-${response.data.statusChange['status_css']['color']} text-${response.data.statusChange['status_css']['color']} ${response.data.statusChange['status_css']['rounded']} w-100">
                            ${response.data.statusChange['status_text']}
                        </div>
                        <button type="button" class="btn btn-${response.data.statusChange['status_css']['color']} dropdown-toggle dropdown-toggle-split ${response.data.statusChange['status_css']['display']}" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="statusUpdateBtn dropdown-item" href="#" data-status="${response.data.statusChange['status']}" data-index="${response.data.statusChange['index']}" data-update-id="${updateId}">${response.data.statusChange['next_status']}</a></li>
                        </ul>
                    </div>`;
                        if(response.data.statusChange.status == '3'){removeBtn.style['display'] = 'none';};
                        offcanvasClose.click();
                        Swal.fire(
                        '成功',
                        `已將該筆訂單狀態更改為${response.data.statusChange.status_text}`,
                        'success'
                        );
                        let newItem = document.querySelectorAll('.statusUpdateBtn');
                        newItem[response.data.statusChange.index].addEventListener('click', function(){
                            let updateId = this.dataset.updateId;
                            let status = this.dataset.status;
                            let index = this.dataset.index;
                            let removeBtn = detailBtn[index].nextElementSibling;
                            doStatuUpdate(updateId, index, removeBtn, status);
                        });
                    }
                    
                }).fail(function (jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
                
            }
        });
    }

    
</script>
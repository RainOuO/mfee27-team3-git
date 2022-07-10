<div class="container index">
    <div class="row">
        <div class="col-3 ">
            <div class="card top-card box shadow-sm">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="card-icon col-4">
                            <img class="align-item-center" src="../login-index/img/icon-revenue-all.svg" alt="">
                        </div>
                        <div class="card-content col-8">
                            <h5 class="card-title">本月營業總額</h5>
                            <p class="card-text "><strong>$</strong>40,000元</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card top-card box shadow-sm">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="card-icon col-4">
                            <img class="" src="../login-index/img/icon-revenue-today.svg" alt="">
                        </div>
                        <div class="card-content col-8">
                            <h5 class="card-title">今日營業總額</h5>
                            <p class="card-text "><strong>$</strong>1,000元</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card top-card box shadow-sm">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="card-icon col-4">
                            <img class="" src="../login-index/img/icon-order-list-y.svg" alt="">
                        </div>
                        <div class="card-content col-8">
                            <div class="col text-center">
                                <h5 class="row-6 mt--1 card-title">今日訂單數</h5>
                                <p class="row-6 card-text ">40單</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card top-card box shadow-sm">
                <div class="card-body ">
                    <div class="row text-center">
                        <div class="card-icon col-4">
                            <img class="" src="../login-index/img/icon-message.svg" alt="">
                        </div>
                        <div class="card-content col-8 algin-item-center">
                            <h5 class="card-title">未處理訂單</h5>
                            <p class="card-text">6封</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-8">
            <div class="card top-card">
                <div class="card-body">
                    <div class="x_panel">
                        <div class="align-items-stretch">
                            <h3 style="
    border-bottom: 2px solid #E6E9ED;
    padding: 1px 5px 6px;
    margin-bottom: 10px;">每日訂單數統計</h3>
                        </div>
                        <canvas id="lineChart" width="100%"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- to do list -->
        <div class="col-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="x_panel">
                            <div>
                                <h3 style="
    border-bottom: 2px solid #E6E9ED;
    padding: 1px 5px 6px;
    margin-bottom: 10px;">訂單狀態</h3>
                            </div>
                            <canvas id="barChart" width="100%" height="107%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ to do list -->
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
    var line = document.getElementById('lineChart').getContext('2d');
    var lineChart = new Chart(line, {
        type: 'line',
        data: {
            labels: ['','07.09', '07.08', '07.10', '07.11', '07.12', '07.13', '07.14'],
            datasets: [{
                label: '訂單數量',
                data: [0,15, 10, 23, 33, 24, 51, 26],
                fill: false,
                borderColor: '#D5EEEE',
            }]
        },
    });


    // 條狀圖
    var bar = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(bar, {
    type: 'bar',
    data: {
        labels: ["未確認", "處理中", "已結單", "已取消"],
        datasets: [{
            label: '訂單數量',
            data: [12, 19, 3, 5],
            backgroundColor: [
                '#D5EEEE',
                'rgba(255, 206, 86)',
                '#D5EEEE',
                'rgba(255, 206, 86)',

            ],
            borderWidth: 1
        }]
    }
});
</script>
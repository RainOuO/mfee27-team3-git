<div class="dashboard align-item-center justify-content-center">
    <div class="row w-100 m-0">
        <div class="col-3" >
            <div class="card top-card shadow-sm">
                <div class="card-body">
                    <div class="row">
                    <div class="col-4 text-center">
                            <img width="50%" src="../dashboard/img/icon-revenue-all.svg" alt="">
                        </div>
                        <div class="card-content col-8">
                            <p class="card-title">本月營業總額</p>
                            <h3 class="fs-3  row-10 card-text "><strong>$</strong> <span class="dashboard-data"></span> <span class="fs-5">元</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card top-card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <img width="50%" src="../dashboard/img/icon-revenue-today.svg" alt="">
                        </div>
                        <div class="card-content col-8">
                            <p class="card-title">今日營業總額</p>
                            <h3 class="fs-3  row-10 card-text "><strong>$</strong> <span class="dashboard-data"></span> <span class="fs-5">元</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card top-card box shadow-sm">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-4 text-center align-content-bottom">
                            <img width="40%" src="../dashboard/img/icon-order-list-y.svg" alt="">
                        </div>
                        <div class="card-content col-8">
                            <div class="col">
                                <p class="row-2 card-title">今日訂單數</p>
                                <h3 class="fs-3  row-10 card-text "><span class="dashboard-data"></span> <span class="fs-5">筆</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card top-card shadow-sm">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-4 text-center">
                            <img width="50%" src="../dashboard/img/icon-message.svg" alt="">
                        </div>
                        <div class="card-content col-8">
                            <p class="card-title">未處理訂單</p>
                            <h3 class="fs-3  row-10 card-text "><span class="dashboard-data"></span> <span class="fs-5">筆</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3 mx-0 w-100">
        <div class="col-8">
            <div class="card  h-100">
                <div class="card-body">
                    <div class="x_panel">
                        <div class="align-items-stretch">
                            <h5 style="
    border-bottom: 2px solid #E6E9ED;
    padding: 1px 5px 6px;
    margin-bottom: 10px;">近七日訂單數統計</h5>
                        </div>
                        <canvas id="lineChart"></canvas>
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
                                <h5 style="
    border-bottom: 2px solid #E6E9ED;
    padding: 1px 5px 6px;
    margin-bottom: 10px;">近七日訂單狀態</h5>
                            </div>
                            <canvas id="barChart" height="320%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ to do list -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
</script>
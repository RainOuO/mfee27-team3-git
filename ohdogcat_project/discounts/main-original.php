<div class="d-flex justify-content-between align-items-center border-bottom">
    <div class=" pb-2">
        <h1>優惠券</h1>
    </div>
    <div class="pe-1" role="">
        <input type="button" class="btn catBtn my-3" value="折價券總覽" onclick="window.location.href='backtoALLIST.php'">
        <input type="button" class="btn catBtn my-3" value="%數折價券" onclick="window.location.href='travellist.php'">
        <input type="button" class="btn catBtn my-3" value="現金折價券" onclick="window.location.href='restaurantlist.php'">

    </div>
</div>
<div class="d-flex justify-content-between row pb-1 pe-3">
    <div class="d-flex justify-content-between row pb-1 pe-3">


<!-- 
        <form action="discount-search.php" method="get">
            <div class="col-3 d-flex mt-4">
                <input type="text" class="col-3 form-control " name="keyword" placeholder="輸入關鍵字">
                <button class="col-3 btn mx-2 filterBtn" type="submit">搜尋</button>
            </div>
        </form> -->

        <form action="discount-search.php" method="get" class=" col-2 d-flex align-items-center mt-2  ">
        <div class="d-flex mt-4 align-items-center mb-4">
                <input type="text" class="col-3 form-control " name="keyword" placeholder="輸入關鍵字">
                <button class="col-3 btn mx-2 filterBtn" type="submit">搜尋</button>
            </div>
      </form>


        <div class="col-6 row d-flex justify-content-end btn-group align-items-center mt-2">
            <a href="" class="orderBtn  col-2 ">單價↑</i></a>
            <a href="" class="orderBtn col-2 ">單價↓</i></a>
            <a href="" class="orderBtn  col-2 ">上架時間↑</i></a>
            <a href="" class="orderBtn  col-2 ">上架時間↓</i></a>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end align-items-center">
        <div class="countBox">
            <h4 class="countBox">以下商品共: 00筆</h4>
        </div>
        <button class="btn filterBtn me-1 ms-3 my-3">新增商品</button>
    </div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th class="align-middle text-center">票券ID</th>
                    <th class="align-middle">商品分類</th>
                    <th>商品名稱</th>
                    <th>商品描述</th>
                    <th>優惠方案</th>
                    <th class="align-middle text-end">單價</th>
                    <th class="align-middle text-center">上架區間</th>
                    <th class="align-middle text-center">庫存</th>
                    <th class="align-middle text-center">啟用</th>
                    <th class="align-middle text-center">編修</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle text-center">001</td>
                    <td class="align-middle text">寵物周邊>寵物服飾>小型犬></td>
                    <td class="align-middle">狗狗救生衣</td>
                    <td class="align-middle">商品描述...</td>
                    <td>站內年中慶 全站三件打85折</td>
                    <td class="align-middle text-end">379</td>
                    <td class="align-middle text-center">22/07/05~22/07/31</td>
                    <td class="align-middle text-center">20</td>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">002</td>
                    <td class="align-middle ">寵物周邊>寵物服飾>貓</td>
                    <td class="align-middle">貓咪造型衣服</td>
                    <td class="align-middle">商品描述...</td>
                    <td>站內年中慶 全站三件打85折</td>
                    <td class="align-middle text-end">3790</td>
                    <td class="align-middle text-center">22/07/15~22/09/30</td>
                    <td class="align-middle text-center">11</td>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">003</td>
                    <td class="align-middle ">寵物周邊>寵物清潔></td>
                    <td class="align-middle">潔牙骨</td>
                    <td class="align-middle">商品描述...</td>
                    <td>兒童節寵愛牠</td>
                    <td class="align-middle text-end">2000</td>
                    <td class="align-middle text-center">22/07/01~22/08/30</td>
                    <td class="align-middle text-center">9</td>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">004</td>
                    <td class="align-middle ">寵物周邊>寵物清潔></td>
                    <td class="align-middle">貓砂</td>
                    <td class="align-middle">商品描述...</td>
                    <td>站內年中慶 全站三件打85折</td>
                    <td class="align-middle text-end">1900</td>
                    <td class="align-middle text-center">22/07/05~22/08/05</td>
                    <td class="align-middle text-center">5</td>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">005</td>
                    <td class="align-middle ">寵物周邊>寵物食品>貓食</td>
                    <td class="align-middle">貓咪零嘴</td>
                    <td class="align-middle">商品描述...</td>
                    <td>兒童節寵愛牠</td>
                    <td class="align-middle text-end">1780</td>
                    <td class="align-middle text-center">22/07/10~22/08/18</td>
                    <td class="align-middle text-center">7</td>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">006</td>
                    <td class="align-middle ">寵物周邊>寵物食品>搔癢棒</td>
                    <td class="align-middle">貓咪玩具</td>
                    <td class="align-middle">商品描述...</td>
                    <td>兒童節寵愛牠</td>
                    <td class="align-middle text-end">350</td>
                    <td class="align-middle text-center">22/08/10~22/08/18</td>
                    <td class="align-middle text-center">15</td>
                    <td class="align-middle text-center">0</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">007</td>
                    <td class="align-middle ">寵物周邊>寵物食品>狗食</td>
                    <td class="align-middle">狗狗罐頭</td>
                    <td class="align-middle">商品描述...</td>
                    <td>父親節優惠</td>
                    <td class="align-middle text-end">350</td>
                    <td class="align-middle text-center">22/07/15~22/09/18</td>
                    <td class="align-middle text-center">7</td>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">008</td>
                    <td class="align-middle ">寵物周邊>寵物服飾>貓</td>
                    <td class="align-middle">貓圍巾</td>
                    <td class="align-middle">商品描述...</td>
                    <td>站內年中慶 全站三件打85折</td>
                    <td class="align-middle text-end">300</td>
                    <td class="align-middle text-center">22/07/10~22/08/18</td>
                    <td class="align-middle text-center">6</td>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">009</td>
                    <td class="align-middle ">寵物周邊>寵物食品>貓食</td>
                    <td class="align-middle">貓咪零嘴</td>
                    <td class="align-middle">商品描述...</td>
                    <td>618周年慶 滿千送百</td>
                    <td class="align-middle text-end">1050</td>
                    <td class="align-middle text-center">22/07/10~22/08/18</td>
                    <td class="align-middle text-center">2</td>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle text-center">010</td>
                    <td class="align-middle">寵物周邊>護具>狗></td>
                    <td class="align-middle">狗狗項圈</td>
                    <td class="align-middle">商品描述...</td>
                    <td>毛孩親一夏優惠活動 滿300折扣...</td>
                    <td class="align-middle text-end">790</td>
                    <td class="align-middle text-center">22/07/10~22/08/18</td>
                    <td class="align-middle text-center">售完</td>
                    <td class="align-middle text-center">0</td>
                    <td class="align-middle text-center">
                        <button type="button" class="btn detailBtn">查看</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center pt-3">
            <nav aria-label="Page navigation example ">
                <ul class="pagination">
                    <li class=" ">
                        <a class="pageBtn" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class=""><a class="pageBtn" href="#">1</a></li>
                    <li class=""><a class="pageBtn" href="#">2</a></li>
                    <li class=""><a class="pageBtn" href="#">3</a></li>
                    <li class="">
                        <a class=" pageBtn" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
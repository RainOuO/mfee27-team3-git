
$.ajax({
    method: "POST",
    url: `../api/dashboard-status.php`,
    dataType: "json",
    data: {}
}).done(function (response) {
    let data = response.data;
    printChart(data);
    insertData(data);
    console.log(data);
}).fail(function (jqXHR, textStatus) {
    console.log("Request failed: " + textStatus);
});

// 圖表內容
function printChart(data) {

    var line = document.getElementById('lineChart').getContext('2d');
    var lineChart = new Chart(line, {
        type: 'line',
        data: {
            labels: [data.intervalDate[0], data.intervalDate[1], data.intervalDate[2], data.intervalDate[3], data.intervalDate[4], data.intervalDate[5], data.intervalDate[6]],
            datasets: [{
                label: '訂單數量',
                data: [data.intervalOrders[0], data.intervalOrders[1], data.intervalOrders[2], data.intervalOrders[3], data.intervalOrders[4], data.intervalOrders[5], data.intervalOrders[6]],
                fill: false,
                cubicInterpolationMode:'monotone',
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
                data: [data.ordersStatusByMonth.newOrder, data.ordersStatusByMonth.inProcess, data.ordersStatusByMonth.finished, data.ordersStatusByMonth.cancelled],
                backgroundColor: [
                    '#D5EEEE',
                    'rgba(255, 206, 86)',
                    '#D5EEEE',
                    'rgba(230, 230, 230, 1)',
                ],
                borderWidth: 1
            }],
            options: {
                responsive: true,
            }
        }
    });
}

// 資料欄位
function insertData(data){
    let target = document.querySelectorAll('.dashboard-data');
    target[0].innerText = formatNum(data.revenueMonth);
    target[1].innerText = formatNum(data.revenueToday);
    target[2].innerText = data.amountToday;
    target[3].innerText = data.newItemToday;
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
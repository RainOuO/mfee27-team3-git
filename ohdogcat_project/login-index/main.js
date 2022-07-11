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
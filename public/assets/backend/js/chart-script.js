// scripts.js
document.addEventListener('DOMContentLoaded', function() {
    var ctx1 = document.getElementById('lineChart1').getContext('2d');
    var ctx2 = document.getElementById('lineChart2').getContext('2d');

    var lineChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Dataset 1',
                data: [10, 20, 15, 25, 30, 20, 40],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var lineChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Dataset 2',
                data: [30, 10, 40, 20, 25, 35, 45],
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

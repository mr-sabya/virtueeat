const ctx = document.getElementById('earningsChart').getContext('2d');
const earningsData = [20, 30, 15, 25]; // Example data
const totalEarnings = earningsData.reduce((acc, val) => acc + val, 0);

document.getElementById('total-earnings').textContent = totalEarnings;

// Custom plugin to draw vertical lines at each data point
const verticalLinePlugin = {
    id: 'verticalLinePlugin',
    afterDatasetsDraw: function(chart) {
        const ctx = chart.ctx;
        chart.data.datasets.forEach(function(dataset, i) {
            const meta = chart.getDatasetMeta(i);
            if (!meta.hidden) {
                meta.data.forEach(function(element, index) {
                    ctx.beginPath();
                    ctx.moveTo(element.x, element.y);
                    ctx.lineTo(element.x, chart.scales.y.bottom);
                    ctx.strokeStyle = 'rgba(0, 0, 0, 0.1)';
                    ctx.stroke();
                });
            }
        });
    }
};

const chart = new Chart(ctx, {
    type: "line",            // Change chart type to spline for a smooth curve
    markerType: "circle",      // Change marker type to circle
    data: {        
        labels: ['Jan', 'Feb', 'Mar', 'Apr'],
        datasets: [{
            label: '',
            data: earningsData,
            borderWidth:4,
            borderColor: '#F66C21',
            backgroundColor: 'transparent',
            fill: true,
            tension: 0.4,
            pointWidth: 50,
            pointBackgroundColor: '#ffffff',
            pointBorderColor: '#F66C21',
            pointRadius: 5,
            pointHoverRadius: 7
        }]
    },
    options: {
        scales: {
            x: {
                grid: {
                    display: false, // Hide x-axis grid lines
                    drawBorder: false // Remove x-axis border
                }
            },
            y: {
                grid: {
                    display: false, // Hide y-axis grid lines
                    drawBorder: false // Remove y-axis border
                },
                beginAtZero: true // Ensure y-axis starts at zero
            }
        },
        plugins: {
            legend: {
                display: false // Hide the legend
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let label = context.dataset.label || '';
                        if (label) {
                            label += ': ';
                        }
                        label += context.parsed.y + ' USD';
                        return label;
                    },
                    title: function() {
                        return null;
                    }
                },
                displayColors: false,
                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                titleFont: {
                    display: false
                },
                bodyFont: {
                    color: '#fff',
                    width: 100 // Custom width for tooltip
                },
                bodySpacing: 10
            }
        }
    },
    plugins: [verticalLinePlugin]
});

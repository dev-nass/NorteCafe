document.addEventListener('DOMContentLoaded', () => {
    let chartInstance = null;
    let currentPeriod = 'annual';

    async function renderRevenueGraph(period) {
        let total_revenue = 0.00;
        console.log(period);
        try {
            const response = await fetch(`dashboard-analytics?period=${period}`);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            const text = await response.text();
            // console.log('Raw response:', text);
            const data = JSON.parse(text);
            // console.log('Parsed data:', data);

            if (chartInstance) {
                chartInstance.destroy();
            }

            // Generate the Revenue 
            data.forEach((row) => {
                total_revenue += parseFloat(row.total_sales);
                document.querySelector('.revenue-amount-header').textContent = `₱${total_revenue.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
            });

            const canvas = document.querySelector('#revenue-graph');
            const ctx = canvas.getContext('2d');

            // Create a gradient (top to bottom)
            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(143, 107, 97, 1)');
            gradient.addColorStop(1, 'rgba(45, 29, 18, 0.2)');

            // Generate the ChartJS
            chartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map(row => period === 'today' ? row.sale_hour : row.sale_date),
                    datasets: [
                        {
                            label: `Sales (${period.charAt(0).toUpperCase() + period.slice(1)})`,
                            data: data.map(row => row.total_sales),
                            backgroundColor: gradient,
                            borderWidth: 1,
                            fill: true,
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: { display: true, text: 'Sales Amount (PHP)' }
                        },
                        x: {
                            title: {
                                display: true,
                                text: period === 'annual' ? 'Year' : period === 'monthly' ? 'Month' : period === 'weekly' ? 'Week' : period === 'today' ? 'Hour' : 'Date'
                            }
                        }
                    }
                }
            });
        } catch (error) {
            console.error('Error in renderDashboard:', error);
        }
    }

    window.updateChart = function (period) {
        currentPeriod = period;
        renderRevenueGraph(period);
    };

    renderRevenueGraph(currentPeriod);
});
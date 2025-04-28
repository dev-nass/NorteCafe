
document.addEventListener('DOMContentLoaded', () => {

    async function renderTransactionGraph() {

        try {

            const response = await fetch('total-transactions');
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            const text = await response.text();
            console.log(text);
            const data = JSON.parse(text);
            
            const canvas = document.querySelector('#transaction-graph');
            const ctx = canvas.getContext('2d');

            // Create a gradient (top to bottom)
            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            // gradient.addColorStop(0, 'rgba(117, 62, 233, 0.5)');
            // gradient.addColorStop(1, 'rgba(117, 62, 233, 0)');
            gradient.addColorStop(0, 'rgba(143, 107, 97, 1)');
            gradient.addColorStop(1, 'rgba(45, 29, 18, 0.2)');

            // Generate the ChartJS
            chartInstance = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.map(row => row.sale_date),
                    datasets: [
                        {
                            label: 'Monthly',
                            data: data.map(row => row.total_transactions),
                            backgroundColor: gradient,
                            borderWidth: 1,
                            fill: true
                        }
                    ]
                },
            });
        } catch (error) {
            console.error('Error in renderDashboard:', error);
        }


    }

    renderTransactionGraph();
});
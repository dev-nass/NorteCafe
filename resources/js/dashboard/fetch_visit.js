document.addEventListener('DOMContentLoaded', () => {
    const visitHeader = document.querySelector('#visit-header');

    async function fetchVisit() {
        try {
            const response = await fetch('https://letscountapi.com/norte_cafe/homepage_visit', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-API-Key': 'obHTQn4SKpx-JMplIoktnGWx__dcKwfWvmtw6vS8F6k' // your API key
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            console.log(data);
            visitHeader.textContent = data.current_value ?? data.current_value ?? 'N/A';
        } catch (error) {
            console.error('Fetch failed:', error);
            visitHeader.textContent = 'Error';
        }
    }

    fetchVisit();
});

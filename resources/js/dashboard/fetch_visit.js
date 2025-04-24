
document.addEventListener('DOMContentLoaded', () => {

    const visitHeader = document.querySelector('#visit-header');

    async function fetchVisit() {

        const response = await fetch('https://api.counterapi.dev/v1/local/norte-cafe');
        const data = await response.json();

        visitHeader.textContent = data.count;
    }

    fetchVisit();
});
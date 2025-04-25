
document.addEventListener('DOMContentLoaded', () => {

    const saleRow = document.querySelector('#top-sale-row');

    async function renderTopSales(category) {

        saleRow.innerHTML = "";

        try {
            const response = await fetch(`top-sales?category=${category}`);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

            const text = await response.text();
            console.log('Raw response:', text);
            const data = JSON.parse(text);
            console.log('Parsed data:', data);

            // Generate the Revenue 
            data.forEach((param) => {
                saleRow.innerHTML += 
                `<div class="col-6 d-flex justify-content-between py-2 rounded border">
                    <div class="d-flex align-items-center">
                        <img src="${param.image_dir}" alt="item-img" style="height: 50px">
                        <div class="ms-3">
                            <h6 class="mb-0 text-md">${param.name}</h6>
                            <span class="mb-0 text-sm ${param.age || param.gender ? '' : 'd-none'}">${param.age ? 'Age:' : 'Gender:'} ${param.age ?? param.gender ?? ''}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge badge-sm bg-primary">${param.sale_count}</</span>
                    </div>
                </div>`;
            });

        
        } catch (error) {
            console.error('Error in renderDashboard:', error);
        }
    }

    window.updateSalesShow = function (category) {
        console.log(category);
        renderTopSales(category);
    };

    renderTopSales('most-sale');
});
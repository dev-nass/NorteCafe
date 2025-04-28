
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
                `<div id="order-queue-container" class="col-12 col-md-6">
                    <ul class="list-group h-100">
                        <li class="list-group-item h-100 border-0 d-flex align-items-center justify-content-between py-4 px-2 mb-2 bg-gray-100 border-radius-lg">
                            <div class="row w-100">
                                <div class="col-10 d-flex">
                                    <img src="${param.image_dir}" alt="item-img" style="height: 50px">
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-md">${param.name}</h6>
                                        <span class="mb-0 text-sm ${param.age || param.gender ? '' : 'd-none'}">${param.age ? 'Age:' : 'Gender:'} ${param.age ?? param.gender ?? ''}</span>
                                    </div>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <span class="badge badge-sm bg-primary">${param.sale_count}</</span>
                                </div>
                            </div>
                        </li>
                    </ul>
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
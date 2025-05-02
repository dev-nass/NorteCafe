
document.addEventListener("DOMContentLoaded", () => {
    const orderQueueContainer = document.querySelector('#order-queue-container');

    async function fetchOrders() {
        try {
            const response = await fetch("../../app/Request/PendingOrderQueue.php");
            const text = await response.text(); // Get raw response

            // console.log("Raw Response:", text); // Check if it's JSON or has errors
            const data = JSON.parse(text); // Manually parse JSON
            // console.log("Parsed Data:", data); // See what gets parsed

            orderQueueContainer.innerHTML = "";

            data['orders'].forEach((data) => {
                const createdAt = new Date(data.created_at);
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: '2-digit',
                    hour12: true
                };
                const formattedDate = createdAt.toLocaleString('en-US', options);

                orderQueueContainer.innerHTML +=
                `<div class="col-12 col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="row w-100">
                                <div class="col-7 d-flex flex-column">
                                    <h6 class="mb-3 fs-5">Transaction ID: ${data.transaction_id}</h6>
                                    <span class="mb-2 text-xs">Location: <span class="text-dark ms-sm-2 font-weight-bold">${data.location}</span></span>
                                    <span class="mb-2 text-xs">Contact Number: <span class="text-dark ms-sm-2 font-weight-bold">${data.contact_number}</span></span>
                                    <span class="mb-2 text-xs">Payment Method: <span class="text-dark ms-sm-2 font-weight-bold">${data.payment_method}</span></span>
                                    <span class="text-xs">Total Price: <span class="text-dark ms-sm-2 font-weight-bold">₱${data.amount_due}</span></span>
                                </div>

                                <div class="col-5 d-flex flex-column align-items-end justify-content-between">
                                    <div>
                                        <div class="text-end">
                                            <span class="mb-1 text-xs text-end">Placed At: ${formattedDate}</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="mb-1 text-xs">Status: ${data.status}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="mb-2 choco-btn text-dark px-3 mb-0 text-sm" href="transaction-pending-show-admin?id=${data.transaction_id}">View Order</a>
                                    </div>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>`
            });

        } catch (error) {
            console.error("Error fetching orders:", error);
        }
    }


    fetchOrders();
    // Fetch transaction every 5 seconds
    setInterval(fetchOrders, 5000);
});


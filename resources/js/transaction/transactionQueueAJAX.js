
document.addEventListener("DOMContentLoaded", () => {
    const orderQueueContainer = document.querySelector('#order-queue-container');

    async function fetchOrders() {
        try {
            const response = await fetch("../../app/Request/PendingOrderQueue.php");
            const text = await response.text(); // Get raw response

            console.log("Raw Response:", text); // Check if it's JSON or has errors
            const data = JSON.parse(text); // Manually parse JSON
            console.log("Parsed Data:", data); // See what gets parsed

            orderQueueContainer.innerHTML = "";

            data['orders'].forEach((data) => {
                orderQueueContainer.innerHTML +=
                `<div id="order-queue-container" class="col-12 col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 fs-5">${data.username}</h6>
                                <span class="mb-2 text-xs">Transaction ID: <span class="text-dark font-weight-bold ms-sm-2">${data.transaction_id}</span></span>
                                <span class="mb-2 text-xs">Location: <span class="text-dark ms-sm-2 font-weight-bold">${data.location}</span></span>
                                <span class="mb-2 text-xs">Contact Number: <span class="text-dark ms-sm-2 font-weight-bold">${data.contact_number}</span></span>
                                <span class="text-xs">Total Price: <span class="text-dark ms-sm-2 font-weight-bold">₱${data.amount_due}</span></span>
                            </div>
                            <div class="ms-auto d-flex flex-column align-items-end">
                            <span class="m-2 text-xs">Status: ${data.status.charAt(0).toUpperCase() + data.status.slice(1) }</span>
                            <a class="btn btn-link text-danger text-gradient px-3 mt-2 mb-0" href="javascript:;"><i class="material-symbols-rounded text-sm me-2">delete</i>Delete</a>
                            <a class="mb-2 btn btn-link text-dark px-3 mb-0" href="transaction-show?id=${data.transaction_id}"><i class="material-symbols-rounded text-sm me-2">edit</i>View Order</a>
                            <span class="text-xs">Placed At: ${data.created_at}</span>
                            </div>
                        </li>
                    </ul>
                </div`
            });

        } catch (error) {
            console.error("Error fetching orders:", error);
        }
    }


    // Fetch transaction every 5 seconds
    setInterval(fetchOrders, 5000);
});


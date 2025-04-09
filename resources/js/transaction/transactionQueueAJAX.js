
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
                            <div class="row">
                                <div class="col-7 d-flex flex-column">
                                    <h6 class="mb-3 fs-5">${data.username}</h6>
                                    <span class="mb-2 text-xs">Transaction ID: <span class="text-dark font-weight-bold ms-sm-2">${data.transaction_id}</span></span>
                                    <span class="mb-2 text-xs">Location: <span class="text-dark ms-sm-2 font-weight-bold">${data.location}</span></span>
                                    <span class="mb-2 text-xs">Contact Number: <span class="text-dark ms-sm-2 font-weight-bold">${data.contact_number}</span></span>
                                    <span class="mb-2 text-xs">Payment Method: <span class="text-dark ms-sm-2 font-weight-bold">${data.payment_method}</span></span>
                                    <span class="text-xs">Total Price: <span class="text-dark ms-sm-2 font-weight-bold">₱${data.amount_due}</span></span>
                                </div>

                                <div class="col-5 d-flex flex-column align-items-end justify-content-end pt-4">
                                    <span class="mb-1 text-xs">Status: ${data.status}</span>
                                    <form action="transaction-update-admin" method="POST">
                                        <input 
                                            class="d-none" 
                                            name="status" 
                                            value="Rejected">
                                        <input 
                                            class="d-none" 
                                            name="transaction-id" 
                                            value="${data.transaction_id}">
                                        <button class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-symbols-rounded text-sm me-2">delete</i>Reject</button>
                                    </form>
                                    <a class="mb-2 btn btn-link text-dark px-3 mb-0" href="transaction-pending-show-admin?id=${data.transaction_id}"><i class="material-symbols-rounded text-sm me-2">edit</i>View Order</a>
                                    <span style="font-size: .7rem;">Placed At: ${data.created_at}</span>
                                </div>
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


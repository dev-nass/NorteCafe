
const placeOrderForm = document.querySelector('#place-order-form');
const placeOrderBtn = document.querySelector('#place-order-btn');



placeOrderForm.addEventListener('submit', (event) => {

    event.preventDefault();
    Swal.fire({
        title: "Confirm place order?",
        showDenyButton: true,
        confirmButtonText: "Confirm",
        denyButtonText: `Cancel`
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            placeOrderForm.submit();
        } else if (result.isDenied) {
            
        }
    });
});

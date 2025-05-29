
const codRadioBtn = document.querySelector('#codRadioBtn');
const gcashRadioBtn = document.querySelector('#gcashRadioBtn');
const paymentMethodContainer = document.querySelector('#paymentMethodContainer');
const paymentInputValue = document.querySelector('#payment-method-input');
const fileInput = document.querySelector('#file-input');

codRadioBtn.addEventListener('click', () => {
    paymentInputValue.value = "COD";
    paymentMethodContainer.classList.add('d-none');
    fileInput.required = false;
});

gcashRadioBtn.addEventListener('click', () => {
    paymentInputValue.value = "GCASH";
    paymentMethodContainer.classList.remove('d-none');
    fileInput.required = true;
});
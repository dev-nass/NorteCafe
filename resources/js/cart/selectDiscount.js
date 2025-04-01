
const discountBtn = document.querySelectorAll('.select-discount');
let totalPriceElem = document.querySelector('#total-price'); // span
let totalPriceValue = totalPriceElem.textContent.trim(); // value of span
let amountDueInput = document.querySelector('#amount_due_input'); // hidden input for the place order form
let selectedVoucherInput = document.querySelector('#selected_voucher_input');

let selectedVoucherHeader = document.querySelector('#selectedVoucherHeader'); // span at h6 element

discountBtn.forEach((btn) => {
    btn.addEventListener('click', (event) => {

        let discountedTotal = btn.getAttribute("data-type") === "fixed"
            ? fiexDiscountCompt(totalPriceValue, btn.getAttribute("data-value"))
            : percentageDiscountCompt(totalPriceValue, btn.getAttribute("data-value"));

        console.log("Voucher type:", btn.getAttribute("data-type"));
        console.log("Amount after dis:", discountedTotal.toFixed(2));

        selectedVoucherHeader.textContent = btn.getAttribute("data-name");
        totalPriceElem.textContent = discountedTotal.toFixed(2);
        amountDueInput.value = discountedTotal.toFixed(2);

        selectedVoucherInput.value = btn.getAttribute("data-id");

        alert("Discount voucher selected!");
    });
});

const fiexDiscountCompt = (totalPriceValue, discountValue) => {
    return parseFloat(totalPriceValue - discountValue);
}

const percentageDiscountCompt = (totalPriceValue, discountValue) => {
    let discountMultiplier = discountValue / 100; // the issue is here (0.000005)
    let discountAmount = totalPriceValue * discountMultiplier;
    discountAmount = discountAmount * 100; // so we add this to make it whole number

    return parseFloat(totalPriceValue - discountAmount);
}
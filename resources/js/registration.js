
const registrationForm = document.querySelector('.registration-form');
const termsAgreementCheckbox = document.querySelector('.terms-agreementCheckbox');

registrationForm.addEventListener("submit", (e) => {

    if(! termsAgreementCheckbox.checked) {
        alert("Agree to our terms and condition first");
        e.preventDefault();
    }
});
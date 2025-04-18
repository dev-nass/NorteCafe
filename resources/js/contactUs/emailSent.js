
const contact_form = document.querySelector('#contact-form');

contact_form.addEventListener("submit", () => {
    Swal.fire({
        icon: "success",
        title: "Email Sent",
        text: "Your inquiry has been sent to us. We will answer it back as soon as possible",
        allowOutsideClick: false,
    });
});

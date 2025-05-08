
const userVerifiedInput = document.querySelector('#user_verified_status');

if (userVerifiedInput.value == 0) {

    Swal.fire({
        icon: "success",
        title: "Login Sucessfully!",
        text: "First time logging in? Please complete your profile information before placing an order",
        footer: "<a href='profile'>Complete Profile?</a>",
        allowOutsideClick: false,
    });
}
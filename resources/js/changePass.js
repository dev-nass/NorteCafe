
const changePass_fornm = document.querySelector('.change-pass');

changePass_fornm.addEventListener('submit', () => {

    const error_li = document.querySelector('.error-li');

    if(! error_li) {
        Swal.fire({
            icon: "success",
            title: "Chaged Password Sucessfully!",
            text: "Redirect you to login page now",
            allowOutsideClick: false,
        });
    }
});
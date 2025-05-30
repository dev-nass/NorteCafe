
const changePass_form = document.querySelector('.change-pass');

changePass_form.addEventListener('submit', async (event) => {

    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    try {

        const response = await fetch('../../App/Http/Controllers/ChangePasswordController.php', {
            method: 'POST',
            body: formData,
            header: {
                'Accept': 'application/json'
            }
        });

        Swal.fire({
            icon: "success",
            title: "Chaged Password Sucessfully!",
            text: "Redirect you to login page now",
            allowOutsideClick: false,
        });

    } catch (e) {
        // console.log(e);
    }



});
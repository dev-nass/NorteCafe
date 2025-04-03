
document.addEventListener("DOMContentLoaded", () => {

    const errorParaMsg = document.querySelector('.error-msg'); // the <p> element that gets created whenver there's an error

    if (errorParaMsg) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Enter a valid credentials!",
            allowOutsideClick: false,
        });
    }
});
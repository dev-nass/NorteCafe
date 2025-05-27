<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="vh-100 d-flex justify-content-center align-items-center mt-5">
    <div class="container white-bg p-5 shadow-sm rounded">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-4">
                <div class="contact-info">
                    <h2 class="section-headerv2">Contact Us</h2>
                    <div class="mt-3">
                        <h3 class="h4"><i class="fa-solid fa-map-marker-alt h5 me-2 text-choco"></i>Address</h3>
                        <p>Keystone building San Isidro Labrador 2, Dasmariñas, Philippines</p>
                    </div>
                    <div>
                        <h3 class="h4"><i class="fas fa-phone h5 me-2 text-choco"></i>Phone</h3>
                        <p>+639497294572</p>
                    </div>
                    <div>
                        <h3 class="h4"><i class="fas fa-envelope h5 me-2 text-choco"></i>Email</h3>
                        <p>amauryloyola2@gmail.com</p>
                    </div>
                    <div class="d-flex flex-row justify-content-around w-50 ms-3 mt-4">
                        <div>
                            <a class="text-choco h5" href="https://www.facebook.com/mariaschoiceest2021?rdid=Ejme0X4kCc13RjMl&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1FkVE9Snhh"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                        <div>
                            <a class="text-choco h5" href="https://x.com/Akaneechii25"><i class="fa-brands fa-x-twitter"></i></a>

                        </div>
                        <div>
                            <a class="text-choco h5" href="https://www.instagram.com/nortecafe_cb/"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8 mt-5">
                <div class="">
                    <!-- add novalidate here is you want to implement bootstrap user side validation -->
                    <form id="contact-form" class="needs-validation" action="contactUs" method="POST">
                        <div class="row">
                            <!-- Your name -->
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Your Name</label>
                                <input name="name" type="text" class="form-control" id="validationCustom01" placeholder="Juan Dela Cruz" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid name!
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="validationCustom02" placeholder="juancruz@gmail.com" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid email!
                                </div>
                            </div>
                        </div>
                        <!-- Subject -->
                        <div class="col-12">
                            <label for="validationCustom03" class="form-label">Subject</label>
                            <select class="form-select" id="validationCustom03" name="subject" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Inquiry">Inquiry</option>
                                <option value="Feedback">Feedback</option>
                                <option value="Support">Support</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please select a valid subject!
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="I enjoyed my stay at your shop...." required></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Enter a mesage!
                            </div>
                        </div>
                        <button type="submit" class="btn choco-btn text-white mt-3">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<?php require base_path('resources/views/components/foot.php') ?>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const form = document.querySelector('#contact-form');
    form.addEventListener("submit", () => {
        Swal.fire({
            title: 'Sending...',
            text: 'Please wait while we send your email.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading(); // Show loading spinner
            }
        });
    });
</script>

<?php if (isset($_SESSION['__flash']['contactUs_notif'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Message Sent Sucessfully!",
            text: "We'll reply back to you as soon as possible. Please check your inbox for reply.",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>
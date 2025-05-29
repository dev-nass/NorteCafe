<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/rider_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2">
        <div class="row justify-content-center">

            <!-- Contact Form -->
            <div class="col-8 mt-3 bg-white p-5 rounded shadow-sm">
                <div class="">
                    <!-- add novalidate here is you want to implement bootstrap user side validation -->
                    <form id="contact-form" class="needs-validation" action="contact-shop-send-rider" method="POST">
                        <div class="row">
                            <!-- Your name -->
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Your Name</label>
                                <input name="name" type="text" class="form-control border border-dark px-2" id="validationCustom01" value="<?= $_SESSION['__currentUser']['credentials']['first_name'] . ' ' . $_SESSION['__currentUser']['credentials']['last_name'] ?>" readonly>
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
                                <input name="email" type="email" class="form-control border border-dark px-2" id="validationCustom02" value="<?= $_SESSION['__currentUser']['credentials']['email'] ?>" readonly>
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
                            <select class="form-select border border-dark px-2" id="validationCustom03" name="subject" required>
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
                            <textarea class="form-control border border-dark px-2" id="message" name="message" rows="5" placeholder="I enjoyed my stay at your shop...." required></textarea>
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

</main>


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

<?php if (isset($_SESSION['__flash']['contactShop_notif'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Message Sent Sucessfully!",
            text: "We'll reply back to you as soon as possible. Please check your inbox for reply.",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>

<?php require base_path('resources/views/components/rider_foot.php') ?>
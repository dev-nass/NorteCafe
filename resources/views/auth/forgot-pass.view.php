<?php require '../../views/components/head.php' ?>

<main class="container-fluid-gradient container-fluid">
    <div class="container">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center g-0">
            <div class="col-lg-6 col-md-8 py-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-4 form-section-bg">
                        <h1 class="fs-3 text-center">Forgot your password?</h1>
                        <p class="text-center">Enter your email and we'll send you a reset link.</p>

                        <!-- form section -->
                        <!-- pa configure nalang pag i bbackend na -->
                        <form id="resetForm" action="#" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="email-address">Email Address</label>
                                <div class="form-floating">
                                    <input class="form-control" name="email-address" type="email" id="email-address" placeholder="Enter your email" required>
                                    <label for="email-address">Enter your email...</label>
                                </div>
                                <div class="mb-3">
                                    <button class="Fpass-btn d-block w-100 mt-3" type="submit" data-bs-toggle="modal" data-bs-target="#resetModal">
                                        Send Reset Link
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Notification -->
    <!-- <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resetModalLabel">Password Reset</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        If an account associated with this email address is in our records, a password reset link will be sent to your email. Please check your inbox.
                    </div>
                </div>
            </div>
        </div> -->
</main>

<?php require '../../views/components/foot.php' ?>
<?php require base_path('resources/views/components/head.php') ?>

<main class="container-fluid-gradient container-fluid">
    <!-- form section -->
    <div class="container">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center g-0">
            <div class="col-lg-6 col-md-8 py-3">
                <div class="card overflow-hidden ">
                    <div class="card-body p-4 form-section-bg">
                        <h1 class="fs-3 text-center">Reset Password</h1>
                        <form action="#" method="POST" novalidate>
                            <!-- Hidden Inputs -->
                            <div class="d-none">
                                <input
                                    class="d-none"
                                    value="<?= $token_selector ?>"
                                    type="text">
                                <input
                                    class="d-none"
                                    value="<?= $token_reset ?>"
                                    type="text">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="new_password">New Password</label>
                                <div class="form-floating">
                                    <input class="form-control" name="new_password" type="password" id="new_password" placeholder="New Password" required>
                                    <label for="new_password">Enter New Password...</label>
                                    <div class="invalid-feedback">Missing New Password...</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password_confirmed">Confirm New Password</label>
                                <div class="form-floating">
                                    <input class="form-control" name="password_confirmed" type="password" id="password_confirmed" placeholder="Confirm New Password" required>
                                    <label for="password_confirmed">Re-Enter New Password...</label>
                                    <div class="invalid-feedback">Passwords do not match...</div>
                                </div>
                            </div>
                            <?php if ($message) : ?>
                                <div class="mt-3">
                                    <p class="text-danger"><?= $message ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <button class="Cpass-btn w-100 mt-3" type="submit">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

<!-- =================== -->
<!-- End Change Password Content -->
<!-- =================== -->

<!-- js for validating -->
<script>
    const form = document.querySelector("form");

    form.addEventListener("submit", (e) => {
        if (!form.checkValidity()) {
            e.preventDefault();
        }
        form.classList.add("was-validated");
    });
</script>

<?php require base_path('resources/views/components/foot.php') ?>
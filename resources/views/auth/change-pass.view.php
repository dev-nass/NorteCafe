<?php require '../../views/components/head.php' ?>

<main class="container-fluid-gradient container-fluid">
    <!-- form section -->
    <div class="container">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center g-0">
            <div class="col-lg-6 col-md-8 py-3">
                <div class="card overflow-hidden ">
                    <div class="card-body p-4 form-section-bg">
                        <h1 class="fs-3 text-center">Change Password</h1>
                        <form action="#" method="post" novalidate>
                            <div class="mb-3">
                                <label class="form-label" for="old-password">Old Password</label>
                                <div class="form-floating">
                                    <input class="form-control" name="old-password" type="password" id="old-password" placeholder="Old Password" required>
                                    <label for="old-password">Enter Old Password...</label>
                                    <div class="invalid-feedback">Missing Old Password...</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="new-password">New Password</label>
                                <div class="form-floating">
                                    <input class="form-control" name="new-password" type="password" id="new-password" placeholder="New Password" required>
                                    <label for="new-password">Enter New Password...</label>
                                    <div class="invalid-feedback">Missing New Password...</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="confirm-password">Confirm New Password</label>
                                <div class="form-floating">
                                    <input class="form-control" name="confirm-password" type="password" id="confirm-password" placeholder="Confirm New Password" required>
                                    <label for="confirm-password">Re-Enter New Password...</label>
                                    <div class="invalid-feedback">Passwords do not match...</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="Cpass-btn w-100 mt-3" type="submit">Change Password</button>
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

<?php require '../../views/components/foot.php' ?>
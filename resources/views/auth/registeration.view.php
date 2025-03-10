
<?php require '../../views/components/head.php' ?>


    <main class="container-fluid-gradient container-fuild">
        <div class="container">
            <div class="row min-vh-100 d-flex justify-content-center align-items-center g-0">
                <div class="col-lg-10 py-3">
                    <div class="card overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row g-0 h-100">
                                <!-- info section -->
                                <div class="col-md-5 text-center info-section-bg text-white p-3 d-flex flex-column justify-content-center">
                                    <div class="p-4 pt-md-5 pb-md-7">
                                        <!-- pa link nalang sa homepage -->
                                        <a href="../../views/user/index.view.php" class="no-underline"><h2 class="link-light fw-bolder">Norte Cafe'</h2></a>
                                        <p>
                                             Enjoy the perfect blend of Tea and Milk tea at Norte Café! Crafted with quality ingredients and a passion for great flavors, every sip is a treat. Log in to place your order or sign up to explore our menu!                               
                                        </p>
                                    </div>
                                    <div class="mt-3 mb-4 mt-md-4 mb-md-5">
                                        <p>Already have an account? <a class="text-decoration-underline text-white" href="../../views/auth/login.view.php">Log In!</a></p>
                                        <p class="mb-0 mt-4 mt-md-5 fs--1">Read our <a class="text-decoration-underline text-white" href="../../views/auth/terms&condition.view.php">Terms & Conditions</a></p>
                                        <!-- <p class="mb-0 mt-4 mt-md-5 fs--1">Need Help? Go to our <a class="text-decoration-underline text-white" href="#">F A Q S</a></p> -->
                                    </div>
                                </div>
                                
                                <!-- form section -->
                                <div class="col-md-7 form-section-bg d-flex align-items-center justify-content-center">
                                    <div class="p-4 p-md-5 w-100">
                                        <h1 class="fs-3">Register Account</h1>
                                        <!-- may validation -->
                                        <form action="#" method="post" novalidate>
                                            <div class="mb-3">
                                                <label class="form-label" for="username">Username</label>
                                                <div class="form-floating">
                                                    <input class="form-control" name="username" type="text" id="username" placeholder="Username" required autofocus>
                                                    <label for="username">Enter Username...</label>
                                                    <div class="invalid-feedback">Missing Username...</div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="email">E-Mail</label>
                                                <div class="form-floating">
                                                    <input class="form-control" name="email" type="email" id="email" placeholder="E-Mail" required>
                                                    <label for="email">Enter E-Mail...</label>
                                                    <div class="invalid-feedback">Invalid E-Mail...</div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password">Password</label>
                                                <div class="form-floating">
                                                    <input class="form-control" name="password" type="password" id="password" placeholder="Password" required>
                                                    <label for="password">Enter Password...</label>
                                                    <div class="invalid-feedback">Missing Password...</div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="confirm-password">Re-Enter Password</label>
                                                <div class="form-floating">
                                                    <input class="form-control" name="confirm-password" type="password" id="confirm-password" placeholder="Re-Enter Password" required>
                                                    <label for="confirm-password">Re-Enter Password...</label>
                                                    <div class="invalid-feedback">Missing Password...</div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="register-btn w-100 mt-3" type="submit">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<!-- =================== -->
<!-- End Register Content -->
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

<?php include('../../views/components/foot.php') ?>
<?php require base_path('resources/views/components/head.php')?>

<main class="container-fluid-gradient container-fluid">
    <div class="container">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center g-0">
            <div class="col-lg-8 py-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row g-0 h-100">
                            <!-- info section -->
                            <div class="col-md-5 text-center info-section-bg text-white p-3">
                                <div class="p-4 pt-md-5 pb-md-7">
                                    <!-- pa link na lang sa home page -->
                                    <a href="index" class="no-underline">
                                        <h2 class="link-light fw-bolder">Norte Cafe'</h2>
                                    </a>
                                    <p>
                                        Enjoy the perfect blend of Tea and Milk tea at Norte Café! Crafted with quality ingredients and a passion for great flavors, every sip is a treat. Log in to place your order or sign up to explore our menu!
                                    </p>
                                </div>
                                <div class="mt-3 mb-4 mt-md-4 mb-md-5">
                                    <p>Don't have an account? <a class="text-decoration-underline text-white" href="registration">Register Now!</a></p>
                                    <p class="mb-0 mt-4 mt-md-5 fs--1">Read our <a class="text-decoration-underline text-white" href="../../views/auth/terms&condition.view.php">Terms & Conditions</a></p>
                                </div>

                            </div>
                            <!-- form section -->
                            <div class="col-md-7 form-section-bg d-flex align-items-center justify-content-center">
                                <div class="p-4 p-md-5 w-100">
                                    <h1 class="fs-3">Account Login</h1>
                                    <form action="login" method="post" novalidate>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Username or E-Mail</label>
                                            <div class="form-floating">
                                                <input class="form-control" name="email" type="text" id="email" placeholder="Username or E-Mail" required autofocus>
                                                <label for="email">Username or E-Mail...</label>
                                                <div class="invalid-feedback">Missing Username or E-Mail...</div>
                                            </div>
                                            <?php if(isset($errors['email'])) : ?>
                                                    <div class="text-danger"><?= $errors['email'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="password">Password</label>
                                                <a class="fs--1" href="../../views/auth/forgot-pass.view.php">Forgot Password?</a>
                                            </div>
                                            <div class="form-floating">
                                                <input class="form-control" name="password" type="password" id="password" placeholder="Password" required>
                                                <label for="password">Enter Password...</label>
                                                <div class="invalid-feedback">Missing Password...</div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="login-btn w-100 mt-3" type="submit">Login</button>
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

<?php require base_path('resources/views/components/foot.php')?>
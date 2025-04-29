<?php require base_path('resources/views/components/head.php') ?>

<main class="container-fluid-gradient container-fluid">
    <div class="container">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center g-0">
            <div class="col-lg-10 py-5">
                <div class="card overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row g-0 h-100">
                            <!-- info section -->
                            <div class="col-md-5 text-center info-section-bg text-white d-flex flex-column position-relative">
                                <!-- pa link nalang sa homepage -->
                                <div class="z-2 px-3 py-3 h-100 d-flex flex-column align-items-center justify-content-center">
                                    <img style="height: 150px; width: 150px;" src="../../storage/frontend/user/img/index/rabbit-reg.png" alt="">
                                    <a href="index" class="no-underline">
                                        <h2 class="link-light fw-bolder">NORTE CAFE' BY CB</h2>
                                    </a>
                                    <p>
                                        Enjoy the perfect blend of Tea and Milk tea at Norte Café! Crafted with quality ingredients and a passion for great flavors, every sip is a treat. Log in to place your order or sign up to explore our menu!
                                    </p>
                                </div>

                                <img class="z-1 w-100 h-100 opacity-25 position-absolute" src="../../storage/frontend/user/img/index/registration-side.jpg" alt="">
                            </div>
                            <!-- form section -->
                            <div class="col-md-7 form-section-bg d-flex align-items-center justify-content-center">
                                <div class="p-4 p-md-5 w-100">
                                    <h1 class="fs-3">Account Login</h1>
                                    <form action="login" method="post" novalidate>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Username or E-Mail</label>
                                            <div class="form-floating">
                                                <input class="form-control" name="email" type="text" id="email" placeholder="Username or E-Mail" value="<?= old('emailOrUsername') ?>" required autofocus>
                                                <label for="email">Username or E-Mail...</label>
                                                <div class="invalid-feedback">Missing Username or E-Mail...</div>
                                            </div>
                                            <?php error('emailOrUsername')?>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="password">Password</label>
                                                <a class="fs--1" href="forgot-pass">Forgot Password?</a>
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
                                        <div class="mt-3 mb-4 mt-md-4 mb-md-5">
                                            <p class="text-center">Don't have an account? <a class="text-decoration-underline" href="registration">Register Now!</a></p>
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


<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Alert for newly changed password -->
<?php if (isset($_SESSION['__flash']['change_password_notif']) && $_SESSION['__flash']['change_password_notif'] === "Password Changed Successfully") : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Chaged Password Sucessfully!",
            text: "Please login using your new password",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>

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